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

		$menu2=$this->add('Menu','Menu','Menu');
		$menu2->current_menu_class='current';
		$menu2->inactive_menu_class='';

		$section=explode('_',$this->page);
		$this->template->trySet('section',$section[0]);
		switch($section[0]){
			case'doc': case'start': case'sc':
				$this->template->trySet('menu_doc','class="current"');

				$menu2->addMenuItem('Getting Started','doc');
				$menu2->addMenuItem('API Reference','doc/ref');
				$menu2->addMenuItem('Screencasts','sc');
				$menu2->addMenuItem('Examples','example');

				break;
			case'download':
				$this->template->trySet('menu_download','class="current"');
				break;

			case'about':
			default:
				$this->template->trySet('menu_home','class="current"');

				$menu2->addMenuItem('Home','index');
				$menu2->addMenuItem('Extensions','extend');
				$menu2->addMenuItem('License','about/commercial');
				$menu2->addMenuItem('Jobs','about/site');
				$menu2->addMenuItem('About','about/history');
		}

		// If you are using a complex menu, you can re-define
		// it and place in a separate class


		// If you want to use ajax-ify your menu
		// $m->js(true)->_load('ui.atk4_menu')->atk4_menu(array('content'=>'#Content'));
	}
	function defaultTemplate(){
		if($this->page=='' or $this->page=='index')return array('index');
		return parent::defaultTemplate();
	}

	// There are 2 ways to add pages to your project. You can either keep a short
	// functions here or you can create page/projects.php file
	// Pages are used four routing and to add views on your page.

	function page_pref($p){

		// This is example of how you can use form with MVC support
		$p->frame('Preferences')->add('MVCForm')
			->setController('Controller_User');
	}
}
