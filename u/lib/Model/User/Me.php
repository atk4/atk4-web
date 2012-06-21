<?php
class Model_User_Me extends Model_User {
	function init(){
		parent::init();

		$this->addCondition('id',$this->api->getUserID());
	}
}