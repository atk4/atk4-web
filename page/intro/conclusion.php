<?php
class page_intro_conclusion extends page_intro_generic {
	function init(){
		parent::init();
		$this->api->dbConnect();

		$p=$this->add('Doc_View');

		$p->add('H1')->set('Worth giving a try!');

		$p->add('P')->set('
				Take a glance at the screencasts next: <a href="/doc/sc">Screencast Section</a>. Go to the <a href="/">main
				page</a> and download.
				');

		$p->add('P')->set('
				We are still adding more documentation and help sections, so please give us feedback. If you consider using
				Agile Toolkit commercially — you are eligible for a 1-year fully supported free license. 
				');

		$p->add('P')->set('
				If you are not a develeoper, but would like to use Agile Toolkit in your project, talk with your team or
				choose the team who already familiar with the toolkit.
				');




	}
}
