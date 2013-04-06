<?php
class AuthSessionBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'AuthSession';
    const P_KEY = 'idSession';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idSession = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthSession();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, AuthSession::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthSession();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<AuthSession>";
        
        $xmlStr .= "<idSession>";
        $xmlStr .= $this->idSession;
        $xmlStr .= "</idSession>";
        
        $xmlStr .= "<startDate>";
        $xmlStr .= $this->startDate;
        $xmlStr .= "</startDate>";
        
        $xmlStr .= "<endDate>";
        $xmlStr .= $this->endDate;
        $xmlStr .= "</endDate>";
        
        $xmlStr .= "<idUser>";
        $xmlStr .= $this->idUser;
        $xmlStr .= "</idUser>";
        
        $xmlStr .= "<sessionKey>";
        $xmlStr .= $this->sessionKey;
        $xmlStr .= "</sessionKey>";
        
        $xmlStr .= "<ipAddress>";
        $xmlStr .= $this->ipAddress;
        $xmlStr .= "</ipAddress>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</AuthSession>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthSession();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		$arrReturn = $coll->getCollection();
		if($blnReturnSingle){
			if(count($arrReturn) == 0){
				return null;
			}else{
				return $arrReturn[0];
			}	
		}else{
			return $arrReturn;
		}		
	}
	public static function QueryCount($strExtra = ''){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		return mysql_num_rows($result);
			
	}
     //Get children
    
    public function GetTrackingEventArr(){
       return TrackingEvent::LoadCollByIdSession($this->idSession);
    }
	

    //Load by foregin key
    
    public static function LoadCollByIdUser($intIdUser){
        $sql = sprintf("SELECT * FROM AuthSession WHERE idUser = %s;", $intIdUser);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objAuthSession = new AuthSession();
			$objAuthSession->materilize($data);
			$coll->addItem($objAuthSession);
		}
		return $coll;
    }

    
    
      public function LoadByTag($strTag){
	  	return MLCTagDriver::LoadTaggedEntites($strTag, get_class($this));
	  }
	       
    
	  public function AddTag($mixTag){
	  	return MLCTagDriver::AddTag($mixTag, $this);
	  }
	  
    public function ParseArray($arrData){
    	foreach($arrData as $strKey => $mixVal){
    		$arrData[strtolower($strKey)] = $mixVal;
    	}
       
        
            
             if(array_key_exists('idsession', $arrData)){
                $this->intIdSession = $arrData['idsession'];
             }
        
    }
        
        
        
        
        
       public static function Parse($mixData, $blnReturnId = false){
        	if(is_numeric($mixData)){
        		if($blnReturnId){
        			return $mixData;
        		}
        		return AuthSession::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'AuthSession')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdSession;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "AuthSession"');
        	}        	
        }
        public static function LoadSingleByField( $strField, $mixValue, $strCompairison = '='){
        	$arrResults = self::LoadArrayByField($strField, $mixValue, $strCompairison);
        	if(count($arrResults)){
        		return $arrResults[0];
        	}
        	return null;
        }
        public static function LoadArrayByField( $strField, $mixValue, $strCompairison = '='){
			if(is_numeric($mixValue)){
				$strValue = $mixValue;
			}else{
				$strValue = sprintf('"%s"', $mixValue);
			} 
			$strExtra = sprintf(' WHERE %s %s %s', $strField, $strCompairison, $strValue);
			
			$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME, $strExtra);
			//die($sql);
			$result = MLCDBDriver::query($sql, self::DB_CONN);
			$coll = new BaseEntityCollection();
			while($data = mysql_fetch_assoc($result)){
				
				$tObj = new AuthSession();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "AuthSession";
               
                                 
                 $arrReturn['idSession'] = $this->idSession;
               
                                 
                 $arrReturn['startDate'] = $this->startDate;
               
                                 
                 $arrReturn['endDate'] = $this->endDate;
               
                                 
                 $arrReturn['idUser'] = $this->idUser;
               
                                 
                 $arrReturn['sessionKey'] = $this->sessionKey;
               
                                 
                 $arrReturn['ipAddress'] = $this->ipAddress;
            
            return $arrReturn;
        }
        public function __toJson($blnPosponeEncode = false){
        	$arrReturn = $this->__toArray();  
        	if($blnPosponeEncode){
        		return json_encode($arrReturn);
        	}else{
        		return $arrReturn;
        	} 
        }
        public function __get($strName){
	        switch($strName){
	        	 
	   			case('IdSession'): 
	   			case('idSession'): 
	   				if(array_key_exists('idSession', $this->arrDBFields)){
	        			return $this->arrDBFields['idSession'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('StartDate'): 
	   			case('startDate'): 
	   				if(array_key_exists('startDate', $this->arrDBFields)){
	        			return $this->arrDBFields['startDate'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('EndDate'): 
	   			case('endDate'): 
	   				if(array_key_exists('endDate', $this->arrDBFields)){
	        			return $this->arrDBFields['endDate'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdUser'): 
	   			case('idUser'): 
	   				if(array_key_exists('idUser', $this->arrDBFields)){
	        			return $this->arrDBFields['idUser'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('SessionKey'): 
	   			case('sessionKey'): 
	   				if(array_key_exists('sessionKey', $this->arrDBFields)){
	        			return $this->arrDBFields['sessionKey'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IpAddress'): 
	   			case('ipAddress'): 
	   				if(array_key_exists('ipAddress', $this->arrDBFields)){
	        			return $this->arrDBFields['ipAddress'];
	        		}
	        		return null;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	       
	    }
	    public function __set($strName, $strValue){
	   		$this->modified = 1;
	   		switch($strName){
	   			 
	   			case('IdSession'): 
	   			case('idSession'): 
	        		$this->arrDBFields['idSession'] = $strValue;
	        	break;
	        	 
	   			case('StartDate'): 
	   			case('startDate'): 
	        		$this->arrDBFields['startDate'] = $strValue;
	        	break;
	        	 
	   			case('EndDate'): 
	   			case('endDate'): 
	        		$this->arrDBFields['endDate'] = $strValue;
	        	break;
	        	 
	   			case('IdUser'): 
	   			case('idUser'): 
	        		$this->arrDBFields['idUser'] = $strValue;
	        	break;
	        	 
	   			case('SessionKey'): 
	   			case('sessionKey'): 
	        		$this->arrDBFields['sessionKey'] = $strValue;
	        	break;
	        	 
	   			case('IpAddress'): 
	   			case('ipAddress'): 
	        		$this->arrDBFields['ipAddress'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>