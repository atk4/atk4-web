<?php
class Admin extends ApiFrontend {
    function init() {
        parent::init();
        $this->dbConnect();
        $l = $this->addLocation('..', array(
                    'php' => 'lib',
					'js'=> 'templates/js',
                    'mail'=>'templates/mail',
                ));
        $this->addLocation('atk4-addons', array(
                    'php' => array(
                        'mvc',
                        'misc/lib',
                    ),
                ))
                ->setParent($l);

        $this->add('jUI');

        $this->js()
                ->_load('atk4_univ')
                ->_load('ui.atk4_notify');

        $this->auth = $this->add('AtkAuth');
        $this->auth->setModel('ATK_Admin');
        $this->auth->check();

        $m = $this->add('Menu', null, 'Menu');

        $m->addMenuItem('Dashboard', 'index');
        $m->addMenuItem('Users', 'users');
        $m->addMenuItem('purchases');
        $m->addMenuItem('content');
        $m->addMenuItem('Log out','logout');

    }
    function page_index($p){
        $p->add('HelloWorld');
    }
}
