<?php
class ApiApplicationEditPanelBase extends MJaxPanel{
	protected $objApiApplication = null;
    
    	
    	public $intIdApplication = null;
   		
    	
	
    	
    	
    	public $txtIdDeveloper = null;
   		
	
    	
    	
    	public $txtName = null;
   		
	
    	
    	
    	public $ = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtIdApplicationStatusTypeCd = null;
   		
	
    	
    	
    	public $txtConsumerKey = null;
   		
	
    	
    	
    	public $txtConsumerSecret = null;
   		
	
    	
    	
    	public $txtDomain = null;
   		
	
    	
    	
    	public $txtCallback_url = null;
   		
	
    	
    	
    	public $txtNamespace = null;
   		
	
    	
    	
    	public $txtIdApplicationPermissionLevel = null;
   		
	
    	
    	
    	public $txtIframe_url = null;
   		
	
    	
    	
    	public $txtBartender_url = null;
   		
	
    	
    	
    	public $txtPlayer_url = null;
   		
	
	
   		public $lnkViewParentApiApplication = null;
	
   		public $lnkViewParentApiApplication = null;
	
   		public $lnkViewParentApiApplication = null;
	
	
  		public $lnkViewChildApiCall = null;
  	
  		public $lnkViewChildApiRequestToken = null;
  	
