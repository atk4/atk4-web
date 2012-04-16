<?php
class page_doc_dblite extends Doc_Page {
	function init(){
		parent::init();
        $this->api->redirect('doc/dsql');
		$dbl=$this->add('Doc_Class_DBlite')
			->setName('DBLite')
			->set('type','controller')
			->set('descr','DBLite is a lightweight replacement for PEAR::DB. It provides basic functionality 
					for interraction with database.');

		$this->add('Doc_Class')
			->setName('DBLite_dsql')
			->set('type','model')
			->set('descr','DSQL is implementation of dynamic queries. Using dynamic queries helps in easier modification of your
					SQL query as well as improved security. DSQL implements different queries such as selects, updates,
					deletes and others');


		$this->add('Doc_Class') ->setName('DBLite_psql') ;
		$this->add('Doc_Class') ->setName('DBLite_mysql') ;
		$this->add('Doc_Class') ->setName('DBLite_mysql_cluster') ;

	}
}
