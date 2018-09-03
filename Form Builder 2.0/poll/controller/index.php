<?php
dirname(__DIR__);
require_once("class/controller.php");
require_once("class/formBuilder.php");

class poll extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        echo "this is index";
    }

    public function form(){
        $ob = new FormBuilder("poll");
        $ob->generateForm();  
        if (isset($_POST["formdata"])){
            echo $res = $this->submitData("poll");
            if($res==1){
               echo "success";
            }else{
              echo "try again";
            }
        }
    }

    public function show(){
        $data = $this->selectData("poll");
       // print_r(array_keys($data[0]));
        echo "<table>";
        for($i=0;$i<count($data);$i++){
            echo "<tr>
                <td>".$data[$i][1]."</td>
                <td>".$data[$i][2]."</td>
                <td>".$data[$i][3]."</td>
                <td>".$data[$i][4]."</td>
                <td><a href='update/".$data[$i][0]."'>Update</a></td>
                <td><a href='delete/".$data[$i][0]."'>Delete</a></td>
            </tr>";  
        }
    }

    public function delete($key){
        $res = $this->deleteData("poll", [$key]);
        if($res==1){
            echo "success";
        }else{
            echo "try again";
        }
        header("refresh:1;url=../show");
    }

    public function update($key){
        $data = $this->selectData("poll", $key);
        if(isset($data[0])){
            $ob = new FormBuilder("poll");
            $ob->generateForm($data);
            
            if (isset($_POST["formdata"])){
                echo $res = $this->updateData("poll",$key);
                if($res==1){
                echo "success";
                }else{
                echo "try again";
                }
                header("refresh:1;url=../show");
            }
        }else{
            header("location:../show");
        }
    }
}
?>