<?php
class AtkMenu extends Menu {
	function addMenuItem($a,$b=null){
		if($b){
			list($a,$b)=array($b,$a);
		}
		return parent::addMenuItem($a,$b);
	}
	function init(){
		parent::init();
		$menu=$this;

		$menu->current_menu_class='current';
		$menu->inactive_menu_class='';

		$section=explode('_',$this->api->page);
		$this->template->trySet('section',$section[0]);
		switch($section[0]){
			case'about':
			case'whatsnew': 
			case'newsletter':
				$this->api->template->trySet('menu_about','class="current"');

				$menu->addMenuItem('About','about/about');
				$menu->addMenuItem('What\'s New?','whatsnew');
				$menu->addMenuItem('Features','about/features');
				$menu->addMenuItem('Authors','about/authors');
				$menu->addMenuItem('License','about/license');

				break;


			case'doc': 
			case'example': 
            case'learn':
            case'a':
			case'intro': 
				$this->api->template->trySet('menu_doc','class="current"');

				$menu->addMenuItem('Contents','doc');
				$menu->addMenuItem('Quick Tour','intro');
				$menu->addMenuItem('Screencasts','learn');
				$menu->addMenuItem('Reference','doc/ref');
				//$menu->addMenuItem('Add-ons','a');
				$menu->addMenuItem('Examples','examples');

				break;

			case'account': 
			case'community': 
			case'develop': 
				$this->api->template->trySet('menu_develop','class="current"');

				$menu->addMenuItem('Account','account');
				$menu->addMenuItem('Resources','community/help');
				$menu->addMenuItem('Share Code','community/code');
				$menu->addMenuItem('Share Love','community/love');
				$menu->addMenuItem('Get Involved','develop/getinvolved');
				//$menu->addMenuItem('Addons','develop/addons');

				break;

			case'commercial':
				$this->api->template->trySet('menu_services','class="current"');


				$menu->addMenuItem('Commercial Benefits','commercial/benefits');
				$menu->addMenuItem('License Store','commercial/store');
				$menu->addMenuItem('Use Cases','commercial/users');
				//$menu->addMenuItem('Products','commercial/products');
				//$menu->addMenuItem('Jobs','commercial/jobs');

				break;
			case'download':
				$this->api->template->trySet('menu_download','class="current"');
				break;


			default:
		}
	}
	function isCurrent($href){
		// returns true if item being added is current
		$href=str_replace('/','_',$href);
        $p2=substr($this->api->page,0,strlen($href));
		return $href==$p2;
	}
}
