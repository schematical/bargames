<?php
class AuthSessionListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrAuthSessions = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrAuthSessions);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idSession','idSession');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('startDate','startDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('endDate','endDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
	    	
	    	
	    	$this->AddColumn('sessionKey','sessionKey');
	   		
		
	    	
	    	
	    	$this->AddColumn('ipAddress','ipAddress');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/AuthSession/' . $strActionParameter);
	}
	
  	
}
?>