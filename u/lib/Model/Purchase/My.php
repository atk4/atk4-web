<?php
class Model_Purchase_My extends Model_Purchase {
	function init(){
		parent::init();

		$this->addCondition('atk_user_id',$this->api->getUserID());
		
	}
}