<?php
class AuthAccountBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'AuthAccount';
    const P_KEY = 'idAccount';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idAccount = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthAccount();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, AuthAccount::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthAccount();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<AuthAccount>";
        
        $xmlStr .= "<idAccount>";
        $xmlStr .= $this->idAccount;
        $xmlStr .= "</idAccount>";
        
        $xmlStr .= "<aws_id>";
        $xmlStr .= $this->aws_id;
        $xmlStr .= "</aws_id>";
        
        $xmlStr .= "<idAccountTypeCd>";
        $xmlStr .= $this->idAccountTypeCd;
        $xmlStr .= "</idAccountTypeCd>";
        
        $xmlStr .= "<shortDesc>";
        $xmlStr .= $this->shortDesc;
        $xmlStr .= "</shortDesc>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<idUser>";
        $xmlStr .= $this->idUser;
        $xmlStr .= "</idUser>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</AuthAccount>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new AuthAccount();
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
    
    public function GetAuthUserArr(){
       return AuthUser::LoadCollByIdAccount($this->idAccount);
    }
	
    public function GetLocationArr(){
       return Location::LoadCollByIdAccount($this->idAccount);
    }
	

    //Load by foregin key
    
    public static function LoadCollByIdUser($intIdUser){
        $sql = sprintf("SELECT * FROM AuthAccount WHERE idUser = %s;", $intIdUser);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objAuthAccount = new AuthAccount();
			$objAuthAccount->materilize($data);
			$coll->addItem($objAuthAccount);
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
       
        
            
             if(array_key_exists('idaccount', $arrData)){
                $this->intIdAccount = $arrData['idaccount'];
             }
        
            
             if(array_key_exists('idaccount', $arrData)){
                $this->intIdAccount = $arrData['idaccount'];
             }
        
    }
        
        
        
        
        
       public static function Parse($mixData, $blnReturnId = false){
        	if(is_numeric($mixData)){
        		if($blnReturnId){
        			return $mixData;
        		}
        		return AuthAccount::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'AuthAccount')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdAccount;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "AuthAccount"');
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
				
				$tObj = new AuthAccount();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "AuthAccount";
               
                                 
                 $arrReturn['idAccount'] = $this->idAccount;
               
                                 
                 $arrReturn['aws_id'] = $this->aws_id;
               
                                 
                 $arrReturn['idAccountTypeCd'] = $this->idAccountTypeCd;
               
                                 
                 $arrReturn['shortDesc'] = $this->shortDesc;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['idUser'] = $this->idUser;
            
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
	        	 
	   			case('IdAccount'): 
	   			case('idAccount'): 
	   				if(array_key_exists('idAccount', $this->arrDBFields)){
	        			return $this->arrDBFields['idAccount'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Aws_id'): 
	   			case('aws_id'): 
	   				if(array_key_exists('aws_id', $this->arrDBFields)){
	        			return $this->arrDBFields['aws_id'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdAccountTypeCd'): 
	   			case('idAccountTypeCd'): 
	   				if(array_key_exists('idAccountTypeCd', $this->arrDBFields)){
	        			return $this->arrDBFields['idAccountTypeCd'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('ShortDesc'): 
	   			case('shortDesc'): 
	   				if(array_key_exists('shortDesc', $this->arrDBFields)){
	        			return $this->arrDBFields['shortDesc'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	   				if(array_key_exists('creDate', $this->arrDBFields)){
	        			return $this->arrDBFields['creDate'];
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
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	       
	    }
	    public function __set($strName, $strValue){
	   		$this->modified = 1;
	   		switch($strName){
	   			 
	   			case('IdAccount'): 
	   			case('idAccount'): 
	        		$this->arrDBFields['idAccount'] = $strValue;
	        	break;
	        	 
	   			case('Aws_id'): 
	   			case('aws_id'): 
	        		$this->arrDBFields['aws_id'] = $strValue;
	        	break;
	        	 
	   			case('IdAccountTypeCd'): 
	   			case('idAccountTypeCd'): 
	        		$this->arrDBFields['idAccountTypeCd'] = $strValue;
	        	break;
	        	 
	   			case('ShortDesc'): 
	   			case('shortDesc'): 
	        		$this->arrDBFields['shortDesc'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('IdUser'): 
	   			case('idUser'): 
	        		$this->arrDBFields['idUser'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>