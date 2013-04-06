<?php
class ApiApplicationStatus_tpcdListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrApiApplicationStatus_tpcds = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrApiApplicationStatus_tpcds);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idApplicaitonStatusTypeCd','idApplicaitonStatusTypeCd');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/ApiApplicationStatus_tpcd/' . $strActionParameter);
	}
	
  	
}
?>