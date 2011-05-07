<?php
class Sitemap extends AbstractController{
    function init(){
        parent::init();
        $doc=array('Documentation');
//{{{ learn - Learning
        $doc['learn']=array('Learning',

            'install'=>array(
                'Installing Agile Toolkit',
                '[ google doc topics ]',
                'lamp'=>'Installing LAMP / WAMP / MAMP',
                'wcf'=>'How Agile Toolkit Works?',
                'Directory Structure',
                'config'=>'Configuration File',
                'dbconnect'=>'Database Connection',
                'auth'=>'Authorization',
                'git'=>'Use with Git and SVN',
                'SQL upgrade tracking',
                ),

            'try'=>array(
                'Trying it out with demos',
                'Where to find demos?',
                'How to share demos?',
                ),

            'stuck'=>array(
                'What to do if you are stuck?',
                'Asking questions',
                'Reporting bugs and issues',
                'Discussing ideas',
                ),

            'understand'=>array(
                'Understanding Class Types',
                'API Classes',
                'Pages',
                'Views',
                'Models',
                'Controllers',
                'Helpers',
                ),

            'first'=>array(
                'Before you start developing',
                'learn/first/code'=>'Business versus User Interface code',
                'learn/first/format'=>'File formatting',
                'learn/first/ui'=>'Variables in UI code',
                'learn/first/less'=>'Better less than more',
                'learn/first/copy'=>'Overriding by copying',
                'learn/first/sql'=>'SQL Queries',
                'learn/first/security'=>'Security considerations',
                'learn/first/debugging'=>'Debugging',
                ),

            'add'=>array(
                'Adding Object to your Application',
                'learn/add/method'=>'Using add()',
                'learn/add/init'=>'Object Initialization',
                ),

            'template'=>array(
                'Templates and Rendering',
                'learn/template/api'=>'API Shared Template',
                'learn/template/page'=>'Page templates',
                'learn/template/view'=>'View templates',
                'learn/template/tags'=>'Tags',
                ),

            'share'=>array(
                'Sharing code',
                'learn/share/contribute'=>'Contributing to atk4-addons',
                'learn/share/projects'=>'Sharing code between your own projects',
                'learn/share/purchase'=>'Purchasing 3rd party code',
                ),

        );
        $doc['jobeet']=array('Jobeet - Practical Project on Agile Toolkit',
            'day1'=>'Day 1: The Agile Toolkit',
            'day2'=>'Day 2: About Jobeet',
            'day3'=>'Day 3: The Data Model',
            'day4'=>'Day 4: Controller and View',
            'day5'=>'Day 5: The Routing',
            'day6'=>'Day 6: More with Models',
            'day7'=>'Day 7: Category Page',
            'day8'=>'Day 8: The Form',
        );
/*}}}*/
//{{{ core - Agile Toolkit Core Concepts
        $doc['core']=array('Agile Toolkit Core Concepts',
            'api/frontend'=>array(
                'API Classes',
                'api/frontend'=>'ApiFrontend',
                'api/cli'=>'ApiCLI',
                'api/web'=>'ApiWeb',
                'api/extending'=>'Adding your own Application Class',
                ),
            'page'=>array(
                'Page Classes',
                'page/adding'=>'Different ways of adding pages',
                'page/relative'=>'Relative page URL generation',
                'page/sub'=>'Sub-pages',
                'page/wizard'=>'Wizards',
                'page/tabs'=>'Pages with Tabs',
                'page/static'=>'Static pages',
                'page/404'=>'PageNotFound handler (404)',
                ),
            'view'=>array(
                'View Classes',
                'view/abstract'=>'View and AbstractView',
                'view/helloworld'=>'HelloWorld',
                'view/loremipsum'=>'LoremIpsum',
                'view/htmlelement'=>'HTMLElement',
                'view/button'=>'Buttons',
                'view/typography'=>'Headings and Paragraphs',
                'view/add'=>'Adding your own',
                ),
            'model'=>array(
                'Models and Controllers',
                'model/add'=>'Creating sample models',
                'Suggested field naming',
                'model/extend'=>'Extending Models',
                'model/conditions'=>'Conditions and Master Fields',
                'model/calculated'=>'Defining calculated fields',
                'model/relations'=>'Relative fields',
                'model/join'=>'Joining Tables',
                'model/orm'=>'Loading and saving records (ORM)',
                'model/queries'=>'Retrieving multi row data',
                'model/dsql'=>'Generating custom SQL',
                'model/defaultactions'=>'Modifying default actions',
                'model/newactions'=>'Adding new actions',
                ),
            'controller'=>array(
                'Controller Classes',
                'controller/why'=>'Purpose of Controllers',
                'Multi-model Controller',
                'controller/view'=>array(
                    'View Controllers',
                    'controller/view/view'=>'View',
                    'controller/view/grid'=>'Grid',
                    'controller/view/form'=>'Form',
                    'controller/view/tree'=>'Tree',
                    'controller/view/add'=>'Adding View Controllers',
                    ),
                'controller/api'=>array(
                    'API Controllers (4.2)',
                    'controller/api/config'=>'Config',
                    'controller/api/logger'=>'Logger',
                    'controller/api/add'=>'Adding API Controllers',
                    ),
                'controller/model'=>array(
                    'Model Controllers',
                    'controller/model/sql'=>'SQL (4.2)',
                    'controller/model/monge'=>'Mongo (4.2)',
                    ),
                ),
            'js'=>array(
                'JavaScript and jQuery',
                'js/jui'=>'Adding jUI Controller',
                'js/chain'=>'jQuery Chains',
                'js/univ'=>'Using and extending Univ chain',
                'js/addons'=>'Loading jQuery plugins',
                'js/events'=>'Binding chain to events',
                'js/custom'=>'Using Custom events',
                'js/widget'=>array(
                    'Widgets',
                    'js/widget/why'=>'Why are widgets needed',
                    'js/widget/form'=>'Form Widget',
                    'js/widget/grid'=>'Grid Widget',
                    '..',
                    ),
                ),
            'dsql'=>array(
                'Dynamic Queries',
                'dsql/how'=>'How to use',
                'dsql/where'=>'Conditions',
                'dsql/field'=>'Fields',
                'dsql/join'=>'Joins',
                '...',
                'dsql/extend'=>'Extending',
                ),
            'auth'=>array(
                'Authentication',
                'auth/basic'=>'Basic Authentication class',
                'auth/sql'=>'Authentication with SQL',
                'auth/dsql'=>'Enhancing auth SQL query',
                'auth/get'=>'Retrieving Auth data from session',
                'auth/field'=>'Storing additional Auth data',
                'auth/login'=>'Custom login form',
                'auth/allow'=>'Page white and black lists',
                ),
            'exception'=>array(
                'Exceptions',
                'exception/how'=>'How to use',
                'exception/type'=>'Exception types',
                'StopInit',
                'StopRender',
                ),
            );
//}}}
//{{{ basic - Basic Views
        $doc['core']=array('Basic Views',
            'form'=>array(
                'Basic Form class',
                'form/how'=>'How to use',
                'form/fields'=>'Standard Fields',
                'form/validation'=>'Validation',
                'form/submit'=>'Handling Submit',
                'form/database'=>'Database Integration',
                'form/model'=>'Using with Models',
                'form/layout'=>'Styling and Layout',
                'form/enhancing'=>'Enhancing Forms',
                'form/uploads'=>'File Uploads',
                'form/extending'=>'Extending',
                'ajax'=>array(
                    'AJAX support',
                    'Reloading fields',
                    'Showing error messages',
                    '...',
                    ),
                ),
            'grid'=>array(
                'Grid',
                'grid/how'=>'How to use',
                'grid/columns'=>'Standard Columns',
                'grid/dynamic'=>'Dynamic Elements',
                'grid/helper'=>array(
                    'Grid Helpers',
                    'grid/helper/quicksearch'=>'Quick Search',
                    'grid/helper/paginator'=>'Paginator',
                    'grid/helper/export'=>'Export',
                    'grid/helper/select'=>'Selectable rows',
                    ),
                'grid/model'=>'Using with Models',
                'grid/sort'=>'Sorting controls',
                'Ordering rows',
                ),
            'lister'=>array(
                'Lister',
                'lister/how'=>'How to use',
                ),
                'lister/complete'=>'CompleteLister',
            'filter'=>array(
                'Filter',
                'filter/how'=>'How to use',
                'filter/quicksearch'=>'QuickSearch',
                ),
            'box'=>array(
                'Containers',
                'frame'=>'Frame',
                'infobox'=>'Info Box',
                'errorbox'=>'Error box',
                'Tabs',
                'Accordion',
                'Hint',
                ),
            'misc'=>array(
                'Misc',
                'SimpleCheckbox',
                ),
            );
//}}}
//{{{ core - Core Concepts
/*
        $doc['core']=array('Basic Views',
            Basic Addons
            'pathfinder'=>array(
                'Adding Addons with PathFinder',
                'pathfinder/how'=>'How to use',
                'pathfinder/resource'=>'Default Resource Types',
                'pathfinder/location'=>'Adding location',
                'pathfinder/locate'=>'Locating files',
            'crud'=>array(
                'CRUD',
                'crud/how'=>'How to use',
                'crud/dont'=>'When not to use',
                'crud/fields'=>'Controlling which fields appear',
                'crud/restrict'=>'Restricting actions',
                'crud/actions'=>'Adding additional actions',
            array(
                'Filestore',
                'How to use',
                'File Type restrictions',
                'Custom File Model',
                'Image Upload and Manipulation',
        'html'=>array(
            'HTML Styling and Enhancing',
            'skin'=>array(
                'Skins',
                'skin/how'=>'How to use',
                'skin/custom'=>'Customizing existing skins',
                'skin/new'=>array(
                    'Creating new skin',
                    'Required tags',
                'skin/core'=>array(
                    '"core" skin',
                    'skin/core/css'=>array(
                        'Cascading Stylesheets',
                        'skin/core/css/add'=>'Adding your local CSS additions',
                        'skin/core/css/960'=>'960gs',
                        'skin/core/css/typography'=>'Typography',
                    'skin/core/logo'=>'Changing Logo',
                    'skin/core/menu'=>'Defining Menus',
                    'skin/core/icons'=>'Icons',
                'skin/jui'=>'"jui" skin (based on "core")',
                'skin/agile'=>'"agile" skin (based on "core")',
            'smlite'=>array(
                'SMLite Templates',
                'smlite/how'=>'How to use',
                'smlite/load'=>'Loading templates',
                'smlite/clone'=>'Cloning templates',
                'smlite/tags'=>'Manipulating tags and regions',
                'smlite/each'=>'Processing each tag',
            'html/head'=>'Dynamically adding code into html/head',
            'html/testing'=>'UI Testing',
            JavaScript Classes
            'atk4 Startup sequence',
            'AJAX-compliant ready-check funciton',
            'ATK4 Loader',
            'ATK4 Checkboxes',
            'ATK4 Form',
            'ATK4 Grid',
            'ATK4 Inline',
            'ATK4 Expander',
            'ATK4 Menu',
            'ATK4 Notify',
            'ATK4 Reference',
            'ATK4 Uploader',
            Deployment to Live Production
            'logger'=>array(
                    'Error reporting and logging',
                'logger/level'=>'log detail level',
                'logger/debug'=>'generating debug info',
                'logger/alerts'=>'emailing log errors',
                'logger/maintenance'=>'maintenance mode',
            'dbupdates'=>array(
                'Database upgrades',
                'dbupdates/how'=>'How to use',
            Helpers
            'tmail'=>array(
                'Sending Templated Mail',
                'tmail/how'=>'How to use',
                'extending',
            'htmlsanitizer'=>'HTMLSanitizer',
            'ProcessIO',
            'upgradechecker'=>'UpgradeChecker',
            'Order',
            Add-ons
            'a/payment'=>array(
                'Payment Gateway Integration',
                'a/payment/cc'=>array(
                    'Credit Card',
                    'a/payment/cc/form'=>'Form',
                'a/payment/paypal'=>'PayPal',
                'a/payment/transaction'=>'Transactions',
                'a/payment/recurring'=>'Recurring',
                'a/payment/subscription'=>'Subscriptions',
            'acm'=>array(
                'Campaign Monitor',
                'a/cm/howto'=>'How to use',
                'a/cm/backend'=>'Backend integration',
                'a/cm/api'=>'Using API',
                'a/cm/ui'=>'UI',
            'a/googlemaps'=>array(
                'Google Maps',
                'a/googlemaps/how'=>'How to use',
                'a/googlemaps/advanced'=>'Advanced examples',
            'a/oauth'=>array(
                'OAuth integration',
                'a/oauth/howto'=>'How to use',
                'a/oauth/auth'=>'Integrating with Auth',
                'a/oauth/vendor'=>array(
                    'Vendors',
                    'a/oauth/vendor/twitter'=>'Twitter',
                    'a/oauth/vendor/facebook'=>'Facebook',
                    'a/oauth/vendor/linkedin'=>'LinkedIn',
            'a/doc'=>array(
                'Documentation Engine',
                'a/doc/how'=>'How to document your own code',
                '- [ ]',
                '- [ ]',
            'a/test'=>array(
                'Testing',
                'a/test/ui'=>'User Interface Testing',
                'a/test/unit'=>'Unit Testing',
            Whats new in 4.1
            '- [ ]',
            Unmaintained Code
            'Since 4.0 (Artifacts from 3.0)',
                'Cluster DB driver',
                'psql',
                'Storage',
                'ApiPortal',
                'RPC',
                'ApiStatic',
                'sw',
                'AuthHTTP',
                'ClassDoc',
                'Entity',
                'DForm',
                'FreeForm',
                'FileUploader',
                'FloatingFrame',
                'Ajax',
                'JSON',
                'JsonLister',
                'RSS',
                'Reloadable',
                'DBAuth',
                'TipManager',
                'VersionControl',
                'Wizard',
                'AP',
                'mTrace',
                'js',
                    'atk4_tabs',
                    'atk4_todo',
                    'fat_checkbox',
                'tools',
                    'create-mvs',
                    'sampleproject',
                    'samplewebsite',
                    '- [ ]',
            'Since 4.1 (Artifacts from 4.0)',
                'Page_EntityManager',
                'atk4-web',
            Advanced Topics
            'Custom URLs',
            'Avoiding Front Controller',
            'Manipulating URLs',
            'Tools',
                'update',
                'tabfix',
                'makereleases',
            
                */
// }}}
        $this->api->sitemap=array('doc'=>$doc);
    }
}
// vim: set foldmethod=marker:
