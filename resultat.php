<?php

require_once( dirname( __FILE__ ) . '/inc/db_config.php' );

$dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");
//select a database to work with
$selected = mysql_select_db($database,$dbhandle)
    or die("Could not select $database");

$firstsample = mysql_query("SELECT Price FROM ABtest WHERE Variation = 'A'") or die(mysql_error());


while ($row = mysql_fetch_array($firstsample)) {
    $data1[] = $row['Price'];
};
// print_r($data1);

$secondsample = mysql_query("SELECT Price FROM ABtest WHERE Variation = 'C'") or die(mysql_error());

while ($row = mysql_fetch_array($secondsample)) {
  $data2[] = $row['Price'];  
};

// print_r($data2);
////////////////////////////////
//ANALYSIS FOR 1ST DATA SETS///
///////////////////////////////
//function to compute statistical mean
function average1($data1) {
    return array_sum($data1)/count($data1);
}
$dataaverage1 = average1($data1);
//function to compute standard deviation
function stdev1($data1){

    $average1 = average1($data1);
    foreach ($data1 as $value1) {
        $variance1[] = pow($value1-$average1,2);
    }
    $standarddeviation1 = sqrt((array_sum($variance1))/((count($data1))-1));
    return $standarddeviation1;
}
$datastandarddeviation1 = stdev1($data1);
//variance of data set 1
$datavariance1 = $datastandarddeviation1 * $datastandarddeviation1;
//number of data for 1st data set
$count1 =count($data1);
//variance over number of data
$sterror1 = $datavariance1/$count1;
////////////////////////////////
//ANALYSIS FOR 2nd DATA SETS///
///////////////////////////////
//function to compute statistical mean
function average2($data2) {
return array_sum($data2)/count($data2);
}
$dataaverage2 = average2($data2);
//function to compute standard deviation
function stdev2($data2){

    $average2 = average2($data2);
    foreach ($data2 as $value2) {
        $variance2[] = pow($value2-$average2,2);
    }
    $standarddeviation2 = sqrt((array_sum($variance2))/((count($data2))-1));
    return $standarddeviation2;
}
$datastandarddeviation2 = stdev2($data2);
//variance of data set 2
$datavariance2 = $datastandarddeviation2 * $datastandarddeviation2;
//number of data for 2nd data set
$count2 =count($data2);
//variance over number of data
$sterror2 = $datavariance2/$count2;
////////////////////////////
//COMPUTE STANDARD ERROR///
//////////////////////////
$sumerror=$sterror1+ $sterror2;
$standarderror=sqrt($sumerror);
///////////////////////////////////
//COMPUTE DIFFERENCE OF TWO MEANS//
///////////////////////////////////
$difference=$dataaverage1-$dataaverage2;
$meandifference=abs($difference);
////////////////////
//COMPUTE T-VALUE///
////////////////////
$tvalue=$meandifference/$standarderror;
///////////////////////////////
//COMPUTE DEGREES OF FREEDOM///
///////////////////////////////
$df=$count1 + $count2 -2;
///////////////////////////////////////////////
//EXTRACT CRITICAL T VALUE FROM THE DATABASE///
///////////////////////////////////////////////

//99% Confidance 2.576
//$criticaltvalue = 2.576;
//95% Confidance 1.960
$criticaltvalue = 1.960;


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
    </head>
    <body style="margin-top:3em;">
        <!--[if lt IE 7]>
            <p class="chromeframe">Du använder en <strong>uråldrig</strong> webbläsare. <a href="http://browsehappy.com/">Uppdatera din webbläsare</a> eller <a href="http://www.google.com/chromeframe/?redirect=true">aktivera Google Chrome Frame</a> för att förbättra din webbupplevelse.</p>
        <![endif]-->
	

  <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="menu">
      <div class="container">
      
        <div class="navbar-header">
      <a class="navbar-brand" href="#"><span class="sr-only">Conversionista!</span><i class="c-logo"></i><i class="c-tagline hidden-sm"></i></a>    
          
        </div>
        
      </div>
      </div>

	
    <div class="container">

<div class="row">
      <div class="col-md-12">
          <h1 class="center-block" style="text-align:center;">Average price</h1>
          <canvas id="myChart" class="center-block" height="400px" width="600px"></canvas>


      </div>
    </div>

<hr  style="margin-top: 3em; margin-bottom: 3em;" />

        <div class="row">
			<div class="col-md-12">
			<?php 
			$array_a = mysql_query("SELECT Price FROM ABtest WHERE Variation = 'A'") or die(mysql_error());
			$array_b = mysql_query("SELECT Price FROM ABtest WHERE Variation = 'B'") or die(mysql_error());
			$array_c = mysql_query("SELECT Price FROM ABtest WHERE Variation = 'C'") or die(mysql_error());

