<?php

include(dirname( __FILE__ ) .'/inc/spyc.php');
$config = Spyc::YAMLLoad(dirname( __FILE__ ) . '/inc/config.yaml');

// load Twitter_Card
if ( ! class_exists( 'Twitter_Card' ) )
  require_once( dirname( __FILE__ ) . '/inc/twitter-card.php' );

// build a card
$card = new Twitter_Card();
$card->setURL( $config[twitter][URL] );
$card->setTitle( $config[twitter][title] );
$card->setDescription( $config[twitter][description] );
$card->setImage( $config[twitter][image][src], $config[twitter][image][width], $config[twitter][image][height] );
$card->setSiteAccount( $config[twitter][siteAccount] );
$card->setCreatorAccount( $config[twitter][creatorAccount] );

//look for query parameters
if (!isset($_GET['page']) || empty($_GET['page'])) { 
	header('location: /?page=1');
	exit;
} elseif($_GET['page'] == '1' ){
	$variation = 'A';
	$max = '99';
	$antal = 'två';
} elseif ($_GET['page'] == '2' ){
	$variation = 'B';
	$max = '999';
	$antal = 'tre';
} elseif ($_GET['page'] == '3' ){
	$variation = 'C';
	$max = '9999';
	$antal = 'fyra';
} else {
	header('location: /?page=1');
	exit;
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
		<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon-152x152.png">
		<link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196">
		<link rel="icon" type="image/png" href="favicon-160x160.png" sizes="160x160">
		<link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#c61618">
		<meta name="msapplication-TileImage" content="mstile-144x144.png">
		<link rel="canonical" href="<?php echo $config[site][URL]; ?>" />
		<link rel="publisher" href="https://plus.google.com/105493150503708147852"/>
        <link rel="stylesheet" type="text/css" media="all" href="http://legacy.conversionista.se/lp/styles/main.css"/>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css"/>

        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js"></script>
        <?php echo $card->asHTML(); ?>

<!-- Start Visual Website Optimizer Synchronous Code -->
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
<!-- End Visual Website Optimizer Synchronous Code -->

		<style type="text/css" media="screen">
		.wine-form input {width: 100%;}	
		</style>
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
	

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="menu">
      <div class="container">
      
        <div class="navbar-header">
      <a class="navbar-brand" href="#"><span class="sr-only">Conversionista!</span><i class="c-logo"></i><i class="c-tagline hidden-sm"></i></a>    
          
        </div>
        
      </div>
      </div>

	
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-4">
				<h1 class="responsive_headline_h1"><?php echo $config[content][headline]; ?></h1>
				<h2 class="responsive_headline_h2">- <?php echo $config[content][subheadline]; ?></h2>
				<p><?php echo $config[content][intro]; ?></p>
			</div>
		</div>

		<div class="row">
            <div class="col-md-4">
				
				<img class="wine-bottle img-responsive center-block" alt="<?php echo $config[content][image][alt]; ?>" src="<?php echo $config[content][image][src]; ?>" />

				<div class="alert alert-info wine-tip">
              		<p><?php echo $config[content][wineInfo]; ?></p>
	            </div>

			</div>
			<div class="col-md-8">
				<div class="container">

				
				<form class="form-horizontal wine-form" id="wine-form" role="form" action="tack.php" method="post">
 				
					<div class="form-group">
						<label class="control-label" for="inputEmail">Din epost</label>
					    <div class="row">
					    	<div class="col-md-5 col-xs-12">	
					    		<input type="email" id="inputEmail" name="inputEmail" class="form-control input-lg" data-bv-emailaddress-message="Oj, det verkar inte vara en epostadress, försök igen" required>
					    	</div>
					  	</div>
					 </div>
					  <div class="form-group">
					    <label class="control-label" for="inputPhone">De <b><?php echo $antal; ?></b> sista siffrorna i ditt mobilnummer</label>
						<div class="row">
					    	<div class="col-md-2 col-xs-6">	
					    		<input type="number" pattern="[0-9]*" min="0" max="<?php echo $max ?>" name="inputPhone" id="inputPhone" data-bv-integer-message="Försök igen, använd bara siffror mellan 0 - <?php echo $max ?>" class="form-control input-lg" required>
							</div>
					  	</div>
					</div>
					<div class="form-group">
						
					    <label class="control-label" for="inputPrice">Gissa priset på flaskan</label>
					    <div class="row">
					    	<div class="col-md-2 col-xs-6">
								<input type="number" pattern="[0-9]*" min="0" id="inputPrice" data-bv-integer-message="Försök igen, använd bara siffror" name="inputPrice" class="form-control input-lg" required>
					    	</div>
					  	</div>
					  </div>
					  <div class="form-group">
					    
					    	<input type="hidden" name="variation" value="<?php echo $variation ?>">
					      	<button type="submit" class="btn btn-lg btn-success">Tävla!</button>
					    
					  </div>
				</form>
</div>

            </div>
        </div>

        <hr>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-warning" id="tavlingsinfo" style="display: none">
	            	<button type="button" class="close" id="tavlingsinfo-close">×</button>
	              	<p><?php echo $config[content][contestInfo]; ?></p>
	            </div>
            </div>
		</div>
        <footer class="row">
        	<div class="col-md-12">
        		<p><?php echo $config[site][copyright]; ?> | <a id="tavlingsinfo-knapp" class=​"btn" >Tävlingsinfo​</a>​</p>
        	</div>
        </footer>



    </div> <!-- /container -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://legacy.conversionista.se/min/g=js&1800"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
	<script type="text/javascript" src="/inc/bootstrapValidator-sv_SE.js"></script>

	<script>
		jQuery(document).ready(function($) {
	    	$(".responsive_headline_h1").fitText().fitText(1, { minFontSize: '32px', maxFontSize: '42px' });
	    	$(".responsive_headline_h2").fitText().fitText(1, { minFontSize: '16px', maxFontSize: '20px' });
			//$('form').h5Validate();
			$('#tavlingsinfo-knapp').click(function() {
				$('#tavlingsinfo').toggle('slow', function() {});
			});
			$('#tavlingsinfo-close').click(function() {
				$('#tavlingsinfo').toggle('slow', function() {});
			});
			
			$('#wine-form').bootstrapValidator({
				live: 'enabled',
				message: 'Fyll i fältet',
				feedbackIcons: {
			        valid: 'fa fa-ok',
			        invalid: 'fa fa-remove',
			        validating: 'fa fa-refresh'
			    }
			});

		});
	</script>
	</body>
</html>