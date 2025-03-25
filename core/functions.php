<?php
include(__DIR__."/validations.php");
// include(__DIR__."/../handelers/main_employee.php");

session_start();

function set_massage($type,$massage){
    $_SESSION["massage"]=[
        "type"=>$type,
        "massage"=>$massage
    ];

}

// use session to print massage 

function show_massage(){

    if(isset($_SESSION["massage"])){

        $type=$_SESSION["massage"]["type"];
        $massage=$_SESSION["massage"]["massage"];

        echo "<div class 'alert alert-$type' role='alert'>$massage</div>";

        unset($_SESSION["massage"]);

    }


}

// to make jeson file and store correct data
$file="employeeData.json";

function add_employee($arry){
 global $file;

    if(file_exists($file)){

       $newArry=json_decode(file_get_contents($file),true);
        if(!is_array($newArry)){

            $newArry=[];
        }

        $newArry[]=$arry;


        file_put_contents($file,json_encode($newArry,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));

    }else{
        // if file not exixts create new file

        file_put_contents($file,json_encode($newArry,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));

    }


}








?>