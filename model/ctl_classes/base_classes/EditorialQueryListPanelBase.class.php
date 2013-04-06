<?php
class EditorialQueryListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrEditorialQuerys = array()){
		
		
	    	
	    	$this->AddColumn('idEditorialQuery','idEditorialQuery');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('deadlineDate','deadlineDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('idReporter','idReporter');
	   		
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('query','query');
	   		
		
	    	
	    	
	    	$this->AddColumn('requirements','requirements');
	   		
		
	    	
	    	
	    	$this->AddColumn('category','category');
	   		
		
	    	
	    	
	    	$this->AddColumn('contactInfo','contactInfo');
	   		
		
	    	
	    	
	    	$this->AddColumn('alertedDate','alertedDate');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrEditorialQuerys);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/EditorialQuery/' . $strActionParameter);
	}
	
  	
}
?>