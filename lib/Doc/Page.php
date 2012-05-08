<?php
// Generic class for documentation

class Doc_Page extends Page {
	public $sidebar;
	function init(){
		parent::init();
        $this->initBar();
	}
    function initBar(){
        if($this->template->is_set('Content')){
            $this->add('BreadCrumb');
            $this->add('Button')->set('Propose grammar fix')
                ->addStyle('float','right')
                ->js('click')->univ()->alert('Help me improve this documentation. Propose changes and they will be reflected on this page after our review. You will need to have account on github.com')
                ->newWindow('https://github.com/atk4/atk4-web/edit/master/templates/jui/page/'.
                str_replace('_','/',$this->api->page).'.html')
                ;
        }
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
            $sub_page=str_replace('_','/',$sub_page);
            $sub_page='page/'.str_replace('_','/',$top_page).'/'.$sub_page;
            try {
                $x=$this->api->locate('template',$sub_page.'.html');
            }catch(PathFinder_Exception $e){
                //return $this->defaultIndexPage($top_page);
                return array('page/empty');
            }
            return array($sub_page);
        }
        return $this->defaultIndexPage($top_page);
    }
    function defaultIndexPage($top_page){
        return array('page/'.str_replace('_','/',$top_page));
    }
	function subPageHandler($p){
	}
}
