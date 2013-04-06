<?php
require_once('_config.inc.php');
MLCApplication::InitPackage('MLCStripe');
class home extends BGForm{
	protected $pnlStripe = null;
	public function Form_Create(){
		parent::Form_Create();
		
		$this->CreateControls();
		//$this->strUrl = $_SERVER['SERVER_NAME'] . '/' . BGAuthDriver::Venue()->Namespace;
		$this->pnlStripe = new MJaxStripePaymentPanel($this, 'pnlStripe');
		$this->pnlStripe->AddAction(new MJaxStripePaymentSuccessEvent(), new MJaxServerControlAction($this,'pnlStripe_payment_success'));
	}
	public function CreateControls(){
		
	}
	public function pnlStripe_payment_error($strFormId, $strControlId, $mixActionParam) {
		$this->Alert("Error");
	}
	public function pnlStripe_payment_success($strFormId, $strControlId, $mixActionParam){
		$this->pnlStripe->CreateStripeCustomer();
		MLCStripeDriver::UpdateSubscription(BGStripeSubscription::BASIC);
		$this->pnlStripe->GetLocationObject();
		$this->Redirect(
			'/home.php',
			array('upgrade' =>  BGStripeSubscription::BASIC)
		);
	}
	
	
}
home::Run('home');
?>