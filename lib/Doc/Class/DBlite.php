<?
class Doc_Class_DBlite extends Doc_Class {
	function init(){
		parent::init();
		$this->set('descr','This class is lightweight replacement of PEAR::DB class.
				This class excludes number of less relevant functionality and focuses
				on flexibility and extensebility');
		$this->addLink('class','DBlite_dsql');
		$this->addLink('tutorial','dblite');
		$this->addNote('This class is due to reimplementation in 4.1. New implementation will 
				have the same interface, however will use PDO. It will also introduce new 
				dynamic queries');
	}
	function initMethods(){
		parent::initMethods();

		$this->addMethod('test');
	}
}
