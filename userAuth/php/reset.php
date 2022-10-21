<?php
 session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){
    //open file and check if the username exist inside
    $csvStr = file_get_contents("../storage/users.csv");
    $findEmail   = $email;
    $pos = strpos($csvStr , $findEmail);
    if ($pos == true) {	
        $read = fopen('../storage/users.csv','r');
        $row = fgetcsv($read);

        if(!empty($row[2])){
            $fname = "../storage/users.csv";
$fhandle = fopen($fname,"r");
$content = fread($fhandle,filesize($fname));

$content = str_replace("$row[2]", "$newpassword", $content);

$fhandle = fopen($fname,"w");
fwrite($fhandle,$content);
fclose($fhandle);
            //  $row[2];
            // $read = fopen('../storage/users.csv','w');
            // $row[2] = $newpassword;
            // fwrite($read,$row[2]);
            header("location:../forms/login.html");

        }  
        // header("location:../forms/login.html");
        fclose($read);
        exit();
        }
        else 
             {	
               echo "User does not exist";
            }
    //if it does, replace the password
}



