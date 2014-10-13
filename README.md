The Conversionista Wine Contest
===
Create a file named `db_config.php` in the inc folder. Define all required parameters:

  	$username = "";
	$password = "";
	$hostname = "";
	$database = "";

Create a new database

	CREATE TABLE IF NOT EXISTS `ABtest` (
	  `Email` text NOT NULL,
	  `Phone` text NOT NULL,
	  `Price` text NOT NULL,
	  `Variation` text NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##To do

* ~~Add non-HTML5 fallback of form validation~~
* ~~Add new copy for landing page not mentioning Webbdagarna~~
* ~~Maybe remove HTML5 number validation of phone number~~
* Add cookie values preventing multiple guesses
* Add precentage improvment and chance to beat original on results.php