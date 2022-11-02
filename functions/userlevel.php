<?php
if (!array_intersect($pageuserlevel, preg_split ("/\,/", trim($_SESSION['user_level'])))){
     header('Location: error.php?code=401');
     exit;
}
?>