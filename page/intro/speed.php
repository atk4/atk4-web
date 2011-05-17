<?php
class page_intro_speed extends page_intro_generic {
	function init(){
		parent::init();
		$p=$this->add('Doc_View');
		$this->api->showExecutionTime();

		$p->add('H1')->set('How fast is Agile Toolkit?');
		$p->add('HtmlElement')->set('
				<h4 style="margin-top: 0px">200 x</h4>
				<ol>
				<li>Frame</li>
				<li>Form</li>
				<li>Field line</li>
				<li>Field Button</li>
				<li>Form jQuery Chain</li>
				<li>URL object</li>
				<li>12 templates</li>
					</ol>
				')->addStyle('float','right')->addStyle('padding-left','2em');

		$p->add('P')->set('
				Agile Toolkit adds minimum overhead to your software. UI layer is highly optimized and shows amazing
				performance. Lets demonstrate by putting 200 forms on a page. Each form is an individual object which also
				consists of sub-elements such as fields, buttons and a template.
				');
		// with smlite 3692
		// without 1243
		// templates = 2449 49 outer, 6 er per form
		$p->add('P')->set('
				This page rendering required 43 objects and 49 templates. Forms in a test required 6 objects per form and 12
				templates per form including the frame. In total it took 3692 objects and on average takes 0.8 seconds to
				execute on Amazon AWS instance, around 0.0002 per object. This benchmark should demonstrate both how
				efficienc PHP is with objects and how efficiently each object is developed. ');


		$p=$this;

		$p->add('P')->set('
				It must be noted that each form is fully functional, includes validation, uses AJAX for submission and
				validation.
				');

        /*
		$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
for($i=0;$i<200;$i++){
	$f=$p->frame('Form '.$i)->add('Form');
	$f->addField('line','name')->validateNotNull();
	$f->addSubmit('Greeting');
	if($f->isSubmitted()){
		$result='Hello, '.$f->get('name');
		$f->js()->univ()->alert($result)->execute();
	}
}
EOD
);

*/



/*

		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../javascript'));
			*/

	}
}
