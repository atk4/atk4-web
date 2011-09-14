<?php
class AtkMenu extends Menu {
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

				$menu->addMenuItem('Introduction','intro');
				$menu->addMenuItem('Learning','learn');
				$menu->addMenuItem('API Reference','doc/ref');
				$menu->addMenuItem('Add-ons','a');

				break;

			case'community': 
			case'develop': 
				$this->api->template->trySet('menu_develop','class="current"');

				$menu->addMenuItem('Share Help','community/help');
				$menu->addMenuItem('Share Code','community/code');
				$menu->addMenuItem('Share Love','community/love');
				$menu->addMenuItem('Addons','develop/addons');

				break;

			case'commercial':
				$this->api->template->trySet('menu_services','class="current"');


				$menu->addMenuItem('Account','commercial/account');
				$menu->addMenuItem('Prices','commercial/store');
				$menu->addMenuItem('Services','commercial/services');
				$menu->addMenuItem('Products','commercial/products');
				$menu->addMenuItem('Jobs','commercial/jobs');

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
