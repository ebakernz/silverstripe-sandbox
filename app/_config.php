<?php

use SilverStripe\Control\Director;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;

require_once('conf/ConfigureFromEnv.php');

TinyMCEConfig::get('cms')
	->addButtonsToLine(1, 'styleselect')
        ->setOption('importcss_append', true)
	->enablePlugins(['hr','charmap','fullscreen'])
	->addButtonsToLine(3, ['selectall','cut','copy','blockquote','hr','charmap','fullscreen'])
	->insertButtonsBefore('paste', ['undo','redo']);
TinyMCEConfig::get('cms')->insertButtonsAfter('underline', 'strikethrough');

// redirect to ssl if we're in live mode
if(Director::isLive()){
	Director::forceSSL();
}