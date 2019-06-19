



<input list="browsers" name="browser">
<datalist id="browsers">
  <option value="Critical">
  <option value="Fail">
</datalist>

              

<?php

if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

              