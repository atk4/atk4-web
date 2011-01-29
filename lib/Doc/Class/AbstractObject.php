<?php
class Doc_Class_AbstractObject extends Doc_Class {
	function init(){
		parent::init();

			$this->set('descr','AbsractObject is anchestor of all classes in Agile Toolkit. Do not inherit from this class
					direcly but use one of it\'s 3 descendants: AbstractView, AbstractModel, AbstractController')
				;

		$mvc=$this->addMoreInfo('Model View Controller')
			->setDescr('MVC in Agile Toolkit is similar to MVC implementation in other frameworks, although there are also
					major differences.');

		$mvc->add('H3')->set('What is classic use of MVC');

		$mvc->add('P')->set('Concept of MVC was first publicized by ObjectiveC based frameworks from NeXT which was later acquired by
				Apple Computer Inc. In Web it was used by WebObjects, also distributed by NeXT. In traditional sense, view is
				a static content prepared by some tool which explains how UI looks on the screen. Model is either a data
				object or XML container also prepared and managed by some tool');

		$mvc->add('P')->set('Nor view nor model in their original imprementation could contain the code. Today many
				developers see that as a inconvenience and therefore the concept is being shifted.');

		$mvc->add('H3')->set('Models in Agile Toolkit');

		$mvc->add('P')
			->set('Models in Agile Toolkit are classes. You can choose your parent from AbstractModel, Model or Model_Table.
					If you are going to use Database, then the most obvious choice for any model would be Model_Table.
					Model_Table offers a wide range of utilities in dynamically building or modifying model structure,
					working with values, operating with database.')
			;

		$mvc->add('H3')->set('Views in Agile Toolkit');
		$mvc->add('P')
			->set('In other frameworks View would be a piece of HTML code. However the code on its own might be insufficient,
					therefore some pseudo-control elements make it into there or even PHP code is allowed ot be executed. In
					Agile Toolkit View is a class. That class can have some dynmaic behaviour and have either standard or
					custom template but certainly any View in Agile Toolkit can just be placed on the page and will be
					displayed properly');
			;




		$this->addExample('Typical use of DBlite')
			->setDescr(<<<'EOD'

// reads DSN from configuration file and establishes connection with database
$this->api->dbConnect();

// executes query instantly
$this->api->db->query('SET sort_buffer_size=10000');
EOD
			);

		$this->addExample('Establishing additional database connection')
			->setDescr(<<<'EOD'

$db2=$this->add('DBlite')
	->connect('mysql://user:secret@1.2.3.4/mydb');

$db2->query('show tables');

while($row=$db2->fetchRow()){
	echo $row[0];
}
EOD
				);

			/*

		$this->addNote('Obsolete')->setDescr('This class is due to reimplementation in 4.1. New implementation will 
				have the same interface, however will use PDO. It will also introduce new 
				dynamic queries [Roadmap]');
				*/;
	}
	function initMethods(){
		parent::initMethods();

		///////////// connect
		$m=$this->addMethod('connect');
		$m->setDescr('Establishes connection with database. Returns database connection');
		$a=$m->addArgument('dsn','DSN (Database Source Name) is a specifically formatted string identifying location and access
				information for the database. Example: mysql://john:secret@127.0.0.1/mydb');

		$a->addNote('Alternative DSN format')
			->setDescr(<<<'EOD'
You can specify DSN as associative array instead of string. Example: 

$dsn=array(
	'type'=>'mysql',
	'user'=>'john',
	'pass'=>'secret',
	'host'=>'127.0.0.1',
	'db'=>'mydb'
);

Different database drivers may have their specific DSN format or additional options in assocative array.
EOD
			);

		$m->addObsoleteArgument('default_assoc','4.1');


		//////// query()
		$m=$this->addMethod('query');
		$m->setDescr('Executes query. If SELECT is executed, it will make data available, which you can fetch by subsequently
				calling getRow(). 
				');

		$m->addNote('Multiple Cursors')->setDescr('
				Execution of a query which returns data is typically implemented through use of cursor handles. Using this
				handle data can be fetched even if additional queries are executed along the way. 

				In reality fetching data from two queries at the same time is a very rare situation and to simplify access,
				toolkit saves most recent cursor handle into $db->cursor.

				However in a perfectly normal scenario it may happend that you need to execute a query while data is still
				being fetched. For that reason, all instant queries such as getOne or getAll as well as those performed
				through DSQL will not override current cursor.
				');


		$a=$m->addArgument('q','Query to execute. Can be either String or Dynamic SQL');
		$a=$m->addArgument('param1','Array with values for parametric queries');
		$a->addLink('class','DBLite_psql');

		//////// fetchRow
		$m=$this->addAliasMethod('fetchRow','fetchArray');
		//////// fetchArray
		$m=$this->addMethod('fetchRow')
			->setDescr('Receive next row of data for previously executed query()');


		$m->addObsoleteArgument('handle','4.1');
		$m->addObsoleteArgument('fetchmode','4.1');
		$a=$m->addArgument('param1','Array with values for parametric queries');
		$a->addLink('class','DBLite_psql');
	}
}
