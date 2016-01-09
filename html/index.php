<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Magic Mirror</title>
  <meta name="description" content="">

  <meta http-equiv="refresh" content="1800" />
  <!--refresh page every 30 minutes-->

  <link rel="stylesheet" href="css/main.css">
  <script src = "main.js"></script>

</head>

<body onload="getDate()">

  <!--Date and Time-->
  <div class="container">
    <div id="time" class="time"></div>
    <div id="day" class="day" align="right"></div>
    <br>
    <div id="date" class="date" align="right"></div>
  </div>

  <div class = "line">
  </div>

  <!--Weather from forecast.io widget-->
  <div class="weather">
    <iframe style="-webkit-filter: invert(100%)" id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%"
    src="http://forecast.io/embed/#lat=30.4248&lon=-97.8441&name=Austin"> </iframe>
  </div>

  <div class="news">
    <!--http://feed.mikle.com-->
    <!-- start feedwind code -->
    <script type="text/javascript">document.write('\x3Cscript type="text/javascript" src="' +
    ('https:' == document.location.protocol ? 'https://' : 'http://') + 'feed.mikle.com/js/rssmikle.js">\x3C/script>');
    </script>
    <script type="text/javascript">
    (
      function() {
        var params = {rssmikle_url: "http://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml",
        rssmikle_frame_width: "400",rssmikle_frame_height: "900",frame_height_by_article: "0",rssmikle_target: "_blank",
        rssmikle_font: "Arial, Helvetica, sans-serif",rssmikle_font_size: "20",rssmikle_border: "off",responsive: "off",
        rssmikle_css_url: "",text_align: "left",text_align2: "left",corner: "off",scrollbar: "off",autoscroll: "on",
        scrolldirection: "up",scrollstep: "8",mcspeed: "20",sort: "Off",rssmikle_title: "off",rssmikle_title_sentence: "",
        rssmikle_title_link: "",rssmikle_title_bgcolor: "#0066FF",rssmikle_title_color: "#FFFFFF",rssmikle_title_bgimage: "",
        rssmikle_item_bgcolor: "#000000",rssmikle_item_bgimage: "",rssmikle_item_title_length: "100",
        rssmikle_item_title_color: "#FFFFFF",rssmikle_item_border_bottom: "on",rssmikle_item_description: "title_only",
        item_link: "off",rssmikle_item_description_length: "150",rssmikle_item_description_color: "#FFFFFF",
        rssmikle_item_date: "gl1",rssmikle_timezone: "Etc/GMT",datetime_format: "%b %e, %l:%M %p",
        item_description_style: "text",item_thumbnail: "full",item_thumbnail_selection: "auto",article_num: "15",
        rssmikle_item_podcast: "off",keyword_inc: "",keyword_exc: ""};feedwind_show_widget_iframe(params);
      }
    )();
    </script>
  </div>

  <div class="events">
    <!-- start feedwind code -->
    <script type="text/javascript">document.write('\x3Cscript type="text/javascript" src="' +
    ('https:' == document.location.protocol ? 'https://' : 'http://') + 'feed.mikle.com/js/rssmikle.js">\x3C/script>');
    </script>
    <script type="text/javascript">
    (
      function() {
        var params = {rssmikle_url: "gcal://odrnv8r4tiv7ch7k15fkshutko@group.calendar.google.com",
        rssmikle_frame_width: "300",rssmikle_frame_height: "475",frame_height_by_article: "0",rssmikle_target: "_blank",
        rssmikle_font: "Arial, Helvetica, sans-serif",rssmikle_font_size: "20",rssmikle_border: "off",responsive: "off",
        rssmikle_css_url: "",text_align: "left",text_align2: "left",corner: "off",scrollbar: "off",autoscroll: "off",
        scrolldirection: "up",scrollstep: "3",mcspeed: "20",sort: "Off",rssmikle_title: "off",rssmikle_title_sentence: "",
        rssmikle_title_link: "",rssmikle_title_bgcolor: "#0066FF",rssmikle_title_color: "#FFFFFF",rssmikle_title_bgimage: "",
        rssmikle_item_bgcolor: "#000000",rssmikle_item_bgimage: "",rssmikle_item_title_length: "55",
        rssmikle_item_title_color: "#FFFFFF",rssmikle_item_border_bottom: "on",rssmikle_item_description: "on",
        item_link: "off",rssmikle_item_description_length: "150",rssmikle_item_description_color: "#ffffff",
        rssmikle_item_date: "gl1",rssmikle_timezone: "Etc/GMT",datetime_format: "%b %e, %l:%M %p",
        item_description_style: "html",item_thumbnail: "full",item_thumbnail_selection: "auto",article_num: "15",
        rssmikle_item_podcast: "off",keyword_inc: "",keyword_exc: ""};feedwind_show_widget_iframe(params);
      }
    )();
    </script>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/{{JQUERY_VERSION}}/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-{{JQUERY_VERSION}}.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

</body>
</html>

<div class = "tasks">
  <table>
    <!-- <thead>
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Description</td>
        <td>Due Date</td>
      </tr>
    </thead> -->
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
          <!-- <td><?php echo $row['id']?></td> -->
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['t_desc']?></td>
          <td><?php echo $row['due']?></td>
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
</div>
