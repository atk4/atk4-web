<?php
class page_intro_javascript extends page_intro_generic {
	function init(){
		parent::init();
		$p=$this->add('Doc_View');

		$p->add('H1')->set('Agile Toolkit and JavaScript');

		$p->add('P')->set('
				The definition of Web 2.0 requires a site to be interactive and dynamic. jQuery, MooTools and some other
				JavaScript libraries transformed the internet and is now a standard. Unfortunately Frameworks and Toolkits
				either decide to ignore JavaScript and leave it to advanced developers or bundle their own proprietary JavaScript
				libraries.
				');

		$p->add('P')->set('
				Agile Toolkit contains a powerful integration with jQuery — library both popular and pursuing same ideals.
				However even through jQuery is controlled by Agile Toolkit — you guessed it! — it is insanely flexible and
				simple to use it and extend it.
				');


		$p=$this;

		$this->add('H2')->set('Progressive Enhancement with JavaScript');

		$p->add('P')->set('
				True to ideals of "Progressive Enhancement" paradygm, all Views in Agile Toolkit will produce
				JavaScript-agnostic code. Through the power of jQuery UI and widget factory, default views are enhanced to do
				things more dynamically.
				');

		$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
$f=$p->add('Form');
$f->addField('line','name')->validateNotNull();
$f->addSubmit('Greeting');
if($f->isSubmitted()){
	$result='Hello, '.$f->get('name');
	$f->js()->univ()->alert($result)->execute();
	$this->api
	    ->redirect('../greeted',
			array('text'=>$result));
}
EOD
)->template->trySet('title1','Example with JavaScript');

		$p->add('Doc_Example')
			->setCode($code.<<<'EOD'

$f->js_widget=false; // turn JS off

EOD
)->template->trySet('title1','Example WITHOUT JavaScript');





		$this->add('H2')->set('Transparent jQuery Chains');

		$alex=$this->add('Alex')->setAttr('width',50)->align('left')
			->js('click')->animate(array('width'=>'100'));

		$this->add('P')
			->set('
					To breach the gap between Server-side language and Browser-side language Agile Toolkit is using dynamic
					catch-all class methods. Calling js() method on any view will return an initialized jQuery_Chain class.
					Any subsequent calls to that class are converted into jQuery calls and is included with the page.
					');

		$this->add('P')
			->set('
					To demonstrate use of this technique, we will need a simple View object. Alex is a View which is
					displayed as an image of a pink elephant. Alex has no specific code to support JavaScript or jQuery. Code
					below could be used on any View. To see this code in action, click on the elephant located at the start
					of this section.
					');

		$this->add('Doc_Code')
			->setDescr(<<<'EOT'
$this->add('Alex')->setAttr('width',50)->align('left')
	->js('click')->animate(array('width'=>'100'));
EOT
);
		$this->add('H2')->set('Multi-object interaction');

		$left=$this->add('Alex')->align('left'); $right=$this->add('Alex');
		$left->js('click',$right->js()->animate(array('padding-right'=>'+=20px')));
		$right->js('click',$left->js()->animate(array('padding-left'=>'+=20px')));



		$this->add('P')
			->set('
					jQuery_Chain looks carefully at arguments which are passed to it. While strings are properly escaped and
					boolean and arrays are properly converted into JavaScript datatypes, Objects receive a special treatment.
					Including any other jQuery_Chain will also be reflected as a JavaScript chain. (This principle can be
						used to copy value from one field to another).
					');
		$this->add('P')
			->set('
					If you pass any other view into jQuery Chain it will be transformed into appropriate jQuery selector. 
					<a href="/doc/jquery">More about jQuery Chains</a>.
					');

		$this->add('Doc_Code')
			->setDescr(<<<'EOT'
$left=$this->add('Alex')->align('left'); $right=$this->add('Alex');
$left->js('click',$right->js()->animate(array('padding-right'=>'+=20px')));
$right->js('click',$left->js()->animate(array('padding-left'=>'+=20px')));
EOT
);

		$this->add('H2')->set('Avoiding page reloads');

		$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
$b=$p->add('Button')->set('Re-Generate');
$l=$p->add('LoremIpsum')->setLength(1,20);
$b->js('click',$l->js()->reload());
EOD
);

		$this->add('P')
			->set('
					Code above couldn\'t be simpler. It\'s beautiful. In case you are wondering, here is how the same effect
					is done without Agile Toolkit
					<ul>
					<li>Regular page is created calling a back-end function for LoremIpsum generation on load</li>
					<li>A custom JS code is written and placed into page\'s template.</li>
					<li>This custom JS will execute AJAX request to the backend page</li>
					<li>Additional backend page is needed to return dynamic requests for more of LoremIpsum</li>
					<li>New text for LoremIpsum is encoded with JSON, frontend function handles the decoding</li>
					</ul>
					General approach is much more complex on many levels, can introduce errors easily, very difficult to
					extend and will not work with more complex objects. Seeing how the same is done in Agile Toolkit within 3
					lines of code is life-changing
					');

		$this->add('P')
			->set('
					Reloading in Agile Toolkit is also very extensible and universal. Next example will perform loading of
					dynamic elements containing some JS stuff on their own. Open FireBug or Inspector, look under
					Net/Resources tab on what kind of data is being sent by server every time you click a button.
					');

			if($_GET['t'])$this->api->dbConnect();

		$ex=$p->add('Doc_Example')
			->setCode($code=<<<'EOD'

$bf=$p->add('Button')->set('Show AJAX Form');
$bg=$p->add('Button')->set('Show AJAX Grid');

$p->add('HR');

$v=$p->add('View');

$bf->js('click',$v->js()
	->reload(array('t'=>'form')));
$bg->js('click',$v->js()
	->reload(array('t'=>'grid')));
					
$this->api->stickyGET('t');
switch($_GET['t']){

  case 'form':
	$f=$v->add('Form');
	$f->addField('line','name');
	$f->addField('line','surname');
	$f->addSubmit();
	if($f->isSubmitted()){
		$f->js()->univ()
			->alert('Thank you, '.$f->get('name').
				' '.$f->get('surname'))->execute();
	}
	break;

  case 'grid':
	$g=$v->add('Grid');
	$g->addColumn('text','name');
	$g->addColumn('text','surname');
	$g->setSource('user');
	$g->addPaginator(5);
	break;

  default:
	$v->add('P')->set('Click the button..');
}
EOD
);

	$ex->add('P',null,'after_example')->set('
			<b>Note:</b> This is example with longest code so far. Someone might have told you that using short variable
			names is bad. In some cases it is. However the UI logic is exception. Here is why.
			');

	$ex->add('P',null,'after_example')->set('
			Those short variables are called short-lived variables. Their purpose is to exist for 3-5 lines. General rule is
			not to keep definition and use of those variables too spread apart. In this example variable <span style="color:
#0000BB">$f</span> is used for a short period of time. If there is another form being generated after, <span style="color: 
#0000BB">$f</span> variable can be re-used again. If you intend to keep variables alive for a longer, then use object properties
			instead such as <span style="color: #0000BB">$this->greeting_form</span>.
			');

	$ex->add('P',null,'after_example')->set('
			Additionally short variables have their own meaning:
		   <span style="color: #0000BB">$f</span> is for form. 
		   <span style="color: #0000BB">$g</span> is for grid. 
		   <span style="color: #0000BB">$p</span> is for page. 
		   <span style="color: #0000BB">$c</span> is for controller. 
		   You can introduce additional ones as long as they make sense and are very short-lived.
			');

	$this->add('P')->set('
			If you have been following this introduction carefully, then you would understand all of the code in the last
			example. Possibly with the exception of <span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color:
#0000BB">api</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">stickyGET</span><span style="color: #007700">(</span><span style="color: #DD0000">\'t\'</span><span style="color: #007700">);</span>. This function affects URL generation by automatically including current value of a GET argument. This way Form and Grid will include value of t= when they communicate over AJAX.
			');

	$this->add('H2')->set('Consistent Validation for AJAX data');

	$this->add('P')->set('
			By using generic JSON approach (as described in previous paragraph) you have 2 pages generating the content.
			Should you need to perform security checks, you have to add them to both locations. If developer forgets to have
			same check in JSON page, it create potential security problem. Agile Toolkit direct AJAX requests to same code,
			therefore checks cannot be avoided.
			');

		$ex=$p->add('Doc_Example')
			->setCode($code=<<<'EOD'

// Perform security check here, such as
// whecher user have access to this form

$f=$p->add('Form',null,null,array('form_empty'));
$f->addField('line','a','')
  ->set(2)->setProperty('size',4)
  ->template->trySet('after_field','+');
$f->addField('line','b','')
  ->set(3)->setProperty('size',4)
  ->add('Button',null,'after_field')
    ->setLabel('=')
	  ->js('click',$f->js()->submit());
$sum=$f->addField('line','sum','')
  ->setProperty('size',6);
if($f->isSubmitted()){

  // If security check above fails, this
  // code can't be reached no matter what

  $sum->js()
	  ->val($f->get('a')+$f->get('b'))
	  ->execute();
}


EOD
);

	$ex->add('P',null,'after_example')->set('
			In Agile Toolkit there are 2 types of AJAX requests. First request returns a chunk of HTML. For simplicity Agile
			Toolkit does not bother with XML, JSON or any other formats, a fragment of HTML properly rendered to be placed on
			the page is powerful enough.
			');
	$ex->add('P',null,'after_example')->set('
			Other type of request sends JavaScript instructions which are evaluated by the browser. This is handy when you
			don\'t need to reload any part of the page but would rather perform an action of some sort. Forms are using this
			approach. This approach is also used by Grid buttons through function univ().ajaxec()
			');
	$ex->add('P',null,'after_example')->set('
			In this example, when form is submitted, the instructions are being sent back which instruct browser to put a
			value inside a field. 
			');

	$this->add('H2')->set('Use of Native JavaScript Functions');

	$this->add('P')->set('
			No matter how powerful jQuery Chairs are in Agile Toolkit, many things can\'t be done efficiently. Eventually you
			will have a need to add jQuery plugins or write your own functions. Agile Toolkit comes with many useful
			functions which are all stored in JavaScript library called "univ". This library can be extended with your own
			functions or you can create your own library in a similar way. Here is an example which implements simple field
			value validation for numeric fields.
			 
			');

		$ex=$p->add('Doc_Example')
			->setCode($code=<<<'EOD'
$f=$p->add('Form');
$f->addField('line','numeric')
  ->js(true)->univ()
  ->numericField()->disableEnter();
EOD
);

		// $j - chain executed on button click
	}
}
