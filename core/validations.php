<?php

// check empty fileds
function validfiled($filed,$Value){

    return empty($Value)?  "$filed  is requried" : null;


}


function check_email($email){

return filter_var($email,FILTER_VALIDATE_EMAIL)?  null : "please enter correct email";
     
}

function check_number($number){

    //  value of number between 2 numbers to 7 numbers as 20$ or 1000000$
    if(is_numeric($number)|| preg_match("/^\d{2,7}$/",$number)){


        return null;
    }else{


        return "please enter  a numeric vlaue ";
    }
}

 
function phone_number($phone){

    // phone number can be start with + or no as +201234567890 ,0123456789 ,+44 1234-567890,+1-234-567-8901

    if(preg_match("/^\+?[0-9\- ]{10,20}$/",$phone)){



        return null;
    }else{


        return "please enter correct phone number ";
    }
}

function check_text($text){

    // accepte arabic char and a or A char 
    if(preg_match("/^[\p{Arabic}a-zA-Z ]+$/u",$text)){


        return null;

    }else{



        return "please enter english or arabic char";
    }



}


function check_employees_data($name,$email,$phone,$salary,$type){

    $employee=[
        "name"=>$name,
        "email"=>$email,
        "salary"=>$salary,
        "phone number"=>$phone,
        "type"=>$type
             ];

            //   check empty fileds
    foreach($employee as $index=>$data){


        if($error=validfiled($index,$data)){

            return $error; }
    }
   
    if($error=check_text($name)){

        return $error;
    }elseif( $error=check_email($email)){

        return $error;

    }elseif($error=check_number($salary)){

        return $error;

    }elseif($error=phone_number($phone)){

        return $error;

    }else{

        return null;
    }





}



?>