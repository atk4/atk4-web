<?php
class Model_Employee extends Model_Person {
	function init(){
		parent::init();

		$this->addField('days_worked')
			->system(true)
			->datatype('int');

		$this->addField('salary')
			->mandatory(true)
			->datatype('money');

		$this->addField('money_owed')
            ->caption('Owed')
			->calculated(true);
	}
    function beforeModify(&$data){
        if($data['salary']+0 == 0){
            throw $this->exception('Specify salary','ValidityCheck')
                ->setField('salary');
        }
        parent::beforeModify($data);
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
