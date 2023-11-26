<?php
session_start();
var_dump( $_SESSION["nav-item2"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Session</title>
</head>
<body>
  <button onclick="updateSession()">Update Session</button>

  <script>
    function updateSession() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "up.php?test=3", true);
        xhr.send();
    }

  </script>
</body>
</html>
