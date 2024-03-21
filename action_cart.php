<?php 
  session_start();


  if (isset($_POST['action'])) {


      if ($_POST['action'] == "remove") {
          
          foreach ($_SESSION['cart'] as $key => $value) {
              if ($value['id'] == $_POST['id']) {
                unset($_SESSION['cart'][$key]);
              }
          }
      }


      if ($_POST['action'] == "success") {
          
          foreach ($_SESSION['cart'] as $key => $value) {
              
          }
      }
  }

 ?>