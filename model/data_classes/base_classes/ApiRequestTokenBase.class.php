<?php
class ApiRequestTokenBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'ApiRequestToken';
    const P_KEY = 'idApiRequestToken';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idApiRequestToken = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiRequestToken();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, ApiRequestToken::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiRequestToken();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<ApiRequestToken>";
        
        $xmlStr .= "<idApiRequestToken>";
        $xmlStr .= $this->idApiRequestToken;
        $xmlStr .= "</idApiRequestToken>";
        
        $xmlStr .= "<oauth_token>";
        $xmlStr .= $this->oauth_token;
        $xmlStr .= "</oauth_token>";
        
        $xmlStr .= "<oauth_token_secret>";
        $xmlStr .= $this->oauth_token_secret;
        $xmlStr .= "</oauth_token_secret>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<expDate>";
        $xmlStr .= $this->expDate;
        $xmlStr .= "</expDate>";
        
        $xmlStr .= "<idApplication>";
        $xmlStr .= $this->idApplication;
        $xmlStr .= "</idApplication>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</ApiRequestToken>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiRequestToken();
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
    

    //Load by foregin key
    
    public static function LoadCollByIdApplication($intIdApplication){
        $sql = sprintf("SELECT * FROM ApiRequestToken WHERE idApplication = %s;", $intIdApplication);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objApiRequestToken = new ApiRequestToken();
			$objApiRequestToken->materilize($data);
			$coll->addItem($objApiRequestToken);
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
       
        
    }
        
        
        
        
        
       public static function Parse($mixData, $blnReturnId = false){
        	if(is_numeric($mixData)){
        		if($blnReturnId){
        			return $mixData;
        		}
        		return ApiRequestToken::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'ApiRequestToken')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdApiRequestToken;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "ApiRequestToken"');
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
				
				$tObj = new ApiRequestToken();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "ApiRequestToken";
               
                                 
                 $arrReturn['idApiRequestToken'] = $this->idApiRequestToken;
               
                                 
                 $arrReturn['oauth_token'] = $this->oauth_token;
               
                                 
                 $arrReturn['oauth_token_secret'] = $this->oauth_token_secret;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['expDate'] = $this->expDate;
               
                                 
                 $arrReturn['idApplication'] = $this->idApplication;
            
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
	        	 
	   			case('IdApiRequestToken'): 
	   			case('idApiRequestToken'): 
	   				if(array_key_exists('idApiRequestToken', $this->arrDBFields)){
	        			return $this->arrDBFields['idApiRequestToken'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Oauth_token'): 
	   			case('oauth_token'): 
	   				if(array_key_exists('oauth_token', $this->arrDBFields)){
	        			return $this->arrDBFields['oauth_token'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Oauth_token_secret'): 
	   			case('oauth_token_secret'): 
	   				if(array_key_exists('oauth_token_secret', $this->arrDBFields)){
	        			return $this->arrDBFields['oauth_token_secret'];
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
	        	 
	   			case('ExpDate'): 
	   			case('expDate'): 
	   				if(array_key_exists('expDate', $this->arrDBFields)){
	        			return $this->arrDBFields['expDate'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdApplication'): 
	   			case('idApplication'): 
	   				if(array_key_exists('idApplication', $this->arrDBFields)){
	        			return $this->arrDBFields['idApplication'];
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
	   			 
	   			case('IdApiRequestToken'): 
	   			case('idApiRequestToken'): 
	        		$this->arrDBFields['idApiRequestToken'] = $strValue;
	        	break;
	        	 
	   			case('Oauth_token'): 
	   			case('oauth_token'): 
	        		$this->arrDBFields['oauth_token'] = $strValue;
	        	break;
	        	 
	   			case('Oauth_token_secret'): 
	   			case('oauth_token_secret'): 
	        		$this->arrDBFields['oauth_token_secret'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('ExpDate'): 
	   			case('expDate'): 
	        		$this->arrDBFields['expDate'] = $strValue;
	        	break;
	        	 
	   			case('IdApplication'): 
	   			case('idApplication'): 
	        		$this->arrDBFields['idApplication'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>