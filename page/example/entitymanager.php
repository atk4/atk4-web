<?php
class page_example_entitymanager extends Page_EntityManager {

	public $controller='Controller_Person';
	function initMainPage(){
		parent::initMainPage();

		$this->grid->addColumn('link','subpage');

	}
	function page_subpage(){
		$p->add('P')->set('You have clicked on id='.(int)$_GET['id']);
	}
}
