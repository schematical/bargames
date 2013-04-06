<?php
class ApiUserPermissionEditPanelBase extends MJaxPanel{
	protected $objApiUserPermission = null;
    
    	
    	public $intIdUserPermission = null;
   		
    	
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtIdUserPermissionType = null;
   		
	
    	
    	
    	public $txtValue = null;
   		
	
    	
    	
    	public $txtModDateTime = null;
   		
	
	
   		public $lnkViewParentApiUserPermission = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objApiUserPermission = null){
		parent::__construct($objParentControl);
		$this->objApiUserPermission = $objApiUserPermission;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/ApiUserPermissionEditPanelBase.tpl.php';
		
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
		if(is_null($this->objApiUserPermission)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtIdUserPermissionType = new MJaxTextBox($this);
	  		$this->txtIdUserPermissionType->Name = 'idUserPermissionType';
  		
	     
	  	
	  		$this->txtValue = new MJaxTextBox($this);
	  		$this->txtValue->Name = 'value';
  		
	     
	  	
	  		$this->txtModDateTime = new MJaxTextBox($this);
	  		$this->txtModDateTime->Name = 'modDateTime';
  		
	  
	  if(!is_null($this->objApiUserPermission)){
	     
	  	
  		
  			$this->intIdUserPermission = $this->objApiUserPermission->idUserPermission;
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objApiUserPermission->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUserPermissionType->Text = $this->objApiUserPermission->idUserPermissionType;
  		
  		
  		
	     
	  		  		
	  		$this->txtValue->Text = $this->objApiUserPermission->value;
  		
  		
  		
	     
	  		  		
	  		$this->txtModDateTime->Text = $this->objApiUserPermission->modDateTime;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objApiUserPermission->idUserPermissionType)){
   			$this->lnkViewParentApiUserPermission = new MJaxLinkButton($this);
   			$this->lnkViewParentApiUserPermission->Text = 'View ApiUserPermissionType';
   			$this->lnkViewParentApiUserPermission->Href = __ENTITY_MODEL_DIR__ . '/ApiUserPermissionType/' . $this->objApiUserPermission->idUserPermissionType;  
   		}
	  
	 // if(!is_null($this->objApiUserPermission->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objApiUserPermission)){
			//Create a new one
			$this->objApiUserPermission = new ApiUserPermission();
		}

  		  
  		
		  
  		 
      	$this->objApiUserPermission->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objApiUserPermission->idUserPermissionType = $this->txtIdUserPermissionType->Text;
		
		  
  		 
      	$this->objApiUserPermission->value = $this->txtValue->Text;
		
		  
  		 
      	$this->objApiUserPermission->modDateTime = $this->txtModDateTime->Text;
		
		
		$this->objApiUserPermission->Save();
  	}
  	public function btnDelete_click(){
  		$this->objApiUserPermission->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objApiUserPermission);
  	}
  	
}
?>