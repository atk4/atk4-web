-- MySQL dump 10.13  Distrib 5.1.51, for pc-linux-gnu (i686)
--
-- Host: localhost    Database: atk4demo
-- ------------------------------------------------------
-- Server version	5.1.51

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `moreinfo` text,
  `onsite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_howto`
--

DROP TABLE IF EXISTS `doc_howto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_howto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `inherit` varchar(255) DEFAULT NULL,
  `descr` text,
  `example` text,
  `approved` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `fk_doc_howto_doc_tree1` (`parent_id`),
  CONSTRAINT `fk_doc_howto_doc_tree1` FOREIGN KEY (`parent_id`) REFERENCES `doc_howto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_howto`
--

LOCK TABLES `doc_howto` WRITE;
/*!40000 ALTER TABLE `doc_howto` DISABLE KEYS */;
INSERT INTO `doc_howto` VALUES (1,26,'Basic Grid','grid','','Grid is one of the basic views in Agile Toolkit. It places a table on the table with headers, columns and rows. For grid each row is similarly formatted.\n\nYou call addColumn() to a grid several times to populate it with the Columns you want to see.\n\nGrid can receive data from several sources such as static source, MySQL able or Model.\n\nThis example illustrates a very basic use of Grid.','$g=$p->add(\'Grid\');\n\n // All the new views or objects needs to be added. When you do that - new object becomes child. This determines location where it appears on the page.\n // For example $p is the \"Demo\" tab. What you add into $p will always be in there.\n\n$g->addColumn(\'name\');\n\n // You can define multiple columns inside grid using addColumn() method. Columns must correspond with the hash keys in the data\n\n$g->addColumn(\'surname\');\n\n // There are 3 ways how you bind Grid with source. 1: Set static source,  2: Set data table through dynamic query,  3: Assign model through controller\n // Here we are using #1\n\n$g->setStaticSource(array(\n  array(\'name\'=>\'John\',\'surname\'=>\'Smith\'.rand(1,20)),\n  array(\'name\'=>\'Peter\',\'surname\'=>\'Tester\'.rand(20,40))\n));\n','Y'),(2,NULL,'Basic Form','form','','A very basic example on how you can create a form.','$f=$p->add(\'Form\');\n\n // Adding from is just as easy as adding anything else. None of the views require\n // any custom configuration and will work instantly out of the box. You also do not\n // need to create your own class. YOU CAN of course. But unless you are going to re-use\n // that form, why should you?\n\n // But even if you decide to create your own form class, it\'s a snap to move your code\n // from here and consolidate it into the form class. Simply move it into init() method.\n\n$f->addField(\'line\',\'name\');\n\n // Form fields need to know what type to use. One field is one column in the database.\n // You can create custom fields. \n\n // If you are using Models with Form, it will create fields for you.\n\n$f->addField(\'line\',\'surname\');\n\n // By default, form are being submitted through AJAX. You can disable AJAX by\n // doing $f->js_widget=null.\n\n$f->addSubmit();\n\n // When form is submitted, its data is sent through POST into the same file. So this line\n // will be executed twice. First when form is initialized, next when submitted. That is done\n // to ensure that all conditions are met in both cases and all data is equally loaded\n\n\nif($f->isSubmitted()){\n\n  // AJAX request on form submission will expect JavaScript code to be returned. That code will\n  // be evaluated. Let\'s return instructions to show user an alert\n\n  $f->js()->univ()->alert(\'Thank you, \'.$f->get(\'name\').\' \'.$f->get(\'surname\'))->execute();\n}','Y'),(3,26,'Grid Buttons','grid, buttons, javascript','1','In many cases you would want to add buttons to your grid. Buttons are typically used for adding new elements into grid or refreshing grid contents.','// Placing buttons anywhere is easy. $p->add(\'Button\') will do it for you.\n// Grid and Form however simplifies this slightly by providing addButton()\n// method. Those buttons will be added into designated areas.\n\n$g->addButton(\'One\');\n\n// In Agile Toolkit you can bind JavaScript events to ANY view. Here we are\n// binding \"click\" of a button to show alert.\n\n$g->addButton(\'Two\')->js(\'click\')->univ()->alert(\'clicked button two\');\n\n // Event on one object, can trigger JS code on other object. Here clicking button\n // fill make grid reload. Reload will be done through AJAX request and only\n // that particular object will be reloaded. Of course - you can reload ANY\n // view in Agile Toolkit.\n\n$g->addButton(\'Reload Grid\')->js(\'click\',$g->js()->reload());\n\n // Form can have some decorations. Agile Toolkit comes with lots of icons you can use\n // open page icons.html to see them\n\n$g->addButton(\'With Icon\')->setIcon(\'plus\');','Y'),(4,NULL,'Grid from Database','grid, sql, database, dsql','','In most cases, you will want to connect your grid with the database. Agile Toolkit allows you to specify data source based on table in your database, then you can adjust query dynamically.\n\nTo initialize database link you should use $g->setSource(\'table\'). This will create an object $g->dq, which you can manipulate to adjust your query.\n','$g=$p->add(\'Grid\');\n$g->addColumn(\'text\',\'gender\');\n$g->addColumn(\'text\',\'name\');\n$g->addColumn(\'text\',\'surname\');\n$g->setSource(\'user\');\n\n // When you are setting source for grid, this does not run and fetch data right away.\n // Instead it creates a Dynamic Query. You can access it through $g->dq property and\n // you can perform any conditioning, limits, joins, subselects or anything else on it.\n\n // Dynamic Queries are designed to construct query throughout multiple objects. Actual\n // query is performed when Grid is about to render itself.\n','Y'),(5,NULL,'Dynamic Grid Reloading','grid, javascript, reload','4','Agile Toolkit have a powerful way to integrate your objects with JavaScript. In this example, we are adding 2 buttons for a database grid. Each button will reload grid contents with additional argument, and that argument will be reflected on query condition.\n\nNote that dq->where() passes argument from $_GET into 2nd argument without any additional checks. Function where() includes necessary checking to prevent attacks, so it should safe to have code like this.','\n // In this demo you can see the power of Dynamic Reloads. When button is clicked, we are going \n // to reload grid, like we did before. But we are also passing GET argument.\n\n\n$g->addButton(\'Male\')->js(\'click\',$g->js()->reload(array(\'g\'=>\'M\')));\n$g->addButton(\'Female\')->js(\'click\',$g->js()->reload(array(\'g\'=>\'F\')));\n\n // Note here that 2nd argument to where() is protected against SQL injections. \n // Never use GET arguments as 1st argument to where()\n\nif($_GET[\'g\'])$g->dq->where(\'gender\',$_GET[\'g\']);\n','Y'),(6,NULL,'JavaScript Bindings','javascript, form','1','PHP Code you write with Agile Toolkit is tightly integrated with jQuery. You can use any visual object such as page, grid or button to either trigger the event or have some transformations applied on.\n\nThis example demonstrates some simple cases of JavaScript use. ','$b1=$g->addButton(\'Hide Myself\');\n$b1->js(\'click\')->hide();\n\n // When you use add() or addButton() it will return you new object. If you plan to\n // use it, assign it into a variable.\n\n$b2=$g->addButton(\'Hide next button\');\n$b3=$g->addButton(\'Hide prev button\');\n$b2->js(\'click\',$b3->js()->fadeOut(\'slow\'));\n$b3->js(\'click\',$b2->js()->fadeOut(\'slow\'));\n\n // We use short variables in interface code on purpose. \n //  1. Interface code is very specific and unlike business logic in Models / Controllers is often copied / tweaked.\n //     if you use long variables, you will find yourself with messed up code. Short. Concise.\n //  2. It is very discouraged to keep your interface part complicated. If your interface code grows over 30 lines,\n //     you need to create new classes for visual blocks and move code there. This will help to keep your project\n //     clean and well organized.\n\n$g->addButton(\'Show all buttons\')->js(\'click\',$b1->js(null,$b2->js(null,$b3->js()->show())->show())->show());\n\n // One button can perform multiple actions. Of course you can bind action twice, but 2nd argument to js()\n // function can be another JS chain, which is pre-pended to your chain. So when last button is clicked then \n // $b3 is shown, then $b2 then $b1 in this order.\n\n // You can also view source in your browser and you will find all the JavaScript chains neatly organized at the start\n // of your file.\n\n\n','Y'),(7,NULL,'JavaScript Chaining','javascript','4','PHP code you write is very similar to jQuery UI code. First button in this example demonstrates classic jQuery traversal. Clicking will hide first row in a grid.\n\nWhile PHP transparency is very effective it\'s use is very limited. To add more complicated routines you can use univ() extension. Univ chain already contains many useful tools.','\n // If you think you are calling PHP methods here - you are not. This is a transparent chain you\n // work with which creates jQuery chain. Arguments are converted into JSON and passed along.\n // Clicking on the button will execute this:\n //  $(\'#long_path_to_button_id\').closest(\'.atk-grid\').children(\'table:first\').find(\'tbody\')\n //    .children(\':visible\').eq(0).hide();\n\n$g->addButton(\'Hide First Data Row\')->js(\'click\')\n  ->closest(\'.atk-grid\')\n  ->children(\'table:first\')\n  ->find(\'tbody\')        \n  ->children(\':visible\')\n  ->eq(0)\n  ->hide();\n\n // For more info on jQuery functions:\n // http://api.jquery.com/closest/\n // http://api.jquery.com/children/\n // http://api.jquery.com/find/\n // http://api.jquery.com/eq/\n // http://api.jquery.com/hide/\n\n$g->addButton(\'univ() test1\')->js(\'click\')\n  ->univ()\n  ->confirm(\'Are you sure?\')\n  ->alert(\'Test performed\');\n\n // jQuery does not implement everything. That\'s why Agile Toolkit comes with it\'s own chain.\n // You can access it by calling univ(). You can also extend this chain very easily, but it already\n // contains lots of useful utilities. In this example if you reply OK to confirmation, chain will\n // continue to next function which will show alert.','Y'),(8,NULL,'JavaScript Function Closures','javascript, closure','1','JS Chains in AgileToolkit allows you to use closures. For example - univ().dialogBox() function is a proxy into jQuery dialog() widget. It comes with default options and will automatically allocate a new div for a new dialog.\n\nIn this example, dialog is created with 2 buttons. When buttons are clicked functions are executed. Those functions are defined inside PHP, however _enclose() is used. Those functions will not be executed on js(\'click\'), but will be passed as a closures.','$g->addButton(\'Dialog Test\')->js(\'click\')\n  ->univ()\n  ->dialogBox(\n    array(\n      \'autoOpen\'=>true,\n      \'title\'=>\'Do not use dialogBox directly!\',\n      \'buttons\'=>array(\n        \'ReloadGrid\'=>$g->js()->_enclose()->reload(),\n        \'Test alert\'=>$g->js()->_enclose()->univ()->alert(\'Working!\')\n       )\n    )\n  )->html(\'yahoo\');\n\n// This is a complex example of PHP to JS translation. See source of the page for what is actually \n// being generated. You should note however that if you use _enclose() at any point inside\n// a chain, then your chain will be wrapped into a function. This way alert \"Working!\" will not show\n// When you click [Dialog Test] but it is wrapped in function and passed as a handler for \"Test alert\"\n// button.','Y'),(9,NULL,'JavaScript and Form binding','javascript, form','2','$f->addField() returns a valid objects which also can be used with js() function. This example adds a hidden field to the form, which will be displayed only if first name is entered.','// Adding dynamic actions to your form fields is always a tough job. We do not want\n// you to spend half of your time in HTML templates trying to write custom JavaScript\n// code. \n\n// This approach shows you how to hide and show fields on events. In later examples\n// you will learn about bindConditionalShow() for even more flexibility\n\n$f3=$f->addField(\'line\',\'middle_name\');\n$f3->js(true)->closest(\'dl\')->hide(); \n\n$f->getElement(\'name\')->js(\'change\',$f3->js()->closest(\'dl\')->show());','Y'),(10,NULL,'JavaScript expressions','javascript, expressions','2','Using expressions allows you to fetch data from fields easily. In this example contents of name will be copied into surname on change.','\n // In earlier examples you saw how to bind event on one object to other object chains.\n // You also learned about closures. But how do you copy value of one field to another?\n\n // Well, it turns out - it is very intuitive:\n\n\n$f->getElement(\'name\')->js(\'change\',\n  $f->getElement(\'surname\')->js()->val(\n    $f->getElement(\'name\')->js()->val()\n   )\n);','Y'),(11,NULL,'Injection Protection','injection','','SQL, HTML and JS injections are the primary concerns in any web application. Agile Toolkit and the levels of abstractions it introduces are guarding against injections without any need for developer to worry.','\n // Developers are human and therefore make mistakes. In worse case\n // those mistakes lead to security breaches. \n \n // With Agile Toolkit you can take your mind off security. Security is\n // combined with efficiency - you use the tools to be more efficient,\n // meanwhile framework performs the validation.\n\n // In this case you are entering value into the form. That value is\n // passed AS-IS, without validation into\n //  Database Query\n //  JavaScript code\n //  HTML code\n\n // Normally this could be quite dangerous, but Agile Toolkit ensures\n // all the output is properly escaped. We however do recommend you\n // to use validation. Refer to:\n\n // http://www.php.net/manual/en/book.filter.php\n\n$f=$p->add(\'Form\');\n$f->addField(\'line\',\'name\',\'Search by name\');\n$b=$f->addSubmit(\'OK\');\n\n$h=$p->add(\'View_HtmlElement\')->setElement(\'h1\')->set(\'Showing all results\');\n\nif($f->isSubmitted()){\n  // Look in database\n  $dq=$this->api->db->dsql()->table(\'user\')->field(\'count(*)\');\n\n  // Second argument to where() is protected from injeciton\n  $dq->where(\'name like\',\'%\'.$f->get(\'name\').\'%\');\n  $count=$dq->do_getOne();\n\n  // Javascript translation properly handles strings. In fact the only way\n  // you can squeeze extra javascript into the chain is by using another\n  // chain.\n\n  $f->js(null, \n    $h->js()->text(\'Performed search for \"\'.$f->get(\'name\').\'\"\')\n  )->univ()->alert($count.\' rows for: \'.$f->get(\'name\'))->execute();\n}\n','Y'),(12,NULL,'Selectors','javascript, selector','','Perform javascript events when page is loaded','$p->js(true)->css(array(\'border\'=>\'1px dashed red\'));\n\n$p->js(true)->_selector(\'#Content\')->css(array(\'border\'=>\'1px dashed blue\'));\n\n$p->js(true)->_selector(\'body\')->css(array(\'border\'=>\'1px dashed green\'));\n\n// A special function _selector will adjust initial selector on your chain.\n// Note that you can work with one selector, but you can traverse with\n// find(), children(), parent(), closest() etc.\n\n','Y'),(13,NULL,'Ajaxification','ajax, javascript','','Agile Toolkit is very powerful in a way how it supports AJAX. This example will perform ajaxification of the left sidebar. This will enhance links on the sidebar to use AJAX for page loading. \n\nWhat is amazing is that any test in this demo suite will continue to perform exactly the same even if it is loaded through AJAX request. Which means - as a developer you can decide how exactly you wish to make your links operate.\n\nThis, of course, is just a tip of the iceberg and capabilities of AJAX are much more powerful than demonstrated here.','$p->add(\'Button\')->setLabel(\'Ajaxify left sidebar\')\n  ->js(\'click\',$p->js()->_selector(\'#Content\')->atk4_loader()\n    ->univ()->ajaxifyLinks())->univ()->alert(\'Next click on sidebar will load contents through AJAX\');\n\n// Ajaxification is GREAT. It works according to rules of Progressive Enhancement (www.flamentgroup.com)\n// and is one of core concepts of jQuery UI. \n// The rule says - write your page like you would without JavaScript support, then enhance it with JavaScript.\n\n// In this example - the sidebar you see on the left is a plain HTML code. But by ajaxifying it, it will\n// load content dynamically. The biggest challenges in this approach are:\n//  1. When content is loaded dynamically, only fetch relevant piece of HTML from server\n//  2. That piece of HTML might contain some JavaScript binding, so those need to be executed\n//  3. There are many minor side-effects, for example duplication of IDs or having un-saved forms\n\n// Fortunately Agile Toolkit takes care of ALL those problems by using a custom loader: atk4_load()\n// It is different from jQuery.load() as it is implemented as a widget and will handle many real-life\n// situations much better. ','Y'),(14,NULL,'Radio Buttons','form, radio','','Demonstrates a basic use of a radio buttons.','$values=array(\'M\'=>\'Male\',\'F\'=>\'Female\');\n\n$f=$p->add(\'Form\');\n$f->addField(\'line\',\'name\');\n$f->addField(\'radio\',\'gender\')\n  ->setValueList($values)\n  ->setNotNull();\n$f->addSubmit();\n\n // Radio buttons, Drop-downs, combo-boxes are using associative array to store\n // list of available values. Field will automatically perform a validation to make sure\n // proper selection is performed. This way if user manually tweaks POST data, form\n // does verification by default. ATK4 verifies that, because we know developers are\n // busy with more important things.\n\nif($f->isSubmitted()){\n  $f->js()->univ()->alert($f->get(\'name\').\', you are a \'.$values[$f->get(\'gender\')])->execute();\n}','Y'),(15,NULL,'Form Elements','form, fields, elemens','','Shows a wide variety of form field types ','\n// This form probably contains all the possible elements. Note that you can add your own fields quite easily\n\n$f=$p->add(\'Form\');\n$f->js_widget=null;\n$f->addComment(\'This form shows all sorts of fields you can use by default\');\n$f->addField(\'line\',\'line\');\n$f->addField(\'password\',\'password\');\n$f->addField(\'checkbox\',\'checkbox\');\n$f->addField(\'dropdown\',\'dropdown\');\n$f->addField(\'checkboxlist\',\'checkboxlist\');\n$f->addField(\'radio\',\'radio\');\n$f->addField(\'date\',\'date\');\n$f->addField(\'text\',\'text\');\n\n$f->addSeparator(\'Here are more complex fields relying on JavaScript or 3rd party widgets\');\n$f->addField(\'DatePicker\',\'DatePicker\');\n$f->addField(\'DateSelector\',\'DateSelector\');\n$f->addField(\'Slider\',\'Slider\');\n$f->addField(\'autocomplete\',\'autocomplete\');\n$f->addField(\'upload\',\'upload\');\n$f->addField(\'Grouped\',\'Grouped\')->setFormat(\'3-3-3\');\n\n$f->addSeparator(\'Here are some variations in how you can use fields\');\n$f->addField(\'line\',\'line_with_hint\')->template->set(\'after_field\',\'HintHint HintHintHintHint HintHintHint HintHintHint\');\n$f->addField(\'line\',\'line_with_button\')->add(\'Button\',null,\'after_field\')->setLabel(\'Test\')\n  ->js(\'click\')->univ()->alert($f->getElement(\'line_with_button\')->js()->val());\n$f->addField(\'Search\',\'Search\');\n$f->addField(\'URL\',\'URL\');\n$f->addSubmit();\n\n\n','Y'),(16,NULL,'Upload to Filestore','upload, filestore','','FileStore is an add-on for Agile Toolkit which implements a virtual file storage. Files are stored in the directories, while their meta information is stored in the database.\n\nFilestore supports use of multiple volumes and checks mime-types of uploaded files. \n\nThis demonstration allows you to upload PNG, GIF and JPEG files only','$f=$p->add(\'Form\');\n\n // FileStore is implemented using our Models. In Agile Toolkit use of\n // Models is optional but is highly recommended for projects scheduled for more than\n // 2 weeks of development time or with complicated logic.\n\n$f->addField(\'upload\',\'upload\')->setController(\'Controller_Filestore_File\');\n\n // Controller instructs upload field, where meta-data should be saved. When file\n // is uploaded, before form is submitted, new model entry will be created.\n\n // Therefore you can tweak the model/controller to achieve validation\n // or verification of your uploaded files, or if you want to add extra fields\n // such as user_id.\n\n$p->add(\'Text\')->set(\'Previously Uploaded Files\');\n\n$g=$p->add(\'MVCGrid\')->setController(\'Controller_Filestore_File\');\n\n // When using controller with Grid, it will initialize all fields for you. Normally\n // you do setActualFields() to specify which of model fields you want to be listed\n // on a Grid.','Y'),(17,NULL,'Real-life Form','','','This is a demonstration of a real life form. In other frameworks, you would need to separately prepare a piece of HTML code, possibly some JS code, model and then somehow bind or route it together.\n\nIn Agile Toolkit, you write only what is necessary. In this case, we decided not to use MVC.\n\nFor comparison, same form implemented in Zend Framework is described here (in Russian)\n<a href=\"http://zendframework.ru/articles/building-application-with-zend-framework-part-2-zend-form-validate-filter-captcha-translate\">http://zendframework.ru/articles/building-application-with-zend-framework-part-2-zend-form-validate-filter-captcha-translate</a>\n\n','class Form_Register extends Form {\n  function init(){\n    parent::init();\n    $f=$this;\n\n    $f->addField(\'line\',\'email\')\n      ->validateNotNull()\n      ->validateField(\'filter_var($this->get(), FILTER_VALIDATE_EMAIL)\')\n      ;\n\n    $f->addField(\'password\',\'password\')->validateNotNull()\n      ->setProperty(\'max-length\',30);\n\n    $f->addField(\'password\',\'password2\')\n       ->validateField(\'$this->get()==$this->owner->getElement(\"password\")->get()\',\n       \'Passwords do not match\');\n\n\n    $f->addField(\'line\',\'name\')->validateNotNull();\n\n    $f->addField(\'radio\',\'sex\')\n      ->setValueList(array(\'m\'=>\'Male\',\'f\'=>\'Female\'))\n      ;  // automatically validated to be one of value list\n\n\n    $f->addSeparator(\' \');\n\n    $f->addField(\'DatePicker\',\'date_birth\',\'Birthdate\');\n\n    $f->addField(\'dropdown\',\'age\')\n      ->setValueList(array(\'\',\'11 - 20\', \'21 - 30\', \'31 - 40\'));\n\n    $f->addField(\'text\',\'about\')\n      ->setProperty(\'cols\',45)->setProperty(\'rows\',\'5\')\n      ->validateField(\'5000>=strlen($this->get())\',\'Too long\');\n\n    $f->addField(\'checkbox\',\'agreeRules\',\n      $f->js()->univ()->dialogURL(\'Rules\',\n        $this->api->getDestinationURL(null,array(\'showTerms\'=>true,\'cut_object\'=>\'rules\')))\n       ->getLink(\'I Agree to Rules and Terms\')\n    )->validateNotNull(\'You must agree to the rules\');\n\n    $f->addSubmit(\'Register\');\n  }\n}\n\nif($_GET[\'showTerms\'])return $p->add(\'LoremIpsum\',\'rules\');\nif($p->add(\'Form_Register\')->isSubmitted()){\n  $p->js()->univ()->dialogOK(\'Success\',\'Registration is successful\',$p->js()->_enclose()->univ()->location(\'/\'))->execute();\n\n}\n','Y'),(18,NULL,'Gravatar Integration','gravatar, form, javascript','','Type your email and we will show you your (gr)-avatar','// Agile Toolkit is all about efficiency and flexibility. Integrating your ATK4 software\n// with 3rd parties is both very easy and fun to do. Here, for example, we change\n// the src attribute of an image through AJAX request. \n\n// If you have done client-side scripting and have been building exchanges through JSON,\n// you know how difficult it is to be developing on 2 sides of the bridge. Writing PHP\n// to send JSON, then JavaScript to parse it.\n\n// No longer. There are lots of extremely sophisticated projects using Agile Toolkit\n// and this approach makes A LOT OF sense and helps avoid errors. Besides,\n// if you are not comfortable with JavaScript, then other person could be doing it\n// and you do not depend on each-other so much\n\n$h=$p->add(\'View_HtmlElement\')->setElement(\'img\')->set(null);\n\n$f=$p->add(\'Form\');\n$f->addField(\'line\',\'email\');\n$f->addSubmit(\'Fetch!\');\n\nif($f->isSubmitted()){\n  $grav_url = \"http://www.gravatar.com/avatar/\" . md5( strtolower( trim( $f->get(\'email\') ) ) ) ;\n  $h->js()->attr(\'src\',$grav_url)->execute();\n\n // PHP have the logic, not Client-Side\n}','Y'),(19,NULL,'CrackLib Integration','form, javascript, password','','When you type password - verify it using CrackLib.','// For decades cracklib was used on all sorts of unix computers. At one point someone\n// figured, that password strength is about number of symbols you use or\n// number of digits. \n\n// It is not. \n\n// Do not try to re-invent the wheel, but instead check your password with cracklib\n// as a validation rule. Simple things are beautiful.\n\n$f=$p->add(\'Form\');\n$f->addField(\'password\',\'pwd1\',\'New password\')\n  ->validateNotNull();\n$f->addSubmit(\'Verify\');\n\n\nif($f->isSubmitted()){\n  $pas=$f->get(\'pwd1\');\n\n  // System / Process handling helps you interact with processes.\n  // It is quite amazing on it\'s own, and it is documented in the\n  // Core documentation.\n\n  $cl=$this->add(\'System_ProcessIO\')\n    ->exec(\'/usr/sbin/cracklib-check\')\n    ->write_all($pas)\n    ;\n    $out=trim($cl->read_all());\n    $out=str_replace($pas,\'\',$out);\n    $out=trim(preg_replace(\'/^:s*/\',\'\',$out));\n\n    if($out==\'OK\')$f->js()->univ()->alert(\'SUCCESS!\')->execute();\n    $f->getElement(\'pwd1\')->displayFieldError($out);\n\n    // execute() stops execution of your code.\n}\n','Y'),(20,NULL,'Country and County','form, fields, javascript','','Challenge is simple. Some countries have regions or counties. Others don\'t. Depending on selection in the first dropdown - show different values in 2nd.\n\nIn addition to that, we want to hide field if it does not contain any selectable options.\n\nFor simplicity this example will use static data.','\n// In real life examples, you would probably be pulling data from the database. In this case,\n// you might need to use dynamic query and adjust it with ->where() if \n// $_GET[\'region\'] is specified.\n$country_list=array(\'\',1=>\'United States\',2=>\'Ireland\',3=>\'Latvia\');\n$region_list=array(1=>array(\'State1\',\'State2\'),2=>array(\'County1\',\'County2\'));\n\n$region_list=$region_list[$_GET[\'region\']]?:array();\n // if you are loading form data from database, then you would need to use value\n // list for loaded country, instead of array(), which is the default.\n\n$f=$p->add(\'Form\');\n\n// Here we are simply adding two drop-downs. Quite straightforward.\n$country=$f->addField(\'dropdown\',\'country\')\n ->setValueList($country_list);\n$region=$f->addField(\'dropdown\',\'region\')\n ->setValueList($region_list);\n\n// This is also quite simple. This works identical when form is being loaded initially\n// and also works when filed is being reloaded.\nif($region_list){\n   $region->js(true)->closest(\'dl\')->show();\n}else{\n   $region->js(true)->closest(\'dl\')->hide();\n}\n\n// Finally - here is the magic. When field is changed, other field is reloaded.\n// Imagine how many lines of code / hours of work this line just saved you!\n$country->js(\'change\',$f->js()->atk4_form(\'reloadField\',\'region\',\n     array($this->api->getDestinationURL(),\'region\'=>$country->js()->val())));\n\n','Y'),(21,NULL,'Grid Inline editing','inline, grid','','Grid\'s ability to have inline edit is a quick way to add ability for users to adjust text in tables.\n\nUsually if entries are more complex you might rather use an expander, and place form in there.\n\nThis example demonstrates both aproaches.','$g=$p->add(\'Grid\');\n$g->addColumn(\'text\',\'gender\');\n$g->addColumn(\'inline\',\'name\');\n$g->addColumn(\'expander\',\'surname\');\n$g->setSource(\'user\');','Y'),(22,NULL,'Complete Editing Solutino','grid, delete, reload, edit','','In many cases you want grid to perform 3 basic operations, which are: editing, deleting and adding entries to a table. While this functionality is really easy to achieve by using MVC and entity editor, you may need to know how to perform those actions yourself. \n\nIn this demonstration you can see one of the variants how to implement this functionality. This demonstration is limited to only a single page, you might find multi-page implementation a more effective.\n\nYou have probably noticed by now, that Agile Toolkit is being smart about tracking changes on forms and if you did change anything then attempt to edit other record, you will be warned about loosing your changes.\n\nAnother quality of ATK is that form is going to auto-focus it\'s first field when loaded.','// In this example we are attempting to combine a form and a grid element on the\n// single page.\n\n$h=$p->add(\'View_HtmlElement\')->setElement(\'h2\')->set(\'Add or edit record\');\n\n// Form and grid will need to communicate to each-other so we better add them\n// both to the page.\n$f=$p->add(\'Form\');\n$g=$p->add(\'Grid\');\n\n// Set source for both grid and form. Both objects are relying no dynamic query\n// object, so you might apply additional conditions if you wish to.\n$f->setSource(\'user\');\n$g->setSource(\'user\');\n\n// Again - adding fields can be done by models, but we do it manually for our\n// example. Please try to use Models in your application for higher efficiency.\n$f->addField(\'line\',\'name\');\n$f->addField(\'line\',\'surname\');\n$f->addField(\'dropdown\',\'gender\')\n  ->setValueList(array(\'M\'=>\'Male\',\'F\'=>\'Female\'));\n\n// This function performs two actions. First it looks into $_GET[\'id\'] and if\n// that is set, it is going to load form data from the database with specified\n// id. Secondly, that ID will also be marked as Sticky, which means if you\n// are to submit a form, the argument is not going to be lost.\n$f->setConditionFromGET(\'id\');\n\n// Below we rely on reloading parts of the page through javascript. Note that\n// we either are willing to pass ID or are willing to drop it (in case cancel is clicked)\n$f->addSubmit(\'OK\');\n$f->addButton(\'Cancel\')->js(\'click\',$f->js()->reload(array(\'id\'=>false)));\nif($f->isSubmitted()){\n  $f->update();\n  $js=$g->js(null,$f->js()->reload());\n  if($_GET[\'id\'])\n    $js->atk4_grid(\'reloadRow\',$_GET[\'id\']);\n  else\n    $js->reload();\n  $js->execute();\n}\n\n\n$g->addColumn(\'text\',\'name\');\n$g->addColumn(\'text\',\'surname\');\n$g->addColumn(\'text\',\'gender\');\n\n// Column with type button is going to execute ajax request to the same page\n// where grid is and will pass ID through the GET argument same as button\'s name.\n// In our case edit=213 will be added.\n$g->addColumn(\'button\',\'edit\');\n\n// if you add column \'delete\' then Grid will be capable of deleting entries from the\n// database. Note that all the conditions you might have applied on the grid are\n// also going to be used for deleting (by cloning dynamic query object) - this is \n// to insure that user is not going to delete some non-relevant data.\n$g->addColumn(\'delete\',\'delete\');\n\nif($_GET[\'edit\']){\n  $f->js()->reload(array(\'id\'=>$_GET[\'edit\']))->execute();\n}\n','Y'),(23,NULL,'Grid, Pagination, Totals and Custom SQL','grid, totals, paginator, dsql','4','In this example we are using our base grid with the data from the database, but we enhance it to do more things you would expect it to do.','\n// Let\'s add another field to our query. This field will use the formula to calculate salary based on the\n// length of person\'s name. Salary is formatted as monetary value by grid and will be using proper format\n// and will use red color if amount is negative.\n\n$g->dq->field(\'length(name)*300.20 - 1000 salary\');\n$g->addColumn(\'money\',\'salary\');\n\n// Additionally grids are capable of counting their own totals. Only numerical and monetary field totals\n// are being counted. Also we are adding pagination. If table contains more than 5 records, they will be\n// automatically split into pages. Paginator is using AJAX to flick through pages without reloading page\n// completely \n$g->addTotals();\n$g->addPaginator(5);','Y'),(24,NULL,'Page Layout','columns, layout','','In Agile Toolkit we are using hierarchical structure for storing all views on the page. In this example we are introducing a new helper view called Columns. If you need to split your page into two, you can use it.\n\nAdditionally this example demonstrates how you should redefine grid if you think it might be useful more than once for you.\n\nYour own redefined grid should be stored under /lib directory in your project.','class TSGrid extends Grid {\n /*\n  * TSGrid will display a grid and a button, by clicking which you\n  * can change sex from Male to Female and vice versa\n  */\n  function init(){\n    parent::init();\n    $g=$this;\n\n    // When you are making your own classes, you must always keep in mind\n    // that those objects must be just as re-usable as original grids. In our case\n    // we do set the table and fields, however we leave it up to parent to set the\n    // additional conditions on our query. This is a major reason for the philosophy\n    // of Agile Toolkit saying to keep properties public.\n\n    $g->addColumn(\'text\',\'name\');\n    $g->addColumn(\'text\',\'surname\');\n    $g->addColumn(\'text\',\'gender\');\n    $g->addColumn(\'button\',\'chsex\',\'Change Sex\');\n    $g->setSource(\'user\');\n\n    if($id=$_GET[$this->name.\'_chsex\']){\n     // do note, usually we supply 2 arguments for set() function. Second\n     // argument is being properly quoted (or parametrized), however in this\n     // case no quoting is required. Hence all the statement goes into first \n     // argument.\n      $g->dq->set(\'gender=if(gender=\"M\",\"F\",\"M\")\')\n         ->where(\'id\',$id)\n         ->do_update();\n\n     // univ()->page() method updates page content through AJAX. In this case each\n     // grid is unaware of other objects on the page. So to keep it safe, we will refresh\n     // page completely.\n      $g->js()->univ()->page($this->api->getDestinationURL())->execute();\n    }\n  }\n}\n\n// This class splits page into even parts. Every time you call addColumn it returns\n// a new object. You can then use that object to add additional elements in there. \n// In our example we are actually creating quite complicated structure:\n//     \n$c=$p->add(\'View_Columns\');\n\n$c->addColumn()\n  ->frame(\'Male List\')\n  ->add(\'TSGrid\')\n  ->dq\n  ->where(\'gender\',\'M\');\n\n$c->addColumn()\n  ->frame(\'Female List\')\n  ->add(\'TSGrid\')\n  ->dq\n  ->where(\'gender\',\'F\');\n','Y'),(25,NULL,'Google Map','google, map','','','$m=$p->add(\'View_Google_Map\');','N'),(26,NULL,'Grid Examples','','','','','N'),(27,NULL,'HTML Sanitization','','','Allow or not allow HTML? What if we have to allow? How can we make sure it\'s good?\n\nThere are several problems with allowing user input HTML:\n 1) it may contain JS injections or other attacks\n 2) it may contains markup we don\'t like.\n\nSolution is to implement HTML sanitizer. If you look on the internet, PHP implementations:\n - are self-sufficient, they parse HTML themselves\n - are very difficult to customize\n\nOur solution is based on XSLT transformations and XML parsing. Those are powerful libraries which are built into PHP by default. Our class / System/HTMLSanitizer is designed to give you an easy way to clean up your HTML. You can substitute XSLT it is using and customize the tags you are willing to whitelist.\n\nIn this example you can input any HTML into the textarea, which is then sanitized and displayed back to you.','$f=$p->add(\'Form\');\n$f->addField(\'text\',\'html\');\n$f->addSubmit(\'sanitize\');\n\n$p->add(\'View_HtmlElement\')->setElement(\'h2\')->set(\'Parsed HTML\');\n$output_text=$p->add(\'View_HtmlElement\')->set(\'\');\n\n$p->add(\'View_HtmlElement\')->setElement(\'h2\')->set(\'Embedded HTML\');\n$output_html=$p->add(\'View_HtmlElement\')->set(\'\');\n\n\nif($f->isSubmitted()){\n  $sanitized_html=$this->add(\'System_HTMLSanitizer\')->sanitize($f->get(\'html\'));\n  $output_html->js(null,\n    $output_text->js()->text($sanitized_html)\n  )->html($sanitized_html)->execute();\n}','Y'),(28,NULL,'JavaScript','','','','','N'),(29,28,'Form Conditionals','','','Often you want certain form fields appear or disappear based on value of other fields. While in some cases it requires field re-loading, most of the cases can be dealt with by simple conditional rule.\n\nThis example shows how you can use univ().setConditionalShow() on different elements.','$f=$p->add(\'Form\');\n$f->addField(\'line\',\'address1\',\'Address line 1\')\n  ->js(true)->univ()->bindConditionalShow(array(\n    \'\'=>array(),\n    \'*\'=>array(\'address2\')\n  ),\'dl\')->autoChange(1);\n$f->addField(\'line\',\'address2\',\'Address line 2\');\n\n$interests=array(\'S\'=>\'swimming\',\'R\'=>\'running\',\'W\'=>\'watching birds\');\n$f->addField(\'dropdown\',\'interest\',\'Your interests\')\n  ->setValueList($interests)\n  ->js(true)->univ()->bindConditionalShow(array(\n    \'S\'=>array(\'swimming_info\'),\n    \'R\'=>array(\'running_info\'),\n    \'W\'=>array(\'birds_which\',\'birds_where\'),\n  ),\'dl\');\n\n$f->addField(\'line\',\'swimming_info\',\'How far can you swim?\');\n$f->addField(\'line\',\'running_info\',\'How far can you run?\');\n$f->addField(\'line\',\'birds_which\',\'What type of birds?\');\n$f->addField(\'line\',\'birds_where\',\'Where do you watch them?\');\n\n$f->addField(\'checkbox\',\'has_photo\',\'I would like to upload my photo\')\n  ->js(true)->univ()->bindConditionalShow(array(\n    \'\'=>array(),\n    \'Y\'=>array(\'upload\')\n  ),\'dl\')->autoChange(1);\n$f->addField(\'upload\',\'upload\',\'My Photo\');\n\n$f->addSeparator(\'Following fields are implemented in 3.9.2/trunk\');\n\n$docs=array(\'N\'=>\'NDA\',\'C\'=>\'Contract\');\n$f->addField(\'checkboxlist\',\'checkboxlist\',\'Documents provided\')\n   ->setValueList($docs)\n  ->js(true)->univ()->bindConditionalShow(array(\n    \'N\'=>array(\'upload_nda\'),\n    \'C\'=>array(\'upload_contract\'),\n  ),\'dl\');\n$f->addField(\'upload\',\'upload_nda\',\'Upload NDA\');\n$f->addField(\'upload\',\'upload_contract\',\'Upload Contract\');\n\n$docs=array(\'r\'=>\'red\',\'b\'=>\'blue\',\'o\'=>\'Other..\');\n$f->addField(\'radio\',\'radio\',\'Favorite Color\')\n  ->setValueList($docs)\n  ->js(true)->univ()->bindConditionalShow(array(\n    \'o\'=>array(\'other_color\'),\n  ),\'dl\');\n$f->addField(\'line\',\'other_color\',\'Specify Color\');\n \nif($f->isSubmitted()){\n  $f->js()->univ()->alert(\'very interesting\')->execute();\n}\n\n','Y'),(30,NULL,'KoolPHP comparison','','','','','N'),(31,30,'Basic AJAX (compared with KoolPHP)','','','Comparison with: \nhttp://demo.koolphp.net/Examples/KoolAjax/Callback/Basic_Ajax_Callback/index.php\n\nKoolPHP: over 40 lines of code\nAgile Toolkit: about 10\n\nBenefit: You don\'t need HTML or JavaScript knowledge with Agile Toolkit.','// In this example, we are going to use a different form template. There are\n// few templates which come with standard installation, but most probably\n// your designer might want to copy templates/jui/form.html into your local\n// directory and play with few things in there. In the project you would \n// normally have up to 5 templates. Template is NOT for defining the layout\n// there is setLayout() for a customized forms\n\n$f=$p->add(\'Form\',null,null,array(\'form_empty\'));\n\n// form_empty contains almost no markup around your forms. This is very\n// useful for a forms where you don\'t want anything extra\n\n$f->addField(\'line\',\'a\',\'\')->set(2)->template->trySet(\'after_field\',\'+\');\n// Here we are adding a line without label, then setting it\'s default value\n// then also telling the template of this new field to contain \"+\" after\n// the field\n\n$f->addField(\'line\',\'b\',\'\')->set(3)->add(\'Button\',null,\'after_field\')->setLabel(\'Calculate\')->js(\'click\',$f->js()->submit());\n// This is similar to previous line, but instead we are placing button after the field.\n// We then change the label of the button and assigning it a click handler.\n// Keep track of return values. $f is form. addField returns Field object.\n// add(\'Button\') returns Button object and js() returns jQuery_Chain object.\n\n$sum=$f->addField(\'line\',\'sum\',\'\');\n// We will need to reference this field from javascript, so we want to keep \n// a reference to this field for later use.\n\n\nif($f->isSubmitted()){\n\n  // this piece will be executed when you submit the form. It will do the\n  // calculation and will respond with a short JavaScript code. Use inspector\n  // to see what it is actually doing.\n\n  $sum->js()->val($f->get(\'a\')+$f->get(\'b\'))->execute();\n}\n','Y'),(32,30,'AJAX (compared with KoolPHP)','','','http://demo.koolphp.net/Examples/KoolAjax/UpdatePanel/With_Database/index.php\n\nAnother comparison with KoolPHP. Now - if we need to output a plain HTML table, we would need to supply it as an argument into add(\'Grid\').\n\nA note regarding the \"loading\" effect. It\'s against the philosophy of ATK and good practices of development. If you need a loading indicator, it should be defined system-wide. Look into ui.atk4_loader class, which does all the loading. You should be able to add loading indicator for all AJAX actions.','$f=$p->add(\'Form\',null,null,array(\'form_empty\'));\n$dd=$f->addField(\'dropdown\',\'v\',\'\');\n\n$dd->setValueList(array(\'Pick one\',\'m\'=>\'Male\',\'f\'=>\'Female\'))\n  ->js(\'change\',$f->js()->submit());\n\n$g=$p->add(\'Grid\');\n$g->addColumn(\'text\',\'name\');\n$g->addColumn(\'text\',\'surname\');\n$g->addColumn(\'text\',\'gender\');\n$g->setSource(\'user\');\n$g->dq->where(\'gender\',$_GET[\'gender\']);\n\nif($f->isSubmitted()){\n  $g->js()->reload(array(\'gender\'=>$dd->js()->val()))->execute();\n}','Y'),(33,NULL,'URL mapping','','','Api::getDestinationURL is a method which aids you in linking from one page to another. Apart from obvious page naming, using this function can help you with doing relative path linking. For example, you can find out what page is one level up from your current page.\n\ngetDestinationURL actually returns object, which is cast into a string when necessary. If you pass this object to getDestinationURL again (in sub-function) the arguments will be properly merged and the url extension will be also maintained.\n\nIf you pass location argument to your function, be sure to convert it using getDestinationURL inside your method.\n','\n$cases=array(\n  null, // null will point to the same page you are on at the moment\n  \'.\',  // does same thing as null\n  \'..\',  // points to parent pagee\n  \'/\',   // point to root page (index), which can be redefined in API\n  \'test\',  // pages without prefixes are considered absolute\n  \'foo/bar\',  // pointing to 2-nd level page\n  \'/foo\',  // this also works\n  \'./foo\', // points to sub-page of a current page\n  \'../foo\',  // points to page besides current, e.g. baz/bar -> baz/foo\n);\n\n// with StickyGET you can affect any subsequent calls to getDestinationURL and pass an important piece of information.\n// Because all objects in Agile Toolkit are using getDestinationURL, this argument will be passed through forms and links\n// This however will most probably not be applied to menu, which is initialized before page content.\n$this->api->stickyGET(\'id\');\n\n$data=array();\nforeach($cases as $case){\n  $row=array();\n  $row[\'in\']=$case;\n  $row[\'out\']=$this->api->getDestinationURL($case);\n\n  // You can take out some sticky arguments by setting value of those arguments to false. \n\n  $row[\'out2\']=$this->api->getDestinationURL($case,array(\'a\'=>\'b\',\'id\'=>false));\n  $data[]=$row;\n}\n\n$g=$p->add(\'Grid\');\n$g->addColumn(\'text\',\'in\');\n$g->addColumn(\'text\',\'out\');\n$g->addColumn(\'text\',\'out2\');\n$g->setStaticSource($data);\n','Y'),(34,NULL,'ATK Icons','','','Good use of Icons can make any web application nicer and more user-friendly. Agile Toolkit includes a set of 128 icons in several styles. However it also includes a handy methods and views you can use to add icons directly on your page, inside your form or on buttons.','$paragraph=$p\n  ->add(\'HtmlElement\')\n  ->setElement(\'p\');\n\n// Icon object can be pretty much added anywhere. A system-wide color can\n// be defined in your configuration file $config[\'icon\'][\'default-color\']=\'red\';\n// However you can use setColor to override this value per icon.\n\n$paragraph->add(\'Icon\')\n  ->setColor(\'orange\')\n  ->set(\'basic-search\');\n\n$paragraph->add(\'Text\')\n  ->set(\'Google.com\');\n\n// Like with any other view, you can add it anywhere. Here we add icon inside the form\n\n$f=$p->add(\'Form\');\n$f->addField(\'line\',\'search\')\n  ->add(\'Icon\',null,\'before_field\')\n  ->setColor(\'green\')\n  ->set(\'basic-search\');\n\n// This is a standard way to adding icon to a button. However you can also use\n// $button->add(\'Icon\');\n\n$p->add(\'Button\')\n  ->set(\'With Love\')\n  ->setIcon(\'fun-heart\')\n  ->js(\'click\')->univ()->dialogURL(\'More Icons\',\n    $this->api->getDestinationURL(\'icons\'));\n\n// Finally - icon obeys any JS bindings you may put on them. For example icons below\n// will change shape and color when you move mouse over them\n\n$p->add(\'HtmlElement\')->setElement(\'h2\')->set(\'Move mouse over the icon\');\n\n$i1=$p->add(\'Icon\')->set(\'fun-moon\');\n$i1->js(\'mouseenter\')->removeClass(\'atk-icon-fun-moon\')->addClass(\'atk-icon-fun-sun\');\n$i1->js(\'mouseleave\')->removeClass(\'atk-icon-fun-sun\')->addClass(\'atk-icon-fun-moon\');\n\n$i2=$p->add(\'Icon\')->set(\'tech-power\')->setColor(\'cyan\');\n$i2->js(\'mouseenter\')->removeClass(\'atk-icons-cyan\')->addClass(\'atk-icons-nobg\');\n$i2->js(\'mouseleave\')->removeClass(\'atk-icons-nobg\')->addClass(\'atk-icons-cyan\');','Y');
/*!40000 ALTER TABLE `doc_howto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `example_request`
--

