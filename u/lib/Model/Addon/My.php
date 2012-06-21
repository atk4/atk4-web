<?php
class Model_Addon_My extends Model_Addon {
	function init(){
		parent::init();
		
		$this->addCondition('atk_user_id',$this->api->getUserID());
	}
}