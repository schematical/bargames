<?php
class AuthUserListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrAuthUsers = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrAuthUsers);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('email','email');
	   		
		
	    	
	    	
	    	$this->AddColumn('password','password');
	   		
		
	    	
	    	
	    	$this->AddColumn('idAccount','idAccount');
	   		
		
	    	
	    	
	    	$this->AddColumn('idUserTypeCd','idUserTypeCd');
	   		
		
	    	
	    	
	    	$this->AddColumn('username','username');
	   		
		
	    	
	    	
	    	$this->AddColumn('passResetCode','passResetCode');
	   		
		
	    	
	    	
	    	$this->AddColumn('active','active');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/AuthUser/' . $strActionParameter);
	}
	
  	
}
?>