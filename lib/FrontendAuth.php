<?php
class FrontendAuth extends AtkAuth {
    function cookieLogin(){
        if(!$this->api->auth->isLoggedIn()){

            if(isset($_COOKIE[$this->name."_username"]) && isset($_COOKIE[$this->name."_password"])){
                $this->api->dbConnectATK();

                if($this->verifyCredintials(
                            $l=$_COOKIE[$this->name."_username"],
                            $this->encryptPassword( $_COOKIE[$this->name."_password"],$l)
                            )){
                    $this->loggedIn($_COOKIE[$this->name."_username"],$_COOKIE[$this->name."_password"]);
                    $this->memorize('info',$this->info);
                }
            }
        }
    }
    function check(){
        if(!$this->api->auth->isLoggedIn()){

            $this->api->js(true)->univ()->dialogURL('Login to access this page',
                    $this->api->getDestinationURL('login',array('redirect'=>$this->api->page)));

            $this->api->page_object->add('View_Error')->set('Access to this page requires authentication');

            throw $this->exception('','StopInit');
        }
        return parent::check();
    }
}
