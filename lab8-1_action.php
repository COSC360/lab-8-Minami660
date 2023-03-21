<!DOCTYPE html> 
<html> 
<head></head> 
<body> 
<?php 

$file = file_get_contents('./data.txt');
print_r($file);

if ($_SERVER["REQUEST_METHOD"]=="GET"){
  if (!empty($_GET['firstname']) && !empty($_GET['key'])){ //Q3
    //echo "<p>".$_GET['firstname']." ".$_GET['key']."</p>"; //Q3
    $data = "<p>".$_GET['key'].",".$_GET['firstname']."</p>";
    //echo $data;
    $firstname = $_GET['firstname'];
    $key = $_GET['key'];
    //echo $firstname;
    //echo $key;
    file_put_contents('./data.txt',$data);
  } else {
    echo "<p> Invalid input </p>";
  }
} else if ($_SERVER["REQUEST_METHOD"]=="POST"){
  if (!empty($_POST['firstname']) && !empty($_POST['key'])){ 
    //echo "<p>".$_POST['firstname']." ".$_POST['key']."</p>";
    file_put_contents($file,$_POST['key'].','.$_POST['firstname']);
  } else {
    echo "<p> Invalid input </p>";
  }
}

$users = file('./data.txt') or die('ERROR: Cannot find file');
$delimiter = ',';
$newUsers = array();
foreach($users as $user){
  $userFields = explode($delimiter, $user);
  $key = userFields[0];
  $name = userFields[1];
  $caption = userFields[2];
  $image_path = userFields[3];
  array_push($newUsers,$key,$name,$caption,$image_path);
}

print_r($newUsers);



?> 
</body> 
</html> 
