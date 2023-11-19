<?php
function api($method, $url, $data, $token) {
  $curl = curl_init();

  switch ($method) {
    case "POST":
      curl_setopt($curl, CURLOPT_POST, 1);

      if ($data) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      }
      break;
    case "GET":
      if ($data) {
        $url = sprintf("%s?%s", $url, http_build_query($data));
      }
      break;
    // Add cases for other HTTP methods if needed

    default:
      // Handle unsupported HTTP methods
      die("Unsupported HTTP method");
  }

  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $token, // Replace with your actual access token
    'Content-Type: application/json',
  ));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

  $result = curl_exec($curl);
  if ($result === false) {
    // Check for cURL errors
    die("Curl Error: " . curl_error($curl));
  }
  curl_close($curl);

  return $result;
}

function getData($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  $output = curl_exec($ch);
  if ($output === false) {
    // Check for cURL errors
    die("Curl Error: " . curl_error($ch));
  }
  curl_close($ch);

  return $output;
}
?>
