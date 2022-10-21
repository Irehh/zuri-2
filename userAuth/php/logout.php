<?php
session_start();
function logout(){
    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
if(isset($_session['username'])){
    // do something
    session_reset();
    session_destroy();
    header("location:./index.php");
}else{
   die;
}
}

logout();

