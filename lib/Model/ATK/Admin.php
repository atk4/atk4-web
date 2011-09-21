<?php
class Model_ATK_Admin extends Model_ATK_User {
    function init(){
        parent::init();
        $this->addField('is_admin')->type('boolean');
        $this->setMasterField('is_admin',true);
    }
}
