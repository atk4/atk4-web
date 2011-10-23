<?php
class page_content_surveys extends Page {
    function init(){
        parent::init();

        $this->add('CRUD')->setModel('ATK_Survey');
    }
}
