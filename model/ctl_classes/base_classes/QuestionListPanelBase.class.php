<?php
class QuestionListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrQuestions = array()){
		
		
	    	
	    	$this->AddColumn('idQuestion','idQuestion');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('longDesc','longDesc');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('idRound','idRound');
	   		
		
	    	
	    	
	    	$this->AddColumn('answer','answer');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrQuestions);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/Question/' . $strActionParameter);
	}
	
  	
}
?>