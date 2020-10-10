<?php

    $server="localhost";
    $username="id15003067_userpass";
    $password="q^9<OfYAc7E/UW_^";
    $database="id15003067_data1";

    $con=mysqli_connect($server,$username,$password,$database);

    if(!$con){
        die("connection to this database failed due to ".mysqli_connect_error());

    }

?>