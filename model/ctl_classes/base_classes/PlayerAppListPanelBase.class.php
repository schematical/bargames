<?php
class PlayerAppListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrPlayerApps = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrPlayerApps);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idPlayerApp','idPlayerApp');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idPlayer','idPlayer');
	   		
		
	    	
	    	
	    	$this->AddColumn('idApp','idApp');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/PlayerApp/' . $strActionParameter);
	}
	
  	
}
?>