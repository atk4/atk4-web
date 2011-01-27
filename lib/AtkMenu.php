<?
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
				$this->api->template->trySet('menu_about','class="current"');

				$menu->addMenuItem('About','about');
				$menu->addMenuItem('Features','about/features');
				$menu->addMenuItem('License','about/license');
				$menu->addMenuItem('FAQ','about/faq');

				break;


			case'doc': 
				$this->api->template->trySet('menu_doc','class="current"');

				$menu->addMenuItem('Documentation','doc');
				$menu->addMenuItem('API Reference','doc/ref');
				$menu->addMenuItem('Screencasts','doc/sc');
				$menu->addMenuItem('Examples','examples');

				break;

			case'develop': 
				$this->api->template->trySet('menu_develop','class="current"');

				//$menu->addMenuItem('Development','develop');
				$menu->addMenuItem('Get Involved','develop/getinvolved');
				$menu->addMenuItem('Roadmap','develop/roadmap');
				$menu->addMenuItem('Addons','develop/addons');

				break;

			case'commercial':
				$this->api->template->trySet('menu_services','class="current"');

				$menu->addMenuItem('Commercial Use','commercial');
				$menu->addMenuItem('Services','commercial/services');
				//$menu->addMenuItem('Products','commercial/products');
				$menu->addMenuItem('Jobs','commercial/jobs');

				break;
			case'download':
				$this->api->template->trySet('menu_download','class="current"');
				break;


			default:
		}
	}
}
