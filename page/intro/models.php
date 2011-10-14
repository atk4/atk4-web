<?php
class page_intro_models extends page_intro_generic {
	function init(){
		parent::init();
		$this->api->dbConnect();

		$p=$this->add('Doc_View');

		$p->add('H1')->set('Business Logic in Agile Toolkit');

		$p->add('P')->set('
				Never worry about Busines Logic Integrity.
				');

		$c=$p->add('View_Columns');
		$col=$c->addColumn(4);

		$col->add('H3')->set('Business Logic');

		$col->add('P')->set('
				When you code Models in Agile Toolkit, you do much more. You define how data is stored in database, how it is accessed or interacted with. The basic functionality like Adding, Updating, Deleting and Listing is there and you can use Object Oriented approach to add more actions.
				');

		$col=$c->addColumn(4);

		$col->add('H3')->set('User Interface Logic');

		$col->add('P')->set('
				By creating Pages you define which generic Views will appear to the user and which Models they will be associated with. Here you can define logic which is only applicable to the Web Interface - place buttons, define templates and interaction rules.
				');


		$p=$this;

		$this->add('H2')->set('Creation of Models in Agile Toolkit');

		$p->add('P')->set('
				Model is a representation of a real-world object. "Employee" would be a good example of a model — it
				represents a person in real-life which have some properties, such as name, annual salary, as well as methods,
				such as
				gotoWork(). To make things more interesting let\'s describe another model — Salary. This model represents an
				event. It would relate to a single Employee, property of salary would be "amount".
				');

		$p->add('P')->set('
				Like anything else, models in Agile Toolkit are defined as class. For that reason, the beauty of
				object-oriented programming grants some nice abilities which can be used inside models. Firstly, models can
				inherit each-other. Employee may inherit Person class. Secondly models can contain model-specific methods.
				');

		$p->add('P')->set('
				For further demonstration consider the following model setup:
				');


		$c=$p->add('View_Columns');
		$col=$c->addColumn(6);

		$col->add('H3')->set('Model/Employee.php');
		$col->add('Doc_Code')
			->setDescr(<<<'EOT'
class Model_Employee extends Model_Person {
	function init(){
		parent::init();

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
EOT
);

		$col=$c->addColumn(6);




		$col->add('H3')->set('Model/Person.php');
		$col->add('Doc_Code')
			->setDescr(<<<'EOT'
class Model_Person extends Model_Table {
	public $entity_code='person';

	function init(){
		parent::init();

		$this->addField('name');
	}
}
EOT
);


		$col->add('H3')->set('Model/Salary.php');
		$col->add('Doc_Code')
			->setDescr(<<<'EOT'
class Model_Salary extends Model_Table {
	public $entity_code='salary';

	function init(){
		parent::init();

		$this->addField('employee_id')
			->refModel('Model_Employee');

		$this->addField('pay_date')
			->datatype('date')
			->defaultValue(date('Y-m-d'));

		$this->addField('amount')
			->datatype('money');
	}
}
EOT
);

		$p->add('P')->set('
				Implementation of SQL-based models is a very practical approach used in Agile Toolkit. Model_Table implements
				functionality to work on per-record basis (active record) but can also be used in multi-record operations
				allowing to combine speed and ease of use.
				');

		$this->add('H2')->set('Interacting with Models Directly');

		$p->add('Doc_Code')
			->setDescr(<<<'EOT'
$emp=$this->add('Model_Employee');
$emp->set('name','John');
$emp->set('salary',500);
$emp->update();

$emp->gotoWork();
$emp->gotoWork();

$emp->update();

echo $emp->paySalary()
	->get('amount');

EOT
)->js(true)->css(array('float'=>'right','width'=>'350px'));


		$p->add('P')->set('
				Similar how fields are added to Form or columns are added to Grid, Model is populated with fields. Each field
				is described by an object capable to store a lot of important information such as caption, type, relation,
				reference, default value, validation rules and much more.');

		$p->add('P')->set('
				Fields can be manipulated with through a number of basic functions present in any model. In this example a
				model is created and new record is saved into database through first update().
				
				');

		$p->add('P')->set('
				Methods of the model can be used to group business logic. Our function gotoWork() contains a logic of what
				happens when a person goes to work. Finally after model is updated it needs to be saved into database by
				calling update() again.
				');

		$p->add('P')->set('
				The last line illustrate the use of calculated fields. Calculated fields are defined as SQL expressions.
				Their value will be calculated every time you load record into model but also after update(). Calculated
				fields are often used to incorporate sub-selects or calculations amongst real columns.
				');

		$p->add('P')->set('
				Finally, by calling paySalary() the function will create a new Salary record, link it with the employee and
				return Salary model. We are using this to display total amount paid for 2 days of work.
				');

		$this->add('H2')->set('Using Models with Views');
		$p->add('P')->set('
				Agile Toolkit is about connectivity, therefore views can interact with models directly. Let\'s create a 
				form which adds new employee into the database
				');

		$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
$form=$page->add('MVCForm');
$form->setModel('Employee',array('name','salary'));
$form->addSubmit();
if($form->isSubmitted()){
	$form->update();
	$form->js()->univ()
		->successMessage('Employee added')
		->execute();
}
EOD
);

		$p->add('P')->set('
				By using setModel() you can specify the model to use as well as which fields you want to appear on the form.
				Actually model will initialize intermediate controller which will populate form with fields of proper type.
				The benefit of having models is that once you define a model, you can use it in all sorts of controls. Below
				is an example of a Grid which is similarly used with the same model
				');

		$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
$grid=$p->add('MVCGrid');

$emp=$grid->setModel('Employee',
	array('name','salary','money_owed'));

$grid->addButton('Refresh')
	->js('click',$grid->js()->reload());
$grid->addColumn('delete','delete');
$grid->addColumn('button','goto_work');
$grid->addPaginator(5);
$grid->dq->order('id desc');

if($_GET['goto_work']){
	$emp->loadData($_GET['goto_work']);
	$emp->gotoWork()->update();
	$grid->js()->reload()->execute();
}

EOD
);

		$p->add('P')->set('
				Models can be used with form columns of type "reference". This would show model names in the drop-down
				allowing user to pick one. This is yet another way to integrate models with the UI.
				');

		$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
$form=$p->add('Form');
$c=$p->add('Model_Employee');

$form->addField('reference','employee')
	->setValueList($c)
	->validateNotNull()

	->add('Icon',null,'after_field')
	->set('arrows-left3')
	->addStyle('cursor','pointer')
	->js('click',$form->js()->reload())
    ;

$form->addSubmit('Pay Salary');

if($form->isSubmitted()){
	$c->loadData($form->get('employee'));
	if($c->get('money_owed')<0.01)
		$form->showAjaxError('employee',
			'Nothing to pay');

	$amount=$c->paySalary()
		->get('amount');

	$form->js()->univ()->successMessage(
		'Paid: '.$amount)->execute();
}
EOD
);

		$p->add('P')->set('
				Finally, lets list all the salaries which have been paid so far.
				');

		$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
$grid=$p->add('MVCGrid');

$emp=$grid->setModel('Salary',
	array('amount','pay_date','employee_id'));

$grid->addButton('Refresh')
	->js('click',$grid->js()->reload());
$grid->addColumn('delete','delete');
$grid->addPaginator(5);
$grid->dq->order('id desc');

EOD
);
		$p->add('Quote')->set('
				Use Models. Separate business logic from the UI logic. It is always worth it. 
				<br/><br/>
				');

		$this->add('H2')->set('Agile Toolkit gets more advanced as you dig in. Too advanced?');

		$this->add('P')->set('
				Certainly, some of us simply wish to get things done in a simple way. And what can be more simple than
				re-using existing solution? Agile Toolkit features a completely new outlook on compatibility between addons.
				Continue reading to find out.
				');


		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../addons'));



	}
}
