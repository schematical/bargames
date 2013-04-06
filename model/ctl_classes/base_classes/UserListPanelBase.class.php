<?php
class UserListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrUsers = array()){
		
		
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('email','email');
	   		
		
	    	
	    	
	    	$this->AddColumn('twitter','twitter');
	   		
		
	    	
	    	
	    	$this->AddColumn('token','token');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrUsers);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/User/' . $strActionParameter);
	}
	
  	
}
?>