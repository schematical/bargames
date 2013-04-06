<?php
abstract class BGAuthDriver extends MLCAuthDriver{
	protected static $objVenue = null;
	public static function Venue(){
		if(!is_null(self::$objVenue)){
			return self::$objVenue;	
		}
		if(is_null(BGAuthDriver::Account())){
			return null;
		}
		self::$objVenue = Venu::LoadSingleByField('idAccount', self::IdAccount());
		return self::$objVenue;
	}
	public static function CreateVenue($strVenueName){
		$objVenue = new Venu();
		$objVenue->ShortDesc = $strVenueName;
		$objVenue->Namespace = BGApplication::ConvertToHash($strVenueName);
		$objVenue->CreDate = MLCDateTime::Now();
		$objVenue->IdAccount = self::IdAccount();
		$objVenue->Save();
		self::$objVenue = $objVenue;
		return $objVenue;
	}
}
