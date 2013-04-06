<?php
class RoundEditPanelBase extends MJaxPanel{
	protected $objRound = null;
    
    	
    	public $intIdRound = null;
   		
    	
	
    	
    	
    	public $txtIdAccount = null;
   		
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $txtLongDesc = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
	
	
  		public $lnkViewChildQuestion = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objRound = null){
		parent::__construct($objParentControl);
		$this->objRound = $objRound;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/RoundEditPanelBase.tpl.php';
		}
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
		if(is_null($this->objRound)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdAccount = new MJaxTextBox($this);
	  		$this->txtIdAccount->Name = 'idAccount';
  		
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this->txtLongDesc = new MJaxTextBox($this);
	  		$this->txtLongDesc->Name = 'longDesc';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	  
	  if(!is_null($this->objRound)){
	     
	  	
  		
  			$this->intIdRound = $this->objRound->idRound;
  		
  		
	     
	  		  		
	  		$this->txtIdAccount->Text = $this->objRound->idAccount;
  		
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objRound->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtLongDesc->Text = $this->objRound->longDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objRound->creDate;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objRound->i)){
	   
  		
		$this->lnkViewChildQuestion = new MJaxLinkButton($this);
		$this->lnkViewChildQuestion->Text = 'View Questions';
		$this->lnkViewChildQuestion->Href = __ENTITY_MODEL_DIR__ . '/Round/' . $this->objRound->idRound . '/Questions';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objRound)){
			//Create a new one
			$this->objRound = new Round();
		}

  		  
  		
		  
  		 
      	$this->objRound->idAccount = $this->txtIdAccount->Text;
		
		  
  		 
      	$this->objRound->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objRound->longDesc = $this->txtLongDesc->Text;
		
		  
  		 
      	$this->objRound->creDate = $this->txtCreDate->Text;
		
		
		$this->objRound->Save();
  	}
  	public function btnDelete_click(){
  		$this->objRound->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objRound);
  	}
  	
}
?>