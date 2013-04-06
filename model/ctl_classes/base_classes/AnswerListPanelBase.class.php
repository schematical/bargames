<?php
class AnswerListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrAnswers = array()){
		
		
	    	
	    	$this->AddColumn('idAnswer','idAnswer');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idQuestion','idQuestion');
	   		
		
	    	
	    	
	    	$this->AddColumn('idTeam','idTeam');
	   		
		
	    	
	    	
	    	$this->AddColumn('body','body');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('points','points');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrAnswers);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/Answer/' . $strActionParameter);
	}
	
  	
}
?>