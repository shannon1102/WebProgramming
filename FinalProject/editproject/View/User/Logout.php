<?php
   session_start();
    if(isset($_SESSION["role"])  )
    {
        unset($_SESSION["role"]);
    }
    if(isset($_SESSION["login"])  )
    {
        unset($_SESSION["login"]);
    }
?>

<!DOCTYPE html>
<html>
<body>
    <a href="../../index.php">Click to back homepage</a>
</body>
</html>