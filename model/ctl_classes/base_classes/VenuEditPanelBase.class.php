<?php
class VenuEditPanelBase extends MJaxPanel{
	protected $objVenu = null;
    
    	
    	public $intIdVenue = null;
   		
    	
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtNamespace = null;
   		
	
    	
    	
    	public $txtIdAccount = null;
   		
	
    	
    	
    	public $txtCurrGameNamespace = null;
   		
	
	
	
  		public $lnkViewChildBartenderVenue = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objVenu = null){
		parent::__construct($objParentControl);
		$this->objVenu = $objVenu;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/VenuEditPanelBase.tpl.php';
		
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
		if(is_null($this->objVenu)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtNamespace = new MJaxTextBox($this);
	  		$this->txtNamespace->Name = 'namespace';
  		
	     
	  	
	  		$this->txtIdAccount = new MJaxTextBox($this);
	  		$this->txtIdAccount->Name = 'idAccount';
  		
	     
	  	
	  		$this->txtCurrGameNamespace = new MJaxTextBox($this);
	  		$this->txtCurrGameNamespace->Name = 'currGameNamespace';
  		
	  
	  if(!is_null($this->objVenu)){
	     
	  	
  		
  			$this->intIdVenue = $this->objVenu->idVenue;
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objVenu->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objVenu->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtNamespace->Text = $this->objVenu->namespace;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdAccount->Text = $this->objVenu->idAccount;
  		
  		
  		
	     
	  		  		
	  		$this->txtCurrGameNamespace->Text = $this->objVenu->currGameNamespace;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objVenu->i)){
	   
  		
		$this->lnkViewChildBartenderVenue = new MJaxLinkButton($this);
		$this->lnkViewChildBartenderVenue->Text = 'View BartenderVenues';
		$this->lnkViewChildBartenderVenue->Href = __ENTITY_MODEL_DIR__ . '/Venu/' . $this->objVenu->idVenue . '/BartenderVenues';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objVenu)){
			//Create a new one
			$this->objVenu = new Venu();
		}

  		  
  		
		  
  		 
      	$this->objVenu->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objVenu->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objVenu->namespace = $this->txtNamespace->Text;
		
		  
  		 
      	$this->objVenu->idAccount = $this->txtIdAccount->Text;
		
		  
  		 
      	$this->objVenu->currGameNamespace = $this->txtCurrGameNamespace->Text;
		
		
		$this->objVenu->Save();
  	}
  	public function btnDelete_click(){
  		$this->objVenu->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objVenu);
  	}
  	
}
?>