<?php
class page_doc extends Page {
	function init(){
		parent::init();
		$this->add('Button',null,'start')->set('Start Interactive Introduction')->js('click')->univ()->redirect($this->api->getDestinationURL('/doc/intro/1'));
	}
	function defaultTemplate(){
		return array('page/doc');
	}
}
