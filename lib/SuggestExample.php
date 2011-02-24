<?php
class SuggestExample extends View {
	function init(){
		parent::init();

		if(!$this->api->db)$this->api->dbConnect();

		$this->add('H2')->set('Suggest another example');


		$cc=$this->add('View_Columns');

		$c1=$cc->addColumn();
		$c1->add('P')->set('Do you have a great idea for example? Post your idea here!');
		$f=$c1->add('MVCForm');
		$f->setModel('ExampleRequest',array('suggestion'));
		$f->getElement('Save')->set('Suggest');

		$g=$cc->addColumn()->add('MVCGrid',null,null,array('grid_striped'));
		$g->setModel('ExampleRequest',array('suggestion'));
		$g->addColumn('delete','delete');

		/*
		$fRequest->addField('line','your_name')->setProperty('size','60')->js(true)->focus();
		$f->addField('line','your_email')->setProperty('size','60');
		$f->addField('text','more_information')->setProperty('rows','10')->setProperty('cols','50');
		*/

		if($f->isSubmitted()){
			$f->update();
			$g->js(null,$f->getElement('suggestion')->js()->val(''))->reload()->execute();
		}
	}
}
