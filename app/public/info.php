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
$host =     getenv('MYSQL_HOST');
$db =       getenv('MYSQL_DATABASE');
$user =     getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');

$testVar = getenv('TEST_VAR');

echo '<br>host: ' . $host;
echo '<br>db: ' . $db;
echo '<br>user: ' . $user;
echo '<br>password: ' . $password;
echo '<br><br>';
echo '<br>testVar: ' . $testVar;
echo '<br><br>';


// $dsn = 'mysql:dbname=test_php_app;host=db';
// $user = 'test_app_user';
// $password = 'test_app_password';
$dsn = 'mysql:dbname=' . $db . ';host=' . $host;
$user = $user;
$password = $password;

try {
    $dbh = new PDO($dsn, $user, $password);
    echo '<br>Connection successfull.<br><br>';

    $statement = $dbh->prepare("SELECT * FROM test");
    $statement->execute();

    echo "<pre>";
    echo "table named 'test':<br><br>";
    var_dump($statement->fetchall());
    echo "</pre>";

} catch (PDOException $e) {
    echo '<br>Connection failed: ' . $e->getMessage() . '<br><br>';
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

echo '<hr />';
echo 'mysql_connect';
echo '<hr /><br />';

//$link = mysql_connect('localhost', 'root', 'root');
$link = mysql_connect($host, $user, $password);

if (!$link) {
    die('<br />Could not connect: ' . mysql_error());
}
echo '<br />Connected successfully';


$db_selected = mysql_select_db($db, $link);

if(!$db_selected){
 die('<br />Error: ' . mysql_error());
}

echo '<br />Selected DB Successfully';


mysql_close($link);




phpinfo();




