<html>
<body>
<table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Due Date</td>
            </tr>
        </thead>
        <tbody>
        <?php
            $connect = mysql_connect("localhost","pi");
            if (!$connect) {
                die(mysql_error());
            }
            mysql_select_db("db");
            $results = mysql_query("SELECT * FROM tasks");
            while($row = mysql_fetch_array($results)) {
            ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
		    <td><?php echo $row['t_desc']?></td>
		    <td><?php echo $row['due']?></td>
                </tr>

            <?php
            }
            ?>
            </tbody>
            </table>

<form action="remove.php" method="post">
Remove:<input type="text" name="id" /><br><br>
<input type="submit" value="delete">
</form>
</body>
</html>