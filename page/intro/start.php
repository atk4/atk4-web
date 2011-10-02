<?php
class page_intro_start extends page_intro_generic {
	function init(){
		parent::init();
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
$f->addButton('Button Does nothing');
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
				3. Configure — After you call
				<span style="color: #0000BB">add</span><span style="color: #007700">(</span><span style="color: #007700">);</span>
				you can still configure your object. There are many things you can change about each copy of the View after
				it was created.
				');

		$t=$p->add('Tabs');
		$tab=$t->addTab('Changing Default Template');

		$tab->add('P')->set('
				In this example, we are still adding the Form, but different form template is used. This can produce a
				significantly different HTML. This method is ideal when CSS change is not sufficient.
			');

		$cols=$tab->add('View_Columns');
		$col=$cols->addColumn();
		$col->add('H3')->set('Result');

$g=$col->add('Grid',null,null,array('grid_striped'));
$g->addColumn('text','gender');
$g->addColumn('text','name');
$g->addColumn('text','surname');
$g->setSource('user');
$g->dq->limit(5);

		$col=$cols->addColumn();
		$col->add('H3')->set('Code');

		$col->add('Doc_Code')
			->setDescr(<<<'EOD'
$g=$p->add('Grid',null,null,array('grid_striped'));
$g->addColumn('text','gender');
$g->addColumn('text','name');
$g->addColumn('text','surname');
$g->setSource('user');
$g->dq->limit(5);
EOD
);


		$tab=$t->addTab('Choosing the Spot');

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
$f->addField('DatePicker','surname')
  ->add('Button',null,'after_field')
  ->set('Try me');
EOD
);


		$tab=$t->addTab('Chaining');

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
}
