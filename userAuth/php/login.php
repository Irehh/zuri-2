<?php 

function loginUser($email, $password){

    $csvStr = file_get_contents("../storage/users.csv");
    $checkemail = strpos($csvStr , $email);
    $checkpassword = strpos($csvStr,$password);

    if ($checkemail == true && $checkpassword == true) {	
        $read = fopen('../storage/users.csv', 'r');
        $row = fgetcsv($read);
        $_SESSION['username'] = $row[0];
        header("location:../dashboard.php");
        fclose($read);
        
        exit();
        }
        else 
             {	
                header("location:../forms/login.html");
            }
}


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

loginUser($email, $password);

}



?>
