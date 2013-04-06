<?php
class SpinOptionListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrSpinOptions = array()){
	
		parent::__construct($objParentControl);
		
		$this->SetupCols();
		$this->SetDataEntites($arrSpinOptions);
		foreach($this->Rows as $intIndex => $objRow){
			$objRow->AddAction($this, 'objRow_click');
		}

	}
	public function SetupCols(){
		
	    	
	    	$this->AddColumn('idSpinOption','idSpinOption');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idVenue','idVenue');
	   		
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('icon','icon');
	   		
		
	    	
	    	
	    	$this->AddColumn('longDesc','longDesc');
	   		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/SpinOption/' . $strActionParameter);
	}
	
  	
}
?>