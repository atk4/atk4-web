<?php
class page_whatsnew extends Doc_Page {
    function init(){
        parent::init();
        $this->add('View',null,'sidebar',array('page/whatsnew/sidebar'));
    }
}
