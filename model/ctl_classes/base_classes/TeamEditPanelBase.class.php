<?php
class TeamEditPanelBase extends MJaxPanel{
	protected $objTeam = null;
    
    	
    	public $intIdTeam = null;
   		
    	
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $txtIdCaptainUser = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
	
	
  		public $lnkViewChildAnswer = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objTeam = null){
		parent::__construct($objParentControl);
		$this->objTeam = $objTeam;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/TeamEditPanelBase.tpl.php';
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
		if(is_null($this->objTeam)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this->txtIdCaptainUser = new MJaxTextBox($this);
	  		$this->txtIdCaptainUser->Name = 'idCaptainUser';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	  
	  if(!is_null($this->objTeam)){
	     
	  	
  		
  			$this->intIdTeam = $this->objTeam->idTeam;
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objTeam->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdCaptainUser->Text = $this->objTeam->idCaptainUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objTeam->creDate;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objTeam->i)){
	   
  		
		$this->lnkViewChildAnswer = new MJaxLinkButton($this);
		$this->lnkViewChildAnswer->Text = 'View Answers';
		$this->lnkViewChildAnswer->Href = __ENTITY_MODEL_DIR__ . '/Team/' . $this->objTeam->idTeam . '/Answers';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objTeam)){
			//Create a new one
			$this->objTeam = new Team();
		}

  		  
  		
		  
  		 
      	$this->objTeam->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objTeam->idCaptainUser = $this->txtIdCaptainUser->Text;
		
		  
  		 
      	$this->objTeam->creDate = $this->txtCreDate->Text;
		
		
		$this->objTeam->Save();
  	}
  	public function btnDelete_click(){
  		$this->objTeam->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objTeam);
  	}
  	
}
?>