<?php
include 'config.php';
$db->query('DELETE FROM ads WHERE id=?d', $_GET['id']);
?>


