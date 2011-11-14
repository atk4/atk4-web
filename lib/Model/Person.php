<?php
class Model_Person extends Model_Table {
	public $entity_code='person';
	public $table_alias='p';
	function init(){
		parent::init();

		$this->addField('name');
	}
}
