<?php
    session_start();
    session_destroy();

    header("Location:../../view/home/home.php?msgLogout=Você saiu do sistema.");
?>