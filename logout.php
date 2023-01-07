<?php
require "includes/functions.php";
session_unset();
session_regenerate_id();
header("Location: login.php");
