<?php
class page_intro extends page_intro_generic {
	function init(){
		parent::init();
		$this->api->redirect('./start');
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

