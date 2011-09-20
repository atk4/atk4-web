<?php
class Model_ATK_User_Me extends Model_ATK_User_Valid {
    function init(){
        parent::init();
        $this->loadData($this->api->auth->get('id'));
    }
}
