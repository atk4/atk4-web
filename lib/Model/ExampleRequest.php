<?php
class Model_ExampleRequest extends Model_Table {
	public $entity_code='example_request';
	public $table_alias='exr';
	function defineFields(){

		parent::defineFields();

		$this->addField('suggestion')
			->mandatory(true)
			->datatype('text');

		$this->addField('posted')
			->datatype('date')
			->defaultValue(date('Y-m-d'));

		$this->addField('deleted')
			->system(true)
			->datatype('boolean');

		$this->addCondition('deleted',false);
	}
}
