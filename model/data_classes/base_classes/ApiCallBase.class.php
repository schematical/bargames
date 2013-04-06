<?php
class ApiCallBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'ApiCall';
    const P_KEY = 'idApiCall';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idApiCall = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiCall();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, ApiCall::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiCall();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<ApiCall>";
        
        $xmlStr .= "<idApiCall>";
        $xmlStr .= $this->idApiCall;
        $xmlStr .= "</idApiCall>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<exeTime>";
        $xmlStr .= $this->exeTime;
        $xmlStr .= "</exeTime>";
        
        $xmlStr .= "<requestUri>";
        $xmlStr .= $this->requestUri;
        $xmlStr .= "</requestUri>";
        
        $xmlStr .= "<postData>";
        $xmlStr .= $this->postData;
        $xmlStr .= "</postData>";
        
        $xmlStr .= "<responseData>";
        $xmlStr .= $this->responseData;
        $xmlStr .= "</responseData>";
        
        $xmlStr .= "<idApplication>";
        $xmlStr .= $this->idApplication;
        $xmlStr .= "</idApplication>";
        
        $xmlStr .= "<idTrackingEvent>";
        $xmlStr .= $this->idTrackingEvent;
        $xmlStr .= "</idTrackingEvent>";
        
        $xmlStr .= "<user_agent>";
        $xmlStr .= $this->user_agent;
        $xmlStr .= "</user_agent>";
        
        $xmlStr .= "<lat>";
        $xmlStr .= $this->lat;
        $xmlStr .= "</lat>";
        
        $xmlStr .= "<lng>";
        $xmlStr .= $this->lng;
        $xmlStr .= "</lng>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</ApiCall>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new ApiCall();
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
        $sql = sprintf("SELECT * FROM ApiCall WHERE idApplication = %s;", $intIdApplication);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objApiCall = new ApiCall();
			$objApiCall->materilize($data);
			$coll->addItem($objApiCall);
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
        		return ApiCall::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'ApiCall')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdApiCall;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "ApiCall"');
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
				
				$tObj = new ApiCall();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "ApiCall";
               
                                 
                 $arrReturn['idApiCall'] = $this->idApiCall;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['exeTime'] = $this->exeTime;
               
                                 
                 $arrReturn['requestUri'] = $this->requestUri;
               
                                 
                 $arrReturn['postData'] = $this->postData;
               
                                 
                 $arrReturn['responseData'] = $this->responseData;
               
                                 
                 $arrReturn['idApplication'] = $this->idApplication;
               
                                 
                 $arrReturn['idTrackingEvent'] = $this->idTrackingEvent;
               
                                 
                 $arrReturn['user_agent'] = $this->user_agent;
               
                                 
                 $arrReturn['lat'] = $this->lat;
               
                                 
                 $arrReturn['lng'] = $this->lng;
            
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
	        	 
	   			case('IdApiCall'): 
	   			case('idApiCall'): 
	   				if(array_key_exists('idApiCall', $this->arrDBFields)){
	        			return $this->arrDBFields['idApiCall'];
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
	        	 
	   			case('ExeTime'): 
	   			case('exeTime'): 
	   				if(array_key_exists('exeTime', $this->arrDBFields)){
	        			return $this->arrDBFields['exeTime'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('RequestUri'): 
	   			case('requestUri'): 
	   				if(array_key_exists('requestUri', $this->arrDBFields)){
	        			return $this->arrDBFields['requestUri'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('PostData'): 
	   			case('postData'): 
	   				if(array_key_exists('postData', $this->arrDBFields)){
	        			return $this->arrDBFields['postData'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('ResponseData'): 
	   			case('responseData'): 
	   				if(array_key_exists('responseData', $this->arrDBFields)){
	        			return $this->arrDBFields['responseData'];
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
	        	 
	   			case('IdTrackingEvent'): 
	   			case('idTrackingEvent'): 
	   				if(array_key_exists('idTrackingEvent', $this->arrDBFields)){
	        			return $this->arrDBFields['idTrackingEvent'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('User_agent'): 
	   			case('user_agent'): 
	   				if(array_key_exists('user_agent', $this->arrDBFields)){
	        			return $this->arrDBFields['user_agent'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Lat'): 
	   			case('lat'): 
	   				if(array_key_exists('lat', $this->arrDBFields)){
	        			return $this->arrDBFields['lat'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Lng'): 
	   			case('lng'): 
	   				if(array_key_exists('lng', $this->arrDBFields)){
	        			return $this->arrDBFields['lng'];
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
	   			 
	   			case('IdApiCall'): 
	   			case('idApiCall'): 
	        		$this->arrDBFields['idApiCall'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('ExeTime'): 
	   			case('exeTime'): 
	        		$this->arrDBFields['exeTime'] = $strValue;
	        	break;
	        	 
	   			case('RequestUri'): 
	   			case('requestUri'): 
	        		$this->arrDBFields['requestUri'] = $strValue;
	        	break;
	        	 
	   			case('PostData'): 
	   			case('postData'): 
	        		$this->arrDBFields['postData'] = $strValue;
	        	break;
	        	 
	   			case('ResponseData'): 
	   			case('responseData'): 
	        		$this->arrDBFields['responseData'] = $strValue;
	        	break;
	        	 
	   			case('IdApplication'): 
	   			case('idApplication'): 
	        		$this->arrDBFields['idApplication'] = $strValue;
	        	break;
	        	 
	   			case('IdTrackingEvent'): 
	   			case('idTrackingEvent'): 
	        		$this->arrDBFields['idTrackingEvent'] = $strValue;
	        	break;
	        	 
	   			case('User_agent'): 
	   			case('user_agent'): 
	        		$this->arrDBFields['user_agent'] = $strValue;
	        	break;
	        	 
	   			case('Lat'): 
	   			case('lat'): 
	        		$this->arrDBFields['lat'] = $strValue;
	        	break;
	        	 
	   			case('Lng'): 
	   			case('lng'): 
	        		$this->arrDBFields['lng'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>