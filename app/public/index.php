<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
require 'vendor/autoload.php';
// $dotenv = new Dotenv\Dotenv(__DIR__);
// $dotenv->load();
try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

$server = 'mysql';
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];
$database = $_ENV['MYSQL_DATABASE'];
echo '<div style="margin:auto auto; width:934px;text-align:center;background-color:#99c;border:1px solid #666">';
$connection = mysqli_connect($server, $username, $password, $database);
if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
echo '<div style="margin:0 auto; width:50%;">';
echo '<ul style="text-align:left;border:1px solid #666;background-color:#ddd;padding-top:10px;padding-bottom:10px;">';
echo "<li>Database server: <strong>".$server."</strong> is connected</li>"; 
echo "<li>Database name: <strong>".$database."</strong> is loaded.</li>" . PHP_EOL;
echo "<li>Database host: <strong>" . mysqli_get_host_info($connection) . "</strong></li>" . PHP_EOL;
  
$query_result = mysqli_query($connection, 'SELECT @@VERSION');
$row = mysqli_fetch_array($query_result);
 
if($row != FALSE){
	echo "<li>Database version: <strong>{$row[0]}</strong></li>";
}
$result = mysqli_query($connection, "SHOW TABLES");
$tables=array();
while($tableName = mysqli_fetch_row($result)) {
    $tables[] = $tableName[0];
}
if(!empty($tables)){
	$show_tables=implode(", ", $tables);
	echo "<li>Database tables: <strong>{$show_tables}</strong></li>";
}

mysqli_free_result($query_result);
mysqli_close($connection);
echo '</ul>';
echo '</div>';
echo '</div>';
phpinfo();
?>
</body>
</html>
