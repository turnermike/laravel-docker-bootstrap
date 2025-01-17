<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(1);

/* ==========================================================================
   PDO
   ========================================================================== */

echo '<hr />';
echo 'pdo';
echo '<hr /><br />';

// get db creds from environment variables
$db_host =        getenv('DB_HOST');
$db_db =          getenv('DB_DATABASE');
$db_user =        getenv('DB_USERNAME');
$db_password =    getenv('DB_PASSWORD');

$mysql_host =     getenv('MYSQL_HOST');
$mysql_db =       getenv('MYSQL_DATABASE');
$mysql_user =     getenv('MYSQL_USERNAME');
$mysql_password = getenv('MYSQL_PASSWORD');

$testVar = getenv('TEST_VAR');


echo '<br />$db_host: ' . $db_host;
echo '<br />$db_db: ' . $db_db;
echo '<br />$db_user: ' . $db_user;
echo '<br />$db_password: ' . $db_password;

echo '<br />$mysql_host: ' . $mysql_host;
echo '<br />$mysql_db: ' . $mysql_db;
echo '<br />$mysql_user: ' . $mysql_user;
echo '<br />$mysql_password: ' . $mysql_password;

echo '<br />testVar: ' . $testVar;
echo '<br /><br />';


// $dsn = 'mysql:dbname=test_php_app;host=db';
// $user = 'test_app_user';
// $password = 'test_app_password';
$dsn = 'mysql:dbname=' . $db_db . ';host=' . $db_host;
$user = $db_user;
$password = $db_password;

try {
    $dbh = new PDO($dsn, $user, $password);

    $statement = $dbh->prepare("SELECT * FROM test");
    $statement->execute();

    echo '<br />Connection successfull.<br /><br />';

    echo "<pre>";
    echo "table named 'test':<br /><br />";
    var_dump($statement->fetchAll());
    echo "</pre><br />";

} catch (PDOException $e) {
    echo '<br />Connection failed: ' . $e->getMessage() . '<br /><br />';
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

foreach($dbh->query("Show variables like '%char%'") as $row) {
    printf("%s: %s<br />", htmlspecialchars($row[0]), htmlspecialchars($row[1]));
}



/* ==========================================================================
   mysql_connect
   ========================================================================== */

// echo '<hr />';
// echo 'mysql_connect';
// echo '<hr /><br />';

// //$link = mysql_connect('localhost', 'root', 'root');
// $link = mysql_connect($host, $user, $password);

// if (!$link) {
//     die('<br />Could not connect: ' . mysql_error());
// }
// echo '<br />Connected successfully';


// $db_selected = mysql_select_db($db, $link);

// if(!$db_selected){
//  die('<br />Error: ' . mysql_error());
// }

// echo '<br />Selected DB Successfully';


// mysql_close($link);




phpinfo();




