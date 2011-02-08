<?php
class MagicIntro extends View {
	function init(){
		parent::init();
		$this->owner->js(true)->atk4_loader();
		if($_GET[$this->name]==2)return $this->d2();
		if($_GET[$this->name]==3)return $this->d3();
		if($_GET[$this->name]==4)return $this->d4();
		$this->d1();
	}

	function d1(){

		// First step of the introduction


		$h1=$this->add('H3')->set('Start using Agile Toolkit TODAY!');

		$e=$this->add('HtmlElement')->addStyle('text-align: center');
		$b1=$e->add('Button')->set('Video');
		$b1->js('click')->univ()->lightbox();

		$b2=$e->add('Button')->set('Examples');
		$b2->js('click')->univ()->location('http://demo.atk4.com/');

		$b3=$e->add('Button')->set('Docs');
		$b3->js('click')->univ()->location('/doc');

		$b4=$e->add('Button')->set('Source');
		$b4->js('click')->univ()->location('https://github.com/atk4/atk4');

		$h1->js(true)->hide();
		$b1->js(true)->hide()->removeClass('green')->addClass('orange');
		$b2->js(true)->hide()->removeClass('green')->addClass('blue');
		$b3->js(true)->hide()->removeClass('green')->addClass('green');
		$b4->js(true)->hide()->removeClass('green')->addClass('red');

		$j=$b1->js()->fadeIn(1000);
		$j=$b2->js(null,$j)->fadeIn(2000);
		$j=$b3->js(null,$j)->fadeIn(3000);
		$j=$b4->js(null,$j)->fadeIn(4000);

		// text
		$h1->js(true)->hide()->fadeIn(2000)->delay(2000,$j->_enclose());

		/*
		$this->add('Button')->set('skip')->js('click')->closest('.atk4_loader')->atk4_loader('loadURL',
								$this->api->getDestinationURL(null,array('cut_object'=>$this->name,$this->name=>2)));
								*/

	}
	function d2(){

		$this->add('View_Columns');

		$h1=$this->add('View_HtmlElement','h')->setElement('h1')->set('Agile Technologies presents');
		$h1->js(true)->hide()->fadeIn(2000);

		$p1=$this->add('View_HtmlElement','h1')->setElement('p')->set('Agile Toolkit');
		$p1->js(true)->hide()->css(array('font-size'=>'0%'))->delay(3000)->css(array('opacity'=>0))->show()->animate(array('opacity'=>1,'font-size'=>'500%'),2000);

		$t=$this->add('View_HtmlElement','br','r')->setElement('p')->set(
'In Agile Toolkit, we put simplicity, efficiency and productivity first. We are driven by innovation and results, rather than copying languages like Java.
'
);
		$t->js(true)->hide()->css(array('margin-top'=>0))->delay(6000)->fadeIn(2000);

		$t=$this->add('View_HtmlElement','p2','r')->setElement('p')->set(
'A perfect combination of qualities required for good business application and comfortable development platform is a win-win solution for any Web Developer
'
);
		$t->js(true)->hide()->css(array('margin-top'=>0))->delay(9000)->fadeIn(2000);

		$t=$this->add('Button','b1','r')->setLabel('Continue to "Grid" Demo');
		$t->js('click')->closest('.atk4_loader')->atk4_loader('loadURL',
								$this->api->getDestinationURL('demo/d3'));
		$t->js(true)->hide()->delay(11000)->fadeIn(2000);

		$t=$this->add('Button','b2','r')->setLabel('Technical Info');
		$t->js('click')->univ()->dialogURL('More info about this demo',$this->api->getDestinationURL('demo/d2/info'));
		$t->js(true)->hide()->delay(11000)->fadeIn(2000);

	}
	function defaultTemplate(){
		return array('view/intro/center');
	}

}
