<?
class page_doc_abstract extends Doc_Page {
	function init(){
		parent::init();
		$dbl=$this->add('Doc_Class_AbstractObject')
			->setName('AbstractObject')
			->set('type','abstract')
			;

		$this->add('Doc_Class')
			->setName('AbstractView')
			->set('type','view')
			->set('descr','DSQL is implementation of dynamic queries. Using dynamic queries helps in easier modification of your
					SQL query as well as improved security. DSQL implements different queries such as selects, updates,
					deletes and others');


		$this->add('Doc_Class') ->setName('DBLite_psql') ;
		$this->add('Doc_Class') ->setName('DBLite_mysql') ;
		$this->add('Doc_Class') ->setName('DBLite_mysql_cluster') ;


	}
	function initMainPage(){
		//parent::initMainPage();

		$p=$this->add('Doc_View');

		$p->add('H1')->set('Abstract Classes');

		$p->add('P')->set('All classes in Agile Toolkit have a common parent. The top-most class is called AbstractObject.
				The purpose of this class is to make all the classes in Agile Toolkit work similarly. Here are the properties
				which are common to any class in the system:
				<ul>
				<li>property $this->parent</li>
				<li>property $this->api</li>
				<li>property array $this->elements[] containig references to objects being added into this object</li>
				<li>property $this->name - a unique identifier in the system</li>
				<li>property $this->short_name - a name of this object within its parent</li>
				<li>add() and init() methods</li>
				<li>object-level session management - memorize(), learn(), recall(), forget()</li>
				<li>object-level hooks addHook() and hook()</li>
				</ul>
				');

		$p->add('P')
			->set('It is most importantly that all the native objects in Agile Toolkit are to be created add() method.');
		$p->addExample('Any class can be added inside any object')->setDescr('$this->add(\'AnyClass\');');

		$p->add('H2')->set('Abstract Visual Classes');
				
		$p->add('P')->set('In Agile Toolkit pages consist from blocks which we refer to as Views. View does also refer to
				complete page, but it also refers to classes inside that page. API also descends from View. By defenition,
				any class which can carry a template and visually show itself on the page is a View.');

		$p->add('P')->set('All the View classes have common parent AbstractView. (which are in fact inherited from
					AbstractObject). All the view classes have certain things in common such as:
				<ul>
				<li>Views are capable of having templates (although it\'s not mandatory to use it)</li>
				<li>Views have a $this->spot property. When view is rendered, it is placed in parent\'s template, inside
				$spot tag</li>
				<li>Views have methods render() and output()</li>
				<li>object-level js() function for binding JavaScript chain code</li>
				</ul>
			');

		$p->add('H2')->set('AbstractController');

		$p->add('P')->set('The defenition of Controllers in Agile Toolkit is that they enhance the functionality of the
				object thei have been added to.');

		$p->addExample('Adding logger to $api class will enhance error reporting.')->setDescr('$api->add(\'Logger\');');

		$p->add('P')->set('AbstractController is not special in any way, however if you add multiple controllers with the
				same class into the parent, only one is added and subsequental attempts to add more will return same
				object. If think than you need multiple controllers (with the same class) on an object, you are probably
				better off with AbstractModel');

		$p->addMoreInfo('Adding multiple instances of same controller to an obect')
			->setDescr('If for some reason you are willing to add multiple controllers, then you can resolve name collision
					conflict by specifying name directly.')
			->addExample()->setDescr(<<<'EOD'
$api->add('MyCtl','c1');
$api->add('MyCtl','c2');
EOD
					);

				
		$p->add('H2')->set('AbstractController');

		$p->add('P')->set('The defenition of Controllers in Agile Toolkit is that they enhance the functionality of the
				object thei have been added to. For instance the following code enhances erorr reporting of API class:');

		$p->add('Doc_Example')->setDescr('$api->add(\'Logger\');');
				


	}
}
