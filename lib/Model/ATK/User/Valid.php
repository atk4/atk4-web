<?php
class Model_ATK_User_Valid extends Model_ATK_User {
    function init(){
        parent::init();
        $this->setMasterField('is_email_confirmed',true);
    }
}
