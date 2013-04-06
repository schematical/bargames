<?php
class UserEditPanelBase extends MJaxPanel{
	protected $objUser = null;
    
    	
    	public $intIdUser = null;
   		
    	
	
    	
    	
    	public $txtEmail = null;
   		
	
    	
    	
    	public $txtTwitter = null;
   		
	
    	
    	
    	public $txtToken = null;
   		
	
	
	
  		public $lnkViewChildAlert = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objUser = null){
		parent::__construct($objParentControl);
		$this->objUser = $objUser;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/UserEditPanelBase.tpl.php';
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
		if(is_null($this->objUser)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtEmail = new MJaxTextBox($this);
	  		$this->txtEmail->Name = 'email';
  		
	     
	  	
	  		$this->txtTwitter = new MJaxTextBox($this);
	  		$this->txtTwitter->Name = 'twitter';
  		
	     
	  	
	  		$this->txtToken = new MJaxTextBox($this);
	  		$this->txtToken->Name = 'token';
  		
	  
	  if(!is_null($this->objUser)){
	     
	  	
  		
  			$this->intIdUser = $this->objUser->idUser;
  		
  		
	     
	  		  		
	  		$this->txtEmail->Text = $this->objUser->email;
  		
  		
  		
	     
	  		  		
	  		$this->txtTwitter->Text = $this->objUser->twitter;
  		
  		
  		
	     
	  		  		
	  		$this->txtToken->Text = $this->objUser->token;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objUser->i)){
	   
  		
		$this->lnkViewChildAlert = new MJaxLinkButton($this);
		$this->lnkViewChildAlert->Text = 'View Alerts';
		$this->lnkViewChildAlert->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objUser->idUser . '/Alerts';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objUser)){
			//Create a new one
			$this->objUser = new User();
		}

  		  
  		
		  
  		 
      	$this->objUser->email = $this->txtEmail->Text;
		
		  
  		 
      	$this->objUser->twitter = $this->txtTwitter->Text;
		
		  
  		 
      	$this->objUser->token = $this->txtToken->Text;
		
		
		$this->objUser->Save();
  	}
  	public function btnDelete_click(){
  		$this->objUser->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objUser);
  	}
  	
}
?>