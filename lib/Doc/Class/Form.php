<?php
class Doc_Class_Form extends Doc_Class {
    function defaultTemplate(){
        return array('doc/class/form');
    }
	function init(){
		parent::init();
		$this->set('descr','
				');



		$this->add('Doc_Example')
			->setCode(<<<'EOD'

$p->add('Form');
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
