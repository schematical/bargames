<?php
class AuthUserEditPanelBase extends MJaxPanel{
	protected $objAuthUser = null;
    
    	
    	public $intIdUser = null;
   		
    	
	
    	
    	
    	public $txtEmail = null;
   		
	
    	
    	
    	public $txtPassword = null;
   		
	
    	
    	
    	public $txtIdAccount = null;
   		
	
    	
    	
    	public $txtIdUserTypeCd = null;
   		
	
    	
    	
    	public $txtUsername = null;
   		
	
    	
    	
    	public $txtPassResetCode = null;
   		
	
    	
    	
    	public $txtActive = null;
   		
	
	
   		public $lnkViewParentAuthUser = null;
	
	
  		public $lnkViewChildAuthAccount = null;
  	
  		public $lnkViewChildAuthSession = null;
  	
  		public $lnkViewChildAuthUserSetting = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objAuthUser = null){
		parent::__construct($objParentControl);
		$this->objAuthUser = $objAuthUser;
		
		$this->strTemplate = __VIEW_ACTIVE_APP_DIR__  . '/www/ctl_panels/AuthUserEditPanelBase.tpl.php';
		
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
		if(is_null($this->objAuthUser)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtEmail = new MJaxTextBox($this);
	  		$this->txtEmail->Name = 'email';
  		
	     
	  	
	  		$this->txtPassword = new MJaxTextBox($this);
	  		$this->txtPassword->Name = 'password';
  		
	     
	  	
	  		$this->txtIdAccount = new MJaxTextBox($this);
	  		$this->txtIdAccount->Name = 'idAccount';
  		
	     
	  	
	  		$this->txtIdUserTypeCd = new MJaxTextBox($this);
	  		$this->txtIdUserTypeCd->Name = 'idUserTypeCd';
  		
	     
	  	
	  		$this->txtUsername = new MJaxTextBox($this);
	  		$this->txtUsername->Name = 'username';
  		
	     
	  	
	  		$this->txtPassResetCode = new MJaxTextBox($this);
	  		$this->txtPassResetCode->Name = 'passResetCode';
  		
	     
	  	
	  		$this->txtActive = new MJaxTextBox($this);
	  		$this->txtActive->Name = 'active';
  		
	  
	  if(!is_null($this->objAuthUser)){
	     
	  	
  		
  			$this->intIdUser = $this->objAuthUser->idUser;
  		
  		
	     
	  		  		
	  		$this->txtEmail->Text = $this->objAuthUser->email;
  		
  		
  		
	     
	  		  		
	  		$this->txtPassword->Text = $this->objAuthUser->password;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdAccount->Text = $this->objAuthUser->idAccount;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUserTypeCd->Text = $this->objAuthUser->idUserTypeCd;
  		
  		
  		
	     
	  		  		
	  		$this->txtUsername->Text = $this->objAuthUser->username;
  		
  		
  		
	     
	  		  		
	  		$this->txtPassResetCode->Text = $this->objAuthUser->passResetCode;
  		
  		
  		
	     
	  		  		
	  		$this->txtActive->Text = $this->objAuthUser->active;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objAuthUser->idAccount)){
   			$this->lnkViewParentAuthUser = new MJaxLinkButton($this);
   			$this->lnkViewParentAuthUser->Text = 'View AuthAccount';
   			$this->lnkViewParentAuthUser->Href = __ENTITY_MODEL_DIR__ . '/AuthAccount/' . $this->objAuthUser->idAccount;  
   		}
	  
	 // if(!is_null($this->objAuthUser->i)){
	   
  		
		$this->lnkViewChildAuthAccount = new MJaxLinkButton($this);
		$this->lnkViewChildAuthAccount->Text = 'View AuthAccounts';
		$this->lnkViewChildAuthAccount->Href = __ENTITY_MODEL_DIR__ . '/AuthUser/' . $this->objAuthUser->idUser . '/AuthAccounts';  
	
	  
  		
		$this->lnkViewChildAuthSession = new MJaxLinkButton($this);
		$this->lnkViewChildAuthSession->Text = 'View AuthSessions';
		$this->lnkViewChildAuthSession->Href = __ENTITY_MODEL_DIR__ . '/AuthUser/' . $this->objAuthUser->idUser . '/AuthSessions';  
	
	  
  		
		$this->lnkViewChildAuthUserSetting = new MJaxLinkButton($this);
		$this->lnkViewChildAuthUserSetting->Text = 'View AuthUserSettings';
		$this->lnkViewChildAuthUserSetting->Href = __ENTITY_MODEL_DIR__ . '/AuthUser/' . $this->objAuthUser->idUser . '/AuthUserSettings';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objAuthUser)){
			//Create a new one
			$this->objAuthUser = new AuthUser();
		}

  		  
  		
		  
  		 
      	$this->objAuthUser->email = $this->txtEmail->Text;
		
		  
  		 
      	$this->objAuthUser->password = $this->txtPassword->Text;
		
		  
  		 
      	$this->objAuthUser->idAccount = $this->txtIdAccount->Text;
		
		  
  		 
      	$this->objAuthUser->idUserTypeCd = $this->txtIdUserTypeCd->Text;
		
		  
  		 
      	$this->objAuthUser->username = $this->txtUsername->Text;
		
		  
  		 
      	$this->objAuthUser->passResetCode = $this->txtPassResetCode->Text;
		
		  
  		 
      	$this->objAuthUser->active = $this->txtActive->Text;
		
		
		$this->objAuthUser->Save();
  	}
  	public function btnDelete_click(){
  		$this->objAuthUser->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objAuthUser);
  	}
  	
}
?>