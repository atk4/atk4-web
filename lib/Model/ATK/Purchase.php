<?php
class Model_ATK_Purchase extends Model_Table {
	public $entity_code='atk_purchase';
    function init(){
        parent::init();
        //$this->addField('file');
        $this->addField('atk_user_id')->refModel('Model_ATK_User');
        $this->addField('datetime')->defaultValue(date('Y-m-d H-i-s'))->system(true);
    }
}
