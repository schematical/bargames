<?php
class AuthAccountListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrAuthAccounts = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrAuthAccounts);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idAccount','idAccount');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('aws_id','aws_id');
	   		
		
	    	
	    	
	    	$this->AddColumn('idAccountTypeCd','idAccountTypeCd');
	   		
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/AuthAccount/' . $strActionParameter);
	}
	
  	
}
?>