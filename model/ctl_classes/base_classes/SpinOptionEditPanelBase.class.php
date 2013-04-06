<?php
class SpinOptionEditPanelBase extends MJaxPanel{
	protected $objSpinOption = null;
    
    	
    	public $intIdSpinOption = null;
   		
    	
	
    	
    	
    	public $txtIdVenue = null;
   		
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtIcon = null;
   		
	
    	
    	
    	public $txtLongDesc = null;
   		
	
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objSpinOption = null){
		parent::__construct($objParentControl);
		$this->objSpinOption = $objSpinOption;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/SpinOptionEditPanelBase.tpl.php';
		
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
		if(is_null($this->objSpinOption)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdVenue = new MJaxTextBox($this);
	  		$this->txtIdVenue->Name = 'idVenue';
  		
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtIcon = new MJaxTextBox($this);
	  		$this->txtIcon->Name = 'icon';
  		
	     
	  	
	  		$this->txtLongDesc = new MJaxTextBox($this);
	  		$this->txtLongDesc->Name = 'longDesc';
  		
	  
	  if(!is_null($this->objSpinOption)){
	     
	  	
  		
  			$this->intIdSpinOption = $this->objSpinOption->idSpinOption;
  		
  		
	     
	  		  		
	  		$this->txtIdVenue->Text = $this->objSpinOption->idVenue;
  		
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objSpinOption->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objSpinOption->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIcon->Text = $this->objSpinOption->icon;
  		
  		
  		
	     
	  		  		
	  		$this->txtLongDesc->Text = $this->objSpinOption->longDesc;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objSpinOption->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objSpinOption)){
			//Create a new one
			$this->objSpinOption = new SpinOption();
		}

  		  
  		
		  
  		 
      	$this->objSpinOption->idVenue = $this->txtIdVenue->Text;
		
		  
  		 
      	$this->objSpinOption->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objSpinOption->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objSpinOption->icon = $this->txtIcon->Text;
		
		  
  		 
      	$this->objSpinOption->longDesc = $this->txtLongDesc->Text;
		
		
		$this->objSpinOption->Save();
  	}
  	public function btnDelete_click(){
  		$this->objSpinOption->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objSpinOption);
  	}
  	
}
?>