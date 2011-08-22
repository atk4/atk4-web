<?php
class page_example_autocomplete extends Page {

	function initMainPage(){
        $this->api->dbConnect();

		$p=$this;
		$p->add('H1')->set('Auto-filling from fields on dropdown change');
		$p->add('P')->set('You can include dictionary into your dropdown (or reference) fields. This dictionary can be used
                through javascript such as to fill in other fields on the form with additional information. Function will
                warn user if value if destination field is already present.
                ');

		$p->add('Doc_Example')
			->setCode(<<<'EOD'

$f=$p->add('Form');

$r=$f->addField('autocomplete','name');
$r->setModel('Employee');
$r->includeDictionary(array('salary'));
$s=$f->addField('line','salary');

$r->js(true)->univ()->bindFillInFields(array('salary'=>$s));

EOD
);



		$this->add('SuggestExample');

	}
}
