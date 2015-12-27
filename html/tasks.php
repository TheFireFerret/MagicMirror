<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/tasks.css">
  <script src="js/ui.js"></script>
</head>

<body>
  <table class="pure-table">
    <thead>
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Description</td>
        <td>Due Date</td>
        <td>Edit</td>
        <td>Delete</td>
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
          <td>
              <button class="button-success pure-button" value="<?php echo $row['id']?>" onclick="showEdit(<?php echo $row['id']?>,'<?php echo $row['name']?>','<?php echo $row['t_desc']?>','<?php echo $row['due']?>')">Edit</button>
          </td>
          <td>
            <form action="remove.php" method="post">
              <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
              <button class="button-error pure-button">X</button>
            </form>
          </td>
        </tr>
        <?php
        // Free resultset
        mysql_free_result($result);

        // Closing connection
        mysql_close($connect);
      }
      ?>
    </tbody>
  </table>

  <script>
  function showEdit() {
    document.getElementById('edit').style.display = 'block';
    document.getElementById('edit-id').value = arguments[0];
    document.getElementById('edit-name').value = arguments[1];
    document.getElementById('edit-desc').value = arguments[2];
    document.getElementById('edit-date').value = arguments[3];
  }
  </script>

<br>
  <button id="show-new" onclick="showNew()" class="pure-button">New</button>

  <form action="insert.php" method="post" class="pure-form" id="new" style="display:none">
    <fieldset class="pure-group">
      <input type="text" name="name" placeholder="Name" class="pure-input-1" />
      <textarea type="text" name="desc" placeholder="Description" class="pure-input-1"></textarea>
      <input type="date" name="due" class="pure-input-1" />
    </fieldset>

    <input type="submit" class="pure-button pure-input-2-4 pure-button-primary"/>
    <input type="button" value="X" class="pure-button" style="width:8%" onclick="hideNew()"/>
  </form>

  <form action="edit.php" method="post" class="pure-form" id="edit" style="display:none">
    <fieldset class="pure-group">
      <input type="text" name="id" placeholder="id" class="pure-input-1" id="edit-id" style="display:none"/>
      <input type="text" name="name" placeholder="Name" class="pure-input-1" id="edit-name"/>
      <textarea type="text" name="desc" placeholder="Description" class="pure-input-1" id="edit-desc"></textarea>
      <input type="date" name="due" class="pure-input-1" id="edit-date" />
    </fieldset>

    <input type="submit" class="pure-button pure-input-2-4 pure-button-primary"/>
    <input type="reset" value="X" class="pure-button" style="width:8%" onclick="hideEdit()"/>
  </form>

</body>
</html>
