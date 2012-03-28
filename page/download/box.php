<?php
class page_download_box extends Page {
    function init(){
        parent::init();

        $file41='agiletoolkit-4.1.4.zip';
        $file=  'agiletoolkit-4.2.0.zip';

        $cc=$this->add('Columns');
        $l=$cc->addColumn(6);
        $r=$cc->addColumn(6);

        $l->add('P')->set('Agile Toolkit <a href="'.
                $this->api->getDestinationURL('about/license')
                .'">promotes Open Source</a> by granting freedom to access open-source to you and users of your software.');

        $lp=$l->add('P');
        $lp->add('Can')->set('Your software users must have access to software sources.');
        $lp->add('Can')->set('Any use (personal, commercial or educational) is permitted.');
        $lp->add('Can')->set('You <u>may</u> charge for or sell software based on Agile Toolkit.');
        $lp->add('Can')->set('Use with unlimited CPUs, Domains, Users and Developers.');
        $lp->add('Cant')->set('You may not Encrypt, Obfuscate or Hide your source code.');
        $lp->add('Cant')->set('You may not re-release Agile Toolkit under different license.');

        $form=$l->add('Form');
        if($this->api->auth->isLoggedIn()){
            $email=$form->addField('line','email','Valid email');
            $email->js(true)->attr('disabled',true);
            $email->set($this->api->auth->get('email'));
            $email->add('HtmlElement',null,'after_field')
                ->setElement('a')
                ->setStyle('padding-left','5px')
                ->setAttr('href',$this->api->getDestinationURL('logout'))
                ->set('Logout');
        }else{
            $email=$form->addField('line','email','Valid email');
            $email->validateNotNULL('Valid Email is required to continue with download')->validateField(function($field){
                    // TODO: var_filter

                    // TODO: check domain's MX and rcpt-to

            });
        }
        $email->setFieldHint('You will receive confirmation email.');
        $form->setFormClass('vertical');
        $form->addSubmit('Download Agile Toolkit 4.2');
        $l->add('P')->add('HtmlElement')->setElement('a')->set('Download older branch: v4.1.4')
            ->setAttr('href','https://github.com/atk4/atk4')
            ->js('click',$this->js()->load($this->api->getDestinationURL('download/success',
                        array('file'=>$file41,'cut_page'=>1))));


        $l->add('P')->add('HtmlElement')->setElement('a')->set('No email? Fork us on GitHub instead')
            ->setAttr('href','https://github.com/atk4/atk4');


        if($form->isSubmitted()){

            $this->api->dbConnectATK();
            if($this->api->auth->isLoggedIn()){
                $id=$this->api->auth->get('id');
            }else{
                $id=$form->add('Model_ATK_User_Pending')->softRegister($form->get('email'));
            }
            $this->add('Model_ATK_Download')->set(array(
                        'file'=>$file,
                        'atk_user_id'=>$id
                        ))->update();

            $form->js()->closest('.atk4_loader')->load($this->api->getDestinationURL('download/success',
                        array('t_register'=>false,'file'=>$file,'cut_page'=>1)))->execute();
        }


        $form=$r->add('Form');
        $form->addField('text','license','Terms of Affero General Public License (AGPL)')
            ->set(file_get_contents('LICENSE'))
            ->setProperty('style','font-size: 80%')
            ->setProperty('rows','20')
            ;

        $form->setFormClass('vertical');
    }
}
class Can extends HtmlElement {
    public $icon='basic-check';
    function init(){
        parent::init();
        $this->add('Icon')->set($this->icon)->setColor('nobg');
    }
    function set($v){
        return $this->add('Text')->set($v);
    }
}
class Cant extends Can {
    public $icon='basic-ex';
}
