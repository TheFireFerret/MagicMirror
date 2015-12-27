<?php
$con = mysql_connect("localhost","pi");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("db", $con);
 
$sql="DELETE FROM tasks where id = '$_POST[id]'";
 
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record removed";
 
mysql_close($con)
?>
</body>
</html>