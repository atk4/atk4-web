<?php
class page_404 extends Page {
	function init(){
		parent::init();
		$this->add('Alex',null,'Alex');

		$this->api->stickyGET('p');
		$f=$this->add('Form');
		$f->addField('line','pgae','Missing page')
			->set(stripslashes($_GET['p']))
			->setProperty('size','60')
			->setProperty('disabled','true');
		$f->addField('text','how','Where was the page found');

		$f->addButton('Back')->js('click','history.go(-1)');
		$f->addButton('Claim Reward');


	}
	function defaultTemplate(){
		return array('page/404');
	}
}
