<?php
class page_about_history extends Page {
    function init(){
        parent::init();
        $this->api->redirect('/about/author');
    }
    /*
	function defaultTemplate(){
		return array('page/about/history');
	}
    */
}
