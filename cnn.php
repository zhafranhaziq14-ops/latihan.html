<?php

    $dbhost="localhost";
    $dbuser = 'root';
     $dbpass = '';
     $dbname = 'haziq';

      $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
    

    if(! $conn ) {
    die('Could not connect: ' . mysqli_error());
    }   //   echo 'Connected successfully\<br>';


    ?>