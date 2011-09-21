<?php
class Controller_SocialAuth extends BasicAuth {
    public $auth_agents=array();

    function init(){
        parent::init();
    }

    function enable($services=array()){
        foreach($services as $service){
            $this->auth_agents[$service]=
                $this->add('Controller_OAuth_'.ucfirst($service));
        }
        return $this;
    }
}
