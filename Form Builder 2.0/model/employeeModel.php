<?php
require_once("../class/models.php");

class Employee{
    private $Object;
    public function __construct(){
        $this->Object = new Models();
        $this->Object->genMeta($this->MetaData(), get_class());
    }

    private function MetaData(){
        $meta = [];
        $meta[0] = $this->Object->integerField("id",TRUE, 10);
        $meta[1] = $this->Object->textField("name");
        $meta[2] = $this->Object->textField("Course");
        $meta[3] = $this->Object->dateField("dob", "NOT NULL");
        $meta[4] = $this->Object->charField("grade",2);
        return $meta;
    }
}
$ob = new Employee();
?>