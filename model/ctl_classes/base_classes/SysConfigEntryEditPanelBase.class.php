<?php
class SysConfigEntryEditPanelBase extends MJaxPanel{
	protected $objSysConfigEntry = null;
    
    	
    	public $intIdSysConfigEntry = null;
   		
    	
	
    	
    	
    	public $txtName = null;
   		
	
    	
    	
    	public $txtValue = null;
   		
	
    	
    	
    	public $txtModDate = null;
   		
	
    	
    	
    	public $txtIdUser = null;
   		
	
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objSysConfigEntry = null){
		parent::__construct($objParentControl);
		$this->objSysConfigEntry = $objSysConfigEntry;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/SysConfigEntryEditPanelBase.tpl.php';
		
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
		if(is_null($this->objSysConfigEntry)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtName = new MJaxTextBox($this);
	  		$this->txtName->Name = 'name';
  		
	     
	  	
	  		$this->txtValue = new MJaxTextBox($this);
	  		$this->txtValue->Name = 'value';
  		
	     
	  	
	  		$this->txtModDate = new MJaxTextBox($this);
	  		$this->txtModDate->Name = 'modDate';
  		
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	  
	  if(!is_null($this->objSysConfigEntry)){
	     
	  	
  		
  			$this->intIdSysConfigEntry = $this->objSysConfigEntry->idSysConfigEntry;
  		
  		
	     
	  		  		
	  		$this->txtName->Text = $this->objSysConfigEntry->name;
  		
  		
  		
	     
	  		  		
	  		$this->txtValue->Text = $this->objSysConfigEntry->value;
  		
  		
  		
	     
	  		  		
	  		$this->txtModDate->Text = $this->objSysConfigEntry->modDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objSysConfigEntry->idUser;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objSysConfigEntry->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objSysConfigEntry)){
			//Create a new one
			$this->objSysConfigEntry = new SysConfigEntry();
		}

  		  
  		
		  
  		 
      	$this->objSysConfigEntry->name = $this->txtName->Text;
		
		  
  		 
      	$this->objSysConfigEntry->value = $this->txtValue->Text;
		
		  
  		 
      	$this->objSysConfigEntry->modDate = $this->txtModDate->Text;
		
		  
  		 
      	$this->objSysConfigEntry->idUser = $this->txtIdUser->Text;
		
		
		$this->objSysConfigEntry->Save();
  	}
  	public function btnDelete_click(){
  		$this->objSysConfigEntry->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objSysConfigEntry);
  	}
  	
}
?>