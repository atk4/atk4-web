<?php
class Page_Blog extends Page {
	function init(){
		parent::init();
		$l=$this->template->get('blogpost');
		$this->template->del('blogpost');
		$this->api->menu->addMenuItem('&lt;&lt; Back to original post',$l);
		$this->api->template->trySet('menu_blog','class="current"');
	}
}
