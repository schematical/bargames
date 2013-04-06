<?php
class ApiUserPermissionTypeListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrApiUserPermissionTypes = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrApiUserPermissionTypes);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idUserPermissionType','idUserPermissionType');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('longDesc','longDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('default','default');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/ApiUserPermissionType/' . $strActionParameter);
	}
	
  	
}
?>