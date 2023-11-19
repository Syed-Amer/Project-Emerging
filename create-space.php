<?php
include 'function-api.php';
$listData = array(
  "title" => $_POST['space_name']
);

$token = $_POST['token'];
$json_obj = json_encode($listData);
$create_space = api('POST', 'https://api.ciscospark.com/v1/rooms', $json_obj, $token);

header("location: ui-get-spaces.php?token=$token");
?>
