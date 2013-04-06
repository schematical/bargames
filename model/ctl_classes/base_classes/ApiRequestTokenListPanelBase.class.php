<?php
class ApiRequestTokenListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrApiRequestTokens = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrApiRequestTokens);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idApiRequestToken','idApiRequestToken');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('oauth_token','oauth_token');
	   		
		
	    	
	    	
	    	$this->AddColumn('oauth_token_secret','oauth_token_secret');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('expDate','expDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('idApplication','idApplication');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/ApiRequestToken/' . $strActionParameter);
	}
	
  	
}
?>