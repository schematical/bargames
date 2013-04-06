<?php
class ApiApplicationBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'ApiApplication';
    const P_KEY = 'idApplication';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idApplication = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiApplication();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, ApiApplication::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiApplication();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<ApiApplication>";
        
        $xmlStr .= "<idApplication>";
        $xmlStr .= $this->idApplication;
        $xmlStr .= "</idApplication>";
        
        $xmlStr .= "<idDeveloper>";
        $xmlStr .= $this->idDeveloper;
        $xmlStr .= "</idDeveloper>";
        
        $xmlStr .= "<name>";
        $xmlStr .= $this->name;
        $xmlStr .= "</name>";
        
        $xmlStr .= "<desc>";
        $xmlStr .= $this->desc;
        $xmlStr .= "</desc>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<idApplicationStatusTypeCd>";
        $xmlStr .= $this->idApplicationStatusTypeCd;
        $xmlStr .= "</idApplicationStatusTypeCd>";
        
        $xmlStr .= "<consumerKey>";
        $xmlStr .= $this->consumerKey;
        $xmlStr .= "</consumerKey>";
        
        $xmlStr .= "<consumerSecret>";
        $xmlStr .= $this->consumerSecret;
        $xmlStr .= "</consumerSecret>";
        
        $xmlStr .= "<domain>";
        $xmlStr .= $this->domain;
        $xmlStr .= "</domain>";
        
        $xmlStr .= "<callback_url>";
        $xmlStr .= $this->callback_url;
        $xmlStr .= "</callback_url>";
        
        $xmlStr .= "<namespace>";
        $xmlStr .= $this->namespace;
        $xmlStr .= "</namespace>";
        
        $xmlStr .= "<idApplicationPermissionLevel>";
        $xmlStr .= $this->idApplicationPermissionLevel;
        $xmlStr .= "</idApplicationPermissionLevel>";
        
        $xmlStr .= "<iframe_url>";
        $xmlStr .= $this->iframe_url;
        $xmlStr .= "</iframe_url>";
        
        $xmlStr .= "<bartender_url>";
        $xmlStr .= $this->bartender_url;
        $xmlStr .= "</bartender_url>";
        
        $xmlStr .= "<player_url>";
        $xmlStr .= $this->player_url;
        $xmlStr .= "</player_url>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</ApiApplication>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiApplication();
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
    
    public function GetApiCallArr(){
       return ApiCall::LoadCollByIdApplication($this->idApplication);
    }
	
    public function GetApiRequestTokenArr(){
       return ApiRequestToken::LoadCollByIdApplication($this->idApplication);
    }
	
    public function GetPlayerAppArr(){
       return PlayerApp::LoadCollByIdApp($this->idApp);
    }
	

    //Load by foregin key
    
    public static function LoadCollByIdDeveloper($intIdDeveloper){
        $sql = sprintf("SELECT * FROM ApiApplication WHERE idDeveloper = %s;", $intIdDeveloper);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objApiApplication = new ApiApplication();
			$objApiApplication->materilize($data);
			$coll->addItem($objApiApplication);
		}
		return $coll;
    }

    
    public static function LoadCollByIdApplicationStatusTypeCd($intIdApplicationStatusTypeCd){
        $sql = sprintf("SELECT * FROM ApiApplication WHERE idApplicationStatusTypeCd = %s;", $intIdApplicationStatusTypeCd);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objApiApplication = new ApiApplication();
			$objApiApplication->materilize($data);
			$coll->addItem($objApiApplication);
		}
		return $coll;
    }

    
    public static function LoadCollByIdApplicationPermissionLevel($intIdApplicationPermissionLevel){
        $sql = sprintf("SELECT * FROM ApiApplication WHERE idApplicationPermissionLevel = %s;", $intIdApplicationPermissionLevel);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objApiApplication = new ApiApplication();
			$objApiApplication->materilize($data);
			$coll->addItem($objApiApplication);
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
       
        
            
             if(array_key_exists('idapplication', $arrData)){
                $this->intIdApplication = $arrData['idapplication'];
             }
        
            
             if(array_key_exists('idapplication', $arrData)){
                $this->intIdApplication = $arrData['idapplication'];
             }
        
            
             if(array_key_exists('idapp', $arrData)){
                $this->intIdApp = $arrData['idapp'];
             }
        
    }
        
        
        
        
        
       public static function Parse($mixData, $blnReturnId = false){
        	if(is_numeric($mixData)){
        		if($blnReturnId){
        			return $mixData;
        		}
        		return ApiApplication::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'ApiApplication')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdApplication;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "ApiApplication"');
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
				
				$tObj = new ApiApplication();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "ApiApplication";
               
                                 
                 $arrReturn['idApplication'] = $this->idApplication;
               
                                 
                 $arrReturn['idDeveloper'] = $this->idDeveloper;
               
                                 
                 $arrReturn['name'] = $this->name;
               
                                 
                 $arrReturn['desc'] = $this->desc;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['idApplicationStatusTypeCd'] = $this->idApplicationStatusTypeCd;
               
                                 
                 $arrReturn['consumerKey'] = $this->consumerKey;
               
                                 
                 $arrReturn['consumerSecret'] = $this->consumerSecret;
               
                                 
                 $arrReturn['domain'] = $this->domain;
               
                                 
                 $arrReturn['callback_url'] = $this->callback_url;
               
                                 
                 $arrReturn['namespace'] = $this->namespace;
               
                                 
                 $arrReturn['idApplicationPermissionLevel'] = $this->idApplicationPermissionLevel;
               
                                 
                 $arrReturn['iframe_url'] = $this->iframe_url;
               
                                 
                 $arrReturn['bartender_url'] = $this->bartender_url;
               
                                 
                 $arrReturn['player_url'] = $this->player_url;
            
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
	        	 
	   			case('IdApplication'): 
	   			case('idApplication'): 
	   				if(array_key_exists('idApplication', $this->arrDBFields)){
	        			return $this->arrDBFields['idApplication'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdDeveloper'): 
	   			case('idDeveloper'): 
	   				if(array_key_exists('idDeveloper', $this->arrDBFields)){
	        			return $this->arrDBFields['idDeveloper'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Name'): 
	   			case('name'): 
	   				if(array_key_exists('name', $this->arrDBFields)){
	        			return $this->arrDBFields['name'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Desc'): 
	   			case('desc'): 
	   				if(array_key_exists('desc', $this->arrDBFields)){
	        			return $this->arrDBFields['desc'];
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
	        	 
	   			case('IdApplicationStatusTypeCd'): 
	   			case('idApplicationStatusTypeCd'): 
	   				if(array_key_exists('idApplicationStatusTypeCd', $this->arrDBFields)){
	        			return $this->arrDBFields['idApplicationStatusTypeCd'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('ConsumerKey'): 
	   			case('consumerKey'): 
	   				if(array_key_exists('consumerKey', $this->arrDBFields)){
	        			return $this->arrDBFields['consumerKey'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('ConsumerSecret'): 
	   			case('consumerSecret'): 
	   				if(array_key_exists('consumerSecret', $this->arrDBFields)){
	        			return $this->arrDBFields['consumerSecret'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Domain'): 
	   			case('domain'): 
	   				if(array_key_exists('domain', $this->arrDBFields)){
	        			return $this->arrDBFields['domain'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Callback_url'): 
	   			case('callback_url'): 
	   				if(array_key_exists('callback_url', $this->arrDBFields)){
	        			return $this->arrDBFields['callback_url'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Namespace'): 
	   			case('namespace'): 
	   				if(array_key_exists('namespace', $this->arrDBFields)){
	        			return $this->arrDBFields['namespace'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdApplicationPermissionLevel'): 
	   			case('idApplicationPermissionLevel'): 
	   				if(array_key_exists('idApplicationPermissionLevel', $this->arrDBFields)){
	        			return $this->arrDBFields['idApplicationPermissionLevel'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Iframe_url'): 
	   			case('iframe_url'): 
	   				if(array_key_exists('iframe_url', $this->arrDBFields)){
	        			return $this->arrDBFields['iframe_url'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Bartender_url'): 
	   			case('bartender_url'): 
	   				if(array_key_exists('bartender_url', $this->arrDBFields)){
	        			return $this->arrDBFields['bartender_url'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Player_url'): 
	   			case('player_url'): 
	   				if(array_key_exists('player_url', $this->arrDBFields)){
	        			return $this->arrDBFields['player_url'];
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
	   			 
	   			case('IdApplication'): 
	   			case('idApplication'): 
	        		$this->arrDBFields['idApplication'] = $strValue;
	        	break;
	        	 
	   			case('IdDeveloper'): 
	   			case('idDeveloper'): 
	        		$this->arrDBFields['idDeveloper'] = $strValue;
	        	break;
	        	 
	   			case('Name'): 
	   			case('name'): 
	        		$this->arrDBFields['name'] = $strValue;
	        	break;
	        	 
	   			case('Desc'): 
	   			case('desc'): 
	        		$this->arrDBFields['desc'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('IdApplicationStatusTypeCd'): 
	   			case('idApplicationStatusTypeCd'): 
	        		$this->arrDBFields['idApplicationStatusTypeCd'] = $strValue;
	        	break;
	        	 
	   			case('ConsumerKey'): 
	   			case('consumerKey'): 
	        		$this->arrDBFields['consumerKey'] = $strValue;
	        	break;
	        	 
	   			case('ConsumerSecret'): 
	   			case('consumerSecret'): 
	        		$this->arrDBFields['consumerSecret'] = $strValue;
	        	break;
	        	 
	   			case('Domain'): 
	   			case('domain'): 
	        		$this->arrDBFields['domain'] = $strValue;
	        	break;
	        	 
	   			case('Callback_url'): 
	   			case('callback_url'): 
	        		$this->arrDBFields['callback_url'] = $strValue;
	        	break;
	        	 
	   			case('Namespace'): 
	   			case('namespace'): 
	        		$this->arrDBFields['namespace'] = $strValue;
	        	break;
	        	 
	   			case('IdApplicationPermissionLevel'): 
	   			case('idApplicationPermissionLevel'): 
	        		$this->arrDBFields['idApplicationPermissionLevel'] = $strValue;
	        	break;
	        	 
	   			case('Iframe_url'): 
	   			case('iframe_url'): 
	        		$this->arrDBFields['iframe_url'] = $strValue;
	        	break;
	        	 
	   			case('Bartender_url'): 
	   			case('bartender_url'): 
	        		$this->arrDBFields['bartender_url'] = $strValue;
	        	break;
	        	 
	   			case('Player_url'): 
	   			case('player_url'): 
	        		$this->arrDBFields['player_url'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>