<?
class page_doc_grid extends Doc_Page {
	function init(){
		parent::init();
        $this->api->dbConnect();

        $this->sidebar->template->set('title','Grid Documentation');
		$this->subPage('quick_start','Grid Quick Start') ;
		$this->subPage('columns','Standard Columns') ;
		$this->subPage('enhancing','Enhancing Grid') ;
		$this->subPage('interaction','Interacting with Views') ;
		$this->subPage('models','Model-based Grid') ;
		$this->subPage('styling','Styling and layouts') ;
		$this->subPage('ajax','AJAX and Dynamics') ;
		$this->subPage('limitations') ;

	}
    function initMainPage(){
        $this->api->redirect('./quick_start');
    }
    function defaultTemplate(){
		$top_page=str_replace('page_','', get_class($this));
        if($this->api->page!=$top_page){
            // subpage
            $sub_page=str_replace($top_page.'_','',$this->api->page);
            return array('page/'.str_replace('_','/',$top_page).'/'.$sub_page);
        }
        return parent::defaultTemplate(); //array('page/'.str_replace('_','/',$this->api->page));
    }
    function render(){
        if($_GET['button'])return $this->js()->univ()->alert('Nothing happened :)')->execute();
        parent::render();
    }
}
