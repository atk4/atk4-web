<?php
class page_users extends Page {

    function init(){
        parent::init();
        $this->api->stickyGET('atk_user_id');
    }

    function getModel(){
        $m=$this->add('Model_ATK_User');
        if($_GET['atk_user_id'])$m->loadData($_GET['atk_user_id']);
        return $m;
    }

    function page_index(){
        //echo $this->api->locate('php','Model_User.php');

        $crud=$this->add('CRUD');
        $crud->setModel('ATK_User',null,array('id','email','name','status','logged_dts','token_email'));
        if($crud->grid){
            $crud->grid->addColumn('expander','more','More...');
            $crud->grid->addColumn('button','token');
            $crud->grid->addPaginator();
            $crud->grid->dq->order('id desc');
			if($_GET['token']){
				$m=$this->add('Model_ATK_User_Pending')->loadData($_GET['token']);
				$m->sendToken();
				$this->js(null,$crud->grid->js()->reload())->univ()->successMessage('sent')->execute();
			}
        }
    }
    function page_more(){
        $tt=$this->add('Tabs');
        $t=$tt->addTab('BasicInfo');
        $t->add('MVCForm')->setModel($this->getModel());

        $tt->addTabURL('../password','Password');
        $tt->addTabURL('../activity','Activity');
        $tt->addTabURL('../engage','Engage');
    }
    function page_password(){
        $form=$this->add('Form');
        $form->addField('line','password','New Password');
        $form->addSubmit();

        if($form->isSubmitted()){

            $m=$this->getModel();
            $m->addField('password')->system(true);

            $auth=$this->api->auth;
            $l=$m->get('email');
            $p=$form->get('password');

            // Manually encrypt password
            $enc_p = $auth->encryptPassword($p,$l);

            $m->set('password',$enc_p)->update();

            $this->js()->univ()->successMessage('New password set')->execute();
        }
    }
    function page_activity(){
        $this->add('H3')->set('Purchases');
        $this->add('MVCGrid')->setModel($this->getModel()->getPurchases())
            ->owner->addPaginator();

        $this->add('H3')->set('Downloads');
        $this->add('MVCGrid')->setModel($this->getModel()->getDownloads())
            ->owner->addPaginator();

        /*
        $this->add('H3')->set('Donations');
        $this->add('MVCGrid')->setModel($this->getModel()->getDonations());
        */
    }
    function page_engage(){
        $form=$this->add('Form');
        $form2=$this->add('Form');

        $list=array_merge(array(''),$this->api->pathfinder->searchDir('mail','user/'));

        $tpl=$form->addField('dropdown','template');
        $tpl->setValueList($list)
            ->js('change',$form2->js()->reload(array('tpl'=>$tpl->js()->val())));

        if(!$_GET['tpl'])return;
        $this->api->stickyGET('tpl');

        $tpl=$list[$_GET['tpl']];
        if(!$tpl)return;

        $m=$this->getModel();
        $t=$m->prepareEmail(str_replace('.html','',$tpl));
        $t->setTag('url','http://agiletoolkit.org/sample_url');

        $form2->addField('readonly','preview_subject')->set($t->get('subject')->render());
        $form2->addField('readonly','preview_body')->set($t->body->render());
        $form2->addSubmit('Send');
        if($form2->isSubmitted()){
            $t->send($m->get('email'));
            $form2->js()->univ()->successMessage('Email sent to '.$m->get('email'))->execute();
        }
    }
}
