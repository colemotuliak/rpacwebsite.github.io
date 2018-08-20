<?php 
date_default_timezone_set('America/Indianapolis');
$date = date('m/d/Y h:i:s a', time());
$ip = $_SERVER['REMOTE_ADDR'];
$ip = $_SERVER['REMOTE_ADDR'];
$geodetails = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$name = $_POST['name'];
$email = $_POST['email'];
$typechange = $_POST['typechange'];
$priority = $_POST['priority'];
$description = $_POST['description'];
$my_file = 'change_request.txt';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
$data = "
        User IP: $ip
        Location: $geodetails->city, $geodetails->region $geodetails->country
        Date: $date
        Priority: $priority
        From: $name
        Email: $email
        Type of Change: $typechange
        Description: $description
        ";
fwrite($handle, $data);
echo "Your request has been recorded. Please allow 24 hours for the change to be complete.";
?>