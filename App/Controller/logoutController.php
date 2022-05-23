<?php
include "Database/Connection.php";

session_start();
session_destroy();
header("Location: /Login");