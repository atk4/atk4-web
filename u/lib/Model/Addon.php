<?php
class Model_Addon extends Model_Table {
	public $table="atk_addon";
	function init(){
		parent::init();
		$this->hasOne('User');
		$this->hasMany('Addon_Version');
		
		$this->addField('name');
		$this->addField('created_dts')->defaultValue(date('Y-m-d H:i:s'))->system(true);
		$this->addField('expires_dts')->defaultValue(date('Y-m-d H:i:s',strtotime('+1 month')))->system(true);

		$this->addField('cost')->caption('Installation Cost');
		$this->addField('paypal')->caption('Payout paypal account');
	}
}