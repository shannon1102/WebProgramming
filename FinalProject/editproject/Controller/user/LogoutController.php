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
<script type="text/javascript">
    window.location.replace("../editproject/index.php");
</script>