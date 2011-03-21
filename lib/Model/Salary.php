<?php
class Model_Salary extends Model_Table {
	public $entity_code='salary';
	public $table_alias='s';

	function defineFields(){
		parent::defineFields();

		$this->addField('employee_id')
            ->caption('Paid To')
			->refModel('Model_Employee');

		$this->addField('pay_date')
			->datatype('date')
			->defaultValue(date('Y-m-d'));

		$this->addField('amount')
			->datatype('money');
	}
}
