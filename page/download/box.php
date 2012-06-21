<?php
class page_download_box extends Page {
    function init(){
        parent::init();

        $file41='agiletoolkit-4.1.4.zip';
        $file=  'agiletoolkit-4.2.1.zip';

        $cc=$this->add('Columns');
        $l=$cc->addColumn(6);
        $r=$cc->addColumn(6);

        $l->add('P')->set('By downloading Agile Toolkit you agree to the terms of Affero General Public License. A full source code of your software must be made available to the users of your software. This does not restrict you from developing commercial, private, educational or personal projects with AGPL license.');


        $l->add('H4')->set('You will need a commercial license if:');
        $lp=$l->add('P');
        $lp->add('Can')->set('You create public web service but wish to keep sources closed');
        $lp->add('Can')->set('You wish to sell closed-source web software distribution');
        $lp->add('Can')->set('You will require commercial support over email/phone/skype');
        $lp->add('Can')->set('You are willing to help authors of Agile Toolkit');

        $form=$l->add('Form');
        if($this->api->auth->isLoggedIn()){
            $email=$form->addField('line','email','We will email you download link');
            $email->js(true)->attr('disabled',true);
            $email->set($this->api->auth->get('email'));
            $email->add('HtmlElement',null,'after_field')
                ->setElement('a')
                ->setStyle('padding-left','5px')
                ->setAttr('href',$this->api->getDestinationURL('logout'))
                ->set('Logout');
        }else{
            $email=$form->addField('line','email','We will email you download link');
            $email->validateNotNULL('Valid Email is required to continue with download')->validateField(function($field){
                    // TODO: var_filter

                    // TODO: check domain's MX and rcpt-to

            });
        }
        $form->setFormClass('vertical');
        $form->addSubmit('Get Open Source');
        $form->addButton('Get Commercial')->js('click')->univ()->location('commercial/store');

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
