<?php
class VenueListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrVenues = array()){
		
		
	    	
	    	$this->AddColumn('idVenue','idVenue');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('hash','hash');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrVenues);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/Venue/' . $strActionParameter);
	}
	
  	
}
?>