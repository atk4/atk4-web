<?php
class page_doc_intro extends Page {
	function init(){
		parent::init();

	}
	function initMainPage(){
		$this->api->redirect('./1');
	}

	function page_1(){
		$this->add('H1')->set('Benefit 1 — An Organised Environment');

		$p=$this->add('P');
		$p->add('Text')->set('There are 5 qualities which define Agile Toolkit. One on each page. Once you finish reading
				them, you should have a good idea about why Agile Toolkit is so beneficial for Web Applications');


		$this->add('H3')->set('Browser, Web Server, Database');

		$this->add('P')
			->set('
					What you see on any web page is a product of a <u>HTML</u> code. Your web brouser receives it from the server
					and shows to you.  In web applications some areas on your web page are dynamic
					and change depending on conditions (also called Business Logic). 
					Web developers have to understand those conditions and write software to modify produced HTML on the fly 
					during the miliseconds, while visitors are waiting for Web 2.0 pages to appear.
					');

		$this->add('P')
			->set('
					Probably over 99% of web applications rely on the Database to store dynamic data. WebServer receives data
					from Database, puts data into HTML and send to your browser. In order to communicate with the database,
					a query-language is used: SQL');

		$this->add('H3')->set('What is the job of Framework?');

		$this->add('P')
			->set('
					Frameworks (also called Libraries and Toolkits) are designed to simplify developer\'s job. From example
					above, you can see that Web Developer needs to know SQL and HTML to communicate with Browser and
					Database. Majority of Web Frameworks simplify developer\'s experience when dealing with SQL, but they do
					little when it comes to HTML interraction
					');

		$this->add('P')
			->set('
					The achievement of Agile Toolkit is that it simplifies developer\'s job when working with both - SQL
					database and HTML browser. As a result, web developer needs to learn less to be able to master art of Web
					Software Development. However that\'s not all
					');

		$this->add('P')
			->set('
					Because Agile Toolkit is responsible for both - the Browser and the Database side - it can do many things
					for developers automatically. For instance, developer places a contact form on the page, and this
					automatically takes care of both the looks and the data connection.
					');

		$this->add('P')
			->set('
					To help me, I would like to invite an example object with name "Alex". Please remember, that in his place
					can be much more complex objects such as Comment-box (where your web app users can leave comments) or Mini-inbox
					(where your web app users can send or receive messages with other users) ');

		$this->add('conq1');

		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../2'));


	}
	function page_2(){
		$this->add('H1')->set('Benefit 2 — True Object-Oriented framework');


		$this->add('P')
			->set('When faced with any software, it will deal with objects. For example, blog software deals with posts and
					comments. Real-life objects are called <u>Models</u>. They can be saved into the database, loaded and
					they can even have some actions associated with them, such as deletion or archiving
					');

		$this->add('P')
			->set('
					It is not requried to use objects in PHP, but best practices always advise to use them to keep software
					well structured. A well structured software can be better modified and will serve longer. It is also much
					easier to understand. An important concept of an object is inheritance. When creating new object, it can
					be inherited from another object thus preserving some of its properties and actions. For example,
					object AdminUser can inherit object User. This way developers don\'t spend time
					and effort duplicating code
					');

		$this->add('H3')->set('Objects byeond Models');

		$this->add('P')
			->set('
					Modern Web Frameworks utilise Object-orineted programming more and more. Your application is an object
					and sometimes even the page will be object.
					');

		$this->add('Alex');
		$this->add('P')
			->set('
					Agile Toolkit moves step ahead and allows developer to define visual objects or in short - Views. By
					definition View is an object which can be rendered and visible in Web Browser. To help you visualise
					objects of Agile Toolkit, let me introduce an exmaple project — <b>Alex</b>. 
					');

		$this->add('P')
			->set('
					Qualities of the objects in Agile Toolkit are much more superior to "helpers" in other framework, and
					some major differences are:
					<ol>
					 <li>Agile Views have same anchestor (AbstractView). That means that a lot of code they have is
					 shared</li>
					 <li>Each View have a HTML template. You can define a different template for any View and make it
					 look unique. For instance you can switch betwene horisontal and vertical forms by using different
					 templates</li>
					 <li><u>Everything</u> on the page is a View. Views may contain other views and can actually form quite
					 complex structures</li>
					 </ol>
					 ');

		$this->add('H3')
			->set('What are those Views anyway?');

		$this->add('P')
			->set('While there are lots of simple views such as buttons or menus or form fields, there are also some
					views, which are quite complex and are very useful in some cases. Let me just give some examples:
					<ul>
					<li><b>CreditCard Payment Form</b> — is a view, which will show credit card form, but when user enters
					information it will automatically input transaction information into the database, will contact merchant,
					update account balance and send email</li>

					<li><b>Comment-Area View</b> — adding it to any page will allow users to post comments, delete their
					previosu comments or edit them</li>

					<li><b>Message Center View</b> — adds a "inbox" to your application, similar to that in LinkedIn or
					Facebook.</li>

					<li><b>Contact Form</b> - will send you email with information which visitor inputs in the form</li>
					</ul>

				');

		$this->add('conq2');

		$this->add('Doc_Code')
			->setDescr("\$this->add('Alex')");

		$this->add('Button')
			->set('Next Page')
			->js('click')
			->univ()->redirect($this->api->getDestinationURL('../3'));
	}
	function page_3(){
		$this->add('H1')->set('Benefit 3 — Unlimited possibilities');

		$this->add('P')
			->set('I think you start to understand the possibilities already. You can grab default contact form and customise
					its look by changing template. Or you can create your own message center by inheriting it from default
					message center. Finally you can change the rules of the Credit Card Payment from. In most cases you will
					have to write only a few lines of code.
					');

		$this->add('P')
			->set('Typically frameworks will force you to write your own Views/Helpers by inheriting abstract ones. In Agile
					Tolokit - most of the views are ready to use. Guideline of the toolkit regulates that each object must be
					usable with minimum configuration. In practice you will need one line to get something added and that\'s
					the $this->add(\'AnyObject\') line');
		
		$this->add('Alex')->setAttr('width',50)->align('left');
		$this->add('P')
			->set('Objects don\'t end their existance after this. They remain so that you can further Configrue them. As
					example, lets configure Alex — our elephant view. We are going to add it into the page first, left from
					this paragraph, then change alignment and size. 
					');

		$this->add('Doc_Code')
			->setDescr("\$this->add('Alex')->setAttr('width',50)->align('left');");


		$this->add('P')
			->set('Configuring is another unique feature of Agile Toolkit. You can change many aspects of the object such as
					link it with the proper data table or add condition to the DB Query. You can also decide where you wish
					to place the object. To illustrate this, let\'s change the logo of this page. You will need to click
					button below to see this in action.
					');

		$this->add('Doc_Code')
			->setDescr("\$this->api->add('Alex',null,'logo')->setAttr('width',50)->align('left');");

		$b=$this->add('Button')->set('Execute the code');
		if($_GET['logo']){
			$this->api->add('Alex',null,'logo')->setAttr('width',50)->align('left');
			$b->set('Put Logo Back')
				->js('click')
				->univ()->redirect();
		}else{
			$b->js('click')
			->univ()->confirm('Are you sure? Spoiling design on this page will make designer feel sad!')
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
			->set('After having experienced power of Object and Views yourelf, you\'ll probably want to start collecting
					them. Agile Toolkit has many Views you can use, but what there isn\'t the one you are looking for? You
					have some options!');

		$this->add('H3')->set('Look into ATK-addons');

		$this->add('P')
			->set('ATK-addons is a collection of common-used Models and Views. Those Views have been contributed by
					developers who use Agile Toolkit and are freely available to anyone.');

		$this->add('H3')->set('Buy from certified vendor');

		$this->add('P')
			->set('Company who made Agile Toolkit — Agile Technologies Limited can develop views and models for you as per
					your order. There is a nice discount if you agree to contribute your view to ATK-addons.
					');
					
		$this->add('P')
			->set('Apart from Agile Technologies, there are other software companies and freelancers who can develop views
					for you. Ask around!');

		$this->add('H3')->set('Develop your own');

		$this->add('P')
			->set('If you are in web software business, it makes a lot of sense to have your own set of views. This could be
					your own contact form with all the fields already configured, or it could be a an banner space or perhaps
					it could be domain quick-check form. Once you develop it as a View, you can use it anywehre universally.
					And remember that you can re-configure view yourself in each individual project, page and so on');

		$this->add('P')
			->set('If you see that you keep using same object configuration over and over, you should convert that into an
					object too. Syntax of Agile Toolkit makes your code moveable betewen different places with almost no
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
				they age and features change.');

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
					If you have created a good extension, share it with others. Best way would be if you push (contribute)
					your changes to ATK-addons, however you may also distribute your work as paid product or as open-source
					extension.
					');

		$this->add('H3')->set('Extensions — packages with goodies');
		$this->add('P')
			->set('
					Extensions is how you add more goodies to your project. Extensions can be distributed as ZIP files
					(or repositories) and can enhance your application with a set of new views, models, templates and so on.
					In order to upgrade extension, you just need to repalce directory with a more up-to-date one.
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
			->set('The reason why many developers love Agile Toolkit is because it makes JavaScript so easy to use.
					Agile Tolokit enhances JavaScript support instead of limiting it. It also ensures that your JavaScript
					code will target proper object on your page, even if you use identical objects
					');


		$this->add('P')
			->set('Alex will demonstrate. I am going to use jQuery animate() function on "click" event. Try clicking on
					Alex now. If you worked with other frameworks, you would probably need to change at least 3 different
					files to achieve simple JavaScript or AJAX functionality. In Agile Toolkit it\'s done with single line of code ');

		$this->add('Doc_Code')
			->setDescr(<<<'EOT'
$this->add('Alex')->setAttr('width',50)->align('left')
	->js('click')->animate(array('width'=>'100'));
EOT
);
		$this->add('H3')->set('Multi-object interraction');

		$left=$this->add('Alex')->align('left'); $right=$this->add('Alex');
		$left->js('click',$right->js()->animate(array('padding-right'=>'+=20px')));
		$right->js('click',$left->js()->animate(array('padding-left'=>'+=20px')));



		$this->add('P')
			->set('Toolkit allows developers to create complex actions and link them with objects in so many ways.
					Additionally you can define your own functions or even include 3rd party jQuery plugin files in a very intuitive way,
					which keeps your main document clean and only loads JS files when required');


		$this->add('P')
			->set('Multiple objects can interact with eachother through jQuery Chains. Here two identical objects of Alex
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
			->set('AJAX is a concept when your browsers requests more informatino from web server without doing page reload.
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
		$this ->set(" <b>Benefit 1:</b><br/> \"Agile Toolkit simplifies data access <u>and</u> user interface building of your web application\" "); } }

class conq2 extends conq { function init(){ parent::init(); 
		$this->set('<b>Benefit 2:</b><br/>Agile Toolkit makes it possible to have a very complex and very interactive
					views. It also makes it very easy to use objects, you just need to put this into your software:
					'); } }
class conq3 extends conq { function init(){ parent::init(); 
		$this->set('<b>Benefit 3:</b><br/>Agile Toolkit provides ready-to-use simple view prototypes.
					You can either use them as they are through configring or inherit and extend them. Also you can place
					object virtually ANYWHERE on the page
					'); } }
class conq4 extends conq { function init(){ parent::init(); 
		$this->set('<b>Benefit 4:</b><br/>Extensions are collections of Views, Templates, JavaScript code and other
					goodies. Some Extensions are available for free, while there may be some commercial ones too. In either
					case, using existing extension will greatly save you development time.
					'); } }
class conq5 extends conq { function init(){ parent::init(); 
		$this->set('<b>Benefit 5:</b><br/>ANY object can have any type of jQuery powered transformations applied.
					They can also interract with other objects. AJAX interactivity is made in a transparent way, which
					prooves to be very durable and stable as your project grows
					'); } }

