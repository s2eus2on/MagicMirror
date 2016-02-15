<html>
<head>
	<title>Magic Mirror</title>
	<style type="text/css">
		<?php include('css/main.css') ?>
	</style>
	<link rel="stylesheet" type="text/css" href="css/weather-icons.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<script type="text/javascript">
		var gitHash = '<?php echo trim(`git rev-parse HEAD`) ?>';
	</script>
	<meta name="google" value="notranslate" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>

	<div class="top right"><div class="windsun small dimmed"></div><div class="temp"></div><div class="forecast small dimmed"></div></div>
  <!-- <div class="top center-hor"><div class="windsun small dimmed"></div><div class="temp"></div><div class="forecast small dimmed"></div></div> -->
	
 	<div class="top left">
		<div class="date small dimmed"></div>
		<div class="time" id="time"></div>
		<div class="xxsmall">
			<?php
			require('controllers/functions/trains.php');
			$results = GetTrains("BCF");
			foreach ($results as $row)
			{
				echo $row ."<br/>";
			}
		  	?>
		</div>
		<br>
	</div> 
	<div class="center-ver center-hor"><!-- <div class="dishwasher light">Vaatwasser is klaar!</div> --></div>
	<div class="lower-third center-hor"><div class="compliment light"></div></div>
	
  <div id='scroller' class="scroller nowrap ">
    <div class="news medium">
    </div>
  </div>

	<!-- <div class="bottom right"><div style="width:260px"><script language="JavaScript" src="http://ww12w.tfl.gov.uk/tfl/syndication/widgets/serviceboard/embeddable/serviceboard-iframe-stretchy.js"></script></div> -->
	<div class="top center-hor"><iframe id="tieatie" style=visibility:hidden; width="560" height="315" src="https://www.youtube.com/embed/T0NPYZyI7V8" frameborder="0" allowfullscreen></iframe></div>
	<div class="top center-hor"><iframe id="music" style=visibility:hidden; width="560" height="315" src="https://www.youtube.com/embed/nj1fwTkBL8Q" frameborder="0" allowfullscreen></iframe>

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.2.1/annyang.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/SpeechKITT/0.3.0/speechkitt.min.js"></script>
<script>
    var annyangScript = document.createElement('script');
    annyangScript.src = "//cdnjs.cloudflare.com/ajax/libs/annyang/2.2.1/annyang.min.js"
    document.write(annyangScript.outerHTML)
  </script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>
  "use strict";
  // first we make sure annyang started succesfully
  if (annyang) {
    // define the functions our commands will run.
    var hello = function() {
      alert('Hello, World!')

    };

    var stop = function() {
       	console.debug("Ok, going to sleep...");
        $scope.focus = "sleep";
    };

    var tie_a_tie = function() {
    	console.debug("tie a tie");
    	var iframe = document.getElementById("tieatie");  
    	iframe.style.visibility="visible";
    	iframe.src = iframe.src + "?autoplay=1";
    };

    var remove_tie_a_tie = function() {
    	console.debug("remove video tie a tie");
    	var iframe = document.getElementById("tieatie");  
    	iframe.style.visibility="hidden";
    	iframe.src = "";
    };

    var play_music = function(){
    	console.debug("Play music");
    	var iframe_music = document.getElementById("music");  
    	iframe_music.src = iframe_music.src + "?autoplay=1";
    }


    var stop_music = function(){
    	console.debug("Stop music");
    	var iframe_music = document.getElementById("music"); 
    	iframe_music.src = "https://www.youtube.com/embed/nj1fwTkBL8Q";
    }

    // define our commands.
    // * The key is the phrase you want your users to say.
    // * The value is the action to do.
    //   You can pass a function, a function name (as a string), or write your function as part of the commands object.
    var commands = {
      'hello (there)':        hello,
      'stop': stop,
      'show video': tie_a_tie,
      'remove video' : remove_tie_a_tie,
      'play music' : play_music,
      'stop music' : stop_music
    };
    // OPTIONAL: activate debug mode for detailed logging in the console
    annyang.debug();
    // Add voice commands to respond to
    annyang.addCommands(commands);
    // OPTIONAL: Set a language for speech recognition (defaults to English)
    // For a full list of language codes, see the documentation:
    // https://github.com/TalAter/annyang/blob/master/docs/README.md#languages
    annyang.setLanguage('en');
    // Start listening. You can call this here, or attach this call to an event, button, etc.
    annyang.start();
  } else {
    $(document).ready(function() {
      $('#unsupported').fadeIn('fast');
    });
  }
  </script>

<script src="js/jquery.js"></script>
<script src="js/jquery.feedToJSON.js"></script>
<script src="js/ical_parser.js"></script>
<script src="js/moment-with-locales.min.js"></script>
<script src="js/config.js"></script>
<script src="js/rrule.js"></script>
<script src="js/version/version.js"></script>
<script src="js/calendar/calendar.js"></script>
<script src="js/compliments/compliments.js"></script>
<script src="js/weather/weather.js"></script>
<script src="js/time/time.js"></script>
<script src="js/news/news.js"></script>
<script src="js/main.js?nocache=<?php echo md5(microtime()) ?>"></script>
<!-- <script src="js/socket.io.min.js"></script>  	</div> -->

<script src="js/marquee.min.js"></script>
<script src="js/marquee.js"></script>
<!-- <script src="js/jquery.svider.js"></script>
<script src="js/jquery.svider.min.js"></script> -->

<script>
new Marquee('scroller' , {
    behavor: 'scroll',
    loops: -1,
    interrupt: 'no',
    step: 1,
    direction: 'rtl',
});
</script>

<?php include(dirname(__FILE__).'/controllers/modules.php') ?>
</body>
</html>
