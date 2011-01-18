<?
class page_index extends Page {
	function init(){
		parent::init();


		//$c=$this->add('Columns',null,'Sample');

		//$c->addColumn()


		if($_GET['example']){
			$this->api->template->set('index_tab_example','current');
			$this->api->template->trySet('index_tab_comparison','');
			$l=$this->add('View',null,'TabContent',array('view/index/tab_example'));
			$this->api->stickyGET('example');


		$l->add('Doc_Example',null,'example')
			->setDescr(<<<'EOT'
$f=$p->add('Form');
$f->addField('line','name')->validateNotNull();
$f->addField('line','surname');
$f->addSubmit();
if($f->isSubmitted()){
  $f->js()->univ()->alert('Thank you, '.$f->get('name').
	  ' '.$f->get('surname'))->execute();
}
EOT
);

$f=$l->add('Form',null,'form');
$f->addField('line','name')->validateNotNull();
$f->addField('line','surname');
$f->addButton('Try me')->js('click',$f->js()->submit());
if($f->isSubmitted()){
  $f->js()->univ()->alert('Thank you, '.$f->get('name').' '.$f->get('surname'))->execute();
}

		}elseif($_GET['compare']=='php'){
		   	$this->add('View',null,'TabContent',array('view/index/tab_compare_php'));
		}elseif($_GET['compare']=='fw'){
		   	$this->add('View',null,'TabContent',array('view/index/tab_compare_fw'));
		}else{

		   	$this->add('View',null,'TabContent',array('view/index/tab_compare_atk4'));
		}



		return ; // for now


		$p=$this;
		$p->add('View',null,null,array('view/download_box'));

		$p->add('View',null,null,array('view/intro_box'));

		$p->add('View',null,null,array('view/explore_difference'));

		$c=$p->add('View',null,null,array('view/comparison'));
		$g=$c->add('Grid',null,'grid');
		$g->addColumn('text','feature');
		$g->addColumn('boolean','agile_toolkit');
		$g->addColumn('boolean','dnet','.NET');
		$g->addColumn('boolean','zend');
		$g->addColumn('boolean','symfony');
		$g->addColumn('boolean','cake','CakePHP');

		$g->setStaticSource(array(
					array('feature'=>'Object-oriented','agile_toolkit'=>'Y','dnet'=>'Y','zend'=>'Y','symfony'=>'N','cake'=>'N'),
					array('feature'=>'Minimalistic','agile_toolkit'=>'Y','dnet'=>'N','zend'=>'N','symfony'=>'Y','cake'=>'Y'),
					array('feature'=>'Web UI','agile_toolkit'=>'Y','dnet'=>'Y','zend'=>'N','symfony'=>'N','cake'=>'N'),
					array('feature'=>'jQuery, jQuery UI','agile_toolkit'=>'Y','dnet'=>'Y','zend'=>'N','symfony'=>'N','cake'=>'N'),
					array('feature'=>'Open-Source','agile_toolkit'=>'Y','dnet'=>'N','zend'=>'Y','symfony'=>'Y','cake'=>'Y'),
					array('feature'=>'Commercial/Enterprise','agile_toolkit'=>'Y','dnet'=>'Y','zend'=>'Y','symfony'=>'N','cake'=>'N'),
					));


		$p->add('View',null,null,array('view/features'));

	}
}
