<?php
class page_example_refresh1 extends Page {

	function initMainPage(){

		$p=$this;
		$p->add('H1')->set('Refresh Demo #1');
		$p->add('P')->set('This example demonstrates how you can build a pop-up dialog which will refresh some section of your page
				when the frame form is submitted.');

		$p->add('Doc_Example')
			->setCode(<<<'EOD'

$b=$p->add('Button')->set('Open Dialog');

$b->js('click')->univ()
	->dialogURL('Sample',$this->api
		->getDestinationURL('./subpage'),
		array('width'=>1000)
	);

$l=$p->add('LoremIpsum')->setLength(1,20);

$b->js('my_reload',$l->js()->reload());

EOD
);



		$this->add('SuggestExample');

	}
	function page_subpage(){
		$p=$this;

		$p->add('P')->set('This popup would normally contain some sort of form for editing content on the main page. When the
				form is submitted, then content of the main page must be refreshed.');
		$p->add('Doc_Example')
			->setCode(<<<'EOD'
$f=$p->add('Form');
$f->addField('line','surname');
if($f->isSubmitted()){
	$f->js()->univ()->closeDialog()
		->getjQuery()->trigger('my_reload')
		->execute();
}

EOD
);
	}
}
