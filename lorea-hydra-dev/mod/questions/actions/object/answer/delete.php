<?php

$guid = (int) get_input('guid');
$answer = get_entity($guid);

if (!($answer instanceof ElggAnswer)) {
	register_error(elgg_echo('ClassException:ClassnameNotClass', [$guid, elgg_echo('item:object:answer')]));
	forward(REFERER);
}

if (!$answer->canEdit()) {
	register_error(elgg_echo('InvalidParameterException:NoEntityFound'));
	forward(REFERER);
}

$question = $answer->getContainerEntity();

$answer->delete();

forward(get_input('forward', $question->getURL()));
