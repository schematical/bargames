<?php
class AuthUserBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'AuthUser';
    const P_KEY = 'idUser';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idUser = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthUser();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, AuthUser::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthUser();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<AuthUser>";
        
        $xmlStr .= "<idUser>";
        $xmlStr .= $this->idUser;
        $xmlStr .= "</idUser>";
        
        $xmlStr .= "<email>";
        $xmlStr .= $this->email;
        $xmlStr .= "</email>";
        
        $xmlStr .= "<password>";
        $xmlStr .= $this->password;
        $xmlStr .= "</password>";
        
        $xmlStr .= "<idAccount>";
        $xmlStr .= $this->idAccount;
        $xmlStr .= "</idAccount>";
        
        $xmlStr .= "<idUserTypeCd>";
        $xmlStr .= $this->idUserTypeCd;
        $xmlStr .= "</idUserTypeCd>";
        
        $xmlStr .= "<username>";
        $xmlStr .= $this->username;
        $xmlStr .= "</username>";
        
        $xmlStr .= "<passResetCode>";
        $xmlStr .= $this->passResetCode;
        $xmlStr .= "</passResetCode>";
        
        $xmlStr .= "<active>";
        $xmlStr .= $this->active;
        $xmlStr .= "</active>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</AuthUser>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthUser();
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
    
    public function GetAuthAccountArr(){
       return AuthAccount::LoadCollByIdUser($this->idUser);
    }
	
    public function GetAuthSessionArr(){
       return AuthSession::LoadCollByIdUser($this->idUser);
    }
	
    public function GetAuthUserSettingArr(){
       return AuthUserSetting::LoadCollByIdUser($this->idUser);
    }
	

    //Load by foregin key
    
    public static function LoadCollByIdAccount($intIdAccount){
        $sql = sprintf("SELECT * FROM AuthUser WHERE idAccount = %s;", $intIdAccount);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objAuthUser = new AuthUser();
			$objAuthUser->materilize($data);
			$coll->addItem($objAuthUser);
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
       
        
            
             if(array_key_exists('iduser', $arrData)){
                $this->intIdUser = $arrData['iduser'];
             }
        
            
             if(array_key_exists('iduser', $arrData)){
                $this->intIdUser = $arrData['iduser'];
             }
        
            
             if(array_key_exists('iduser', $arrData)){
                $this->intIdUser = $arrData['iduser'];
             }
        
    }
        
        
        
        
        
       public static function Parse($mixData, $blnReturnId = false){
        	if(is_numeric($mixData)){
        		if($blnReturnId){
        			return $mixData;
        		}
        		return AuthUser::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'AuthUser')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdUser;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "AuthUser"');
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
				
				$tObj = new AuthUser();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "AuthUser";
               
                                 
                 $arrReturn['idUser'] = $this->idUser;
               
                                 
                 $arrReturn['email'] = $this->email;
               
                                 
                 $arrReturn['password'] = $this->password;
               
                                 
                 $arrReturn['idAccount'] = $this->idAccount;
               
                                 
                 $arrReturn['idUserTypeCd'] = $this->idUserTypeCd;
               
                                 
                 $arrReturn['username'] = $this->username;
               
                                 
                 $arrReturn['passResetCode'] = $this->passResetCode;
               
                                 
                 $arrReturn['active'] = $this->active;
            
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
	        	 
	   			case('IdUser'): 
	   			case('idUser'): 
	   				if(array_key_exists('idUser', $this->arrDBFields)){
	        			return $this->arrDBFields['idUser'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Email'): 
	   			case('email'): 
	   				if(array_key_exists('email', $this->arrDBFields)){
	        			return $this->arrDBFields['email'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Password'): 
	   			case('password'): 
	   				if(array_key_exists('password', $this->arrDBFields)){
	        			return $this->arrDBFields['password'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdAccount'): 
	   			case('idAccount'): 
	   				if(array_key_exists('idAccount', $this->arrDBFields)){
	        			return $this->arrDBFields['idAccount'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdUserTypeCd'): 
	   			case('idUserTypeCd'): 
	   				if(array_key_exists('idUserTypeCd', $this->arrDBFields)){
	        			return $this->arrDBFields['idUserTypeCd'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Username'): 
	   			case('username'): 
	   				if(array_key_exists('username', $this->arrDBFields)){
	        			return $this->arrDBFields['username'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('PassResetCode'): 
	   			case('passResetCode'): 
	   				if(array_key_exists('passResetCode', $this->arrDBFields)){
	        			return $this->arrDBFields['passResetCode'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Active'): 
	   			case('active'): 
	   				if(array_key_exists('active', $this->arrDBFields)){
	        			return $this->arrDBFields['active'];
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
	   			 
	   			case('IdUser'): 
	   			case('idUser'): 
	        		$this->arrDBFields['idUser'] = $strValue;
	        	break;
	        	 
	   			case('Email'): 
	   			case('email'): 
	        		$this->arrDBFields['email'] = $strValue;
	        	break;
	        	 
	   			case('Password'): 
	   			case('password'): 
	        		$this->arrDBFields['password'] = $strValue;
	        	break;
	        	 
	   			case('IdAccount'): 
	   			case('idAccount'): 
	        		$this->arrDBFields['idAccount'] = $strValue;
	        	break;
	        	 
	   			case('IdUserTypeCd'): 
	   			case('idUserTypeCd'): 
	        		$this->arrDBFields['idUserTypeCd'] = $strValue;
	        	break;
	        	 
	   			case('Username'): 
	   			case('username'): 
	        		$this->arrDBFields['username'] = $strValue;
	        	break;
	        	 
	   			case('PassResetCode'): 
	   			case('passResetCode'): 
	        		$this->arrDBFields['passResetCode'] = $strValue;
	        	break;
	        	 
	   			case('Active'): 
	   			case('active'): 
	        		$this->arrDBFields['active'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>