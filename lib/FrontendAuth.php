<?php
class FrontendAuth extends AtkAuth {
    function check(){
        if(!$this->api->auth->isLoggedIn()){

            if(isset($_COOKIE[$this->name."_username"]) && isset($_COOKIE[$this->name."_password"])){

                $this->debug("Cookie present, validating it");
                // Cookie is found, but is it valid?
                // passwords are always passed encrypted
                if($this->verifyCredintials(
                            $l=$_COOKIE[$this->name."_username"],
                            $this->encryptPassword( $_COOKIE[$this->name."_password"],$l)
                            )){
                    // Cookie login was successful. No redirect will be performed
                    $this->loggedIn($_COOKIE[$this->name."_username"],$_COOKIE[$this->name."_password"]);
                    $this->memorize('info',$this->info);
                    return;
                }
                var_dump($a,$b);
            }

            $this->api->js(true)->univ()->dialogURL('Login to access this page',
                    $this->api->getDestinationURL('login',array('redirect'=>$this->api->page)));

            $this->api->page_object->add('View_Error')->set('Access to this page requires authentication');

            throw $this->exception('','StopInit');
        }
        return parent::check();
    }
}
