<?php

      session_start();

      if ( !empty($_SESSION['rand_code']) )
      {
        unset($_SESSION['rand_code']);
      }

      $token = "";

      $a = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      
      $length = 6;
      
      for ($i = 0; $i < $length; $i++)
      {
        $token.= $a[rand(0, 61)];
      }

      $_SESSION['token']=$token;

?>


