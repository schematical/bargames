<?php
class ApiApplicationPermissionLevel_tpcdListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrApiApplicationPermissionLevel_tpcds = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrApiApplicationPermissionLevel_tpcds);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idApplicationPermissionLevel','idApplicationPermissionLevel');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('shrotDesc','shrotDesc');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/ApiApplicationPermissionLevel_tpcd/' . $strActionParameter);
	}
	
  	
}
?>