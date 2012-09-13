<?php

// Push our modifications into Button class. This will avoid using jQuery button enhancement

class Button extends View_Button {
    public $color='green';
	function jsButton(){
	}
    function setColor($color){
        $this->color=$color;
        return $this;
    }
	function render(){
		$this->addClass($this->color.' button');
		parent::render();
	}
}
