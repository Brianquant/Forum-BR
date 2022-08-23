<?php

function connect_to_db() {
    $servername = "db";
    $username = "root";
    $dbpassword = "example";
    $db = "forum";

    // Create connection
    $conn = mysqli_connect($servername, $username, $dbpassword, $db);

    return $conn;
  }

  function my_dump($input) {
    echo "<pre>" . $input . "</pre>";
  }

function myDump($input) {
  print("<pre>");
    print("<code>");
        print_r($input);
    print("</code>");
  print("</pre>");
}

function encrypt_decrypt($action, $string) {
  $output = false;

  $encrypt_method = "AES-256-CBC";
  $secret_key = 'This is my secret key';
  $secret_iv = 'This is my secret iv';

  // hash
  $key = hash('sha256', $secret_key);

  // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  if( $action == 'encrypt' ) {
      $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
      $output = base64_encode($output);
  }
  else if( $action == 'decrypt' ){
      $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  }

  return $output;
}









?>