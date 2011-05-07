<?php
// Generic class for documentation

class Doc_Page extends Page {
	public $sidebar;
	function init(){
		parent::init();
        $this->add('BreadCrumb');



		/*
		$f=$this->sidebar->add('Form');
		$f->template->set('form_class','vertical');
		$help=$f->addField('text','help','Help us improve documentation!')
			->set('don\'t use this yet, it\'s not being saved. Page: '.$this->api->page);
		$f->addButton('Submit Feedback')->js('click',$f->js()->submit());
		if($f->isSubmitted()){

			// TODO: save feedback

			$f->js(null,$help->js()->val(''))->univ()
				->successMessage('Thank you for your feedback')->execute();
		}
		*/
	}
    function initMainPage(){
        return $this->subPage('');
    }
	function subPage($name,$title=null){
        if(is_null($title))$title=ucwords(str_replace('_',' ',$name));
        /*
		$this->sidebar->addMenuItem($title,$hr=str_replace(array('page_','_'),array('','/'),
					get_class($this)).'/'.$name);
		return $this->sidebar->isCurrent($hr);
        */

	}
    function defaultTemplate(){
		$top_page=str_replace('page_','', get_class($this));
        if($this->api->page!=$top_page){
            // subpage
            $sub_page=str_replace($top_page.'_','',$this->api->page);
            return array('page/'.str_replace('_','/',$top_page).'/'.$sub_page);
        }
        return array('page/'.str_replace('_','/',$top_page));
    }
	function subPageHandler($p){
	}
}
