<?php
class VenuListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrVenus = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrVenus);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idVenue','idVenue');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('namespace','namespace');
	   		
		
	    	
	    	
	    	$this->AddColumn('idAccount','idAccount');
	   		
		
	    	
	    	
	    	$this->AddColumn('currGameNamespace','currGameNamespace');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/Venu/' . $strActionParameter);
	}
	
  	
}
?>