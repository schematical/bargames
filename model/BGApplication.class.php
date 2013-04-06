<?php
abstract class BGApplication{
	public static $strCtlFileDir = null;
	public static $objVenue = null;
	
	/*
	 * If the user is not logged in the venue will only last until 6am CST
	 */
	public static function InitGame($objVenue){
		BGApplication::$objVenue = $objVenue;
		$strGame = BGApplication::$objVenue->CurrGameNamespace;
		switch($strGame){
			case('spin'):
				MLCApplication::InitPackage('BGSpin');
				BGApplication::$strCtlFileDir = __BG_SPIN_CORE_CTL__;
				
			break;
		}
	}
	public static function CreateVenu($strName){
		$objVenu = new Venu();
		$objVenu->CreDate = MLCDateTime::Now();
		$objVenu->ShortDesc = $strName;
		$objVenu->Hash = self::ConvertToHash($strName);
		if(!is_null(MLCAuthDriver::User())){
			$objVenu->IdManagingUser = MLCAuthDriver::IdUser();
		}
		$objVenu->Save();
		return $objVenu;
		
	}
	public static function LoadVenu($mixId){
		if(is_int($mixId)){
			return Venu::LoadById($mixId);
		}elseif(is_string($mixId)){
			return Venu::Query(
				sprintf('WHERE hash = "%s"', $mixId),
				true	
			);
		}else{
			throw new Exception("Not a valid type for this function");
		}
	}
	public static function ConvertToHash($strString){
		$strString = str_replace(',', '', $strString);
		$strString = str_replace('-', '', $strString);
		$strString = str_replace("'", '', $strString);
		$strString = str_replace('""', '', $strString);
		$strString = str_replace(' ', '', $strString);
		$strString = strtolower($strString);
		return $strString;
	}
}
