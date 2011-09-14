<?php
class AtkAuth extends BasicAuth {
    // The basic idea of our authentication is to proove user's email address.
    // Once his email is verified, we can store all sorts of stuff about him.

    public $model;

    function setModel($m){
        if(!is_object($m))$m=$this->add('Model_'.$m);
        $this->model=$m;
        $this->model->addField('password')->system(true);
        $this->usePasswordEncryption('sha256/salt');
        return $m;
    }
	function addInfo($key,$val=null){
		if($key=='password')return $this;        // skip password field
		return parent::addInfo($key,$val);
	}
    function getIndexPage(){
        return $this->api->getDestinationURL('commercial/account');
    }
    function verifyCredintials($login,$password){
        $this->model->loadBy('email',$login);
        $p=$this->model->get('password');
        if($p==$password){
            $this->addInfo($this->model->get());
            return true;
        }
        return false;
    }
}
