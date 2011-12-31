<?php
class page_intro extends Doc_Page {
    function initBar(){
		if($this->template->is_set('Content')){
			$this->add('View',null,null,array('view/introbar'));
		}
    }
	function initMainPage(){
		//parent::init();
		$this->api->redirect('./1');
	}
    function defaultIndexPage(){
        return 'Content';
    }
}
