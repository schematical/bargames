<?php
class MLCBatchBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'MLCBatch';
    const P_KEY = 'idBatch';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idBatch = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new MLCBatch();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, MLCBatch::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new MLCBatch();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<MLCBatch>";
        
        $xmlStr .= "<idBatch>";
        $xmlStr .= $this->idBatch;
        $xmlStr .= "</idBatch>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<jobName>";
        $xmlStr .= $this->jobName;
        $xmlStr .= "</jobName>";
        
        $xmlStr .= "<report>";
        $xmlStr .= $this->report;
        $xmlStr .= "</report>";
        
        $xmlStr .= "<idBatchStatus>";
        $xmlStr .= $this->idBatchStatus;
        $xmlStr .= "</idBatchStatus>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</MLCBatch>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new MLCBatch();
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
        		return MLCBatch::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'MLCBatch')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdBatch;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "MLCBatch"');
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
				
				$tObj = new MLCBatch();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "MLCBatch";
               
                                 
                 $arrReturn['idBatch'] = $this->idBatch;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['jobName'] = $this->jobName;
               
                                 
                 $arrReturn['report'] = $this->report;
               
                                 
                 $arrReturn['idBatchStatus'] = $this->idBatchStatus;
            
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
	        	 
	   			case('IdBatch'): 
	   			case('idBatch'): 
	   				if(array_key_exists('idBatch', $this->arrDBFields)){
	        			return $this->arrDBFields['idBatch'];
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
	        	 
	   			case('JobName'): 
	   			case('jobName'): 
	   				if(array_key_exists('jobName', $this->arrDBFields)){
	        			return $this->arrDBFields['jobName'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Report'): 
	   			case('report'): 
	   				if(array_key_exists('report', $this->arrDBFields)){
	        			return $this->arrDBFields['report'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdBatchStatus'): 
	   			case('idBatchStatus'): 
	   				if(array_key_exists('idBatchStatus', $this->arrDBFields)){
	        			return $this->arrDBFields['idBatchStatus'];
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
	   			 
	   			case('IdBatch'): 
	   			case('idBatch'): 
	        		$this->arrDBFields['idBatch'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('JobName'): 
	   			case('jobName'): 
	        		$this->arrDBFields['jobName'] = $strValue;
	        	break;
	        	 
	   			case('Report'): 
	   			case('report'): 
	        		$this->arrDBFields['report'] = $strValue;
	        	break;
	        	 
	   			case('IdBatchStatus'): 
	   			case('idBatchStatus'): 
	        		$this->arrDBFields['idBatchStatus'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>