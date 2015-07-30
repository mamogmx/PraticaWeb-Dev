<?php

class Form{
    var $schema;
    var $table;
    var $conn;
    var $conf;
    var $mode;
    function __construct($confFile,$mode="view"){
        //READ CONFIG FILE
        if (!file_exists($confFile)){
            throw new Exception("No configuration file found!");
        }
        $f = fopen($confFile,"r");
        $conf=fread($f,filesize($confFile));
        $data = json_decode($conf,TRUE);
        if ($data===FALSE){
            throw new Exception("Data could not be decoded");
        }
        //SELECT MODE
        $this->mode = $this->_getMode(array_keys($data),$mode);
        if (!$this->mode){
            throw new Exception("No mode is found");
        }
        
        // GET DB
        $this->conn = $this->getDb();
        
        //GET DATA FROM CONFIG FILE
        $this->schema=($data[$this->mode]["schema"])?($data[$this->mode]["schema"]):($data["general"]["schema"]);
        $this->table=($data[$this->mode]["table"])?($data[$this->mode]["table"]):($data["general"]["table"]);
        $this->editable = ($data["general"]["editable"])?($data["general"]["editable"]):Array();
        $this->viewable = ($data["general"]["viewable"])?($data["general"]["viewable"]):Array();
        
        
        $this->datasource = $this->_getDataSource($data["general"]["data-source"]);
        
        $this->sections = $data[$this->mode]["sections"];
    }
    
    function getDb($params=Array()){
        $user = ($params["user"])?($params["user"]):(DB_USER);
        $pwd = ($params["pwd"])?($params["pwd"]):(DB_PWD);
        $dsn = ($params["dsn"])?($params["dsn"]):(DSN);
        $conn = new PDO($dsn, $user, $pwd);
        return $conn;
    }
    
    private function _getMode($modeList,$mode){
        if (in_array($mode,$modeList)) return $mode;
        elseif($mode=="new"){
            if (in_array("edit",$modeList)) return "edit";
            elseif (in_array("default",$modeList)) return "default";
            else return "";
        }
        else{
            if (in_array("default",$modeList)) return "default";
            else return "";
        } 
    }
    
    private function _getDataSource($src){
        $result = Array();
        
        for($i=0;$i<count($src);$i++){
            $s = $src[$i];
            $prms = array_keys($s);
            if (in_array("other",$prms) && count($s["other_field"])){
                $otherFields = ", ".implode(", ",$s["other_field"]);
            }
            else
                $otherFields="";
  
            if (in_array("filter",$prms) && $s["filter"]){
                $filter = $s["filter"];
            }
            else{
                $filter = "TRUE";
            }

            if (in_array("order",$prms)){
                $tmp = Array();
                for($j=0;$j<count($s["order"]);$j++){
                    $tmp[]=trim(sprintf("%s %s",$s["order"][$j]["sort_on"],$s["order"][$j]["sort_order"]));
                }
                $order = implode(",",$tmp);
                if ($order) $order = "ORDER BY $order";
            }
            
            $sql = trim(sprintf("SELECT DISTINCT %s as id, %s as label %s FROM %s.%s WHERE %s %s",$s["id"],$s["label"],$otherFields,$s["schema"],$s["table"],$filter,$order));
            echo "<p>$sql</p>";
            $stmt = $this->conn->prepare($sql);
            if ($stmt->execute()){
                $result[$s["name"]]=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                $result[$s["name"]]=Array();
            }
            return $result;
            
        }
    }
    
    function getData($filter){
        $sql = "SELECT * FROM %s.%s WHERE %s;";
    }
}
?>