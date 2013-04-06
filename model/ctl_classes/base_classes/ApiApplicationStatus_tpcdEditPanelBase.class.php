<?php
class ApiApplicationStatus_tpcdEditPanelBase extends MJaxPanel{
	protected $objApiApplicationStatus_tpcd = null;
    
    	
    	public $intIdApplicaitonStatusTypeCd = null;
   		
    	
	
    	
    	
    	public $txtShortDesc = null;
   		
	
	
	
  		public $lnkViewChildApiApplication = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objApiApplicationStatus_tpcd = null){
		parent::__construct($objParentControl);
		$this->objApiApplicationStatus_tpcd = $objApiApplicationStatus_tpcd;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/ApiApplicationStatus_tpcdEditPanelBase.tpl.php';
		
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
		if(is_null($this->objApiApplicationStatus_tpcd)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	  
	  if(!is_null($this->objApiApplicationStatus_tpcd)){
	     
	  	
  		
  			$this->intIdApplicaitonStatusTypeCd = $this->objApiApplicationStatus_tpcd->idApplicaitonStatusTypeCd;
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objApiApplicationStatus_tpcd->shortDesc;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objApiApplicationStatus_tpcd->i)){
	   
  		
		$this->lnkViewChildApiApplication = new MJaxLinkButton($this);
		$this->lnkViewChildApiApplication->Text = 'View ApiApplications';
		$this->lnkViewChildApiApplication->Href = __ENTITY_MODEL_DIR__ . '/ApiApplicationStatus_tpcd/' . $this->objApiApplicationStatus_tpcd->idApplicationStatusTypeCd . '/ApiApplications';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objApiApplicationStatus_tpcd)){
			//Create a new one
			$this->objApiApplicationStatus_tpcd = new ApiApplicationStatus_tpcd();
		}

  		  
  		
		  
  		 
      	$this->objApiApplicationStatus_tpcd->shortDesc = $this->txtShortDesc->Text;
		
		
		$this->objApiApplicationStatus_tpcd->Save();
  	}
  	public function btnDelete_click(){
  		$this->objApiApplicationStatus_tpcd->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objApiApplicationStatus_tpcd);
  	}
  	
}
?>