<?php

// Push our modifications into Button class. This will avoid using jQuery button enhancement

class Button extends View_Button {
	function jsButton(){
	}
	function render(){
		$this->addClass('green');
		parent::render();
	}
}
