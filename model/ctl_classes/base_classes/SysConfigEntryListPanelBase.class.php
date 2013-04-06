<?php
class SysConfigEntryListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrSysConfigEntrys = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrSysConfigEntrys);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idSysConfigEntry','idSysConfigEntry');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('name','name');
	   		
		
	    	
	    	
	    	$this->AddColumn('value','value');
	   		
		
	    	
	    	
	    	$this->AddColumn('modDate','modDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/SysConfigEntry/' . $strActionParameter);
	}
	
  	
}
?>