  		public $lnkViewChildPlayerApp = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objApiApplication = null){
		parent::__construct($objParentControl);
		$this->objApiApplication = $objApiApplication;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/ApiApplicationEditPanelBase.tpl.php';
		
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
		if(is_null($this->objApiApplication)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdDeveloper = new MJaxTextBox($this);
	  		$this->txtIdDeveloper->Name = 'idDeveloper';
  		
	     
	  	
	  		$this->txtName = new MJaxTextBox($this);
	  		$this->txtName->Name = 'name';
  		
	     
	  	
	  		$this-> = new MJaxTextBox($this);
	  		$this->->Name = 'desc';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtIdApplicationStatusTypeCd = new MJaxTextBox($this);
	  		$this->txtIdApplicationStatusTypeCd->Name = 'idApplicationStatusTypeCd';
  		
	     
	  	
	  		$this->txtConsumerKey = new MJaxTextBox($this);
	  		$this->txtConsumerKey->Name = 'consumerKey';
  		
	     
	  	
	  		$this->txtConsumerSecret = new MJaxTextBox($this);
	  		$this->txtConsumerSecret->Name = 'consumerSecret';
  		
	     
	  	
	  		$this->txtDomain = new MJaxTextBox($this);
	  		$this->txtDomain->Name = 'domain';
  		
	     
	  	
	  		$this->txtCallback_url = new MJaxTextBox($this);
	  		$this->txtCallback_url->Name = 'callback_url';
  		
	     
	  	
	  		$this->txtNamespace = new MJaxTextBox($this);
	  		$this->txtNamespace->Name = 'namespace';
  		
	     
	  	
	  		$this->txtIdApplicationPermissionLevel = new MJaxTextBox($this);
	  		$this->txtIdApplicationPermissionLevel->Name = 'idApplicationPermissionLevel';
  		
	     
	  	
	  		$this->txtIframe_url = new MJaxTextBox($this);
	  		$this->txtIframe_url->Name = 'iframe_url';
  		
	     
	  	
	  		$this->txtBartender_url = new MJaxTextBox($this);
	  		$this->txtBartender_url->Name = 'bartender_url';
  		
	     
	  	
	  		$this->txtPlayer_url = new MJaxTextBox($this);
	  		$this->txtPlayer_url->Name = 'player_url';
  		
	  
	  if(!is_null($this->objApiApplication)){
	     
	  	
  		
  			$this->intIdApplication = $this->objApiApplication->idApplication;
  		
  		
	     
	  		  		
	  		$this->txtIdDeveloper->Text = $this->objApiApplication->idDeveloper;
  		
  		
  		
	     
	  		  		
	  		$this->txtName->Text = $this->objApiApplication->name;
  		
  		
  		
	     
	  		  		
	  		$this->->Text = $this->objApiApplication->desc;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objApiApplication->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdApplicationStatusTypeCd->Text = $this->objApiApplication->idApplicationStatusTypeCd;
  		
  		
  		
	     
	  		  		
	  		$this->txtConsumerKey->Text = $this->objApiApplication->consumerKey;
  		
  		
  		
	     
	  		  		
	  		$this->txtConsumerSecret->Text = $this->objApiApplication->consumerSecret;
  		
  		
  		
	     
	  		  		
	  		$this->txtDomain->Text = $this->objApiApplication->domain;
  		
  		
  		
	     
	  		  		
	  		$this->txtCallback_url->Text = $this->objApiApplication->callback_url;
  		
  		
  		
	     
	  		  		
	  		$this->txtNamespace->Text = $this->objApiApplication->namespace;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdApplicationPermissionLevel->Text = $this->objApiApplication->idApplicationPermissionLevel;
  		
  		
  		
	     
	  		  		
	  		$this->txtIframe_url->Text = $this->objApiApplication->iframe_url;
  		
  		
  		
	     
	  		  		
	  		$this->txtBartender_url->Text = $this->objApiApplication->bartender_url;
  		
  		
  		
	     
	  		  		
	  		$this->txtPlayer_url->Text = $this->objApiApplication->player_url;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objApiApplication->idDeveloper)){
   			$this->lnkViewParentApiApplication = new MJaxLinkButton($this);
   			$this->lnkViewParentApiApplication->Text = 'View ApiDeveloper';
   			$this->lnkViewParentApiApplication->Href = __ENTITY_MODEL_DIR__ . '/ApiDeveloper/' . $this->objApiApplication->idDeveloper;  
   		}
	  
  		if(!is_null($this->objApiApplication->idApplicationStatusTypeCd)){
   			$this->lnkViewParentApiApplication = new MJaxLinkButton($this);
   			$this->lnkViewParentApiApplication->Text = 'View ApiApplicationStatus_tpcd';
   			$this->lnkViewParentApiApplication->Href = __ENTITY_MODEL_DIR__ . '/ApiApplicationStatus_tpcd/' . $this->objApiApplication->idApplicationStatusTypeCd;  
   		}
	  
  		if(!is_null($this->objApiApplication->idApplicationPermissionLevel)){
   			$this->lnkViewParentApiApplication = new MJaxLinkButton($this);
   			$this->lnkViewParentApiApplication->Text = 'View ApiApplicationPermissionLevel_tpcd';
   			$this->lnkViewParentApiApplication->Href = __ENTITY_MODEL_DIR__ . '/ApiApplicationPermissionLevel_tpcd/' . $this->objApiApplication->idApplicationPermissionLevel;  
   		}
	  
	 // if(!is_null($this->objApiApplication->i)){
	   
  		
		$this->lnkViewChildApiCall = new MJaxLinkButton($this);
		$this->lnkViewChildApiCall->Text = 'View ApiCalls';
		$this->lnkViewChildApiCall->Href = __ENTITY_MODEL_DIR__ . '/ApiApplication/' . $this->objApiApplication->idApplication . '/ApiCalls';  
	
	  
  		
		$this->lnkViewChildApiRequestToken = new MJaxLinkButton($this);
		$this->lnkViewChildApiRequestToken->Text = 'View ApiRequestTokens';
		$this->lnkViewChildApiRequestToken->Href = __ENTITY_MODEL_DIR__ . '/ApiApplication/' . $this->objApiApplication->idApplication . '/ApiRequestTokens';  
	
	  
  		
		$this->lnkViewChildPlayerApp = new MJaxLinkButton($this);
		$this->lnkViewChildPlayerApp->Text = 'View PlayerApps';
		$this->lnkViewChildPlayerApp->Href = __ENTITY_MODEL_DIR__ . '/ApiApplication/' . $this->objApiApplication->idApp . '/PlayerApps';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objApiApplication)){
			//Create a new one
			$this->objApiApplication = new ApiApplication();
		}

  		  
  		
		  
  		 
      	$this->objApiApplication->idDeveloper = $this->txtIdDeveloper->Text;
		
		  
  		 
      	$this->objApiApplication->name = $this->txtName->Text;
		
		  
  		 
      	$this->objApiApplication->desc = $this->->Text;
		
		  
  		 
      	$this->objApiApplication->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objApiApplication->idApplicationStatusTypeCd = $this->txtIdApplicationStatusTypeCd->Text;
		
		  
  		 
      	$this->objApiApplication->consumerKey = $this->txtConsumerKey->Text;
		
		  
  		 
      	$this->objApiApplication->consumerSecret = $this->txtConsumerSecret->Text;
		
		  
  		 
      	$this->objApiApplication->domain = $this->txtDomain->Text;
		
		  
  		 
      	$this->objApiApplication->callback_url = $this->txtCallback_url->Text;
		
		  
  		 
      	$this->objApiApplication->namespace = $this->txtNamespace->Text;
		
		  
  		 
      	$this->objApiApplication->idApplicationPermissionLevel = $this->txtIdApplicationPermissionLevel->Text;
		
		  
  		 
      	$this->objApiApplication->iframe_url = $this->txtIframe_url->Text;
		
		  
  		 
      	$this->objApiApplication->bartender_url = $this->txtBartender_url->Text;
		
		  
  		 
      	$this->objApiApplication->player_url = $this->txtPlayer_url->Text;
		
		
		$this->objApiApplication->Save();
  	}
  	public function btnDelete_click(){
  		$this->objApiApplication->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objApiApplication);
  	}
  	
}
?>