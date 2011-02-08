<?php
class Doc_Example_Form extends Doc_Example {
	function init(){
		parent::init();

		$this->setCode(<<<'EOD'
$f=$p->add('Form');
$f->addField('line','name')->validateNotNull();
$f->addField('line','surname');
$f->addButton('Try me')->js('click',$f->js()->submit());
if($f->isSubmitted()){
  $f->js()->univ()->alert('Thank you, '.$f->get('name').
	  ' '.$f->get('surname'))->execute();
}
EOD
);
	}
	
}
