<?php
/**
  * This page will show surveys user can participate in
  */
class page_survey extends Page {
    public $m,$form;
    function init(){
        parent::init();


        $menu=$this->api->add('Menu',null,'Menu');
		$menu->current_menu_class='current';
		$menu->inactive_menu_class='';
        


        $this->api->dbConnectATK();
        $this->api->auth->check();

        $m=$this->add('Model_ATK_SurveyResult_FirstProject');
        $m->setMasterField('user_id',$this->api->auth->get('id'));
        $m->loadBy('user_id',$this->api->auth->get('id'));
        if(!$m->isInstanceLoaded())$m->update();    // create blank

        $menu->addMenuItem('About You','survey');
        $menu->addMenuItem('Improvements','survey/step2');
        $menu->addMenuItem('Skills-check','survey/step3');
        $menu->addMenuItem('Finish','survey/thanks');

        $this->title=$this->add('H2');

        $this->m=$m;
        $form = $this->add('MVCForm');
        $this->form=$form;
        $form->setFormClass('vertical');
        $form->addSubmit();
    }
    function nextStep($step){
        if($this->form->isSubmitted()){
            $this->form->update();
            $this->js()->univ()->location($this->api->getDestinationURL('./'.$step))->execute();
        }
    }


    function page_index(){
        $this->title->set('A Bit About Yourself...');
        $this->form->setModel($this->m,array('background','php_experience','frameworks','languages','oop_level','atk_progress','atk_continue'));
        $this->nextStep('step2');
    }
    function page_step2(){
        $this->title->set('How Can We Improve Agile Toolkit?');

        $a=array();
        if(!$this->m->get('atk_continue')){
            $a[]='atk_stop_why';
            $a[]='atk_stop_descr';
        }
        $a[]='atk_time';$a[]='atk_improve_doc';$a[]='atk_improve_license';
        $a[]='atk_improve_license_descr'; $a[]='atk_features';
        $this->form->setModel($this->m,$a);
        $this->nextStep('../step3');
    }
    function page_step3(){
        $this->title->set('How Skilled Your Are in Agile Toolkit?');
        $this->form->setModel($this->m,array('prof_ui','prof_js','prof_ajax','prof_models','prof_views','prof_templates','prof_deploy','prof_share','prof_educate'));
        $this->nextStep('../thanks');
    }
    function page_thanks(){
        $this->title->set('Thank you for filling out the survey!');
        $this->form->destroy();

        $this->add('P')->set('Based on your specified experienced we have build some suggestions for you on how to get better
                with agile toolkit');

        $profs=array('prof_ui','prof_js','prof_ajax','prof_models','prof_views','prof_templates','prof_deploy','prof_share','prof_educate');

        $res=array();

        foreach($profs as $x){
            $choices=array_keys($this->m->getField($x)->listData());

            $val=$this->m->get($x);
            
            $pos=array_search($val,$choices);

            //$compl=$pos/(count($choices)-1);



            $res[$x]=$pos;

        }



        asort($res);

//        foreach(array('a','b') as $junk){ 
        {
            list($worst_skill,$worst_score)=each($res);

            switch($worst_skill){
                case 'prof_ui':$res=array(2=>'Agile Toolkit is the UI library. While many things seem to be doable just by using
                                       existing views, the true power is in building your own UI elements. Read more about
                                       Object-Oriented programming and look into lib/view of some public projects.',
                                       4=>'You seem to have a really good grasp on creating and extending views. However in many
                                       cases you would want to customize existing view from external class. This is what
                                       controllers do. Try to implement an A-Z index shortcuts on top of Lister through a
                                       separate view or controller',
                                       6=>false);
                               break;
                case 'prof_js':$res=array(2=>'JavaScript is a very powerful language. While Agile Toolkit lets you do things
                                       without messing with JavaScript, you can achieve much greater results if you learn how to
                                       use univ() chains or plugins.',
                                       4=>'Read more about jQuery UI Widget factory. It really makes making UI elemetns much
                                       easier. Also read about progressive enhancements with JavaScripts.',
                                       6=>false);
                               break;
                case 'prof_ajax':$res=array(2=>'While sometimes it makes sense to use regular links (such as for SEO purposes), i
                                         nother cases you can do great things with AJAX. Try putting more controls on the same
                                         page and reload them dynamically. Users always appreciate some dynamics on the pages',
                                         4=>'Your skill with AJAX quite awesome. One advice though, if you are building public
                                         pages, remember that search engines will not follow javascript-generated pages. You need
                                         to keep the actual links for crawlers and non-JS browsers',
                                         5=>false);
                                 break;
                case 'prof_models':$res=array(3=>'Models in Agile Toolkit play a very important role. While you can still
                                           generate some of the UI without them, I highly recommend you to build all your
                                           business logic with Models. If you use no-SQL, you can still benefit from models
                                           to define your structure',
                                           5=>'If you are coming from other framework, you must know that models in Agile
                                           Toolkit are more powerful when you are using inheritance. You are not limiting to
                                           have only a single model class per table, you can have multiple classes depending
                                           on how you are willign to use models',
                                           7=>false);
                                   break;
                case 'prof_templates':$res=array(1=>'Your use of templates seems to be OK for the basic and personal projects.
                                              However if you are working on the project for your client, you can easily change
                                              the look of Agile Toolkit through jQuery UI ThemerollerClients will love your work
                                              beccause of that small detail',
                                              4=>'When you are making your own views, you should rely on templates to make them
                                              universal and extensible. Define multiple regions inside the template, clone master
                                              template (like Form does) and use those template chunks to produce HTML output.',
                                              6=>false);
                                      break;
                case 'prof_deploy':$res=array(2=>'It is really important that you learn and use Git (or SVN) in all of your work.
                                           There are way too many benefits in using it. Read more about Git',
                                           4=>'Learn to use branches and write some server-side script to monitor your Agile Toolkit log
                                           files. Do launch the "staging" server and test all releases and their installation
                                           procedure before publishing them to the live site',
                                           6=>false);
                                   break;
                case 'prof_share':$res=array(2=>'Sharing some of your code is good, but give us a hand and 
                                          tell others about Agile Toolkit. You do love at least
                                          '.count(explode(',',$this->m->get('atk_features'))).' features in Agile Toolkit which you
                                          love, why don\'t you tell that to your friends, followers or on your blog?',
                                          4=>'Contributing the code is awesome thing to do, but you should make your code
                                          accessible to others and have some good documentation on it. If you haven\'t contacted
                                          us yet about your accomplishment, please do and we will place a link to your site',
                                          6=>false);
                                  break;
                case 'prof_educate':$res=array(0=>'Any questions or answers you find is a really valuable info for anyone else
                                            who is learning Agile Toolkit. Don\'t hesitate to ask about Agile Toolkit on a public
                                            sites, we try to answer all the questions quickly and precisely. Often it can save
                                            you hours of your time',
                                            5=>'We are making lots of articles and documentation on Agile Toolkit every week. But
                                            one thing we can\'t do is to generate other user success story. If Agile Toolkit was
                                            helpful to you, let the world know.',
                                            8=>false);
            }
            for($i=$worst_score;$i<10;$i++){
                if(isset($res[$i]) && $res[$i]){
                    $this->add('View_Hint')->set($res[$i]);
                    break;
                }
            }
            if($i==10)
                    $this->add('View_Hint')->set('You are really awesome with Agile Toolkit! You must come work for us.');
        }





        $this->add('Button')->set('Back to site')->js('click')->univ()->location('/');
    }

}
