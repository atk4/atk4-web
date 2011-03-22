<?php
class page_intro_generic extends Page {
	function init(){
		parent::init();
		$this->sidebar=$this->add('Menu',null,null,array('view/sidebar','Menu'));
		$this->sidebar->current_menu_class='current blue-i';
		$this->sidebar->inactive_menu_class='';

		$this->subPage('Foundation','intro/start');
		$this->subPage('JavaScript','intro/javascript');
		$this->subPage('Models (MVC)','intro/models');
		$this->subPage('Add-ons','intro/addons');
		$this->subPage('Engage','intro/engage');
	}
	function subPage($name,$ref=null){
		$hr=$ref?$ref:$str_replace(array('page_','_'),array('','/'),get_class($this)).'/'.$name;
				       //str_replace(array('page_','_'),array('','/'),get_class($this)).'/'.$name);
		$this->sidebar->addMenuItem($name,$hr);
		$this->sidebar->template->set('title','Introduction');
		return $this->sidebar->isCurrent($hr);

	}
}
