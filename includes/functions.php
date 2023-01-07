<?php
session_start();

require "./dbconnect.php";


function checkLogin()
{
  if (empty($_SESSION['INFO'])) {
    header("Location: login.php");
    die;
  }
}
