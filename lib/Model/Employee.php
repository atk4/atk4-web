<?php
class Model_Employee extends Model_Person {
	function defineFields(){
		parent::defineFields();

		$this->addField('name')
			->mandatory(true);

		$this->addField('days_worked')
			->system(true)
			->datatype('int');

		$this->addField('salary')
			->mandatory(true)
			->datatype('money');

		$this->addField('money_owed')
			->calculated(true);
	}
	function gotoWork(){
		$this->set('days_worked',
			$this->get('days_worked')+1);
		return $this;
	}
	function paySalary(){
		$c= $this->add('Model_Salary')
			->set('amount',
				$this->get('money_owed'))
			->set('employee_id',
				$this->get('id'))
			;
		$c->update();
		$this->set('days_worked',0)
			->update();
		return $c;
	}
	function calculate_money_owed(){
		return 'days_worked * salary';
	}
}
