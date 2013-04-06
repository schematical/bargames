<?php
class ApiRequestTokenEditPanelBase extends MJaxPanel{
	protected $objApiRequestToken = null;
    
    	
    	public $intIdApiRequestToken = null;
   		
    	
	
    	
    	
    	public $txtOauth_token = null;
   		
	
    	
    	
    	public $txtOauth_token_secret = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtExpDate = null;
   		
	
    	
    	
    	public $txtIdApplication = null;
   		
	
	
   		public $lnkViewParentApiRequestToken = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objApiRequestToken = null){
		parent::__construct($objParentControl);
		$this->objApiRequestToken = $objApiRequestToken;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/ApiRequestTokenEditPanelBase.tpl.php';
		
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
		if(is_null($this->objApiRequestToken)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtOauth_token = new MJaxTextBox($this);
	  		$this->txtOauth_token->Name = 'oauth_token';
  		
	     
	  	
	  		$this->txtOauth_token_secret = new MJaxTextBox($this);
	  		$this->txtOauth_token_secret->Name = 'oauth_token_secret';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtExpDate = new MJaxTextBox($this);
	  		$this->txtExpDate->Name = 'expDate';
  		
	     
	  	
	  		$this->txtIdApplication = new MJaxTextBox($this);
	  		$this->txtIdApplication->Name = 'idApplication';
  		
	  
	  if(!is_null($this->objApiRequestToken)){
	     
	  	
  		
  			$this->intIdApiRequestToken = $this->objApiRequestToken->idApiRequestToken;
  		
  		
	     
	  		  		
	  		$this->txtOauth_token->Text = $this->objApiRequestToken->oauth_token;
  		
  		
  		
	     
	  		  		
	  		$this->txtOauth_token_secret->Text = $this->objApiRequestToken->oauth_token_secret;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objApiRequestToken->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtExpDate->Text = $this->objApiRequestToken->expDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdApplication->Text = $this->objApiRequestToken->idApplication;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objApiRequestToken->idApplication)){
   			$this->lnkViewParentApiRequestToken = new MJaxLinkButton($this);
   			$this->lnkViewParentApiRequestToken->Text = 'View ApiApplication';
   			$this->lnkViewParentApiRequestToken->Href = __ENTITY_MODEL_DIR__ . '/ApiApplication/' . $this->objApiRequestToken->idApplication;  
   		}
	  
	 // if(!is_null($this->objApiRequestToken->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objApiRequestToken)){
			//Create a new one
			$this->objApiRequestToken = new ApiRequestToken();
		}

  		  
  		
		  
  		 
      	$this->objApiRequestToken->oauth_token = $this->txtOauth_token->Text;
		
		  
  		 
      	$this->objApiRequestToken->oauth_token_secret = $this->txtOauth_token_secret->Text;
		
		  
  		 
      	$this->objApiRequestToken->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objApiRequestToken->expDate = $this->txtExpDate->Text;
		
		  
  		 
      	$this->objApiRequestToken->idApplication = $this->txtIdApplication->Text;
		
		
		$this->objApiRequestToken->Save();
  	}
  	public function btnDelete_click(){
  		$this->objApiRequestToken->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objApiRequestToken);
  	}
  	
}
?>