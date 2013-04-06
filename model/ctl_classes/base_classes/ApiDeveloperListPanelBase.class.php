<?php
class ApiDeveloperListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrApiDevelopers = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrApiDevelopers);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idDeveloper','idDeveloper');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idAccount','idAccount');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/ApiDeveloper/' . $strActionParameter);
	}
	
  	
}
?>