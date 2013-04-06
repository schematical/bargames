<?php
class StripeDataEditPanelBase extends MJaxPanel{
	protected $objStripeData = null;
    
    	
    	public $intIdStripeData = null;
   		
    	
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtIdParentStripeData = null;
   		
	
    	
    	
    	public $txtStripeId = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtObject = null;
   		
	
    	
    	
    	public $txtData = null;
   		
	
    	
    	
    	public $txtMode = null;
   		
	
    	
    	
    	public $txtInstance_url = null;
   		
	
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objStripeData = null){
		parent::__construct($objParentControl);
		$this->objStripeData = $objStripeData;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/StripeDataEditPanelBase.tpl.php';
		
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
		if(is_null($this->objStripeData)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtIdParentStripeData = new MJaxTextBox($this);
	  		$this->txtIdParentStripeData->Name = 'idParentStripeData';
  		
	     
	  	
	  		$this->txtStripeId = new MJaxTextBox($this);
	  		$this->txtStripeId->Name = 'stripeId';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtObject = new MJaxTextBox($this);
	  		$this->txtObject->Name = 'object';
  		
	     
	  	
	  		$this->txtData = new MJaxTextBox($this);
	  		$this->txtData->Name = 'data';
  		
	     
	  	
	  		$this->txtMode = new MJaxTextBox($this);
	  		$this->txtMode->Name = 'mode';
  		
	     
	  	
	  		$this->txtInstance_url = new MJaxTextBox($this);
	  		$this->txtInstance_url->Name = 'instance_url';
  		
	  
	  if(!is_null($this->objStripeData)){
	     
	  	
  		
  			$this->intIdStripeData = $this->objStripeData->idStripeData;
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objStripeData->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdParentStripeData->Text = $this->objStripeData->idParentStripeData;
  		
  		
  		
	     
	  		  		
	  		$this->txtStripeId->Text = $this->objStripeData->stripeId;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objStripeData->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtObject->Text = $this->objStripeData->object;
  		
  		
  		
	     
	  		  		
	  		$this->txtData->Text = $this->objStripeData->data;
  		
  		
  		
	     
	  		  		
	  		$this->txtMode->Text = $this->objStripeData->mode;
  		
  		
  		
	     
	  		  		
	  		$this->txtInstance_url->Text = $this->objStripeData->instance_url;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objStripeData->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objStripeData)){
			//Create a new one
			$this->objStripeData = new StripeData();
		}

  		  
  		
		  
  		 
      	$this->objStripeData->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objStripeData->idParentStripeData = $this->txtIdParentStripeData->Text;
		
		  
  		 
      	$this->objStripeData->stripeId = $this->txtStripeId->Text;
		
		  
  		 
      	$this->objStripeData->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objStripeData->object = $this->txtObject->Text;
		
		  
  		 
      	$this->objStripeData->data = $this->txtData->Text;
		
		  
  		 
      	$this->objStripeData->mode = $this->txtMode->Text;
		
		  
  		 
      	$this->objStripeData->instance_url = $this->txtInstance_url->Text;
		
		
		$this->objStripeData->Save();
  	}
  	public function btnDelete_click(){
  		$this->objStripeData->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objStripeData);
  	}
  	
}
?>