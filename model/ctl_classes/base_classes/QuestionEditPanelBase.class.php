<?php
class QuestionEditPanelBase extends MJaxPanel{
	protected $objQuestion = null;
    
    	
    	public $intIdQuestion = null;
   		
    	
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $txtLongDesc = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtIdRound = null;
   		
	
    	
    	
    	public $txtAnswer = null;
   		
	
	
   		public $lnkViewParentQuestion = null;
	
	
  		public $lnkViewChildAnswer = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objQuestion = null){
		parent::__construct($objParentControl);
		$this->objQuestion = $objQuestion;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/QuestionEditPanelBase.tpl.php';
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
		if(is_null($this->objQuestion)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this->txtLongDesc = new MJaxTextBox($this);
	  		$this->txtLongDesc->Name = 'longDesc';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtIdRound = new MJaxTextBox($this);
	  		$this->txtIdRound->Name = 'idRound';
  		
	     
	  	
	  		$this->txtAnswer = new MJaxTextBox($this);
	  		$this->txtAnswer->Name = 'answer';
  		
	  
	  if(!is_null($this->objQuestion)){
	     
	  	
  		
  			$this->intIdQuestion = $this->objQuestion->idQuestion;
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objQuestion->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtLongDesc->Text = $this->objQuestion->longDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objQuestion->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdRound->Text = $this->objQuestion->idRound;
  		
  		
  		
	     
	  		  		
	  		$this->txtAnswer->Text = $this->objQuestion->answer;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objQuestion->idRound)){
   			$this->lnkViewParentQuestion = new MJaxLinkButton($this);
   			$this->lnkViewParentQuestion->Text = 'View Round';
   			$this->lnkViewParentQuestion->Href = __ENTITY_MODEL_DIR__ . '/Round/' . $this->objQuestion->idRound;  
   		}
	  
	 // if(!is_null($this->objQuestion->i)){
	   
  		
		$this->lnkViewChildAnswer = new MJaxLinkButton($this);
		$this->lnkViewChildAnswer->Text = 'View Answers';
		$this->lnkViewChildAnswer->Href = __ENTITY_MODEL_DIR__ . '/Question/' . $this->objQuestion->idQuestion . '/Answers';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objQuestion)){
			//Create a new one
			$this->objQuestion = new Question();
		}

  		  
  		
		  
  		 
      	$this->objQuestion->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objQuestion->longDesc = $this->txtLongDesc->Text;
		
		  
  		 
      	$this->objQuestion->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objQuestion->idRound = $this->txtIdRound->Text;
		
		  
  		 
      	$this->objQuestion->answer = $this->txtAnswer->Text;
		
		
		$this->objQuestion->Save();
  	}
  	public function btnDelete_click(){
  		$this->objQuestion->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objQuestion);
  	}
  	
}
?>