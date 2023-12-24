<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  if (file_exists("$page.php")) {
    include "$page.php";
  } else {
    include "eror404.php";
  }
} else {
  include "home.php";
}
