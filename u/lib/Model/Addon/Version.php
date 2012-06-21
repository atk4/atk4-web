<?php
class Model_Addon_Version extends Model_Table {
	public $table="atk_addon_version";
	function init(){
		parent::init();

		$this->hasOne('Addon');
		
		$this->addField('version')->caption('Version');
		$this->addField('url')->caption('Download URL');
		$this->addField('checksum')->caption('MD5 checksum');
		$this->addField('is_public')->type('boolean')->caption('Available for Install');
	}
}