<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /Progra%20Aplicada%20III/Login');
?>