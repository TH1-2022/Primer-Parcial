<?php
require_once("../config.php");

$sql = "DELETE FROM persona WHERE id = " . $_GET['id'];
if ($db->query($sql))
    header("Location: ../index.php?success=1");
else
    header("Location: ../index.php?err=1");
