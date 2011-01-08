<?
class page_doc_intro extends Page {
	function init(){
		parent::init();

	}
	function initMainPage(){
		$this->api->redirect('./1');
	}

	function page_1(){
		$this->add('h1')->set('Meet "Alex" - The Pink Elephant!');

		$this->add('Alex');

		$this->add('p')
			->set('<b>Alex</b> here is a friend of the <a href="http://www.elroubio.net/?p=elephpant" target="_blank">blue
					PHP elephant</a>. Unlike his friend, Alex only appears in Fully
					Object-Oriented environment (All code of ATK4 is object-oriented). Together with Alex I will explain to you about basics of Agile Toolkit. 
					');

		$this->add('h3')
			->set('Lession 1 - Family of Classes');

		$this->add('p')
			->set('Alex feels "at-home" on this page, because he is closely related to other classes.
				All Classes in Agile Toolkit have common anchestor - AbstractObject. All the View classes in Agile
				Toolkit derive from AbstractView class. Because they are related, they can communicate directly and exchange
				important information.');

		$this->add('p')
			->set('AbstractObject defines method add(). This method is available in any object and allows me to add
					and link new objects easily:');

		$this->add('Doc_Example')
			->setDescr("\$this->add('Alex');");

		$this->add('p')
			->set('At this time, the new object is created from class "Alex". It is then inserted into current page.
					Alex\'s init() method is called right after. init() is another method which AbstractObject defines and which exist for any
					other class in the Toolkit.
			After all the objects are being initialized, displaying complete page is really easy. api->render() method
					recursively calls page->render() method. It recursively calls render() of all its objects including Alex.
					');

		$this->add('p')
			->set('During the time between init() and render() many interesting things happen, which can greatly affect the
					appearance of objects and their behaviour. To demonstrate I am going to add another instance of Alex on
					this page, but this time I am going to resize it');


		$this->add('Doc_Example')
			->setDescr("\$this->add('Alex')->setAttr('width',50)->align('left');");

		$this->add('Alex')->setAttr('width',50)->align('left');

		$this->add('p')
			->set('What you see here in code above is called "Chaining". Method add() returns new object and then I am
					calling few other methods of this object to configure it. In this case, I changed the size and alignment.
					It is important to highlight, that many default objects can be used and customized even without inheriting the
					class.
					');

		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../2'));
	}

	function page_2(){
		$this->add('h1')->set('Lession 2 - Simple Templates');

		$this->api->add('Alex',null,'logo')->setAttr('width',50)->align('left');

		$this->add('p')
			->set('Look! Alex went and replaced Logo. How did that happen?');
		
		$this->add('p')
			->set('All the View objects in Agile Toolkit have their own template. Alex have his template,
					pages have template and of course API itself have a global template. Templates in Agile Toolkit are quite
					simple. They have "tags", which look like this:');

		$this->add('Doc_Example')
			->setDescr('\'<a href="/"><?logo?><img src="images/logo.png"/><?/logo?></a>\'');

		$this->add('p')
			->set('This piece of HTML is coming from our shared.html template. This is template of the API - in other words -
					tempate which is used on ALL the pages. To be honest - I don\'t like touching HTML - I
					am not very good at Design, HTML structures and CSS. Our designer prepares templates, then I place tags
					into them.
					Templates are being read and parsed by ATK4 during init() methods, then, through PHP I can manipulate
					template of any object. Finally all templates are assembled during global recursive render() event. 
					');

		$this->add('p')
			->set('There are 2 ways to change contens of the template. First - if I manually change it through code
					such as:');
			
		$this->add('Doc_Example')
			->setDescr("\$this->api->template->set('logo','[no logo]');");

		$this->add('p')
			->set('The other way to change it is by directing output of other View object into that template tag.
					Destination tag can be specified as 3rd argument to add() function. Notice that I am adding Alex to
					the API class instead of $this (which refers to object of current page):');

		$this->add('Doc_Example')
			->setDescr("\$this->api->add('Alex',null,'logo')->setAttr('width',50)->align('left');");

		$this->add('p')
			->set('Similar rules applies to all other objects. Template system in Agile Toolkit allows smooth collaboration between Designer and
					Developer - there are no complex code inside templates and apart from addition of tags nothing needs to
					be changed.');

		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../3'));

	}
	function page_3(){
		$this->add('h1')->set('Lession 3 - Integrated JavaScript and jQuery');

		$alex=$this->add('Alex')->setAttr('width',50)->align('left')
			->js('click')->animate(array('width'=>'100'));

		$this->add('p')
			->set('The reason why many developers love Agile Toolkit is because it keeps JavaScript under control. 
					Agile Tolokit enhances JavaScript support instead of limiting it to finite number
					of functions. As it turns out - PHP5 is a wonderful language to do so - with some magical features such
					as catch-all methods.');


		$this->add('p')
			->set('Let\'s call Alex for help. We are going to use jQuery animate() function on "click" event. Try clicking on
					Alex now. If you worked with other frameworks, you would probably need to change at least 3 different
					files to achieve this functionality. In Agile Toolkit it\'s done with single line of code ');

		$this->add('Doc_Example')
			->setDescr(<<<'EOT'
$this->add('Alex')->setAttr('width',50)->align('left')
	->js('click')->animate(array('width'=>'100'));
EOT
);

		$this->add('p')
			->set('Any View in Agile Toolkit has a js() method. The first argument here is the type of event. In my
					case mouse click will be used as a trigger. js() method returns a object called jQuery Chain. Any calls
					to Chain object are translated into native jQuery / JavaScript
					code. In this example PHP array is also properly converted into JavaScript hash and all values are
					properly escaped preventing any injection risk.');

		$this->add('p')
			->set('We are also using Chaining - each method returns object inself which allows us to perform multiple calls
					on the object without using a variable. Usually I prefer to place one function call per line which makes
					code very easy to read.');


		$left=$this->add('Alex')->align('left'); $right=$this->add('Alex');
		$left->js('click',$right->js()->animate(array('padding-right'=>'+=20px')));
		$right->js('click',$left->js()->animate(array('padding-left'=>'+=20px')));

		$this->add('p')
			->set('Multiple objects can interact with eachother through jQuery Chains. Here I have added 2 more instances of Alex. When you click left one, it triggers
					event, which executes chain on the right elephant tellign him to move towards his twin-brother by 20
					pixels. Likewise clicking on the right elephant moves left one towards the middle');

		$this->add('p')
			->set('This way I can build some complex interractions. But the
					best part is - I didn\'t write a single line of JavaScript code and I didn\'t program any of this stuff
					inside Alex class. I could have used ANY View object of Agile Toolkit.');

		$this->add('Doc_Example')
			->setDescr(<<<'EOT'
$left=$this->add('Alex')->align('left'); $right=$this->add('Alex');
$left->js('click',$right->js()->animate(array('padding-right'=>'+=20px')));
$right->js('click',$left->js()->animate(array('padding-left'=>'+=20px')));
EOT
);

		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../4'));
	}

	function page_4(){
		$this->add('h1')->set('Lession 4 - True Code Portability');

		$this->add('p')
			->set('You have probably noticed by now, but pretty often I have been using a small version of Alex. Another
					area where Agile Toolkit excels is at keeping source code flexible and clean. My next goal is to consolidate 
					my common-used configuration of Alex into a new class - MiniAlex');

		$c=$this->add('View_Columns');

		$l=$c->addColumn('50%');
		$l->add('Doc_Example')
			->setDescr(<<<'EOT'
$l->add('Alex')
	->setAttr('width',50)
	->align('left');
$l->add('MiniAlex');
EOT
);

		$l->add('MiniAlex');
		$l->add('Alex')
			->setAttr('width',50)
			->align('left');

		$l->add('p')->set('On the left here is resulting elephant before and after I consolidated code into the class. Such
				a code transition is farily common in Agile Toolkit projects and it\'s what makes projects highly scalable as
				they age and features change.');

		$m=$c->addColumn();
		$m->add('Icon')->set('arrows-right')->addStyle('margin-top','40px');

		$c->addColumn('50%')
		->add('Doc_Example')
			->setDescr(<<<'EOT'
class MiniAlex extends Alex {
	function init(){
		parent::init();
		$this
			->setAttr('width',50)
			->align('left');
	}
}
EOT
);



		$this->add('p')
			->set('Have you managed to notice that in the left example, I am using variable <b>$l</b> instead of variable
					<b>$this</b>. This
					is because I have added "View_Columns" layout and I was adding our Elephant family into left column and not
					the page as usual. And that lovely icon in the middle column? Icon is also an object and was added fairly simple:');

		$this->add('Doc_Example')
			->setDescr(<<<'EOT'
$m->add('Icon')->set('arrows-right')->addStyle('margin-top','40px');
EOT
);


		$this->add('p')
			->set('Agile Toolkit never over-complicate things. At this point you should have sufficient understanding 
					about the basics and goals of Agile Toolkit. You can now freely browse through our Example section. If
					by a chance a single-letter variables seem "wrong" - look through coding standard section of Agile
					Toolkit, to find out in which cases those variables are suggested.');


		$this->add('Button')
			->set('More Examples')
			->js('click')
			->univ()->location('http://demo.atk4.com/');

		$this->add('Button')
			->set('Blog')
			->js('click')
			->univ()->location('http://blog.atk4.com/');

	}

}

class p extends HtmlElement { function init(){ parent::init(); $this->setElement('p'); } }
class h1 extends HtmlElement { function init(){ parent::init(); $this->setElement('h1'); } }
class h2 extends HtmlElement { function init(){ parent::init(); $this->setElement('h2'); } }
class h3 extends HtmlElement { function init(){ parent::init(); $this->setElement('h3'); } }
