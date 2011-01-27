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


		$h1=$this->add('H3')->set('How to build <u>Rich</u> <u>Modern</u> and <u>Fast</u> Web Software');
		$h2=$this->add('H3')->set('Which uses <u>JavaScript</u>, <u>MVC</u>, <u>AJAX</u> and other technologies');

		$t1=$this->add('H3')->set('With only basic knowledge of PHP?');
		$t2=$this->add('H3')->set('there  .. is .. a .. way!');

		$h2->js(true)->hide();
		$t1->js(true)->hide();
		$t2->js(true)->hide();

		// text
		$h1->js(true)->hide()->fadeIn(2000)->delay(2000)->fadeOut('fast',
				$h2->js()->_enclose()->fadeIn(2000)->delay(2000)->fadeOut('fast',
					$t1->js()->_enclose()->fadeIn(2000)->delay(2000)->fadeOut('4000',
						$t2->js()->_enclose()->fadeIn(4000,
							$t2->js()->_enclose()->closest('.atk4_loader')->atk4_loader('loadURL',
								$this->api->getDestinationURL(null,array('cut_object'=>$this->name,$this->name=>2))))
						)
					)
				);

		$this->add('Button')->set('skip')->js('click')->closest('.atk4_loader')->atk4_loader('loadURL',
								$this->api->getDestinationURL(null,array('cut_object'=>$this->name,$this->name=>2)));

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
