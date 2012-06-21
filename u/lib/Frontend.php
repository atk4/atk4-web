<?php
class Frontend extends ApiFrontend {
	function init(){
		parent::init();
		$this->dbConnect();
		$this->add('jUI');

		$m=$this->add('Menu',null,'Menu');
		$m->addMenuItem('index','Your Account');
		$m->addMenuItem('licenses');
		$m->addMenuItem('content');

	}
	function getUserID(){
		return 1;
	}
}