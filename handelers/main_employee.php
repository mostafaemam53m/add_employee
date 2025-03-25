<?php
// include ( __DIR__."/../core/validations.php");
include(__DIR__."/../core/functions.php");
//  to get data from employee form
 
if($_SERVER["REQUEST_METHOD"]=="POST"){

     $name=$_POST["name"];
     $email=$_POST["email"];
      $salary=$_POST["salary"];
      $phone=$_POST["phone"];
     $type=$_POST["type"];

    
  $employee_data=[
        "name"=>$name,
        "email"=>$email,
        "salary"=>$salary,
        "phone"=>$phone,
        "type"=>$type
    ];

    
    
    $error=check_employees_data($name,$email,$phone,$salary,$type);
//  echo ($error);

 session_start();
 if(empty($error)){

    set_massage("success","Employee added sucessfully");

    header("location: /329/task7/form_employee.php");

 }else{

    set_massage("danger",$error);
    header("location: /329/task7/form_employee.php");

 }

 

//  if there is error no do any thing if not error add employee data
empty($error)? add_employee($employee_data): null  ;
   

}


?>