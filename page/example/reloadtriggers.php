<?php
class page_example_reloadtriggers extends Page {

	function initMainPage(){

		$p=$this;
		$p->add('H1')->set('Reloading Triggers of Elements');
		$p->add('P')->set('
				When you are reloading element, it also reinitializes its triggers. This test is built to ensure it.
				');

		$p->add('Doc_Example')
			->setCode(<<<'EOD'

$b=$p->add('Button')->set('Check Trigger '.rand(10,99));
$b->js('click')->univ()->alert('this aleart must appear only once');

$b2=$p->add('Button')->set('Reload first button');
$b2->js('click',$b->js()->reload());

EOD
);



		$this->add('SuggestExample');

	}
}
