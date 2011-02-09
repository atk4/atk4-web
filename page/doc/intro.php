<?php
class page_doc_intro extends Page {
	function init(){
		parent::init();

		$this->sidebar=$this->add('Menu',null,null,array('view/sidebar','Menu'));
		$this->sidebar->current_menu_class='current blue-i';
		$this->sidebar->inactive_menu_class='';

		$this->subPage('Introduction','../start');

	}
	function subPage($name,$ref=null){
		$hr=$ref?$ref:$str_replace(array('page_','_'),array('','/'),get_class($this)).'/'.$name;
				       //str_replace(array('page_','_'),array('','/'),get_class($this)).'/'.$name);
		$this->sidebar->addMenuItem($name,$hr);
		$this->sidebar->template->set('title','Basics');
		return $this->sidebar->isCurrent($hr);

	}
	function initMainPage(){
		$this->api->redirect('./start');
	}

	function page_start(){
		$p=$this->add('Doc_View');

		$p->add('H1')->set('How does Agile Toolkit Work?');

		$p->add('P')->set('
				If you are coming from a different development platform, you might have been used to dealing with a mixture
				of different libraries and frameworks. As a developer you probably had to decide what to call and when.
				');

		$p->add('P')->set('
				Agile Toolkit works by itself. Similar to those CMS systems. Unlike other CMS systems however, Agile Toolkit
				does nothing by default. That\'s where you come in. Your job as developer is to extend the workings of your
				system by writing a UI and business logic.
				');

		$p=$this;

		$p->add('H2')->set('Agile Toolkit is bulit to be effective!');

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
				You don\'t even need the understanding of objects and classes to know what this code does. That\'s the first
				major principle of Agile Toolkit — all the code is simple and very intuitive.
				');

		$p->add('P')->set('
				Another thing you might have noticed — is the lack of HTML inside or around the code. Truth is — Agile
				Toolkit already comes with a nice and stylish template based on jQuery UI CSS, so unless you want that unique
				and slick look — you might be better off with default skin. You don\'t even have to know how it works.
				');

		$p->add('Quote')->set('
				Simplicity and bundled style, look and elements greatly contribute development\'s efficiency. Practically you
				can put together a working UI in a matter of a single day.
				');


		$p->add('H2')->set('Agile Toolkit controls the universe. You control Agile Toolkit');

		$p->add('P')
			->set('
					Forms, Lists, Menus, Grids and other Views you will encounter while developing already know how to work
					with the database. That is also true for more advanced Views — they would generally work with or without
					database, depending on how you want it.
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
				database. What\'s also very important is that data collected from the database and displayed is properly
				encoded to avoid any HTML or JavaScript injection problems.
				');

		$p->add('Quote')->set('
				Agile Toolkit connects your UI with the database. You specify the details, but all the tough work is done
				in an efficient and secure way without making developer do any extra work.
				');




		$p->add('H2')->set('There are 10 ways to control views in Agile Toolkit. Here are two:');

		$p->add('P')->set('
				Countless products have tried to tie User Interface with the Database at the expense of flexibility. Driven
				by a real Web Projects concepts in Agile Toolkit have been refined since 1999. One of the biggest test
				for the toolkit was the flexibility. How to change from structure? How to rearrange fields? How to put text
				after the field? How to add new field types? Those are the questions which Agile Toolkit deals very well.
				');


		$p->add('P')->set('
				Another set of questions is about the database interraction of Agile Toolkit. Can Grid data come from 2
				tables? How to include calculated field? How to do sub-select or join tables? Grid fetches it\'s data through
				dynamic query which you can affect in a very flexible way.
				');

		$p->add('P')->set('
				All of the above tasks is achieved by two significant features which adds to the overal flexibility:');

		$p->add('Quote')->set('
				When you "add()" view, you can specify where it appears and how. This way we are able to put navigation menu
				in exactly the right spot on the page by using a built-in template system.
				');

		$p->add('Quote')->set('
				Any view comes with default template, but you can change it\'s look completely by specifying your own
				template. Only that specific view is affected giving you many style variation for same controls.
				');

		$p->add('Quote')->set('
				After you create any view, you can still configure it. The view is not rendered until later. By chaining
				function calls on that view you can make it look and work the way you want
				');


		$t=$p->add('Tabs');
		$t1=$t->addTab('Placement');

		$t1->add('Doc_Example')
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

		$t2=$t->addTab('Templates');

		$t2->add('Doc_Example')
			->setCode(<<<'EOD'
$f=$p->add('Grid');
$f->addColumn('text','name');
$f->addColumn('text','surname');
$f->setSource('user');
$f->dq->limit(5);
EOD
);


		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../2'));


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
	function page_5(){
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

