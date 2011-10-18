<?php
class page_account_info extends Page {
    function init(){
        parent::init();

        if(!$this->api->auth->isLoggedIn()){
            $this->api->redirect('commercial/store');
        }

		$m=$this->add('Model_ATK_User');
		$m->loadData($this->api->auth->get('id'));

		$p=$m->getPurchases();

		$p->loadData($_GET['id']);

		$form=$this->add('MVCForm');
		$form->setModel($p);
		$form->js(true)->find(':input')->attr('disabled',true);

	}
}