DROP TABLE IF EXISTS `example_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `example_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suggestion` text,
  `posted` date DEFAULT NULL,
  `deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `example_request`
--

LOCK TABLES `example_request` WRITE;
/*!40000 ALTER TABLE `example_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `example_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `descr` text,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filestore_file`
--

DROP TABLE IF EXISTS `filestore_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filestore_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filestore_type_id` int(11) NOT NULL DEFAULT '0',
  `filestore_volume_id` int(11) NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `original_filename` varchar(255) DEFAULT NULL,
  `filesize` int(11) NOT NULL DEFAULT '0',
  `filenum` int(11) NOT NULL DEFAULT '0',
  `deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filestore_file`
--

LOCK TABLES `filestore_file` WRITE;
/*!40000 ALTER TABLE `filestore_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `filestore_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filestore_type`
--

DROP TABLE IF EXISTS `filestore_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filestore_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mime_type` varchar(64) NOT NULL DEFAULT '',
  `extension` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filestore_type`
--

LOCK TABLES `filestore_type` WRITE;
/*!40000 ALTER TABLE `filestore_type` DISABLE KEYS */;
INSERT INTO `filestore_type` VALUES (1,'image','image/jpeg','image'),(2,'png','image/png','png'),(3,'gif','image/gif','gif');
/*!40000 ALTER TABLE `filestore_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filestore_volume`
--

DROP TABLE IF EXISTS `filestore_volume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filestore_volume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `dirname` varchar(255) NOT NULL DEFAULT '',
  `total_space` bigint(20) NOT NULL DEFAULT '0',
  `used_space` bigint(20) NOT NULL DEFAULT '0',
  `stored_files_cnt` int(11) NOT NULL DEFAULT '0',
  `enabled` enum('Y','N') DEFAULT 'Y',
  `last_filenum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filestore_volume`
--

LOCK TABLES `filestore_volume` WRITE;
/*!40000 ALTER TABLE `filestore_volume` DISABLE KEYS */;
INSERT INTO `filestore_volume` VALUES (1,'default','/tmp/atk4demo',1000000000,0,63,'Y',NULL);
/*!40000 ALTER TABLE `filestore_volume` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intimate`
--

DROP TABLE IF EXISTS `intimate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intimate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `impact` varchar(255) DEFAULT NULL,
  `feedback` text,
  `proj` varchar(10) DEFAULT NULL,
  `decide` varchar(10) DEFAULT NULL,
  `subscribe` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intimate`
--

LOCK TABLES `intimate` WRITE;
/*!40000 ALTER TABLE `intimate` DISABLE KEYS */;
/*!40000 ALTER TABLE `intimate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee` enum('Y','N') DEFAULT 'Y',
  `salary` decimal(8,2) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `days_worked` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=370 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `descr` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_update`
--

DROP TABLE IF EXISTS `project_update`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_update` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `d` date DEFAULT NULL,
  `features` decimal(8,4) DEFAULT NULL,
  `budget` decimal(8,4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_update_project` (`project_id`),
  CONSTRAINT `fk_project_update_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_update`
--

LOCK TABLES `project_update` WRITE;
/*!40000 ALTER TABLE `project_update` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_update` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(8,2) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=228 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salary`
--

LOCK TABLES `salary` WRITE;
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT 'M',
  `manager_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manager_id_fk` (`manager_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-04-13 22:13:24
