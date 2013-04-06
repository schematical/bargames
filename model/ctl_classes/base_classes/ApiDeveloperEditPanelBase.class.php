<?php
class ApiDeveloperEditPanelBase extends MJaxPanel{
	protected $objApiDeveloper = null;
    
    	
    	public $intIdDeveloper = null;
   		
    	
	
    	
    	
    	public $txtIdAccount = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
	
	
  		public $lnkViewChildApiApplication = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objApiDeveloper = null){
		parent::__construct($objParentControl);
		$this->objApiDeveloper = $objApiDeveloper;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/ApiDeveloperEditPanelBase.tpl.php';
		
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
		if(is_null($this->objApiDeveloper)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdAccount = new MJaxTextBox($this);
	  		$this->txtIdAccount->Name = 'idAccount';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	  
	  if(!is_null($this->objApiDeveloper)){
	     
	  	
  		
  			$this->intIdDeveloper = $this->objApiDeveloper->idDeveloper;
  		
  		
	     
	  		  		
	  		$this->txtIdAccount->Text = $this->objApiDeveloper->idAccount;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objApiDeveloper->creDate;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objApiDeveloper->i)){
	   
  		
		$this->lnkViewChildApiApplication = new MJaxLinkButton($this);
		$this->lnkViewChildApiApplication->Text = 'View ApiApplications';
		$this->lnkViewChildApiApplication->Href = __ENTITY_MODEL_DIR__ . '/ApiDeveloper/' . $this->objApiDeveloper->idDeveloper . '/ApiApplications';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objApiDeveloper)){
			//Create a new one
			$this->objApiDeveloper = new ApiDeveloper();
		}

  		  
  		
		  
  		 
      	$this->objApiDeveloper->idAccount = $this->txtIdAccount->Text;
		
		  
  		 
      	$this->objApiDeveloper->creDate = $this->txtCreDate->Text;
		
		
		$this->objApiDeveloper->Save();
  	}
  	public function btnDelete_click(){
  		$this->objApiDeveloper->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objApiDeveloper);
  	}
  	
}
?>