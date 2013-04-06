<?php
class TrackingEventBase extends BaseEntity {
	const DB_CONN = 'DB_1';
    const TABLE_NAME = 'TrackingEvent';
    const P_KEY = 'idTrackingEvent';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idTrackingEvent = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new TrackingEvent();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, TrackingEvent::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new TrackingEvent();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<TrackingEvent>";
        
        $xmlStr .= "<idTrackingEvent>";
        $xmlStr .= $this->idTrackingEvent;
        $xmlStr .= "</idTrackingEvent>";
        
        $xmlStr .= "<name>";
        $xmlStr .= $this->name;
        $xmlStr .= "</name>";
        
        $xmlStr .= "<value>";
        $xmlStr .= $this->value;
        $xmlStr .= "</value>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<idUser>";
        $xmlStr .= $this->idUser;
        $xmlStr .= "</idUser>";
        
        $xmlStr .= "<idSession>";
        $xmlStr .= $this->idSession;
        $xmlStr .= "</idSession>";
        
        $xmlStr .= "<idApplication>";
        $xmlStr .= $this->idApplication;
        $xmlStr .= "</idApplication>";
        
        $xmlStr .= "<app>";
        $xmlStr .= $this->app;
        $xmlStr .= "</app>";
        
        $xmlStr .= "<form>";
        $xmlStr .= $this->form;
        $xmlStr .= "</form>";
        
        $xmlStr .= "<controlId>";
        $xmlStr .= $this->controlId;
        $xmlStr .= "</controlId>";
        
        $xmlStr .= "<text>";
        $xmlStr .= $this->text;
        $xmlStr .= "</text>";
        
        $xmlStr .= "<event>";
        $xmlStr .= $this->event;
        $xmlStr .= "</event>";
        
        $xmlStr .= "<ref>";
        $xmlStr .= $this->ref;
        $xmlStr .= "</ref>";
        
        $xmlStr .= "<utma>";
        $xmlStr .= $this->utma;
        $xmlStr .= "</utma>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</TrackingEvent>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new TrackingEvent();
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
    
    public static function LoadCollByIdSession($intIdSession){
        $sql = sprintf("SELECT * FROM TrackingEvent WHERE idSession = %s;", $intIdSession);
		$result = MLCDBDriver::Query($sql);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$objTrackingEvent = new TrackingEvent();
			$objTrackingEvent->materilize($data);
			$coll->addItem($objTrackingEvent);
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
        		return TrackingEvent::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'TrackingEvent')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdTrackingEvent;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "TrackingEvent"');
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
				
				$tObj = new TrackingEvent();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "TrackingEvent";
               
                                 
                 $arrReturn['idTrackingEvent'] = $this->idTrackingEvent;
               
                                 
                 $arrReturn['name'] = $this->name;
               
                                 
                 $arrReturn['value'] = $this->value;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['idUser'] = $this->idUser;
               
                                 
                 $arrReturn['idSession'] = $this->idSession;
               
                                 
                 $arrReturn['idApplication'] = $this->idApplication;
               
                                 
                 $arrReturn['app'] = $this->app;
               
                                 
                 $arrReturn['form'] = $this->form;
               
                                 
                 $arrReturn['controlId'] = $this->controlId;
               
                                 
                 $arrReturn['text'] = $this->text;
               
                                 
                 $arrReturn['event'] = $this->event;
               
                                 
                 $arrReturn['ref'] = $this->ref;
               
                                 
                 $arrReturn['utma'] = $this->utma;
            
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
	        	 
	   			case('IdTrackingEvent'): 
	   			case('idTrackingEvent'): 
	   				if(array_key_exists('idTrackingEvent', $this->arrDBFields)){
	        			return $this->arrDBFields['idTrackingEvent'];
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
	        	 
	   			case('Value'): 
	   			case('value'): 
	   				if(array_key_exists('value', $this->arrDBFields)){
	        			return $this->arrDBFields['value'];
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
	        	 
	   			case('IdSession'): 
	   			case('idSession'): 
	   				if(array_key_exists('idSession', $this->arrDBFields)){
	        			return $this->arrDBFields['idSession'];
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
	        	 
	   			case('App'): 
	   			case('app'): 
	   				if(array_key_exists('app', $this->arrDBFields)){
	        			return $this->arrDBFields['app'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Form'): 
	   			case('form'): 
	   				if(array_key_exists('form', $this->arrDBFields)){
	        			return $this->arrDBFields['form'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('ControlId'): 
	   			case('controlId'): 
	   				if(array_key_exists('controlId', $this->arrDBFields)){
	        			return $this->arrDBFields['controlId'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Text'): 
	   			case('text'): 
	   				if(array_key_exists('text', $this->arrDBFields)){
	        			return $this->arrDBFields['text'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Event'): 
	   			case('event'): 
	   				if(array_key_exists('event', $this->arrDBFields)){
	        			return $this->arrDBFields['event'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Ref'): 
	   			case('ref'): 
	   				if(array_key_exists('ref', $this->arrDBFields)){
	        			return $this->arrDBFields['ref'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Utma'): 
	   			case('utma'): 
	   				if(array_key_exists('utma', $this->arrDBFields)){
	        			return $this->arrDBFields['utma'];
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
	   			 
	   			case('IdTrackingEvent'): 
	   			case('idTrackingEvent'): 
	        		$this->arrDBFields['idTrackingEvent'] = $strValue;
	        	break;
	        	 
	   			case('Name'): 
	   			case('name'): 
	        		$this->arrDBFields['name'] = $strValue;
	        	break;
	        	 
	   			case('Value'): 
	   			case('value'): 
	        		$this->arrDBFields['value'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('IdUser'): 
	   			case('idUser'): 
	        		$this->arrDBFields['idUser'] = $strValue;
	        	break;
	        	 
	   			case('IdSession'): 
	   			case('idSession'): 
	        		$this->arrDBFields['idSession'] = $strValue;
	        	break;
	        	 
	   			case('IdApplication'): 
	   			case('idApplication'): 
	        		$this->arrDBFields['idApplication'] = $strValue;
	        	break;
	        	 
	   			case('App'): 
	   			case('app'): 
	        		$this->arrDBFields['app'] = $strValue;
	        	break;
	        	 
	   			case('Form'): 
	   			case('form'): 
	        		$this->arrDBFields['form'] = $strValue;
	        	break;
	        	 
	   			case('ControlId'): 
	   			case('controlId'): 
	        		$this->arrDBFields['controlId'] = $strValue;
	        	break;
	        	 
	   			case('Text'): 
	   			case('text'): 
	        		$this->arrDBFields['text'] = $strValue;
	        	break;
	        	 
	   			case('Event'): 
	   			case('event'): 
	        		$this->arrDBFields['event'] = $strValue;
	        	break;
	        	 
	   			case('Ref'): 
	   			case('ref'): 
	        		$this->arrDBFields['ref'] = $strValue;
	        	break;
	        	 
	   			case('Utma'): 
	   			case('utma'): 
	        		$this->arrDBFields['utma'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>