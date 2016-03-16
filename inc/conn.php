<?php
include_once('../config.php');

$conn = new mysqli($config[ 'db_host' ].":". $config[ 'db_port' ], $config[ 'db_user' ],$config[ 'db_password' ] , $config[ 'db_database' ]);


?>