<?php
$con = mysql_connect("localhost","pi");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("db", $con);

$sql="UPDATE tasks SET
name = '$_POST[name]',
t_desc = '$_POST[desc]',
due = '$_POST[due]'
where id = '$_POST[id]'";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record updated?";

mysql_close($con);
header('location:tasks.php');

?>
</body>
</html>
