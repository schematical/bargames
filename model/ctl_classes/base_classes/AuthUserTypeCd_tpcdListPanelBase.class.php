<?php
class AuthUserTypeCd_tpcdListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrAuthUserTypeCd_tpcds = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrAuthUserTypeCd_tpcds);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idUserTypeCd','idUserTypeCd');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/AuthUserTypeCd_tpcd/' . $strActionParameter);
	}
	
  	
}
?>