<?php
class RoundListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrRounds = array()){
		
		
	    	
	    	$this->AddColumn('idRound','idRound');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idAccount','idAccount');
	   		
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('longDesc','longDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrRounds);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/Round/' . $strActionParameter);
	}
	
  	
}
?>