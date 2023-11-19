<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>

  <?php
  include 'function-api.php';
  if ($_POST['token']) {
    $token = $_POST['token'];
  }
  if ($_GET['token']) {
    $token = $_GET['token'];
  }
  $get_spaces = api('GET', 'https://api.ciscospark.com/v1/rooms', false, $token);
  $response = json_decode($get_spaces, true);

  echo "<h2>WEBEX Space</h2>";
  echo "<hr>";
  echo "<table border='2'";
  echo "<tr><th>Space Name</th><th>Space Type</th><th>Date Created</th><th>Call</th></tr>";

  foreach ($response as $value) {
    foreach ($value as $index => $row) {
      echo "<tr>";
      echo "<td>" . $row['title'] . "</td>";
      echo "<td>" . $row['type'] . "</td>";
      echo "<td>" . $row['created'] . "</td>";
      echo '<td><a href="call.php?destination=' . $row['id'] . '&token=' . $token . '">Click to Call</a></td>';
      echo "</tr>";
    }
  }

  echo '<a href="ui-create-spaces.php?token=' . $token . '">Create New Room</a>';
  ?>

</body>

</html>