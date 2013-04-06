<?php
class StripeDataBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'StripeData';
    const P_KEY = 'idStripeData';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idStripeData = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new StripeData();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, StripeData::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new StripeData();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<StripeData>";
        
        $xmlStr .= "<idStripeData>";
        $xmlStr .= $this->idStripeData;
        $xmlStr .= "</idStripeData>";
        
        $xmlStr .= "<idUser>";
        $xmlStr .= $this->idUser;
        $xmlStr .= "</idUser>";
        
        $xmlStr .= "<idParentStripeData>";
        $xmlStr .= $this->idParentStripeData;
        $xmlStr .= "</idParentStripeData>";
        
        $xmlStr .= "<stripeId>";
        $xmlStr .= $this->stripeId;
        $xmlStr .= "</stripeId>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<object>";
        $xmlStr .= $this->object;
        $xmlStr .= "</object>";
        
        $xmlStr .= "<data>";
        $xmlStr .= $this->data;
        $xmlStr .= "</data>";
        
        $xmlStr .= "<mode>";
        $xmlStr .= $this->mode;
        $xmlStr .= "</mode>";
        
        $xmlStr .= "<instance_url>";
        $xmlStr .= $this->instance_url;
        $xmlStr .= "</instance_url>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</StripeData>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new StripeData();
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
        		return StripeData::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'StripeData')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdStripeData;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "StripeData"');
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
				
				$tObj = new StripeData();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "StripeData";
               
                                 
                 $arrReturn['idStripeData'] = $this->idStripeData;
               
                                 
                 $arrReturn['idUser'] = $this->idUser;
               
                                 
                 $arrReturn['idParentStripeData'] = $this->idParentStripeData;
               
                                 
                 $arrReturn['stripeId'] = $this->stripeId;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['object'] = $this->object;
               
                                 
                 $arrReturn['data'] = $this->data;
               
                                 
                 $arrReturn['mode'] = $this->mode;
               
                                 
                 $arrReturn['instance_url'] = $this->instance_url;
            
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
	        	 
	   			case('IdStripeData'): 
	   			case('idStripeData'): 
	   				if(array_key_exists('idStripeData', $this->arrDBFields)){
	        			return $this->arrDBFields['idStripeData'];
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
	        	 
	   			case('IdParentStripeData'): 
	   			case('idParentStripeData'): 
	   				if(array_key_exists('idParentStripeData', $this->arrDBFields)){
	        			return $this->arrDBFields['idParentStripeData'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('StripeId'): 
	   			case('stripeId'): 
	   				if(array_key_exists('stripeId', $this->arrDBFields)){
	        			return $this->arrDBFields['stripeId'];
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
	        	 
	   			case('Object'): 
	   			case('object'): 
	   				if(array_key_exists('object', $this->arrDBFields)){
	        			return $this->arrDBFields['object'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Data'): 
	   			case('data'): 
	   				if(array_key_exists('data', $this->arrDBFields)){
	        			return $this->arrDBFields['data'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Mode'): 
	   			case('mode'): 
	   				if(array_key_exists('mode', $this->arrDBFields)){
	        			return $this->arrDBFields['mode'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Instance_url'): 
	   			case('instance_url'): 
	   				if(array_key_exists('instance_url', $this->arrDBFields)){
	        			return $this->arrDBFields['instance_url'];
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
	   			 
	   			case('IdStripeData'): 
	   			case('idStripeData'): 
	        		$this->arrDBFields['idStripeData'] = $strValue;
	        	break;
	        	 
	   			case('IdUser'): 
	   			case('idUser'): 
	        		$this->arrDBFields['idUser'] = $strValue;
	        	break;
	        	 
	   			case('IdParentStripeData'): 
	   			case('idParentStripeData'): 
	        		$this->arrDBFields['idParentStripeData'] = $strValue;
	        	break;
	        	 
	   			case('StripeId'): 
	   			case('stripeId'): 
	        		$this->arrDBFields['stripeId'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('Object'): 
	   			case('object'): 
	        		$this->arrDBFields['object'] = $strValue;
	        	break;
	        	 
	   			case('Data'): 
	   			case('data'): 
	        		$this->arrDBFields['data'] = $strValue;
	        	break;
	        	 
	   			case('Mode'): 
	   			case('mode'): 
	        		$this->arrDBFields['mode'] = $strValue;
	        	break;
	        	 
	   			case('Instance_url'): 
	   			case('instance_url'): 
	        		$this->arrDBFields['instance_url'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>