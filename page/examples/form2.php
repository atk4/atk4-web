<?php
class page_examples_form2 extends Page {

	// This page demonstrates advanced use of forms

	function init(){
		parent::init();
		$this->add('Doc_Example_Form');

		$this->add('Doc_Example_Upload');

		$this->add('Doc_Example_Image');

	}
}
