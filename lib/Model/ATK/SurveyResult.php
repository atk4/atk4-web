<?php
abstract class Model_ATK_SurveyResult extends Model_Table {
    function init(){
        parent::init();

        $this->addField('user_id')->refModel('Model_ATK_User_Valid');   // can be only filled by valid user

        $this->addField('created_dts')->system(true);
    }
}
