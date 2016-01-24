<?php ?>
ul.tagit {
    padding: 1px 5px;
    overflow: auto;
    margin-left: inherit; /* usually we don't want the regular ul margins. */
    margin-right: inherit;
    border-radius: 5px;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	border: 1px solid #ccc;
}
ul.tagit li {
    display: block;
    float: left;
    margin: 2px 5px 2px 0;
}
ul.tagit li.tagit-choice {
    position: relative;
    line-height: inherit;
}
input.tagit-hidden-field {
    display: none;
}
ul.tagit li.tagit-choice-read-only {
    padding: .2em .5em .2em .5em;
}

ul.tagit li.tagit-choice-editable {
    padding: .2em 18px .2em .5em;
}

ul.tagit li.tagit-new {
    padding: .25em 4px .25em 0;
}

ul.tagit li.tagit-choice a.tagit-label {
    cursor: pointer;
    text-decoration: none;
}
ul.tagit li.tagit-choice .tagit-close {
    cursor: pointer;
    position: absolute;
    right: .1em;
    top: 50%;
    margin-top: -8px;
    line-height: 17px;
}

/* used for some custom themes that don't need image icons */
ul.tagit li.tagit-choice .tagit-close .text-icon {
    display: none;
}

ul.tagit li.tagit-choice input {
    display: block;
    float: left;
    margin: 2px 5px 2px 0;
}
ul.tagit input[type="text"] {
    -moz-box-sizing:    border-box;
    -webkit-box-sizing: border-box;
    box-sizing:         border-box;

    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;

    border: none;
    margin: 0;
    padding: 0;
    width: inherit;
    background-color: inherit;
    outline: none;
}

/* Optional scoped theme for tag-it which mimics the zendesk widget. */
ul.tagit li.tagit-choice {
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    border: 1px solid #4690d6;

    background: none;
    background-color: #e4ecf5;

    font-weight: normal;
}
ul.tagit li.tagit-choice .tagit-label:not(a) {
    color: #555;
}
ul.tagit li.tagit-choice a.tagit-close {
    text-decoration: none;
}
ul.tagit li.tagit-choice .tagit-close {
    right: .4em;
}
ul.tagit li.tagit-choice .ui-icon {
    display: none;
}
ul.tagit li.tagit-choice .tagit-close .text-icon {
    display: inline;
    font-family: arial, sans-serif;
    font-size: 16px;
    line-height: 16px;
    color: #333333;
}
ul.tagit li.tagit-choice:hover, ul.tagit li.tagit-choice.remove {
    background-color: #4690d6;
    color: white;
}
ul.tagit input[type="text"] {
    color: #333333;
    background: none;
}
.ui-widget {
    font-size: 1.1em;
}

/* Forked from a jQuery UI theme, so that we don't require the jQuery UI CSS as a dependency. */
.tagit-autocomplete.ui-autocomplete { position: absolute; cursor: default; }
* html .tagit-autocomplete.ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */
.tagit-autocomplete.ui-menu {
    list-style:none;
    padding: 2px;
    margin: 0;
    display:block;
    float: left;
}
.tagit-autocomplete.ui-menu .ui-menu {
    margin-top: -3px;
}
.tagit-autocomplete.ui-menu .ui-menu-item {
    margin:0;
    padding: 0;
    zoom: 1;
    float: left;
    clear: left;
    width: 100%;
}
.tagit-autocomplete.ui-menu .ui-menu-item a {
    text-decoration:none;
    display:block;
    padding:.2em .4em;
    line-height:1.5;
    zoom:1;
}
.tagit-autocomplete .ui-menu .ui-menu-item a.ui-state-hover,
.tagit-autocomplete .ui-menu .ui-menu-item a.ui-state-active {
    font-weight: normal;
    margin: -1px;
}
.tagit-autocomplete.ui-widget-content { border: 1px solid #aaaaaa; background: #ffffff 50% 50% repeat-x; color: #222222; }
.tagit-autocomplete.ui-corner-all, .tagit-autocomplete .ui-corner-all { -moz-border-radius: 4px; -webkit-border-radius: 4px; -khtml-border-radius: 4px; border-radius: 4px; }
.tagit-autocomplete .ui-state-hover, .tagit-autocomplete .ui-state-focus { border: 1px solid #999999; background: #dadada; font-weight: normal; color: #212121; }
.tagit-autocomplete .ui-state-active  { border: 1px solid #aaaaaa; }

.tagit-autocomplete .ui-widget-content { border: 1px solid #aaaaaa; }
.tagit .ui-helper-hidden-accessible { position: absolute !important; clip: rect(1px,1px,1px,1px); }