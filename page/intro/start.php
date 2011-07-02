<?php
class page_intro_start extends page_intro {
	function initMainPage(){
		$this->api->dbConnect();

		$src=
'  ->add(\'Grid\')
  ->setSource(\'team\')
  ->addColumn(\'text\',\'name\')
  ->addColumn(\'text\',\'title\')
  ';


		$f=$this->add('Form',null,'Controls');
		$f->addField('dropdown','order','Order table by')->setValueList(array(''=>'','name'=>'name','title'=>'title'));
		$f->addField('checkbox','draggable','Make Draggable');
		$f->addField('Slider','results','Limit')->set(10)->setLabels(0,'Max');

		$f->addField('checkbox','select','Allow Selection');
		$f->addField('line','select_n','Selection')->js(true)->closest('dl')->hide();

		$f->addField('checkbox','button_t','Add Top Button');
		$f->addField('checkbox','button_r','Add Row Button');

		$f->addField('checkbox','exp','Add Expander');

		$f->addSubmit('Apply');

		$gg=$this->add('View_HtmlElement','gg','WhatYouGet')->setElement('div')->set('');
		$g=$gg->add('Grid')
			->setSource('user')
			->addColumn('text','name')
			->addColumn('text','surname')
			;

		if($_GET['button_r']){
			$g->addColumn('button','Test');
			$src.="->addColumn('button','Test')\n  ";
		}
		if($_GET['exp']){
			$this->js()->_load('ui.atk4_expander');
			$g->addColumn('expander_widget','edit');
			$src.="->addColumn('expander_widget','edit')\n  ";
		}


		if($_GET['order']=='name'){
			$g->dq->order('name');
			$src.="->order('name')\n  ";
		}
		if($_GET['order']=='title'){
			$g->dq->order('title');
			$src.="->order('title')\n  ";
		}
		if($_GET['draggable']){
			$g->js(true)->draggable();
			$src.=";\n\$g->js(true)->dragable()";
		}
		if(isset($_GET['results']) && $_GET['results']<10){
			$g->dq->limit((int)$_GET['results']);
			$src.=";\n\$g->dq->limit(".((int)$_GET['results']).")";
		}
		if($_GET['select']){
			$g->addSelectable($f->getElement('select_n'));
			$src.=";\n\$g->addSelectable(\$f->getElement('select_n'));";
		}

		if($_GET['button_t']){
			$g->addButton('Top Button')->js('click')->univ()->alert('hello world');
			$src.=";\n\$g->addButton('Top Button')\n  ->js('click')->univ()\n  ->alert('hello world')";
		}

		if($_GET['Test']){
			$g->js()->execute();
		}
		$p1=$this->add('Doc_Code',null,'WhatYouWrite');
		$p1->setDescr($src.";");

		if($f->isSubmitted()){
			// refresh grid
			$gg->js(null,$p1->js()->reload($f->getAllData()))->reload($f->getAllData())->execute();
		}
	}
	function defaultIndexPage(){
		return array('page/intro/start');
	}
}
