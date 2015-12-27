<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Magic Mirror</title>
    <meta name="description" content="">
    <meta http-equiv="refresh" content="1800" />
    <!--refresh page every 30 minutes-->
<script src="main.js"></script>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="main.css">
</head>
<body onload="getDate()">


<!--Date and Time-->
<div class="container">
    <div id="time" class="time"></div>
    <div id="day" class="day" align="right"></div>
    <br>
    <div id="date" class="date" align="right"></div>
</div>


<!--Weather from forecast.io widget-->
<div class="weather">
    <iframe style="-webkit-filter: invert(100%)" id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%"
            src="http://forecast.io/embed/#lat=30.4248&lon=-97.8441&name=Austin"> </iframe>
</div>



</body>
</html>


<?php
// Connecting, selecting database
$link = mysql_connect('localhost', 'pi')
    or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('db') or die('Could not select database');

// Performing SQL query
$query = 'SELECT * FROM tasks';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>

