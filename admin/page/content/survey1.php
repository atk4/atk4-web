<?php
class page_content_survey1 extends Page {
    function init(){
        parent::init();

        $this->add('CRUD')->setModel('ATK_SurveyResult_FirstProject');
    }
}
