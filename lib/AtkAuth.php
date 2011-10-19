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
    function login($l){
        if(is_object($l)){
            $this->addInfo($data=$l->get());
            return parent::login($data['email']);
        }
        return parent::login($l);
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
        if(!$this->model->isInstanceLoaded()){
            $this->debug('No user matched');
            return false;
        }
        $p=$this->model->get('password');
        if($p==$password){
            $this->addInfo($this->model->get());
            return true;
        }
        return false;
    }
}
