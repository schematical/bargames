<?php
require_once('_config.inc.php');
MLCApplication::InitPackage('BGSpin');
class index extends BGForm{
	protected $tblStats = null;
	protected $btnGetStarted = null;
	protected $pnlSetup = null;
	protected $pnlSignup = null;
	
	
	public function Form_Create(){
		parent::Form_Create();
		
		$this->CreateControls();
	}
	
	
	public function CreateControls(){
		// $this->tblStats = new BGSimpleReportPanel($this);
		$this->btnGetStarted = new MJaxLinkButton($this,'btnGetStarted');
		$this->btnGetStarted->AddClickEvent();
		$this->btnGetStarted->Text = 'Start your game now';
		
		$this->pnlSetup = new BGSpinOptionListPanel($this);
		
		$this->pnlSignup = new MLCSignUpPanel($this,'pnlSignup');
		$this->pnlSignup->AddAction(
			new MJaxAuthSignupEvent(),
			new MJaxServerControlAction($this, 'pnlSignup_auth_signup')
		);
		$this->pnlSignup->txtCompanyname->attr('placeholder', 'Venue Name');
        $this->blnSkipMainWindowRender = true;
  	}
	public function btnGetStarted_click(){
		$this->AnimateOpen('divGetStarted');
	}
	public function pnlSignup_auth_signup(){
		//Create venue
		
		$objVenue = BGAuthDriver::CreateVenue($this->pnlSignup->txtCompanyname->Text);
		$objVenue->CurrGameNamespace = 'spin';//TODO fix hack
		$objVenue->Save();
		$this->pnlSetup->SaveAll();
		$this->Redirect($objVenue->Namespace .'/iframe.php');
	}
}
index::Run('index');
?>