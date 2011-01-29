<?php
/*
   Alex - The Pink Elephant

   Used for demonstration purposes
   */
class Alex extends HtmlElement {
	public $float='right';
	function init(){
		parent::init();
		$this->setElement('img');
		$this->setAttr('src',$this->api->locateURL('template','images/PinkElephant.jpg'));
		$this->set('');
	}
	function render(){
		$this
			->addStyle('float',$this->float)
			;
		parent::render();
	}
	function align($side){
		$this->float=$side;
		return $this;
	}
}
