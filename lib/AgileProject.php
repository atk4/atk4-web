<?php
/*
   Commonly you would want to re-define ApiFrontend for your own application.
 */
class AgileProject extends ApiFrontend {
	function init(){
		parent::init();

		// Keep this if you are going to use database

		// Keep this if you are going to use plug-ins
		$this->addLocation('atk4-addons',array(
					'template'=>'misc/templates',
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
			->_load('atk4web')
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


		if ( strpos($_SERVER['HTTP_USER_AGENT'],'Windows NT 5')!==false
				|| strpos($_SERVER['HTTP_USER_AGENT'],'Windows NT 4')!==false
				|| $_GET['winxp']
		   )$this->template->trySet('os','winxp');

		if ( strpos($_SERVER['HTTP_USER_AGENT'],'iPhone')!==false
				|| $_GET['iphone']
				)
		   $this->template->trySet('os','iphone');

		if($this->template->is_set('Menu')){
			$menu2=$this->add('AtkMenu','Menu','Menu');
		}

		if($this->page_object){
			$this->page_object->template->eachTag('MoreInfo',array($this,'enclose_MoreInfo'));
			if($this->page_object->template->is_set('ContactForm'))
				$this->page_object->add('ContactForm',null,'ContactForm');
		}

		// If you are using a complex menu, you can re-define
		// it and place in a separate class


		// If you want to use ajax-ify your menu
		// $m->js(true)->_load('ui.atk4_menu')->atk4_menu(array('content'=>'#Content'));
	}
	function enclose_MoreInfo($content,$tag){
		list($header,$content)=preg_split('/\n/',$content,2);
		$this->page_object->add('Doc_MoreInfo',null,$tag)
			->setName($header)
			->setDescr($content);
	}
	function locateTemplate($path){
		return $this->locateURL('template',$path);
	}
	function defaultTemplate(){
		if($this->page=='' or $this->page=='index')return array('index');
		return parent::defaultTemplate();
	}
	protected function loadStaticPage($page){
		$this->page_object=$this->add($this->page_class,$page,'Content',array('page/'.str_replace('_','/',strtolower($page)),'_top'));
		return $this->page_object;
	}

	// There are 2 ways to add pages to your project. You can either keep a short
	// functions here or you can create page/projects.php file
	// Pages are used four routing and to add views on your page.

	function page_pref($p){

		// This is example of how you can use form with MVC support
		$p->frame('Preferences')->add('MVCForm')
			->setController('Controller_User');
	}
	function page_blog($p){
		header('Location: http://blog.atk4.com/');
		exit;
	}
	/*function page_download($p){
		header('Location: https://github.com/atk4/atk4/zipball/master');
		exit;
	}*/
	function page_examples($p){
		header('Location: http://demo.atk4.com/');
		exit;
	}
	function page_amodules3($p){ $this->api->redirect('/'); }
	function page_contact($p){ $this->api->redirect('about/contact'); }
	function page_contactus($p){ $this->api->redirect('about/contact'); }
	function render(){
		parent::render();
	}
	function pageNotFound($e){
		$this->api->redirect('404',array('p'=>$this->page));
		//return $this->loadStaticPage('p404');
	}
}
