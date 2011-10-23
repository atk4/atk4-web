<?php
class Model_ATK_SurveyResult_FirstProject extends Model_ATK_SurveyResult {
    public $entity_code='atk_survey_1';

    function init(){
        parent::init();

        // Some information about developer himself
        $this->addField('background')
            ->caption('What is your background?')
            ->type('list')->listData(array(
                    'programmer'=>'Programmer',
                    'designer'=>'Designer',
                    'business'=>'Business / IT consultant',
                    'enterpreneur'=>'Startup / Enterpreneur',
                    'student'=>'Student (just learning everything)',
                    'other'=>'Other',
                    ))
                    ;

        $this->addField('php_experience')
            ->caption('How many years you have been programing in PHP language?');

        $this->addField('frameworks')
            ->caption('What other PHP Frameworks, Libraries or Toolkits you are familiar with?')
            ->type('list')->display('checkboxlist')->listData(array(
                    'ci'=>'Code Igniter',
                    'zend'=>'Zend Framework',
                    'yii'=>'Yii Framework',
                    'symfony'=>'Symfony',
                    'cakephp'=>'CakePHP',
                    'drupal'=>'Drupal',
                    'kohana'=>'Kohana',
                    ))
                    ;

        $this->addField('languages')
            ->caption('Apart from Web Development, what other environments you developed with?')
            ->type('list')->display('checkboxlist')->listData(array(
                    'desktop'=>'Desktop environments - .NET, Java or Objective C',
                    'mobile'=>'Mobile development',
                    'server'=>'Server software, daemons and system utilites',
                    'embedded'=>'Embedded devices',
                    ))
                    ;



        $this->addField('oop_level')
            ->caption('How good are you with Object Oriented Programming?')
            ->type('list')->listData(array(
                        ''=>'...',
                    'procedural'=>'I am procedural/static person, I only use singletons',
                    'std'=>'I use standard or framework classes but I don\'t make my own classes',
                    'template'=>'I don\'t think much about inheritance. I just use same template or generate my classes',
                    'good'=>'I am good with inheritance. I create at least 2 level inheritance and override methods actively',
                    'god'=>'I am god with Object Oriented programming. I am in control of my object model',
                    ))
                    ;

        // More information about Agile Toolkit
        $this->addField('atk_progress')
            ->caption('What is your progress so far with Agile Toolkit?')
            ->type('list')->display('checkboxlist')->listData(array(
                    'investigate'=>'Understoond what it is and what it does',
                    'install'=>'Installed on my local computer',
                    'demos'=>'Managed to run some of the demos and play with the code',
                    'server'=>'Installed it on my server',
                    'project'=>'Working on a project in Agile Toolkit',
                    'projlive'=>'Completed at least one project in Agile Toolkit',
                    ))
                    ;

        $this->addField('atk_continue')
            ->caption('Do you plan to continue learning or developing with Agile Toolkit?')
            ->type('boolean');

        $this->addField('atk_stop_why')
            ->caption('Why wouldn\'t you use Agile Toolkit in more projects?')
            ->type('list')->listData(array(
                        ''=>'...',
                    'noprog'=>'Programming is not really for me. I prefer others to develop software for me',
                    'stock'=>'I was looking for out-of-the-box software I could customzie',
                    'nophp'=>'It\'s impossible for me to use PHP language right now',
                    'target'=>'Web UI Development is not really what I do',
                    'understand'=>'Agile Toolkit was too difficult to understand, I gave up',
                    'efficiency'=>'I can do things more efficiently without Agile Toolkit',
                    'stuck'=>'I got stuck while learning and decided to quit',
                    'syntax'=>'Agile Toolkit does things in a wrong way',
                    'affiliation'=>'I am affiliated with other framework and prefer to should stick with it',
                    'license'=>'Agile Toolkit license was unsuitable for me',
                    'maturity'=>'I need more mature framework',
                    'bugs'=>'Bugs in Agile Toolkit',
                    'other'=>'Other reason',
                    ))
                    ;

        $this->addField('atk_stop_descr')
            ->caption('Please provide more information on your reason to stop using Agile Toolkit')
            ->type('text')
            ;

        $this->addField('atk_time')
            ->caption('How much time you have spent on learning Agile Toolkit')
            ->type('list')->listData(array(
                        ''=>'...',
                    'none'=>'I haven\'t tried it at all',
                    'day'=>'Less than one day',
                    'fewevenings'=>'Spent few evenings or a weekend',
                    'week'=>'I have been learning Agile Toolkit actively for about a week',
                    'inandout'=>'Few weeks but only when I have some free time',
                    'month'=>'Actively dedicated more than 2 weeks to Agile Toolkit',
                    ));

        // Help us improve Agile Toolkit screen

        $this->addField('atk_improve_doc')
            ->caption('Where we should focus our documentation efforts?')
            ->type('list')->listData(array(
                        ''=>'...',
                    'screencasts'=>'More screencasts!',
                    'podcasts'=>'Regular episodes of podcasts',
                    'samples'=>'More examples I can download and launch',
                    'phpdoc'=>'Strict PHPDOC-based class browser',
                    'methods'=>'Practical class and method documentation with examples (like jQuery)',
                    'translate'=>'Work on documentatino translation to a different language',
                    'book'=>'Off-line media such as book, PDF or eBook',
                    'practical'=>'More practical examples and tutorials I could follow',
                    ));

        $this->addField('atk_improve_license')
            ->caption('Suggest us how to improve our Licensing')
            ->type('list')->listData(array(
                        ''=>'...',
                    'ok'=>'License model is great, leave it as it is',
                    'personal'=>'Add a cheaper or free permissive license for peronal use',
                    'nonprofit'=>'Add a cheaper or free permissive license for non-profit companies',
                    'startups'=>'Add a cheaper or free permissive license for start-up company',
                    'mit'=>'Just release under MIT or BSD, charge for add-ons (We won\'t do this in near time)',
                    'enterprise'=>'Pricing is OK, but more enterprise features are needed',
                    'other'=>'Other suggestions'
                    ));

        $this->addField('atk_improve_license_descr')
            ->caption('Tell us in more details how you would prefer licensing to change')
            ->type('text');


        $this->addField('atk_features')
            ->caption('What Features of Agile Toolkit you love?')
            ->type('list')->display('checkboxlist')->listData(array(
                    'ui'=>'I love Bundled Interface and that I can focus on the code',
                    'ui-cust'=>'... although I also love how Agile Toolkit implements UI customization',
                    'biz'=>'I love how Agile Toolkit approach to separation of Business Logic inside Models',
                    'biz-best'=>'... and this approach is much better than ther ORMs / Framework implementaitons',
                    'javascript'=>'I love how Agile Toolkit handles JavaScript, jQuery and jQuery UI integration',
                    'structure'=>'I love the structure of Application, Page and Model classes',
                    'structure-best'=>'... and I think it\'s much better than classic MVC',
                    'minimalist'=>'I love deep coupling and high efficiency when classes co-operate',
                    'speed'=>'I love speed and responsibility of Agile Toolkit',
                    'efficiency'=>'I love how efficient Agile Toolkit is at anything it does',
                    'abstraction'=>'I love how Agile Toolkit takes care of technical details for me',
                    'ajax'=>'I love how AJAX works in Agile Toolkit',
                    'css'=>'I love typography, layouts, icons and other CSS features',
                    ))
                    ;

        // Proficiency test
        $this->addField('prof_ui')
            ->caption('How good you are with UI in Agile Toolkit?')
            ->type('list')->listData(array(
                    'copypaste'=>'I copy-pasted some examples',
                    'mycode'=>'I wrote some of my own code to mash things up - forms, grids',
                    'interact'=>'I have built interaction between different elements',
                    'customzied'=>'I have extended and customized some default views',
                    'myui'=>'I have created some of my own dynamic view classes',
                    'controller'=>'I have wrote controller for some of the defalut views',
                    'rewrite'=>'I rewrote and completely replaced standard views with my own',
                    ));

        $this->addField('prof_js')
            ->caption('How good you are with JavaScript in Agile Toolkit?')
            ->type('list')->listData(array(
                    'copypaste'=>'I copy-pasted some JavaScript examples',
                    'bind'=>'I am binding some events on click event',
                    'chains'=>'My jQuery chains copy data, add effects, transitions etc',
                    'univ'=>'I have added few JavaScript functions into univ() chain',
                    'plugin'=>'I have imported some jQuery plugins or jQuery UI widgets',
                    'widgets'=>'I have wrote some of my own jQuery UI widgets',
                    'core'=>'I have replaced standard core files (atk4-start) with my own modifications',
                    ));


        $this->addField('prof_ajax')
            ->caption('How AJAX-savvy is your application')
            ->type('list')->listData(array(
                    'none'=>'It\'s not using AJAX at all',
                    'forms'=>'When forms are submitted, I perform some of operations through execute()',
                    'ajaxec'=>'I use ajaxec() method to bind AJAX on certain events',
                    'loader'=>'I actively reload parts of my page with atk4_loader or reload()',
                    'fullajax'=>'All of my application relies on AJAX to load data. Page is never refreshed',
                    'fallback'=>'My app is full-AJAX but it\'s still crawleable and works without JS too',
                    ));

        $this->addField('prof_models')
            ->caption('How far have you got with Model use?')
            ->type('list')->listData(array(
                    'samples'=>'I have tried some samples',
                    'none'=>'I am not using models at all, I manage data directly through dsql()',
                    'nosql'=>'I don\'t use SQL. I load data from nosql and supply through staticSource',
                    'models'=>'I have bunch of modles, one model per mysql table',
                    'calculated'=>'I am using calculated fields too',
                    'behaviours'=>'I have defined custom behaviours for my models (beforeUpdate, afterUpdate)',
                    'extend'=>'I extend my base models to add criteria, conditions, extra fields and specific use-cases',
                    'complex'=>'Some of my models represent multi-table structures',
                    'dsql'=>'I am changing the way how models generate SQL by redefining low level methods such as dsql()',
                    ));

        $this->addField('prof_views')
            ->caption('How far have you got with interaction between Views and Models')
            ->type('list')->listData(array(
                    'none'=>'They juts seem to work OK together',
                    'actualfields'=>'I am actively using actualfields to define which fields are visible',
                    'exceptions'=>'My Views catch model exceptions and show them to user in a friendly way',
                    'controllers'=>'I use custem descendant of "Controller" to define per-model view enhancements',
                    'page'=>'Some of my pages can work with generic models (such as Schema Generator)',
                    'multimodel'=>'I have built or used multi-model proxy. Some of my forms use multiple models',
                    ));

        $this->addField('prof_templates')
            ->caption('Agile Toolkit has awesome flexibility in it\'s templating system')
            ->type('list')->listData(array(
                    'none'=>'I use default templates',
                    'pages'=>'Some of my Pages use custom templates',
                    'copyedit'=>'I copied and edited some of the standard templates',
                    'shared'=>'I have made a custom shared.html and my app looks very unique',
                    'smlite'=>'I create instances of SMlite and manipulate templates, use cloning',
                    'viewtpl'=>'My view manipulates some template regions to produce its output',
                    'taghandle'=>'I define system-wide tags which are substituted with generic views',
                    ));

        $this->addField('prof_deploy')
            ->caption('Agile Toolkit works in many production environment. How extreme is your setup?')
            ->type('list')->listData(array(
                    'none'=>'I only installed Agile Tolokit on my desktop / laptop with WAMP / MAMP',
                    'linux'=>'I have installed Agile Tolokit ZIP on my server',
                    'git'=>'I use git in my own application to deploy it on server',
                    'prod'=>'I have turned error reporting on my server',
                    'update'=>'I use update.sh for SQL migration and watch my log files regularly or with cron',
                    'versioning'=>'I have development/staging/live environments and I use branches',
                    'cluster'=>'My application is deployed on cluster or PaaS solution',
                    ));

        $this->addField('prof_share')
            ->caption('We love sharing code. Don\'t you? Have you shared any code yet?')
            ->type('list')->listData(array(
                    'none'=>'I haven\'t shared anything at all',
                    'post'=>'I have posted code snippet somewhere',
                    'git'=>'My code is in public git repository, those who want it can get it',
                    'blog'=>'I have wrote a blog or article about some of the coding practices',
                    'zip'=>'I have some ATK classes which I distribute as a ZIP with instructions',
                    'addons'=>'I have contributed my code to atk4-addons repository',
                    'doc'=>'I have also added documentations under agiletoolkit.org/a/ in atk4-web',
                    ));

        $this->addField('prof_educate')
            ->caption('Have you helped others to find or learn Agile Toolkit?')
            ->type('list')->listData(array(
                    'none'=>'I am just browsing other info online',
                    'friend'=>'I have recommended Agile Toolkit to a friend',
                    'online'=>'I have recommended Agile Toolkit online',
                    'question'=>'I have posted a question on StackOverflow',
                    'aswer'=>'I have answered a question on StackOverflow',
                    'link'=>'I have linked to agiletoolkit.org website',
                    'article'=>'I have wrote an article or blog post about Agile Toolkit',
                    'translate'=>'I have contributed some translations or modifications to Aglie Toolkit website',
                    'resource'=>'I am running my own unofficial site dedicated to Agile Toolkit',
                    ));


    }
    function getSuggestion(){
        $profs=array('prof_ui','prof_js','prof_ajax','prof_models','prof_views','prof_templates','prof_deploy','prof_share','prof_educate');

        $res=array();

        $zz=0;
        foreach($profs as $x){
            $zz+=0.1;

            $choices=array_keys($this->getField($x)->listData());

            $val=$this->get($x);
            
            $pos=array_search($val,$choices);

            $res[$x]=$pos+$zz;
        }

        list($worst_skill,$worst_score)=each($res);

        switch($worst_skill){
            case 'prof_ui':$res=array(2=>'Agile Toolkit is the UI library. While many things seem to be doable just by using
                                   existing views, the true power is in building your own UI elements. Read more about
                                   Object-Oriented programming and look into lib/view of some public projects.</p><p><a href="/learn/understand/view/usage">About Views</a>',
                                   4=>'You seem to have a really good grasp on creating and extending views. However in many
                                   cases you would want to customize existing view from external class. This is what
                                   controllers do. Try to implement an A-Z index shortcuts on top of Lister through a
                                   separate view or controller</p><p><a href="/learn/understand/controller">Read More</a>',
                                   6=>false);
                           break;
            case 'prof_js':$res=array(2=>'JavaScript is a very powerful language. While Agile Toolkit lets you do things
                                   without messing with JavaScript, you can achieve much greater results if you learn how to
                                   use univ() chains or plugins.</p><p><a href="/learn/understand/jsapi">Read More</a>',
                                   4=>'Read more about jQuery UI Widget factory. It really makes making UI elemetns much
                                   easier. Also read about progressive enhancements with JavaScripts.',
                                   6=>false);
                           break;
            case 'prof_ajax':$res=array(2=>'While sometimes it makes sense to use regular links (such as for SEO purposes), i
                                     nother cases you can do great things with AJAX. Try putting more controls on the same
                                     page and reload them dynamically. Users always appreciate some dynamics on the pages</p><p><a href="/learn/understand/jsapi/structure">Read More</a>',
                                     4=>'Your skill with AJAX quite awesome. One advice though, if you are building public
                                     pages, remember that search engines will not follow javascript-generated pages. You need
                                     to keep the actual links for crawlers and non-JS browsers</p><p><a href="http://demo.atk4.com/demo.html?t=13">Read about Ajaxification</a>',
                                     5=>false);
                             break;
            case 'prof_models':$res=array(3=>'Models in Agile Toolkit play a very important role. While you can still
                                       generate some of the UI without them, I highly recommend you to build all your
                                       business logic with Models. If you use no-SQL, you can still benefit from models
                                       to define your structure</p><p><a href="/learn/understand/model/add">Read More</a>',
                                       5=>'If you are coming from other framework, you must know that models in Agile
                                       Toolkit are more powerful when you are using inheritance. You are not limiting to
                                       have only a single model class per table, you can have multiple classes depending
                                       on how you are willign to use models<a href="/learn/app/logic">Read More</a>',
                                       7=>false);
                               break;
            case 'prof_templates':$res=array(1=>'Your use of templates seems to be OK for the basic and personal projects.
                                          However if you are working on the project for your client, you can easily change
                                          the look of Agile Toolkit through jQuery UI ThemerollerClients will love your work
                                          beccause of that small detail.</p><p><a href="/learn/template/how">Read More</a>',
                                          4=>'When you are making your own views, you should rely on templates to make them
                                          universal and extensible. Define multiple regions inside the template, clone master
                                          template (like Form does) and use those template chunks to produce HTML output.',
                                          6=>false);
                                  break;
            case 'prof_deploy':$res=array(2=>'It is really important that you learn and use Git (or SVN) in all of your work.
                                       There are way too many benefits in using it.</p><p><a href="/learn/install/git">Read more</a>',
                                       4=>'Learn to use branches and write some server-side script to monitor your Agile Toolkit log
                                       files. Do launch the "staging" server and test all releases and their installation
                                       procedure before publishing them to the live site',
                                       6=>false);
                               break;
            case 'prof_share':$res=array(2=>'Sharing some of your code is good, but give us a hand and 
                                      tell others about Agile Toolkit. You indicated that you love at least 
                                      '.count(explode(',',$this->get('atk_features'))).' features of Agile Toolkit,
                                      why don\'t you tell that to your friends, followers or on your blog?</p><p><a href="/community/love">Share Love</a>',
                                      4=>'Contributing the code is awesome thing to do, but you should make your code
                                      accessible to others and have some good documentation on it. If you haven\'t contacted
                                      us yet about your accomplishment, please do and we will place a link to your site',
                                      6=>false);
                              break;
            case 'prof_educate':$res=array(0=>'Any questions or answers you find is a really valuable info for anyone else
                                        who is learning Agile Toolkit. Don\'t hesitate to ask about Agile Toolkit on a public
                                        sites, we try to answer all the questions quickly and precisely. Often it can save
                                        you hours of your time</p><p><a href="/community/help">Connect with community</a>',
                                        5=>'We are making lots of articles and documentation on Agile Toolkit every week. But
                                        one thing we can\'t do is to generate other user success story. If Agile Toolkit was
                                        helpful to you, let the world know.',
                                        8=>false);
        }
        for($i=$worst_score;$i<10;$i++){
            if(isset($res[$i]) && $res[$i]){
                return $res[$i];
                break;
            }
        }
    }
}
