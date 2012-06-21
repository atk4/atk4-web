<?php
class Frontend extends ApiFrontend {
	function init(){
		parent::init();
		$this->dbConnect();
		$this->add('jUI');

        $this->add('Auth','frontendauth');
        if(!$this->auth->recall('id') && $this->auth->info['id']){
            $this->auth->memorize('id',$this->auth->info['id']);  // compatibility
        }
        $this->auth->setModel('User','email','password');
        $this->auth->usePasswordEncryption('sha256/salt');
        $this->auth->check();
		$m=$this->add('Menu',null,'Menu');
		$m->addMenuItem('index','Your Account');
		$m->addMenuItem('licenses');
		$m->addMenuItem('content');
		$m->addMenuItem('profile');
		$m->addMenuItem('logout');

	}
	function getUserID(){
        if(!$this->auth->model->id )return 1;
		return $this->auth->model->id;
	}
    function page_profile($p){
        $f=$p->add('formandsave/FormAndSave')->setModel($this->api->auth->model,array('full_name'));
    }
}
