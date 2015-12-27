<?php
$con = mysql_connect("localhost","pi");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("db", $con);
 
$sql="INSERT INTO tasks (name, t_desc, due)
VALUES
('$_POST[name]','$_POST[desc]','$_POST[due]')";
 
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
 
mysql_close($con)
?>
</body>
</html>