<?
/*
   Commonly you would want to re-define ApiFrontend for your own application.
 */
class AgileProject extends ApiFrontend {
	function init(){
		parent::init();

		// Keep this if you are going to use database
		$this->dbConnect();

		// Keep this if you are going to use plug-ins
		$this->addLocation('atk4-addons',array(
					'php'=>array('mvc',
						'billing/lib',
						'misc/lib',
						)
					))
			->setParent($this->pathfinder->base_location);

		// Keep this if you will use jQuery UI in your project
		$this->add('jUI');

		// Initialize any system-wide javascript libraries here
		$this->js()
			->_load('atk4_univ')
			// ->_load('ui.atk4_expander')

			;

		// Alternatively you can use jQuery
		// $this->add('jQuery');


		/*
		// Before going further you will need to verify access
		$this->add('BasicAuth')
			->allow('demo','demo')
			// alternatively:
			// setSource('user')  or
			->check();
			*/

		// Alternatively 
		// $this->add('MVCAuth')->setController('Controller_User')->check();


		$this->initLayout();
	}
	function initLayout(){
		parent::initLayout();

		$section=explode('_',$this->page);
		$this->template->trySet('section',$section[0]);
		switch($section[0]){
			case'doc':
				$this->template->trySet('menu_doc','class="current"');
				break;
			case'download':
				$this->template->trySet('menu_download','class="current"');
				break;
			default:
				$this->template->trySet('menu_home','class="current"');
		}

		// If you are using a complex menu, you can re-define
		// it and place in a separate class
		/*
		$m=$this->add('Menu','Menu','Menu');
		$m->addMenuItem('Home','index');
		$m->addMenuItem('Documentation','doc/DBlite');
		$m->addMenuItem('Blog','blog');
		$m->addMenuItem('Download','doc');

		// If you want to use ajax-ify your menu
		// $m->js(true)->_load('ui.atk4_menu')->atk4_menu(array('content'=>'#Content'));
	}

	// There are 2 ways to add pages to your project. You can either keep a short
	// functions here or you can create page/projects.php file
	// Pages are used four routing and to add views on your page.

	function page_index($p){
		// This is your index page

		$p->add('View',null,null,array('view/download_box'));

		$p->add('View',null,null,array('view/intro_box'));

		$p->add('View',null,null,array('view/explore_difference'));

		$c=$p->add('View',null,null,array('view/comparison'));
		$g=$c->add('Grid',null,'grid');
		$g->addColumn('text','feature');
		$g->addColumn('boolean','agile_toolkit');
		$g->addColumn('boolean','dnet','.NET');
		$g->addColumn('boolean','zend');
		$g->addColumn('boolean','symfony');
		$g->addColumn('boolean','cake','CakePHP');

		$g->setStaticSource(array(
					array('feature'=>'Object-oriented','agile_toolkit'=>'Y','dnet'=>'Y','zend'=>'Y','symfony'=>'N','cake'=>'N'),
					array('feature'=>'Minimalistic','agile_toolkit'=>'Y','dnet'=>'N','zend'=>'N','symfony'=>'Y','cake'=>'Y'),
					array('feature'=>'Web UI','agile_toolkit'=>'Y','dnet'=>'Y','zend'=>'N','symfony'=>'N','cake'=>'N'),
					array('feature'=>'jQuery, jQuery UI','agile_toolkit'=>'Y','dnet'=>'Y','zend'=>'N','symfony'=>'N','cake'=>'N'),
					array('feature'=>'Open-Source','agile_toolkit'=>'Y','dnet'=>'N','zend'=>'Y','symfony'=>'Y','cake'=>'Y'),
					array('feature'=>'Commercial/Enterprise','agile_toolkit'=>'Y','dnet'=>'Y','zend'=>'Y','symfony'=>'N','cake'=>'N'),
					));


		$p->add('View',null,null,array('view/features'));

	}

	function page_pref($p){

		// This is example of how you can use form with MVC support
		$p->frame('Preferences')->add('MVCForm')
			->setController('Controller_User');
	}
}
