<?php
class ApiUserPermissionTypeEditPanelBase extends MJaxPanel{
	protected $objApiUserPermissionType = null;
    
    	
    	public $intIdUserPermissionType = null;
   		
    	
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $ = null;
   		
	
    	
    	
    	public $ = null;
   		
	
	
	
  		public $lnkViewChildApiUserPermission = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objApiUserPermissionType = null){
		parent::__construct($objParentControl);
		$this->objApiUserPermissionType = $objApiUserPermissionType;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/ApiUserPermissionTypeEditPanelBase.tpl.php';
		
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
		if(is_null($this->objApiUserPermissionType)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this-> = new MJaxTextBox($this);
	  		$this->->Name = 'longDesc';
  		
	     
	  	
	  		$this-> = new MJaxTextBox($this);
	  		$this->->Name = 'default';
  		
	  
	  if(!is_null($this->objApiUserPermissionType)){
	     
	  	
  		
  			$this->intIdUserPermissionType = $this->objApiUserPermissionType->idUserPermissionType;
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objApiUserPermissionType->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->->Text = $this->objApiUserPermissionType->longDesc;
  		
  		
  		
	     
	  		  		
	  		$this->->Text = $this->objApiUserPermissionType->default;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objApiUserPermissionType->i)){
	   
  		
		$this->lnkViewChildApiUserPermission = new MJaxLinkButton($this);
		$this->lnkViewChildApiUserPermission->Text = 'View ApiUserPermissions';
		$this->lnkViewChildApiUserPermission->Href = __ENTITY_MODEL_DIR__ . '/ApiUserPermissionType/' . $this->objApiUserPermissionType->idUserPermissionType . '/ApiUserPermissions';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objApiUserPermissionType)){
			//Create a new one
			$this->objApiUserPermissionType = new ApiUserPermissionType();
		}

  		  
  		
		  
  		 
      	$this->objApiUserPermissionType->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objApiUserPermissionType->longDesc = $this->->Text;
		
		  
  		 
      	$this->objApiUserPermissionType->default = $this->->Text;
		
		
		$this->objApiUserPermissionType->Save();
  	}
  	public function btnDelete_click(){
  		$this->objApiUserPermissionType->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objApiUserPermissionType);
  	}
  	
}
?>