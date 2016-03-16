<?php
include_once('config.php');
//$Sl = $Config['MySql'];
//$conn = mysql_connect("127.0.0.1:3306", "root", "root");
$conn = new mysqli($config[ 'db_host' ].":". $config[ 'db_port' ], $config[ 'db_user' ],$config[ 'db_password' ] , $config[ 'db_database' ]);

//$conn = new mysqli("localhost:3307", "root", "root", "dendax");

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//     $json  = array('msg' => "Connection failed: " . $conn->connect_error );
// }

?>