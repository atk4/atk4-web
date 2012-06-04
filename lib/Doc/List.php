<?php
class Doc_List extends MVCLister {
    function init(){
        parent::init();
        $this->api->dbConnectATK();
        $class=$this->template->get('Model');
        $this->template->del('Model');
        $model=$this->add('Model_ATK_'.$class);
        $model->onlyPage($this->api->page);
        if(!$model instanceof Model_ATK_PageContent){
            throw $this->exception('Incorrect model for List. Must Extend PageContent')
                ->addMoreInfo('class',$class);
        }
        $this->setModel($model);
        if($this->template->is_set('add')){
            $label=$this->template->get('add')?:'Add New';
            $button=$this->add('Button',null,'add')
                ->setLabel($label);

            if($this->api->auth->isLoggedIn()){
                $button->js('click')->univ()->frameURL($label,
                    $this->api->getDestinationURL(null,array($this->name=>'add'))
                );
            }else{
                $button->js('click')->univ()->frameURL('Login',$this->api->getDestinationURL('login'));
            }
            if($_GET[$this->name]=='add'){
                if(!$this->api->auth->isLoggedIn())exit;
                $this->api->stickyGET($this->name);
                $col=$this->add('Columns',null,$this->spot);
                $left=$col->addColumn();
                $right=$col->addColumn();
                $right->add('View',null,null,array('view/submit_content'));
                $f=$left->add('MVCForm');
                $f->setFormClass('vertical');
                $_GET['cut_object']=$col->name;
                $f->setModel($model);
                $f->addSubmit('OK');
                if($f->isSubmitted()){
                    $f->update();
                    $f->js()->univ()->successMessage('Your content was submitted. Thank you!')->closeDialog()->execute();
                }
            }
        }
    }
}
