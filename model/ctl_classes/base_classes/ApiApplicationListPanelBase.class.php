<?php
class ApiApplicationListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrApiApplications = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrApiApplications);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idApplication','idApplication');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idDeveloper','idDeveloper');
	   		
		
	    	
	    	
	    	$this->AddColumn('name','name');
	   		
		
	    	
	    	
	    	$this->AddColumn('desc','desc');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('idApplicationStatusTypeCd','idApplicationStatusTypeCd');
	   		
		
	    	
	    	
	    	$this->AddColumn('consumerKey','consumerKey');
	   		
		
	    	
	    	
	    	$this->AddColumn('consumerSecret','consumerSecret');
	   		
		
	    	
	    	
	    	$this->AddColumn('domain','domain');
	   		
		
	    	
	    	
	    	$this->AddColumn('callback_url','callback_url');
	   		
		
	    	
	    	
	    	$this->AddColumn('namespace','namespace');
	   		
		
	    	
	    	
	    	$this->AddColumn('idApplicationPermissionLevel','idApplicationPermissionLevel');
	   		
		
	    	
	    	
	    	$this->AddColumn('iframe_url','iframe_url');
	   		
		
	    	
	    	
	    	$this->AddColumn('bartender_url','bartender_url');
	   		
		
	    	
	    	
	    	$this->AddColumn('player_url','player_url');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/ApiApplication/' . $strActionParameter);
	}
	
  	
}
?>