<?
class Doc_Class_DBlite extends Doc_Class {
	function init(){
		parent::init();
		$this->set('descr','
				DBlite class will allow your application to interact with SQL database. To define, which database type should
				be used (MySQL, PostrgreSQL, etc) as well as provide database access information, you need to supply DSN
				(Database Source Name).	Typically [DSN is supplied in configuration file].

				In typical applications you do not need to use DBlite class directly. Use [$api->dbConnect()] to establish
				connection automatically. This will ceate DBlite object, which will be accessible through $api->db property.

				It is strongly advised to used [DSQL class] for any database interactions. However, should you require direct
				database access, you may use DBlite directly.

				Finally - you can establish multiple connections to multiple databases by creating additional instances
				of DBlite.
				');

		$this->addMoreInfo('Why executing SQL directly is a bad idea?')
			->setDescr('When developer have to design all SQL queries in the software, there are several disadvantages:

					First - developer must write every single query himself. Toolkit can\'t help you by creating them
					automatically for you. 

					Secondly - once query is written and passed to a function, that function is no longer able to change it
					(for example to introduce additional WHERE clause or to JOIN related table).

					Finally - by asking developer to take care of all the SQL queries, due to human error, they may 
					introduce security risks, such as [SQL injections]. Parametric queries solve security issue, however they
					do nothing about first two issues.

					[Dynamic SQL] is a class instead of the string. After you create DSQL object, you can execute its methods
					to change the query. Similarly other components of the framework can do some adjustments for you.
					Arguments you pass to those methods are automatically validated / quoted as required.

					')
			->addExample('Typical use of Dynamic SQL')
			->setDescr(<<<'EOD'
// Creating new DSQL query
$dynamic_query = $this->api->db->dsql();

// Specifying table, conditions and fields
$dynamic_query
	->table('employee')
	->where('salary>',1000)
	->field('name')
	;

// Changes to query can be performed at any time. In this
// example we use user-supplied parameter "search"
// without additional validation. Method where()
// does those checks for us.
if(isset($_GET['search'])){
	$dynamic_query->where('name',$_GET['search']);
}

// If you try to use query as string, it will generate
// SQL line automatically.
echo $dynamic_query;
// Outputs: SELECT name FROM employee WHERE salary>1000
// and name="Tom"

// You can execute query directly through one of the
// methods starting with "do_"
$data = $dynamic_query->do_getAll();
EOD
					);

		$this->addMoreInfo('When you should use DBlite')
			->setDescr('When Dynamic SQL does not provide required functionality. For example it
					can be used to begin transactions, perform commits or use database-specific queries 
					(such as "set names="UTF8") ');

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


		$this->addNote('Obsolete')->setDescr('This class is due to reimplementation in 4.1. New implementation will 
				have the same interface, however will use PDO. It will also introduce new 
				dynamic queries [Roadmap]');
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
