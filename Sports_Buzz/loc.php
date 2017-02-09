<?php
session_start();
echo "Hey  ".$_SESSION['uname']." select the location";
echo "<br><br>";
?>
<html>
<body>
<form action="movies.php" method="post">
Location: <select name="name">
    <option value=" "> </option>
    <option value="nellore">nellore</option>
    <option value="warangal">warangal</option>
    <option value="hyderabad">hyderabad</option>
    <option value="chitoor">chitoor</option>
  </select>
<br><br>
<input type="submit" name="submit" value="submit">
</form>
</body>
</html>