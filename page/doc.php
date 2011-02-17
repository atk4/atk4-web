<?php
class page_doc extends Page {
	function init(){
		parent::init();
		$this->add('Button',null,'start')->set('Start Interactive Introduction')->js('click')->univ()->redirect($this->api->getDestinationURL('/intro'));
	}
	function defaultTemplate(){
		return array('page/doc');
	}
}
