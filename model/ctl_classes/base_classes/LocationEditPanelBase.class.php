<?php
class LocationEditPanelBase extends MJaxPanel{
	protected $objLocation = null;
    
    	
    	public $intIdLocation = null;
   		
    	
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $txtAddress1 = null;
   		
	
    	
    	
    	public $txtAddress2 = null;
   		
	
    	
    	
    	public $txtCity = null;
   		
	
    	
    	
    	public $txtState = null;
   		
	
    	
    	
    	public $txtZip = null;
   		
	
    	
    	
    	public $txtCountry = null;
   		
	
    	
    	
    	public $txtLat = null;
   		
	
    	
    	
    	public $txtLng = null;
   		
	
    	
    	
    	public $txtIdAccount = null;
   		
	
	
   		public $lnkViewParentLocation = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objLocation = null){
		parent::__construct($objParentControl);
		$this->objLocation = $objLocation;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/LocationEditPanelBase.tpl.php';
		
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
		if(is_null($this->objLocation)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this->txtAddress1 = new MJaxTextBox($this);
	  		$this->txtAddress1->Name = 'address1';
  		
	     
	  	
	  		$this->txtAddress2 = new MJaxTextBox($this);
	  		$this->txtAddress2->Name = 'address2';
  		
	     
	  	
	  		$this->txtCity = new MJaxTextBox($this);
	  		$this->txtCity->Name = 'city';
  		
	     
	  	
	  		$this->txtState = new MJaxTextBox($this);
	  		$this->txtState->Name = 'state';
  		
	     
	  	
	  		$this->txtZip = new MJaxTextBox($this);
	  		$this->txtZip->Name = 'zip';
  		
	     
	  	
	  		$this->txtCountry = new MJaxTextBox($this);
	  		$this->txtCountry->Name = 'country';
  		
	     
	  	
	  		$this->txtLat = new MJaxTextBox($this);
	  		$this->txtLat->Name = 'lat';
  		
	     
	  	
	  		$this->txtLng = new MJaxTextBox($this);
	  		$this->txtLng->Name = 'lng';
  		
	     
	  	
	  		$this->txtIdAccount = new MJaxTextBox($this);
	  		$this->txtIdAccount->Name = 'idAccount';
  		
	  
	  if(!is_null($this->objLocation)){
	     
	  	
  		
  			$this->intIdLocation = $this->objLocation->idLocation;
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objLocation->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtAddress1->Text = $this->objLocation->address1;
  		
  		
  		
	     
	  		  		
	  		$this->txtAddress2->Text = $this->objLocation->address2;
  		
  		
  		
	     
	  		  		
	  		$this->txtCity->Text = $this->objLocation->city;
  		
  		
  		
	     
	  		  		
	  		$this->txtState->Text = $this->objLocation->state;
  		
  		
  		
	     
	  		  		
	  		$this->txtZip->Text = $this->objLocation->zip;
  		
  		
  		
	     
	  		  		
	  		$this->txtCountry->Text = $this->objLocation->country;
  		
  		
  		
	     
	  		  		
	  		$this->txtLat->Text = $this->objLocation->lat;
  		
  		
  		
	     
	  		  		
	  		$this->txtLng->Text = $this->objLocation->lng;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdAccount->Text = $this->objLocation->idAccount;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objLocation->idAccount)){
   			$this->lnkViewParentLocation = new MJaxLinkButton($this);
   			$this->lnkViewParentLocation->Text = 'View AuthAccount';
   			$this->lnkViewParentLocation->Href = __ENTITY_MODEL_DIR__ . '/AuthAccount/' . $this->objLocation->idAccount;  
   		}
	  
	 // if(!is_null($this->objLocation->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objLocation)){
			//Create a new one
			$this->objLocation = new Location();
		}

  		  
  		
		  
  		 
      	$this->objLocation->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objLocation->address1 = $this->txtAddress1->Text;
		
		  
  		 
      	$this->objLocation->address2 = $this->txtAddress2->Text;
		
		  
  		 
      	$this->objLocation->city = $this->txtCity->Text;
		
		  
  		 
      	$this->objLocation->state = $this->txtState->Text;
		
		  
  		 
      	$this->objLocation->zip = $this->txtZip->Text;
		
		  
  		 
      	$this->objLocation->country = $this->txtCountry->Text;
		
		  
  		 
      	$this->objLocation->lat = $this->txtLat->Text;
		
		  
  		 
      	$this->objLocation->lng = $this->txtLng->Text;
		
		  
  		 
      	$this->objLocation->idAccount = $this->txtIdAccount->Text;
		
		
		$this->objLocation->Save();
  	}
  	public function btnDelete_click(){
  		$this->objLocation->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objLocation);
  	}
  	
}
?>