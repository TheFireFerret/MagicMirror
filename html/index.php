<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Magic Mirror</title>
  <meta name="description" content="">

  <!-- <meta http-equiv="refresh" content="1800" /> -->
  <!--refresh page every 30 minutes-->

  <link rel="stylesheet" href="css/main.css">
  <script src = "main.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

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
        rssmikle_frame_width: "400",rssmikle_frame_height: "950",frame_height_by_article: "0",rssmikle_target: "_blank",
        rssmikle_font: "Arial, Roboto, sans-serif",rssmikle_font_size: "25",rssmikle_border: "off",responsive: "off",
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

  <div class="events" id="events">

  </div>

  <div class="taskdisp" id="taskdisp">
    <div id="first" class="wunderful">WOW</div>
    <div id="second" class="wunderful hidden">COOL</div>

    <!-- <div id="list" class="wow">list</div>
    <div id="two">two</div> -->
  </div>


  <script type="text/javascript">
  (function titleSwap() {
    $('.wunderful').not('.hidden').delay(2000).fadeOut(0, function () {
      var $me = $(this);
      $('.wunderful.hidden').removeClass('.hidden').hide().fadeIn(0,                     function () {
        $(this).removeClass('hidden');
        $me.addClass('hidden');
        $.get('list.html', function(data) {
          $me.html(data);
        });
        titleSwap();
      });
    });
  })();

  (function wow() {
     $.get('cal.html', function(data) {
       $('#events').html(data);
     });
  })();

  // var one = 1;
  // var two = 0;
  // function startRefreshOne() {
  //   setTimeout(startRefreshOne,5000);
  //   if (one == 1) { //time to show
  // $.get('list.html', function(data) {
  //   $('#first').html(data);
  // });
  //       document.getElementById('first').style.display = "block";
  //       one = 0;
  //   } else {
  //     document.getElementById('first').style.display = "none";
  //     one = 1;
  //   }
  // }

  // function startRefreshTwo() {
  //   setTimeout(startRefreshTwo,5000);
  //   if (two == 1) { //time to show
  //     $.get('list.html', function(data) {
  //       $('#second').html(data);
  //     });
  //       document.getElementById('second').style.display = "block";
  //       two = 0;
  //   } else {
  //     document.getElementById('first').style.display = "none";
  //     two = 1;
  //   }
  // }

  </script>


</body>
</html>
