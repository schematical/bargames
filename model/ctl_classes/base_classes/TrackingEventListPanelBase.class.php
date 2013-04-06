<?php
class TrackingEventListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrTrackingEvents = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrTrackingEvents);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idTrackingEvent','idTrackingEvent');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('name','name');
	   		
		
	    	
	    	
	    	$this->AddColumn('value','value');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
	    	
	    	
	    	$this->AddColumn('idSession','idSession');
	   		
		
	    	
	    	
	    	$this->AddColumn('idApplication','idApplication');
	   		
		
	    	
	    	
	    	$this->AddColumn('app','app');
	   		
		
	    	
	    	
	    	$this->AddColumn('form','form');
	   		
		
	    	
	    	
	    	$this->AddColumn('controlId','controlId');
	   		
		
	    	
	    	
	    	$this->AddColumn('text','text');
	   		
		
	    	
	    	
	    	$this->AddColumn('event','event');
	   		
		
	    	
	    	
	    	$this->AddColumn('ref','ref');
	   		
		
	    	
	    	
	    	$this->AddColumn('utma','utma');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/TrackingEvent/' . $strActionParameter);
	}
	
  	
}
?>