<?php
class AlertEditPanelBase extends MJaxPanel{
	protected $objAlert = null;
    
    	
    	public $intIdAlert = null;
   		
    	
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtKeyword = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $ = null;
   		
	
	
   		public $lnkViewParentAlert = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objAlert = null){
		parent::__construct($objParentControl);
		$this->objAlert = $objAlert;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/AlertEditPanelBase.tpl.php';
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
		if(is_null($this->objAlert)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtKeyword = new MJaxTextBox($this);
	  		$this->txtKeyword->Name = 'keyword';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this-> = new MJaxTextBox($this);
	  		$this->->Name = 'include';
  		
	  
	  if(!is_null($this->objAlert)){
	     
	  	
  		
  			$this->intIdAlert = $this->objAlert->idAlert;
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objAlert->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtKeyword->Text = $this->objAlert->keyword;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objAlert->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->->Text = $this->objAlert->include;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objAlert->idUser)){
   			$this->lnkViewParentAlert = new MJaxLinkButton($this);
   			$this->lnkViewParentAlert->Text = 'View User';
   			$this->lnkViewParentAlert->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objAlert->idUser;  
   		}
	  
	 // if(!is_null($this->objAlert->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objAlert)){
			//Create a new one
			$this->objAlert = new Alert();
		}

  		  
  		
		  
  		 
      	$this->objAlert->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objAlert->keyword = $this->txtKeyword->Text;
		
		  
  		 
      	$this->objAlert->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objAlert->include = $this->->Text;
		
		
		$this->objAlert->Save();
  	}
  	public function btnDelete_click(){
  		$this->objAlert->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objAlert);
  	}
  	
}
?>