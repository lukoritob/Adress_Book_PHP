<?php
include "proccess.php";
$link = mysqli_connect("localhost", "root", "", "book") or die(mysqli_error($link));
$id=$_GET['id'];
$sql = "DELETE from data WHERE id=$id";
$result = mysqli_query($link, $sql) or die(mysqli_error($link)); 
?>
<script type="text/javascript">
window.location="index.php";
</script>