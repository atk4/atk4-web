<?php
class page_purchases extends Page {

    function init(){
        parent::init();
    }

    function page_index(){

        $crud=$this->add('CRUD');
        $crud->setModel('ATK_Purchase');
	}
}
