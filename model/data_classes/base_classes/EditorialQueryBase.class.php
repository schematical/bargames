<?php
class EditorialQueryBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'EditorialQuery';
    const P_KEY = 'idEditorialQuery';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idEditorialQuery = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new EditorialQuery();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, EditorialQuery::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new EditorialQuery();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<EditorialQuery>";
        
        $xmlStr .= "<idEditorialQuery>";
        $xmlStr .= $this->idEditorialQuery;
        $xmlStr .= "</idEditorialQuery>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<deadlineDate>";
        $xmlStr .= $this->deadlineDate;
        $xmlStr .= "</deadlineDate>";
        
        $xmlStr .= "<idReporter>";
        $xmlStr .= $this->idReporter;
        $xmlStr .= "</idReporter>";
        
        $xmlStr .= "<shortDesc>";
        $xmlStr .= $this->shortDesc;
        $xmlStr .= "</shortDesc>";
        
        $xmlStr .= "<query>";
        $xmlStr .= $this->query;
        $xmlStr .= "</query>";
        
        $xmlStr .= "<requirements>";
        $xmlStr .= $this->requirements;
        $xmlStr .= "</requirements>";
        
        $xmlStr .= "<category>";
        $xmlStr .= $this->category;
        $xmlStr .= "</category>";
        
        $xmlStr .= "<contactInfo>";
        $xmlStr .= $this->contactInfo;
        $xmlStr .= "</contactInfo>";
        
        $xmlStr .= "<alertedDate>";
        $xmlStr .= $this->alertedDate;
        $xmlStr .= "</alertedDate>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</EditorialQuery>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new EditorialQuery();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll->getCollection();
	}

     //Get children
    

    //Load by foregin key
    
    public static function LoadCollByIdReporter($intIdReporter){
        $sql = sprintf("SELECT * FROM EditorialQuery WHERE idReporter = %s;", $intIdReporter);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objEditorialQuery = new EditorialQuery();
			$objEditorialQuery->materilize($data);
			$coll->addItem($objEditorialQuery);
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
        		return EditorialQuery::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'EditorialQuery')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdEditorialQuery;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "EditorialQuery"');
        	}        	
        }
        public function LoadSingleByField( $strField, $mixValue, $strCompairison = '='){
        	$arrResults = self::LoadArrayByField($strField, $mixValue, $strCompairison);
        	if(count($arrResults)){
        		return $arrResults[0];
        	}
        	return null;
        }
        public function LoadArrayByField( $strField, $mixValue, $strCompairison = '='){
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
				
				$tObj = new EditorialQuery();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "EditorialQuery";
               
                                 
                 $arrReturn['idEditorialQuery'] = $this->idEditorialQuery;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['deadlineDate'] = $this->deadlineDate;
               
                                 
                 $arrReturn['idReporter'] = $this->idReporter;
               
                                 
                 $arrReturn['shortDesc'] = $this->shortDesc;
               
                                 
                 $arrReturn['query'] = $this->query;
               
                                 
                 $arrReturn['requirements'] = $this->requirements;
               
                                 
                 $arrReturn['category'] = $this->category;
               
                                 
                 $arrReturn['contactInfo'] = $this->contactInfo;
               
                                 
                 $arrReturn['alertedDate'] = $this->alertedDate;
            
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
	        	 
	   			case('IdEditorialQuery'): 
	   			case('idEditorialQuery'): 
	   				if(array_key_exists('idEditorialQuery', $this->arrDBFields)){
	        			return $this->arrDBFields['idEditorialQuery'];
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
	        	 
	   			case('DeadlineDate'): 
	   			case('deadlineDate'): 
	   				if(array_key_exists('deadlineDate', $this->arrDBFields)){
	        			return $this->arrDBFields['deadlineDate'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdReporter'): 
	   			case('idReporter'): 
	   				if(array_key_exists('idReporter', $this->arrDBFields)){
	        			return $this->arrDBFields['idReporter'];
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
	        	 
	   			case('Query'): 
	   			case('query'): 
	   				if(array_key_exists('query', $this->arrDBFields)){
	        			return $this->arrDBFields['query'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Requirements'): 
	   			case('requirements'): 
	   				if(array_key_exists('requirements', $this->arrDBFields)){
	        			return $this->arrDBFields['requirements'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Category'): 
	   			case('category'): 
	   				if(array_key_exists('category', $this->arrDBFields)){
	        			return $this->arrDBFields['category'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('ContactInfo'): 
	   			case('contactInfo'): 
	   				if(array_key_exists('contactInfo', $this->arrDBFields)){
	        			return $this->arrDBFields['contactInfo'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('AlertedDate'): 
	   			case('alertedDate'): 
	   				if(array_key_exists('alertedDate', $this->arrDBFields)){
	        			return $this->arrDBFields['alertedDate'];
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
	   			 
	   			case('IdEditorialQuery'): 
	   			case('idEditorialQuery'): 
	        		$this->arrDBFields['idEditorialQuery'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('DeadlineDate'): 
	   			case('deadlineDate'): 
	        		$this->arrDBFields['deadlineDate'] = $strValue;
	        	break;
	        	 
	   			case('IdReporter'): 
	   			case('idReporter'): 
	        		$this->arrDBFields['idReporter'] = $strValue;
	        	break;
	        	 
	   			case('ShortDesc'): 
	   			case('shortDesc'): 
	        		$this->arrDBFields['shortDesc'] = $strValue;
	        	break;
	        	 
	   			case('Query'): 
	   			case('query'): 
	        		$this->arrDBFields['query'] = $strValue;
	        	break;
	        	 
	   			case('Requirements'): 
	   			case('requirements'): 
	        		$this->arrDBFields['requirements'] = $strValue;
	        	break;
	        	 
	   			case('Category'): 
	   			case('category'): 
	        		$this->arrDBFields['category'] = $strValue;
	        	break;
	        	 
	   			case('ContactInfo'): 
	   			case('contactInfo'): 
	        		$this->arrDBFields['contactInfo'] = $strValue;
	        	break;
	        	 
	   			case('AlertedDate'): 
	   			case('alertedDate'): 
	        		$this->arrDBFields['alertedDate'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>