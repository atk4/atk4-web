<?php
/*
   Commonly you would want to re-define ApiFrontend for your own application.
 */
class AgileToolkitWeb extends ApiFrontend {
    public $locale=null;
    function __construct($locale=null){
        $this->locale=$locale;
        parent::__construct('AgileWeb','jui');
    }
    function addDefaultLocations($base_directory){
        if($this->locale){
            $this->addLocation('locale/'.$this->locale,array(
                'php'=>'libhuj',
			    'page'=>'page',
			    'template'=>'templates',
			    ))->setBasePath($base_directory.'/locale/'.$this->locale)
			;
        }
    }
	function init(){
		parent::init();

		if(!($this->recall('session_started',null))){
			$this->memorize('session_started',time());
		}


		// Keep this if you are going to use plug-ins
		$this->addLocation('atk4-addons',array(
					'template'=>'misc/templates',
					'php'=>array('mvc',
						'billing/lib',
						'misc/lib',
						'crm/lib',
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
		list($main,$junk)=explode('_',$this->page,2);
		if($main=='blog-article'||$main=='blog')$this->page_class='Page_Blog';

		$this->initLayout();
	}
	function initLayout(){
		if($this->template->is_set('Menu')){
			$this->api->menu=$menu2=$this->add('AtkMenu','Menu','Menu');
			/*
			$this->js(true)->_selector("#sqb")->click(
				$this->js(null, "w=window.open('http://google.com/search?q='+escape(\$('#sq').val())+' site:agiletoolkit.org','_blank');w.focus();")->_enclose()
			);
			*/
			$this->js(true)->_selector("#sqf")->submit(
				$this->js(null, "w=window.open(u='http://google.com/search?q='+escape(\$('#sq').val())+' site:agiletoolkit.org','_blank');if(w)w.focus();else document.location=u")->_enclose()
			);
		}
		parent::initLayout();


		if ( strpos($_SERVER['HTTP_USER_AGENT'],'Windows NT 5')!==false
				|| strpos($_SERVER['HTTP_USER_AGENT'],'Windows NT 4')!==false
				|| $_GET['winxp']
		   )$this->template->trySet('os','winxp');

		if ( strpos($_SERVER['HTTP_USER_AGENT'],'iPhone')!==false
				|| $_GET['iphone']
				)
		   $this->template->trySet('os','iphone');


		$this->template->trySet('_page',preg_replace('/_.*/','',$this->page));

		if($this->page!='newsletter')$this->js('click')->_selector('#newsletter-button')->univ()->frameURL('<i class="icon-newsletter-big"></i>newsletter',
                $this->js()->_selectorThis()->attr('href'),array('customClass'=>'popup-newsletter', 'width' => 500, 'resizable' => false, 'draggable' => false));
		if($this->page!='about_contact')$this->js('click')->_selector('#contact-button')->univ()->frameURL('<i class="icon-note-big"></i>Contact Us',
                $this->js()->_selectorThis()->attr('href'),array('customClass'=>'popup-contactus', 'width' => 700, 'resizable' => false, 'draggable' => false));



		if($this->page_object){
			if($this->page_object->template->is_set('seo_keywords')){
				$this->api->template->trySet('seo_keywords',
						$this->page_object->template->get('seo_keywords'));
				$this->page_object->template->del('seo_keywords');
			}
			if($this->page_object->template->is_set('seo_descr')){
				$this->api->template->trySet('seo_descr',
						$this->page_object->template->get('seo_descr'));
				$this->page_object->template->del('seo_descr');
			}
			if($this->page_object->template->is_set('page_title')){
				$this->api->template->trySet('page_title',
						$this->page_object->template->get('page_title').' | ');
			}
			if($this->page_object->template->is_set('page_title_del')){
				$this->api->template->trySet('page_title',
						$this->page_object->template->get('page_title_del').' | ');
				$this->page_object->template->del('page_title_del');
			}

			if(@$this->page_object->seo_keywords){
				$this->api->template->trySet('seo_keywords',
						$this->page_object->seo_keywords);
			}
			if(@$this->page_object->seo_descr){
				$this->api->template->trySet('seo_descr',
						$this->page_object->seo_descr);
			}
			if(@$this->page_object->page_title){
				$this->api->template->trySet('page_title',
						$this->page_object->page_title.' | ');
			}

            if($this->page_object->template->is_set('db'))$this->dbConnect();
			$this->page_object->template->eachTag('MoreInfo',array($this,'enclose_MoreInfo'));
			$this->page_object->template->eachTag('Code',array($this,'enclose_Code'));
			$this->page_object->template->eachTag('Html',array($this,'enclose_Html'));
			$this->page_object->template->eachTag('Example',array($this,'enclose_Example'));
			$this->page_object->template->eachTag('Execute',array($this,'enclose_Execute'));
			if($this->page_object->template->is_set('ContactForm')){
				$this->page_object->template->tryDel("page_title");
				$this->page_object->add('ContactForm',null,'ContactForm');
			}
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
	function enclose_Code($content,$tag){
		list($header,$content)=preg_split('/\n/',$content,2);
		$this->page_object->add('Doc_Code',null,$tag)
			->setName($header)
			->setDescr($content);
	}
	function enclose_Html($content,$tag){
		list($header,$content)=preg_split('/\n/',$content,2);
		$this->page_object->add('Doc_Html',null,$tag)
			->setName($header)
			->setDescr($content);
	}
	function enclose_Example($content,$tag){
		list($header,$content)=preg_split('/\n/',$content,2);
		$this->page_object->add('Doc_Example',null,$tag)
			->setCode($content);
	}
	function enclose_Execute($content,$tag){
		list($header,$content)=preg_split('/\n/',$content,2);
		$this->page_object->add('Doc_Execute',null,$tag)
			->setCode($content);
	}
	function locateTemplate($path){
		return $this->locateURL('template',$path);
	}
	function defaultTemplate(){
		if($this->page=='' or $this->page=='index')return array('index');
		return parent::defaultTemplate();
	}
	protected function loadStaticPage($page){
        $p=explode('_',$page);
        if($p[0]=='a' && count($p)>1)throw new PathFinder_Exception('no direct loading for a',null,null);
        if($p[0]=='doc' && count($p)>2)throw new PathFinder_Exception('no direct loading for docs',null,null);
        if($p[0]=='intro' && count($p)>1)throw new PathFinder_Exception('no direct loading for intro',null,null);
        if($p[0]=='learn' && count($p)>1)throw new PathFinder_Exception('no direct loading for learn',null,null);
        if($p[0]=='whatsnew' && count($p)>1)throw new PathFinder_Exception('no direct loading for whatsnew',null,null);
        if($p[0]=='in' && count($p)>1)throw new PathFinder_Exception('no direct loading for in',null,null);
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
