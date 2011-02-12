<?php
class page_doc_intro extends Page {
	function init(){
		parent::init();


		$this->sidebar=$this->add('Menu',null,null,array('view/sidebar','Menu'));
		$this->sidebar->current_menu_class='current blue-i';
		$this->sidebar->inactive_menu_class='';

		$this->subPage('Foundation','../start');
		$this->subPage('JavaScript','../javascript');
		$this->subPage('Models (MVC)','../models');
		$this->subPage('Add-ons','../addons');
		$this->subPage('Conclusion','../conclusion');

	}
	function subPage($name,$ref=null){
		$hr=$ref?$ref:$str_replace(array('page_','_'),array('','/'),get_class($this)).'/'.$name;
				       //str_replace(array('page_','_'),array('','/'),get_class($this)).'/'.$name);
		$this->sidebar->addMenuItem($name,$hr);
		$this->sidebar->template->set('title','Introduction');
		return $this->sidebar->isCurrent($hr);

	}
	function initMainPage(){
		$this->api->redirect('./start');
	}

	function page_start(){
		$this->api->dbConnect();

		$p=$this->add('Doc_View');

		$p->add('H1')->set('How does Agile Toolkit Work?');

		$p->add('P')->set('
				A life of a common web developer requires a deep knowledge of many different libraries, protocols,
				frameworks, concepts and paradigms. But what if development platform would be capable of managing all that.
				Developers then would be able to focus on UI logic and business logic and get things done much quicker.
				');

		$p->add('P')->set('
				Agile Toolkit is in control of things. While it remains flexible, it introduces a structure for both —
				business logic and user interface. Developing with Agile Toolkit is much faster. Are you wondering why?
				');

		$p=$this;

		$p->add('H2')->set('Agile Toolkit is built to be effective!');

		$p->add('P')->set('
				Without further delay, I\'d like to bring in the first example.
				');


		$p->add('Doc_Example')
			->setCode(<<<'EOD'
$f=$p->add('Form');
$f->addField('line','name');
$f->addField('line','surname');
$f->addButton('Try me');
EOD
);


		$p->add('P')->set('
				You don\'t even need the know programming to understand what this code does. That\'s the first
				major principle of Agile Toolkit — all the code is simple and very intuitive, yet it uses native PHP5
				language.
				');

		$p->add('P')->set('
				Did you notice how good form looks? Everything in Agile Toolkit looks great by default. Generic look of all
				elements are described in "design theme" through HTML/CSS. One theme comes bundled with Agile Toolkit. Get
				started with development and change theme anytime later.
				');

		$p->add('Quote')->set('
				Simple and sufficient. Things just work out of the box. This applies to everything in Agile Toolkit: Views,
				Models, Addons. Focus on your goals and Agile Toolkit will take care of the rest.
				');


		$p->add('H2')->set('Agile Toolkit controls the universe. You control Agile Toolkit');

		$p->add('P')
			->set('
					Forms, Lists, Menus, Grids and other Views you will encounter while developing already know how to work
					with the database. That is also true for more advanced Views and Add-ons — they all are capable of
					interacting with the database.
					');

		$p->add('P')
			->set('
					Agile Toolkit connects everything. Instead of keeping things separate, it integrates things. Components
					rely on each-other to work in the most efficient way.
					');

		$p->add('P')
			->set('

					Next is an example of a Grid which reads it\'s row contents from the database:
					');

		$p->add('Doc_Example')
			->setCode(<<<'EOD'
$f=$p->add('Grid');
$f->addColumn('text','name');
$f->addColumn('text','surname');
$f->setSource('user');
$f->dq->limit(5);
EOD
);

		$p->add('P')->set('
				Just this small piece of code was sufficient to produce a nice looking table with the data from your
				database. What\'s also very important is that components have a built-in security. Data is properly encoded
				and validated as it is being exchanged.
				');

		$p->add('Quote')->set('
				Agile Toolkit connects everything. Your UI, database, Models, Cloud services. You tweak the details, but
				all the tough work is done in an efficient and secure way without a chance for developer to do introduce a
				mistake.
				');




		$p->add('H2')->set('There are 10 ways to be flexible with Agile Toolkit. Here are three:');

		$p->add('P')->set('
				Countless products have tried to tie User Interface with the Database at the expense of flexibility. Driven
				by a real Web Projects concepts, Agile Toolkit have been <a href="/about/history">refined since 1999</a>.
				One of the biggest challenges for the toolkit is the flexibility. Form. How to change its look? How to
				rearrange fields? How to put text after the field? How to add new field type? How to add JavaScript or AJAX
				or make form without JavaScript at all? Agile Toolkit holds answer for all those questions. (<a
				href="/doc/form">The Perfect Form</a>)
				');


		$p->add('P')->set('
				By this point you might think — database tie-in is very in-flexible. Not in Agile Toolkit. All the database
				operations are handled through <a href="/doc/dsql">Dynamic Queries</a>. You can change any query in the
				system at any time by adding joins, clauses, limits, additional fields or sub-selects.
				');

		$p->add('P')->set('
				Flexibility (or agility) is extremely important and as you become more familiar you will be able to master
				new ways.
				');

		$p->add('Quote')->set('
				1. Templates — All Views come with default one. However you can specify different template to any View.
				Skin can hold many template variations same view and you can add your own too.
				');

		$p->add('Quote')->set('
				2. Spot — When you use
				<span style="color: #0000BB">$f</span><span style="color: #007700">=</span><span style="color: #0000BB">$p</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">add</span><span style="color: #007700">(</span><span style="color: #DD0000">\'Form\'</span><span style="color: #007700">, </span><span style="color: #0000BB">null</span><span style="color: #007700">, </span><span style="color: #DD0000">\'destination_spot\'</span><span style="color: #007700">);</span>

				the "destination_spot" defines the placement of your new object. This is placement within the template of
				parent View. Typically Views would have many spots to choose.
				');

		$p->add('Quote')->set('
				2. Configure — After you call
				<span style="color: #0000BB">add</span><span style="color: #007700">(</span><span style="color: #007700">);</span>
				you can still configure your object. There are many things you can change about each copy of the View after
				it was created.
				');

		$t=$p->add('Tabs');
		$tab=$t->addTab('templates','Changing Default Template');

		$tab->add('P')->set('
				In this example, we are still adding the Form, but different form template is used. This can produce a
				significantly different HTML. This method is ideal when CSS change is not sufficient.
			');

		$tab->add('Doc_Example')
			->setCode(<<<'EOD'
$f=$p->add('Form',null,null,array('form_empty'));
$f->addField('line','name');
$f->addField('line','surname');
$f->addButton('Try me');
EOD
);


		$tab=$t->addTab('spot','Choosing the Spot');

		$tab->add('P')->set('
				This example demonstrates how developer can decide where things appear. Every View can have many useful spots
				in it\'s template. Field have "before_field" and "after_field" spots. Example below uses them to put Icon and
				Button there.
				');
		$tab->add('P')->set('
				Adding new spots is really easy. Define your own template, and put &lt;?$myspot?&gt; inside. You are done.
			');

		$tab->add('Doc_Example')
			->setCode(<<<'EOD'
$f=$p->add('Form');
$f->addField('line','name')
  ->add('Icon',null,'before_field')
  ->set('basic-check');
$f->addField('line','surname')
  ->add('Button',null,'after_field')
  ->set('Try me');
EOD
);


		$tab=$t->addTab('chain','Chaining');

		$tab->add('P')->set('
				Adding objects is quick and fast. It merely creates a new copy. By interacting with that object further
				you can "configure" it to behave like you want. Like everything else chaining is optional but it allow you to
				affect behaviour, appearance of the individual object.
				');

		$tab->add('Doc_Example')
			->setCode(<<<'EOD'
$g=$p->add('Grid');
$g->addColumn('text','gender');
$g->addColumn('text','name');
$g->addColumn('text','surname');
$g->setSource('user');
$g->dq->field('length(name)*300.20 - 1000 salary');
$g->addColumn('money','salary');
$g->addTotals();
$g->addPaginator(5);

EOD
);

		$this->add('P')->set('
				As a bonus — it really matters WHERE you add your View. You can add them into 
				<span style="color: #0000BB">$api</span>,
				<span style="color: #0000BB">$page</span>
				or ever another View. You never have to worry about conflicts. Each View is designed to be completely
				self-sufficient and work anywhere. Even if you have 2 identical forms on your page, they will know, which one
				was submitted.
				');


		$this->add('H2')->set('AJAX, jQuery w/plugins and a better way to write JavaScript');

		$this->add('P')->set('
				Are you getting excited? The best part is about to begin. Learn how Agile Toolkit finally binds JavaScript
				with your Views
				');


		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../javascript'));


	}
	function page_2(){
		$this->add('H1')->set('Benefit 2 — True Object-Oriented framework');


		$this->add('P')
			->set('
					All software deals with objects. For example, the objects in blog software are posts and
					comments. Real-life objects are called <u>Models</u>. They can be saved into the database, loaded and
					have actions associated with them, such as deletion or archiving
					');

		$this->add('P')
			->set('
					It is not requried to use objects in PHP, but best practices always advise to use them to keep software
					well structured. Well structured software is easier to modify and maintain. This is because it is easier to understand.
					');

		$this->add('P')
			->set('
					An important concept of an object is inheritance. When creating a new object, some of its properties and action can
					be inherited from another object. For example, the object AdminUser can inherit the object User. This way developers don\'t lose time and effort duplicating code
					');

		$this->add('H3')->set('Objects byeond Models');

		$this->add('P')
			->set('
					Modern web frameworks utilise Object-oriented programming more and more. Your application is an object
					and sometimes even the page will be object.
					');

		$this->add('Alex');
		$this->add('P')
			->set('
					<b>A view is an object which can be rendered and visible in a web browser</b>. Agile Toolkit moves step ahead of other web frameworks and allows the developer to define views.  To help you visualise this, let\'s take a look at our example view — <b>Alex the Elephant</b>.
					');

		$this->add('P')
			->set('
					The structure of views in Agile Toolkit are superior to object "helpers" in other framework. Some of the major differences are:
					<ol>
					 <li>Agile views have same anchestor (AbstractView). This allows a lot of the code they have to be shared, meaning much less code is written per view than in other frameworks</li>
					 <li>Each view has a HTML template. You can define a different template for any view and make it
					 look unique. For instance you can switch betwene horisontal and vertical forms by using different
					 templates</li>
					 <li><u>Everything</u> on the page is a view. Views may contain other views and can actually form quite
					 complex structures</li>
					 </ol>
					 ');

		$this->add('H3')
			->set('Can you give me more examples of views?');

		$this->add('P')
			->set('	There are lots of simple views such as buttons, menus or form fields, and there are also more complex
					views, which can be very useful such as:
					<ul>
					<li><b>CreditCard Payment Form</b> — is a view, which will show credit card form, but when user enters
					information it will automatically input transaction information into the database, will contact merchant,
					update account balance and send email</li>

					<li><b>Comment-Area View</b> — adding it to any page will allow users to post comments, delete their
					previosu comments or edit them</li>

					<li><b>Message Center View</b> — adds a "inbox" to your application, similar to that in LinkedIn or
					Facebook.</li>

					<li><b>Contact Form</b> - will send you email with the information a visitor has inputted in the form</li>
					</ul>

				');

		$this->add('P')
			->set('
					Typically frameworks will force you to write your own views by inheriting abstract ones. With the Agile
					Toolkit - most of the views are ready to use. One of the conventions of the toolkit regulates that each object must be usable with minimum configuration. In practice, you will only need one line to get something added and that\'s
					the $this->add(\'AnyObject\') line');

		$this->add('Doc_Code')
			->setDescr("\$this->add('Alex')");

		$this->add('conq2');

		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../3'));
	}
	function page_3(){
		$this->add('H1')->set('Benefit 3 — Unlimited possibilities');

		$this->add('P')
			->set('
					I think you are starting to understand the possibilities... Here\'s some more examples...You can grab an object like a default contact form and customise its look simply by changing template. Or you can create your own message center by inheriting it from the default message center. Or you can change the rules of the Credit Card Payment form. In most cases you will
					have to write only a few lines of code.
					');


		$this->add('Alex')->setAttr('width',50)->align('left');
		$this->add('P')
			->set('
					Objects don\'t end their existance after this. They remain so that you can further configure them. As
					example, lets configure the Alex the Elephant — view. We added it to the page, on the left from
					this paragraph, then changed its alignment and size.
					');

		$this->add('Doc_Code')
			->setDescr("\$this->add('Alex')->setAttr('width',50)->align('left');");


		$this->add('P')
			->set('
					Configuring is another unique feature of Agile Toolkit. You can change many aspects of the object such as
					linking it with a data table or adding a condition to the DB Query. You can also decide where you wish
					to place the object. <b>To illustrate this, let\'s change the logo of this page. You will need to click
					button below to see this in action.</b>
					');

		$this->add('Doc_Code')
			->setDescr("\$this->api->add('Alex',null,'logo')->setAttr('width',50)->align('left');");

		$b=$this->add('Button')->set('Execute the code');
		if($_GET['logo']){
			$this->api->add('Alex', null,'logo')->setAttr('width',50)->align('left');
			$b->set('Put Logo Back')
				->js('click')
				->univ()->redirect();
		}else{
			$b->js('click')
			->univ()->confirm('Are you sure? Changing the design makes our designer upset! :)')
			->redirect(null,array('logo'=>1));
		}

		$this->add('conq3');

		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../4'));
	}

	function page_4(){
		$this->add('H1')->set('Benefit 4 — Getting more objects');

		$this->add('P')
			->set('After having experienced power of objects and views yourelf, you\'ll probably want to start collecting
					them. Agile Toolkit has many views you can use, but what if there isn\'t the one you are looking for? You
					have some options!');

		$this->add('H3')->set('Check in ATK-addons');

		$this->add('P')
			->set('ATK-addons is a collection of common-used Models and Views. These views have been contributed by
					developers who use Agile Toolkit and are freely available to anyone.');

		$this->add('H3')->set('Buy from certified vendor');

		$this->add('P')
			->set(' The company who made the Agile Toolkit — Agile Technologies Limited can develop views and models for you at your request. There is  also a nice discount if you agree to contribute your view to ATK-addons.
					');

		$this->add('P')
			->set('Apart from Agile Technologies, there are other software companies and freelancers who can develop views
					for you. Ask around!');

		$this->add('H3')->set('Develop your own');

		$this->add('P')
			->set('If you are in web software business, it makes a lot of sense to have your own set of views. This could be
					your own contact form with all the fields already configured, or it could be a banner space or perhaps
					it could be domain quick-check form. Once you develop it as a view, you can use it anywhere universally.
					And remember that you can re-configure views yourself in each individual project or page.');

		$this->add('P')
			->set('If you see that you keep using same object configuration over and over, you should convert that into an
					object too.  The syntax of Agile Toolkit makes your code moveable betewen different places with almost no
					modifications
					');

		$c=$this->add('View_Columns');

		$l=$c->addColumn('50%');
		$l->add('Doc_Code')
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

		$l->add('P')->set('On the left here is resulting elephant before and after I consolidated code into the class. Such
				a code transition is farily common in Agile Toolkit projects and it\'s what makes projects highly scalable as
				they mature and features change.');

		$m=$c->addColumn();
		$m->add('Icon')->set('arrows-right')->addStyle('margin-top','40px');

		$c->addColumn('50%')
		->add('Doc_Code')
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
		$this->add('P')
			->set('
					If you have created a good extension, share it with others. The best way would be if you push (contribute)
					your changes to ATK-addons, however you may also distribute your work as a paid product or as open-source
					extension.
					');

		$this->add('H3')->set('Addons— packages with goodies');
		$this->add('P')
			->set('
					Addons is how you add more goodies to your project. Addons can be distributed as ZIP files
					(or repositories) and can enhance your application with a set of new views, models, templates and so on.
					In order to upgrade an addon, you simply need to replace the addon directory with the more up-to-date one.
					');

		$this->add('conq4');

		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../5'));

	}
	function page_greeted(){
		$this->sidebar->destroy();
		$this->add('P')->set(htmlspecialchars($_GET['text']));
		$this->add('HtmlElement')->setElement('a')->setAttr('href',$this->api->getDestinationURL('../javascript'))->set('Back');
	}
	function page_javascript(){

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





		$this->add('H1')->set('Benefit 5 — Integration with jQuery');

		$alex=$this->add('Alex')->setAttr('width',50)->align('left')
			->js('click')->animate(array('width'=>'100'));

		$this->add('P')
			->set('
					One reason developers love the Agile Toolkit is because it makes JavaScript so easy to use.
					The Agile Toolkit enhances JavaScript support instead of limiting it. It also ensures that your JavaScript
					code will target proper object on your page, even if you use identical objects.
					');


		$this->add('P')
			->set('
					Alex will demonstrate. I am going to use the jQuery animate() function on a "click" event. Try clicking on
					Alex now. If you worked with other frameworks, you would probably need to change at least 3 different
					files to achieve simple JavaScript or AJAX functionality. In Agile Toolkit it\'s done with single line of code. 
					');

		$this->add('Doc_Code')
			->setDescr(<<<'EOT'
$this->add('Alex')->setAttr('width',50)->align('left')
	->js('click')->animate(array('width'=>'100'));
EOT
);
		$this->add('H3')->set('Multi-object interaction');

		$left=$this->add('Alex')->align('left'); $right=$this->add('Alex');
		$left->js('click',$right->js()->animate(array('padding-right'=>'+=20px')));
		$right->js('click',$left->js()->animate(array('padding-left'=>'+=20px')));



		$this->add('P')
			->set('
					Agile Toolkit allows developers to create complex actions and link them with objects in so many ways.
					Additionally you can define your own functions or even include 3rd party jQuery plugin files in a very intuitive way,
					which keeps your main document clean and only loads JS files when required');


		$this->add('P')
			->set('
					Multiple objects can interact with each other through jQuery Chains. Here two identical objects of Alex
					interract. Click one of them and see what happens.
					');


		$this->add('Doc_Code')
			->setDescr(<<<'EOT'
$left=$this->add('Alex')->align('left'); $right=$this->add('Alex');
$left->js('click',$right->js()->animate(array('padding-right'=>'+=20px')));
$right->js('click',$left->js()->animate(array('padding-left'=>'+=20px')));
EOT
);

		$this->add('H3')->set('Seamless AJAX');

		$this->add('P')
			->set('
					AJAX is a concept when your browsers requests more information from web server without doing page reload.
					Aglie Toolkit not only makes it possible, but it makes it super-easy. The reason is because developers
					add all the objects and framework can decide which part of the page was requested and only refresh that
					part of the page.
					');

		$c=$this->add('View_Columns');

		$l=$c->addColumn('50%');
		$l->add('Doc_Code')
			->setDescr(<<<'EOT'
$f=$p->add('Form');
$f->addField('line','name');
$f->addField('line','surname');
$f->addSubmit();
if($f->isSubmitted()){
  $f->js()->univ()->alert('Thank you, '.$f->get('name').' '.$f->get('surname'))->execute();
}
EOT
);

		$p=$c->addColumn('50%');
		$p=$p->add('HtmlElement')->addClass('box');
$f=$p->add('Form');
$f->addField('line','name');
$f->addField('line','surname');
$f->addButton('Try me')->js('click',$f->js()->submit());
if($f->isSubmitted()){
  $f->js()->univ()->alert('Thank you, '.$f->get('name').' '.$f->get('surname'))->execute();
}




		$fade_out=array();
		$delay=0;
		foreach($this->elements as $e){
			if(!($e instanceof AbstractView))continue;
			$fade_out[]=$e->js()->delay($delay+=25)->animate(array('opacity'=>'0.01'));
		}


		$c=array();
		$c[]=$c1=$this->add('conq1')->hide();
		$c[]=$this->add('conq2')->hide();
		$c[]=$this->add('conq3')->hide();
		$c[]=$c4=$this->add('conq4')->hide();
		$this->add('conq5');

		$button_bar=$this->add('HtmlElement');
		$j=$button_bar->add('Button');

		foreach($c as $e){
			if($e==$c4){
				$fade_out[]=$e->js()->delay($delay+=25)->slideDown('slow',
						$c1->js(null,$button_bar->js()->atk4_load($this->api->getDestinationURL('../buttons')))->_enclose()->prevAll()->remove()
						);
			}else $fade_out[]=$e->js()->delay($delay+=25)->slideDown('slow');
		}



		$j
			->set('Conclusions')
			->js('click',$fade_out);



		// $j - chain executed on button click
	}
	function page_buttons(){

        $this->add('Button')
            ->set('Start Over')
            ->js('click')
            ->univ()->redirect('../1');

        $this->add('Button')
            ->set('More Examples')
            ->js('click')
            ->univ()->location('http://demo.atk4.com/');

        $this->add('Button')
            ->set('Sample Project "Colubris"')
            ->js('click')
            ->univ()->location('https://github.com/agiletech/colubris/');

        $this->add('Button')
            ->set('Blog')
            ->js('click')
            ->univ()->location('http://blog.atk4.com/');

	}
}
class Quote extends HtmlElement { function init(){ parent::init(); $this->setElement('Quote'); } }

class conq extends quote { function hide() { $this->addStyle('display','none'); return $this; } }
class conq1 extends conq { function init(){ parent::init();
		$this ->set(" <b>Benefit 1:</b><br/> \"Agile Toolkit simplifies development of data access <u>and</u> building the user interface of your web application\" "); } }

class conq2 extends conq { function init(){ parent::init();
		$this->set('<b>Benefit 2:</b><br/>Agile Toolkit makes it possible to have a complex and interactive
					views. It also makes it very easy to use objects.
					'); } }
class conq3 extends conq { function init(){ parent::init();
		$this->set('<b>Benefit 3:</b><br/>Agile Toolkit provides ready-to-use simple view prototypes.
					You can either use them as they are or inherit and extend them. Also you can place
					object virtually anywhere on the page.
					'); } }
class conq4 extends conq { function init(){ parent::init();
		$this->set('<b>Benefit 4:</b><br/>Addons are collections of Views, Templates, JavaScript code and other
					goodies. Some Addons are available for free, while there may be some commercial ones too. In either
					case, using addons will save you a lot of development time.
					'); } }
class conq5 extends conq { function init(){ parent::init();
		$this->set('<b>Benefit 5:</b><br/>Any object can have jQuery powered transformations applied.
					They can also interract with other objects. AJAX interactivity is made in a transparent way, which
					proves to be very durable and stable as your project grows.
					'); } }

