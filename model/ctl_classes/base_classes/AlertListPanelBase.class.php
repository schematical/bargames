<?php
class AlertListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrAlerts = array()){
		
		
	    	
	    	$this->AddColumn('idAlert','idAlert');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
	    	
	    	
	    	$this->AddColumn('keyword','keyword');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('include','include');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrAlerts);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/Alert/' . $strActionParameter);
	}
	
  	
}
?>