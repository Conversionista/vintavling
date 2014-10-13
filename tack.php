<?php
if(!isset($_POST['inputEmail'])){
	header('location: /?page=1');
	exit;
}

require_once( dirname( __FILE__ ) . '/inc/db_config.php' );

$con = mysql_connect($hostname, $username, $password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($database, $con);

$check = mysql_query("SELECT Email FROM ABtest WHERE Email = '".$_POST['inputEmail']."' ");

if(mysql_num_rows($check) == 0){

$sql="INSERT INTO ABtest (Email, Phone, Price, Variation)
VALUES ('$_POST[inputEmail]','$_POST[inputPhone]','$_POST[inputPrice]' ,'$_POST[variation]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
//echo "1 record added";

mysql_close($con);
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="sv"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $config[site][title]; ?></title>
        <meta name="description" content="<?php echo $config[site][description]; ?>">
        <meta name="viewport" content="width=device-width">
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">		
		<link rel="canonical" href="<?php echo $config[site][URL]; ?>" />
		<link rel="publisher" href="https://plus.google.com/105493150503708147852/"/>
        <link rel="stylesheet" type="text/css" media="all" href="http://legacy.conversionista.se/lp/styles/main.css"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js"></script>
        

		<?php if(mysql_num_rows($check) == 0){ ?>



		<script type='text/javascript'>
		var _vis_opt_account_id = 23368;
		var _vis_opt_protocol = (('https:' == document.location.protocol) ? 'https://' : 'http://');
		document.write('<s' + 'cript src="' + _vis_opt_protocol +
		'dev.visualwebsiteoptimizer.com/deploy/js_visitor_settings.php?v=1&a='+_vis_opt_account_id+'&url='
		+encodeURIComponent(document.URL)+'&random='+Math.random()+'" type="text/javascript">' + '<\/s' + 'cript>');
		</script>

		<script type='text/javascript'>
		if(typeof(_vis_opt_settings_loaded) == "boolean") { document.write('<s' + 'cript src="' + _vis_opt_protocol +
		'd5phz18u4wuww.cloudfront.net/vis_opt.js" type="text/javascript">' + '<\/s' + 'cript>'); }
		// if your site already has jQuery 1.4.2, replace vis_opt.js with vis_opt_no_jquery.js above
		</script>

		<script type='text/javascript'>
		if(typeof(_vis_opt_settings_loaded) == "boolean" && typeof(_vis_opt_top_initialize) == "function") {
		        _vis_opt_top_initialize(); vwo_$(document).ready(function() { _vis_opt_bottom_initialize(); });
		}
		</script>

		<script type="text/javascript">
			var _vis_opt_revenue = "<?php echo $_POST["inputPrice"]; ?>";
			window._vis_opt_queue = window._vis_opt_queue || [];
			window._vis_opt_queue.push(function() {_vis_opt_revenue_conversion(_vis_opt_revenue);});

			window._vis_opt_queue = window._vis_opt_queue || [];
			window._vis_opt_queue.push(function() {_vis_opt_goal_conversion(210);});
		</script>

		<?php } ?>
		<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-16296510-3', {'cookieDomain': 'conversionista.se', 'siteSpeedSampleRate': 100});


      ga('require', 'displayfeatures');
      ga('require', 'linkid', 'linkid.js');

      window.optimizely = window.optimizely || [];
      window.optimizely.push(['activateUniversalAnalytics']);

      ga('send', 'pageview');
      </script>
    </head>
    <body style="margin-top:3em;">
        <!--[if lte IE 9]>
            <p class="chromeframe"><?php echo $config[site][browserHappy]; ?></p>
        <![endif]-->
	
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="menu">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><span class="sr-only">Conversionista!</span><i class="c-logo-sm visible-xs"></i><i class="c-logo hidden-xs"></i><i class="c-tagline hidden-sm"></i></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
				<li><a href="http://conversionista.se/blogg">Till bloggen</a></li>
            
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>



    <div class="container">
		
		<?php /* TACKSIDA */ ?>
		<?php if(mysql_num_rows($check) == 0){ ?>
		

        <div class="row">
            <div class="col-md-6">
				<h1 class="responsive_headline_h1">You have been tested!</h1>
				<h2 class="responsive_headline_h2">Du gissade att vinet kostar <br /><?php echo $_POST["inputPrice"]; ?> kronor</h2>
				<p>Det återstår nu bara att som om det är du som vinner. I så fall kontaktar vi dig på <b><?php echo $_POST["inputEmail"]; ?></b>.</p>
			</div>
		</div>

		<?php /* OM NÅGON VARIT MED I TÄVLINGEN */ ?>

		<?php } else { ?>
        <div class="row">
            <div class="col-md-6">
				<h1 class="responsive_headline_h1">Woops!</h1>

				<h2 class="responsive_headline_h2">Det verkar som att du redan tävlat…</h2>
				<p>Du kan bara vara med och tävla en gång. Vi kontaktar dig på <b><?php echo $_POST["inputEmail"]; ?></b> om det är du som vinner </p>

            </div>
        </div>
		<?php } ?>
		<?php /* NYHETSBREV */ ?>
		

		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-info" id="result-wrapper" style="display: none;">
	                   <button type="button" class="close" data-dismiss="alert">×</button>
	                   <span id="result"></span>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="well well-lg">
					<h3 class="responsive_headline_h3">Vill du också bli en konverteringskung?</h3>
					<p>Håll dig uppdaterad på konvertering med Conversionistas nyhetsbrev.</p>

					<form action="http://assets.conversionista.se/inc/mc.php" id="notify" method="POST">
						<label class="control-label" for="email">Epost</label>
						<input type="email" class="form-control input-lg" value="<?php echo $_POST["inputEmail"]; ?>" id="email" name="email" required /><br />
						<input type="submit" class="btn btn-lg btn-success" value="Ja, jag vill bli kung" id="jagvillblikung" /><br />
					</form>
				</div>
			</div>
		</div>


        <hr>

        <footer class="row">
            <p class="col-md-4">&copy; Conversionista! 2014</p>
        </footer>

    </div> <!-- /container -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>
		jQuery(document).ready(function($) {
	    	
		    $('#notify').submit(function() {
		            
				var action = $(this).attr('action');
				$.ajax({
					url: action,
					type: 'POST',
					data: {
						email: document.getElementById('email').value
					},
	                success: function(data){
	                    $("#result-wrapper").show();
	                    $('#result').html(data);
	                },
					error: function() {
						$('#result').html('Sorry, we messed up, something went wrong :(');
					}
	                
				});
	            return false;
			});  
	    });
	</script>
	
</body>
</html>