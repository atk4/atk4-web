<?php
class page_doc extends Page {
	function init(){
		parent::init();
		$this->add('Button',null,'start')->set('Start Interactive Introduction')->js('click')->univ()->redirect($this->api->getDestinationURL('/intro'));


		$this->add('Button',null,'vendors')
            ->setColor('orange')
            ->addStyle('margin-top','14px')
            ->set('Commercial Vendors')
            ->js('click')->univ()
            ->redirect($this->api->getDestinationURL('/commercial/vendors'));


		$this->add('Button',null,'getting_started_buttons')
            ->setColor('blue')
            ->set('Tutorial')
            ->js('click')->univ()
            ->redirect($this->api->getDestinationURL('/doc/tutorial'));

		$this->add('Button',null,'getting_started_buttons')
            ->setColor('blue')
            ->set('Screencasts')
            ->js('click')->univ()
            ->redirect($this->api->getDestinationURL('/doc/sc'));

		$this->add('Button',null,'getting_started_buttons')
            ->setColor('blue')
            ->set('Code Snippets')
            ->js('click')->univ()
            ->redirect($this->api->getDestinationURL('/doc/sc'));

		$this->add('Button',null,'getting_started_buttons')
            ->setColor('blue')
            ->set('Open-source Projects')
            ->js('click')->univ()
            ->redirect($this->api->getDestinationURL('/doc/sc'));


	}
	function defaultTemplate(){
		return array('page/doc');
	}
}
