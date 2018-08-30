<?php
require_once('config.php');

class Models{
    private $integer = "INT";
    private $char = "CHAR";
    private $varchar = "VARCHAR";
    private $date = "DATE";
    private $datetime = "DATETIME";
    private $password = "VARCHAR";

    public function integerField($name, $is_primary=TRUE, $length="", $null="null"){
        $str = "";
        if($is_primary==TRUE){
            $str = "AUTO_INCREMENT PRIMARY KEY";
            $null = "";
        }
        return $name." ".$this->integer."(".$length.") ".$str." ".$null;
    }

    public function charField($name, $length=25, $null=null){
        return $name." ".$this->char."(".$length.") ".$null;
    }

    public function textField($name, $length=25, $null=null){
        return $name." ".$this->varchar."(".$length.") ".$null;
    }
 
    public function dateField($name, $null="DEFAULT CURRENT_DATE"){
        return $name." ".$this->date." ".$null;
    }

    public function dateTimeField($name, $null="DEFAULT CURRENT_TIMESTAMP"){
        return $name." ".$this->datetime." ".$null;
    }

    public function passwordField($name, $length=25, $null=null){
        return $name." ".$this->varchar."(".$length.") ".$null;
    }

    public function genMeta($meta, $tablename){
        $count = count($meta);
        $sql = "DROP TABLE IF EXISTS ".$tablename."; CREATE TABLE ".$tablename." (";
        for($i=0;$i<$count;$i++){
            if($i!=($count-1)){
                $sql .= $meta[$i].", ";
            }else{
                $sql .= $meta[$i]." ";
            }
        }
        $sql .= ")";
        $this->buildSql($sql);
        //echo $sql;
    }

    private function buildSql($sql){
        $ob = new Connect();
        $x = $ob->ProcessQuery($sql,[""]);
        echo "res : ".$x;
    }
}

?>