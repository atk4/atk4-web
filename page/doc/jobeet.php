<?php
class page_doc_jobeet extends Page {
	function init(){
		parent::init();
		$this->api->redirect(
				str_replace('_','/',str_replace('doc_','learn_tutorial_',$this->api->page)));
	}
	function page_day1(){}
	function page_day2(){}
	function page_day3(){}
	function page_day4(){}
	function page_day5(){}
	function page_day6(){}
	function page_day7(){}
	function page_day8(){}
	function page_day9(){}
}
