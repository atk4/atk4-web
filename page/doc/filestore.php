<?php
class page_doc_filestore extends Doc_Page {
	function init(){
		parent::init();
		$dbl=$this->add('Doc_Filestore_Intro')
			->setName('Filestore_Intro')
			->set('type','misc')
			->set('descr','DBLite is a lightweight replacement for PEAR::DB. It provides basic functionality 
					for interraction with database.');

		$this->add('Doc_Filestore_File')
			->setName('Model_Filestore_File')
			->set('type','model')
			->set('descr','DSQL is implementation of dynamic queries. Using dynamic queries helps in easier modification of your
					SQL query as well as improved security. DSQL implements different queries such as selects, updates,
					deletes and others');


		//$this->add('Doc_Class') ->setName('DBLite_mysql_cluster') ;

	}
	function initMainPage(){
		$p=$this->add('Doc_View');

		$p->add('H1')->set('Filestore Introduction');
		$p->add('P')->set('
				Filestore is an addon which enables developer to implement file upload, storage and manipulation in the
				unique and consistent way.
				');
		$p=$this;
		$p->add('H2')->set('Installation Instructions');
		$p->add('P')->set('
				If Filestore is already implemented and you only need to install it, you should go through a number of steps.
				');
		$p->add('H3')->set('Directory for file storage');
		$p->add('P')->set('
				Files are being stored in a directory which is associated with the volume. In order to be able to store files
				you need at least one volume and one writable directory. Create directory first, usually creating "upload"
				directory inside your webroot is the most convenient way. Secondly find "Filestore admin" page inside your
				application and add new volume. Make sure you set it as default volume.
				');

		// TODO: show only result here, not code
		$this->api->dbConnect();
		$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
$f=$p->add('MVCForm');
$f->setModel('Filestore_Volume');
$f->set('name','vol1');
$f->set('dirname','upload');
$f->getElement('dirname')->add('Text',null,'after_field')
->set('<ins>You can use absolute path too</ins>');
$f->getElement('enabled')->add('Text',null,'after_field')
->set('<ins>Be sure to check this one!</ins>');
if($f->isSubmitted())$f->js()->univ()
	->alert('This is only an example form')
	->execute();
EOD
);



		$p->add('P')->set('
				Files are being stored in a directory which is associated with the volume. In order to be able to store files
				you need at least one volume and one writable directory. Create directory first, usually creating "upload"
				directory inside your webroot is the most convenient way. Secondly find "Filestore admin" page inside your
				application and add new volume. Make sure you set it as default volume.
				');

		$p->add('H3')->set('Configure file types');
		$p->add('P')->set('

				Depending on the type of your application, it might require to pre-define all types of uploaded files. If it
				is necessary to add support for new filetypes, add them into File Types list. Normally adding jpeg, gif and
				png is most common use.
				');

		// TODO: show only result here, not code
		$this->api->dbConnect();
		$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
$f=$p->add('MVCGrid');
$f->setModel('Filestore_Type');
EOD
);

		$p->add('H3')->set('Test file upload');
		$p->add('P')->set('
				File admin has a test upload control. Once you have set up everything, you can try to upload file. It should
				appear in the list of uploaded files below.
				');


		$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
$f=$p->add('Form');
$c=$p->add('Controller_Filestore_File');
$c->setActualFields(array('id','filestore_type_id','filestore_volume_id','filename','filesize'));
$f->addField('upload','upload')->setController($c);
$p->add('H4')->set('Previously Uploaded Files');
$g=$p->add('MVCGrid')->setController($c);
$g->dq->limit(5)->order('id desc');
EOD
);

	}
}
