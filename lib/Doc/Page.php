<?
// Generic class for documentation

class Doc_Page extends Page {
	public $sidebar;
	function init(){
		parent::init();

		$this->sidebar=$this->add('Menu');
	}
	function subPageHandler($p){
	}
}
