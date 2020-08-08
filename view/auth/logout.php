<?php
    session_start();
    session_destroy();
    header("Location: /messagerie/?action=login");
?>
