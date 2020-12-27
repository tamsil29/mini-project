<?php

$dbh = mysqli_connect("localhost", "root", "", "photos");

if (!$dbh) {
    die("connection failed: ".mysqli_connect_error());
}