while ($row = mysql_fetch_array($array_a)) {
  $dataA[] = $row['Price'];  
};
while ($row = mysql_fetch_array($array_b)) {
  $dataB[] = $row['Price'];  
};
while ($row = mysql_fetch_array($array_c)) {
  $dataC[] = $row['Price'];  
};

			function avg($array) {
 				return array_sum($array) / count($array);
			}
			


			?>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Variation</th>
                  <th>Average</th>
                  <th>Count</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>A</td>
                  <td><?php echo avg($dataA); ?></td>
                  <td><?php echo count($dataA);?></td>
                  <td><?php echo array_sum($dataA);?></td>
                </tr>
                <tr>
                  <td>B</td>
                  <td><?php echo avg($dataC); ?></td>
                  <td><?php echo count($dataC);?></td>
                  <td><?php echo array_sum($dataC);?></td>
                </tr>
              </tbody>
            </table>
			</div>
		</div>
    
        

        <footer class="row">
          <div class="col-md-12">
            <p><?php echo $config[site][copyright]; ?></p>
          </div>
        </footer>

    </div> <!-- /container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="Chart.min.js"></script>
    <script>
Chart.defaults.global = {
    // Boolean - Whether to animate the chart
    animation: true,

    // Number - Number of animation steps
    animationSteps: 60,

    // String - Animation easing effect
    animationEasing: "easeOutQuart",

    // Boolean - If we should show the scale at all
    showScale: true,

    // Boolean - If we want to override with a hard coded scale
    scaleOverride: false,

    // ** Required if scaleOverride is true **
    // Number - The number of steps in a hard coded scale
    scaleSteps: null,
    // Number - The value jump in the hard coded scale
    scaleStepWidth: null,
    // Number - The scale starting value
    scaleStartValue: null,

    // String - Colour of the scale line
    scaleLineColor: "rgba(0,0,0,.1)",

    // Number - Pixel width of the scale line
    scaleLineWidth: 1,

    // Boolean - Whether to show labels on the scale
    scaleShowLabels: true,

    // Interpolated JS string - can access value
    scaleLabel: "<%=value%>",

    // Boolean - Whether the scale should stick to integers, not floats even if drawing space is there
    scaleIntegersOnly: true,

    // Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero: false,

    // String - Scale label font declaration for the scale label
    scaleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Scale label font size in pixels
    scaleFontSize: 12,

    // String - Scale label font weight style
    scaleFontStyle: "normal",

    // String - Scale label font colour
    scaleFontColor: "#666",

    // Boolean - whether or not the chart should be responsive and resize when the browser does.
    responsive: true,

    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,

    // Boolean - Determines whether to draw tooltips on the canvas or not
    showTooltips: true,

    // Array - Array of string names to attach tooltip events
    tooltipEvents: ["mousemove", "touchstart", "touchmove"],

    // String - Tooltip background colour
    tooltipFillColor: "rgba(0,0,0,0.8)",

    // String - Tooltip label font declaration for the scale label
    tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Tooltip label font size in pixels
    tooltipFontSize: 14,

    // String - Tooltip font weight style
    tooltipFontStyle: "normal",

    // String - Tooltip label font colour
    tooltipFontColor: "#fff",

    // String - Tooltip title font declaration for the scale label
    tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Tooltip title font size in pixels
    tooltipTitleFontSize: 14,

    // String - Tooltip title font weight style
    tooltipTitleFontStyle: "bold",

    // String - Tooltip title font colour
    tooltipTitleFontColor: "#fff",

    // Number - pixel width of padding around tooltip text
    tooltipYPadding: 6,

    // Number - pixel width of padding around tooltip text
    tooltipXPadding: 6,

    // Number - Size of the caret on the tooltip
    tooltipCaretSize: 8,

    // Number - Pixel radius of the tooltip border
    tooltipCornerRadius: 6,

    // Number - Pixel offset from point x to tooltip edge
    tooltipXOffset: 10,

    // String - Template string for single tooltips
    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",

    // String - Template string for single tooltips
    multiTooltipTemplate: "<%= value %>",

    // Function - Will fire on animation progression.
    onAnimationProgress: function(){},

    // Function - Will fire on animation completion.
    onAnimationComplete: function(){}
}
    // Get context with jQuery - using jQuery's .get() method.
    var ctx = document.getElementById("myChart").getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var A = <?php echo avg($dataA); ?>;
    var B = <?php echo avg($dataC); ?>;
    var data = {
    labels: ["Average Price"],
    datasets: [
        {
            label: "A",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [A]
        },
        {
            label: "B",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
            data: [B]
        }
    ]
};

    var myBarChart = new Chart(ctx).Bar(data, {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero : true,

    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines : true,

    //String - Colour of the grid lines
    scaleGridLineColor : "rgba(0,0,0,.05)",

    //Number - Width of the grid lines
    scaleGridLineWidth : 1,

    //Boolean - If there is a stroke on each bar
    barShowStroke : true,

    //Number - Pixel width of the bar stroke
    barStrokeWidth : 2,

    //Number - Spacing between each of the X value sets
    barValueSpacing : 5,

    //Number - Spacing between data sets within X values
    barDatasetSpacing : 1,

    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

});

    </script>
    

</body>
</html>