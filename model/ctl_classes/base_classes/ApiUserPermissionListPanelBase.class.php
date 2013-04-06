<?php
class ApiUserPermissionListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrApiUserPermissions = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrApiUserPermissions);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idUserPermission','idUserPermission');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
	    	
	    	
	    	$this->AddColumn('idUserPermissionType','idUserPermissionType');
	   		
		
	    	
	    	
	    	$this->AddColumn('value','value');
	   		
		
	    	
	    	
	    	$this->AddColumn('modDateTime','modDateTime');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/ApiUserPermission/' . $strActionParameter);
	}
	
  	
}
?>