<?php

elgg_make_sticky_form('question');

$guid = (int) get_input('guid');
if (empty($guid)) {
	$question = new ElggQuestion();
} else {
	elgg_entity_gatekeeper($guid, 'object', 'question');
	$question = get_entity($guid);
}

$adding = !$question->guid;
$editing = !$adding;
$moving = false;

if ($editing && !$question->canEdit()) {
	register_error(elgg_echo('InvalidParameterException:NoEntityFound'));
	forward(REFERER);
}

$container_guid = (int) get_input('container_guid');
if (empty($container_guid)) {
	$container_guid = (int) $question->owner_guid;
}

if ($editing && ($container_guid != $question->getContainerGUID())) {
	$moving = true;
}

if ($adding && !can_write_to_container(0, $container_guid, 'object', 'question')) {
	register_error(elgg_echo('questions:action:question:save:error:container'));
	forward(REFERER);
}

if (questions_limited_to_groups() && ($container_guid == $question->owner_guid)) {
	register_error(elgg_echo('questions:action:question:save:error:limited_to_groups'));
	forward(REFERER);
}

$title = get_input('title');
$description = get_input('description');
$tags = string_to_tag_array(get_input('tags', ''));
$access_id = (int) get_input('access_id');

if (empty($container_guid) || empty($title) || empty($description)) {
	register_error(elgg_echo('questions:action:question:save:error:body', array($container_guid, $title, $description)));
	forward(REFERER);
}

// make sure we have a valid access_id
$access_id = questions_validate_access_id($access_id, $container_guid);

$question->title = $title;
$question->description = $description;
$question->tags = $tags;
$question->access_id = $access_id;
$question->container_guid = $container_guid;

try {
	$question->save();
	
	if ($adding) {
		// add river event
		elgg_create_river_item([
			'view' => 'river/object/question/create',
			'action_type' => 'create',
			'subject_guid' => elgg_get_logged_in_user_guid(),
			'object_guid' => $question->getGUID(),
			'access_id' => $question->access_id,
		]);
		
		// notify experts
		questions_notify_experts($question, $moving);
		
		// check for a solution time limit
		$solution_time = questions_get_solution_time($question->getContainerEntity());
		if ($solution_time) {
			// add x number of days when the question should be solved
			$question->solution_time = (time() + ($solution_time * 24 * 60 * 60));
		}
	}
} catch (Exception $e) {
	register_error(elgg_echo('questions:action:question:save:error:save'));
	register_error($e->getMessage());
	forward(REFERER);
}

elgg_clear_sticky_form('question');

$container = $question->getContainerEntity();
if (!$adding) {
	$forward_url = $question->getURL();
} elseif ($container instanceof ElggUser) {
	$forward_url = 'questions/owner/' . $container->username;
} else {
	$forward_url = 'questions/group/' . $container->getGUID() . '/all';
}

forward($forward_url);
