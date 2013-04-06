<?php
class ApiCallListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrApiCalls = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrApiCalls);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idApiCall','idApiCall');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('exeTime','exeTime');
	   		
		
	    	
	    	
	    	$this->AddColumn('requestUri','requestUri');
	   		
		
	    	
	    	
	    	$this->AddColumn('postData','postData');
	   		
		
	    	
	    	
	    	$this->AddColumn('responseData','responseData');
	   		
		
	    	
	    	
	    	$this->AddColumn('idApplication','idApplication');
	   		
		
	    	
	    	
	    	$this->AddColumn('idTrackingEvent','idTrackingEvent');
	   		
		
	    	
	    	
	    	$this->AddColumn('user_agent','user_agent');
	   		
		
	    	
	    	
	    	$this->AddColumn('lat','lat');
	   		
		
	    	
	    	
	    	$this->AddColumn('lng','lng');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/ApiCall/' . $strActionParameter);
	}
	
  	
}
?>