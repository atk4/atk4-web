<?php
class page_about extends Page {
    function init(){
        parent::init();
        $this->api->redirect('about/about');
    }
}
