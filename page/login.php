<?php
class page_login extends Page {
    function init(){
        parent::init();
        $this->api->stickyGET('return');
        $cc=$this->add('Columns');
        $l=$cc->addColumn(6);
        $r=$cc->addColumn(6)->add('HtmlElement','rightbox');

        $form=$l->add('Form');
        $email=$form->addField('line','login','Email')->validateNotNULL();
        $email=$form->addField('password','password')->validateNotNULL();

        $t=$this->add('SMLite')->loadTemplateFromString('<dl><dd><a id="forgotpas" href="#'.
                '">Forgot password?</a><br/><a id="createacc" href="#">Create account</a></dd></dl>');
        $form->add('View',null,null,$t);

        $form->addSubmit('Login');

        $form->js('click',$r->js()->children()->eq(0)->atk4_load($this->api->getDestinationURL('forgot',array('cut_page'=>1))))->_selector('#forgotpas');
        $form->js('click',$r->js()->children()->eq(0)->atk4_load($this->api->getDestinationURL('register',array('cut_page'=>1))))->_selector('#createacc');


        if($form->isSubmitted()){
            $this->api->dbConnectATK();
            $auth=$this->api->auth;
            $l=$form->get('login');
            $p=$form->get('password');

            // Manually encrypt password
            $enc_p = $auth->encryptPassword($p,$l);

            // Manually verify login
            if($auth->verifyCredintials($l,$enc_p)){

                // Manually log-in
                $auth->login($l);

                $auth->model->set('logged_dts',date('Y-m-d H:i:s'))->update();

                if($_GET['return']){
                    $this->js(true)->atk4_load($this->api->getDestinationURL($_GET['return'],array('cut_page'=>1,'return'=>false)))
                        ->execute();
                }

                $form->js()->univ()->redirect($this->api->getDestinationURL('commercial'))->execute();
            }
            $form->getElement('password')->displayFieldError('Incorrect login');
        }



        $r->add('P')->set('Active account on agiletoolkit.org will enable you to access additional resources, add-ons, vote, collaborate. You will also be able to manage your license settings.');

    }
}
