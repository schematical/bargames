<?php
class AnswerEditPanelBase extends MJaxPanel{
	protected $objAnswer = null;
    
    	
    	public $intIdAnswer = null;
   		
    	
	
    	
    	
    	public $txtIdQuestion = null;
   		
	
    	
    	
    	public $txtIdTeam = null;
   		
	
    	
    	
    	public $txtBody = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtPoints = null;
   		
	
	
   		public $lnkViewParentAnswer = null;
	
   		public $lnkViewParentAnswer = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objAnswer = null){
		parent::__construct($objParentControl);
		$this->objAnswer = $objAnswer;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/AnswerEditPanelBase.tpl.php';
		}
		$this->CreateFieldControls();
		$this->CreateContentControls();
		$this->CreateReferenceControls();
		
	}
	public function CreateContentControls(){
		$this->btnSave = new MJaxButton($this);
		$this->btnSave->Text = 'Save';
		$this->btnSave->AddAction(new MJaxClickEvent(), new MJaxServerControlAction($this, 'btnSave_click'));
		
		
		$this->btnDelete = new MJaxButton($this);
		$this->btnDelete->Text = 'Delete';
		$this->btnDelete->AddAction(new MJaxClickEvent(), new MJaxServerControlAction($this, 'btnDelete_click'));
		if(is_null($this->objAnswer)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdQuestion = new MJaxTextBox($this);
	  		$this->txtIdQuestion->Name = 'idQuestion';
  		
	     
	  	
	  		$this->txtIdTeam = new MJaxTextBox($this);
	  		$this->txtIdTeam->Name = 'idTeam';
  		
	     
	  	
	  		$this->txtBody = new MJaxTextBox($this);
	  		$this->txtBody->Name = 'body';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtPoints = new MJaxTextBox($this);
	  		$this->txtPoints->Name = 'points';
  		
	  
	  if(!is_null($this->objAnswer)){
	     
	  	
  		
  			$this->intIdAnswer = $this->objAnswer->idAnswer;
  		
  		
	     
	  		  		
	  		$this->txtIdQuestion->Text = $this->objAnswer->idQuestion;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdTeam->Text = $this->objAnswer->idTeam;
  		
  		
  		
	     
	  		  		
	  		$this->txtBody->Text = $this->objAnswer->body;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objAnswer->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtPoints->Text = $this->objAnswer->points;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objAnswer->idQuestion)){
   			$this->lnkViewParentAnswer = new MJaxLinkButton($this);
   			$this->lnkViewParentAnswer->Text = 'View Question';
   			$this->lnkViewParentAnswer->Href = __ENTITY_MODEL_DIR__ . '/Question/' . $this->objAnswer->idQuestion;  
   		}
	  
  		if(!is_null($this->objAnswer->idTeam)){
   			$this->lnkViewParentAnswer = new MJaxLinkButton($this);
   			$this->lnkViewParentAnswer->Text = 'View Team';
   			$this->lnkViewParentAnswer->Href = __ENTITY_MODEL_DIR__ . '/Team/' . $this->objAnswer->idTeam;  
   		}
	  
	 // if(!is_null($this->objAnswer->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objAnswer)){
			//Create a new one
			$this->objAnswer = new Answer();
		}

  		  
  		
		  
  		 
      	$this->objAnswer->idQuestion = $this->txtIdQuestion->Text;
		
		  
  		 
      	$this->objAnswer->idTeam = $this->txtIdTeam->Text;
		
		  
  		 
      	$this->objAnswer->body = $this->txtBody->Text;
		
		  
  		 
      	$this->objAnswer->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objAnswer->points = $this->txtPoints->Text;
		
		
		$this->objAnswer->Save();
  	}
  	public function btnDelete_click(){
  		$this->objAnswer->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objAnswer);
  	}
  	
}
?>