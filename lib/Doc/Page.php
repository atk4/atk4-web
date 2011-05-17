<?php
// Generic class for documentation

class Doc_Page extends Page {
	public $sidebar;
	function init(){
		parent::init();
        $this->initBar();
	}
    function initBar(){
		if($this->template->is_set('Content')) $this->add('BreadCrumb');
    }
    function initMainPage(){
        return $this->subPage('');
    }
	function subPage($name,$title=null){
        if(is_null($title))$title=ucwords(str_replace('_',' ',$name));
	}
    function defaultTemplate(){
		$top_page=str_replace('page_','', get_class($this));
        if($this->api->page!=$top_page){
            // subpage
            $sub_page=str_replace($top_page.'_','',$this->api->page);
            return array('page/'.str_replace('_','/',$top_page).'/'.$sub_page);
        }
        return $this->defaultIndexPage($top_page);
    }
    function defaultIndexPage($top_page){
        return array('page/'.str_replace('_','/',$top_page));
    }
	function subPageHandler($p){
	}
}
