<?php

if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file

$csvStr = file_get_contents("../storage/users.csv");
$findEmail   = $email;
$pos = strpos($csvStr , $findEmail);
if ($pos === false) {	
    $opencsv = fopen("../storage/users.csv", 'a');
    $data = array(
        'username' => $username,
        'email' => $email,
        'password' => $password
    );

     fputcsv($opencsv, $data);	
     echo "User Successfully register";
   
    fclose($opencsv);
    exit();
    }
    else 
         {	echo "retval = 0  User already registered";}

    // echo "OKAY";
}





  


//     $read = fopen('./userdata.csv', 'r');

// while(!feof($read)) {

//     $row = fgetcsv($read);

//     if (!empty($row)) {
//            $r = "$row[0] using $row[1] born on $row[2] is a $row[3] from $row[4] " . "<br>";
//            print_r($r);
//     }
// }

// fclose($read);





?>


