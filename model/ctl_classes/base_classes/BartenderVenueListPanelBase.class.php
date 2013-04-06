<?php
class BartenderVenueListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrBartenderVenues = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrBartenderVenues);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idBartenderVenue','idBartenderVenue');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idVenue','idVenue');
	   		
		
	    	
	    	
	    	$this->AddColumn('idBartender','idBartender');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/BartenderVenue/' . $strActionParameter);
	}
	
  	
}
?>