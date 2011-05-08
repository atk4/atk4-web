<?php
class page_intro extends Doc_Page {
    function initBar(){
        $this->add('View',null,null,array('view/introbar'));
    }
	function initMainPage(){
		//parent::init();
		$this->api->redirect('./start');
	}
    function defaultIndexPage(){
        return 'Content';
    }
}
