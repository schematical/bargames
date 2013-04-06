<?php
class ApiApplicationPermissionLevel_tpcdEditPanelBase extends MJaxPanel{
	protected $objApiApplicationPermissionLevel_tpcd = null;
    
    	
    	public $intIdApplicationPermissionLevel = null;
   		
    	
	
    	
    	
    	public $txtShrotDesc = null;
   		
	
	
	
  		public $lnkViewChildApiApplication = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objApiApplicationPermissionLevel_tpcd = null){
		parent::__construct($objParentControl);
		$this->objApiApplicationPermissionLevel_tpcd = $objApiApplicationPermissionLevel_tpcd;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/ApiApplicationPermissionLevel_tpcdEditPanelBase.tpl.php';
		
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
		if(is_null($this->objApiApplicationPermissionLevel_tpcd)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShrotDesc = new MJaxTextBox($this);
	  		$this->txtShrotDesc->Name = 'shrotDesc';
  		
	  
	  if(!is_null($this->objApiApplicationPermissionLevel_tpcd)){
	     
	  	
  		
  			$this->intIdApplicationPermissionLevel = $this->objApiApplicationPermissionLevel_tpcd->idApplicationPermissionLevel;
  		
  		
	     
	  		  		
	  		$this->txtShrotDesc->Text = $this->objApiApplicationPermissionLevel_tpcd->shrotDesc;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objApiApplicationPermissionLevel_tpcd->i)){
	   
  		
		$this->lnkViewChildApiApplication = new MJaxLinkButton($this);
		$this->lnkViewChildApiApplication->Text = 'View ApiApplications';
		$this->lnkViewChildApiApplication->Href = __ENTITY_MODEL_DIR__ . '/ApiApplicationPermissionLevel_tpcd/' . $this->objApiApplicationPermissionLevel_tpcd->idApplicationPermissionLevel . '/ApiApplications';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objApiApplicationPermissionLevel_tpcd)){
			//Create a new one
			$this->objApiApplicationPermissionLevel_tpcd = new ApiApplicationPermissionLevel_tpcd();
		}

  		  
  		
		  
  		 
      	$this->objApiApplicationPermissionLevel_tpcd->shrotDesc = $this->txtShrotDesc->Text;
		
		
		$this->objApiApplicationPermissionLevel_tpcd->Save();
  	}
  	public function btnDelete_click(){
  		$this->objApiApplicationPermissionLevel_tpcd->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objApiApplicationPermissionLevel_tpcd);
  	}
  	
}
?>