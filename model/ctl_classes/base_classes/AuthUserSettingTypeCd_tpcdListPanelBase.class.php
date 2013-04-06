<?php
class AuthUserSettingTypeCd_tpcdListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrAuthUserSettingTypeCd_tpcds = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrAuthUserSettingTypeCd_tpcds);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idUserSettingType','idUserSettingType');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/AuthUserSettingTypeCd_tpcd/' . $strActionParameter);
	}
	
  	
}
?>