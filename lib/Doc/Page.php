<?
// Generic class for documentation

class Doc_Page extends Page {
	public $sidebar;
	function init(){
		parent::init();

		$this->sidebar=$this->add('Menu',null,null,array('view/sidebar','Menu'));
		$this->sidebar->current_menu_class='current blue-i';
		$this->sidebar->inactive_menu_class='';
	}
	function subPageHandler($p){
	}
}
