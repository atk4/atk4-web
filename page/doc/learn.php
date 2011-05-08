<?
class page_doc_learn extends Doc_Page {
	function init(){
		parent::init();
        $this->api->dbConnect();

        /*
        $this->sidebar->template->set('title','Learning Agile Toolkit');
		$this->subPage('quick_start','Quick Start') ;
		$this->subPage('adding','Adding Objects') ;
		$this->subPage('..','Comming Soon') ;
        return;
		$this->subPage('understanding','Understanding') ;
		$this->subPage('enhancing','Reading Agile Toolkit') ;
		$this->subPage('interaction','') ;
		$this->subPage('models','Model-based Grid') ;
		$this->subPage('styling','Styling and layouts') ;
		$this->subPage('ajax','AJAX and Dynamics') ;
		$this->subPage('limitations') ;
        */

	}
    /*
    function initMainPage(){
      //  $this->api->redirect('./quick_start');
    }
    */
    function render(){
        if($_GET['button'])return $this->js()->univ()->alert('Nothing happened :)')->execute();
        parent::render();
    }
}
