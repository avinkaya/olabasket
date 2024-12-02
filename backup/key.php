 <?php
   // This script used to print signature using private key with passphrase
   // Run this script:
    // $ php print_signature.php

   // Specify private key location, passphrase, data, and hash algorithm
   $private_key_path = 'API_Portal.pem';
   // Password .pem file
   $password = 'a123';
   $data = $_POST['key'];
   $rsa_algorithm = OPENSSL_ALGO_SHA256;
	
   // Load private key file 
   $fp = fopen($private_key_path, 'r');
   $privatekey_file = fread($fp, 8192);
   fclose($fp);
   $privatekey = openssl_pkey_get_private($privatekey_file, $password);

   // Sign data
   echo 'data: '.$data.PHP_EOL;
	   openssl_sign($data, $signature, $privatekey, $rsa_algorithm);
   echo 'signature: '.base64_encode($signature).PHP_EOL;
   ?> 