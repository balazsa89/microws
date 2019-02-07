<?php

define('debug',true);

require_once "../core/crypts.php";
require_once "../client/client.php";


$mwsc = new mws_client();
$mwsc->service_url = "http://example.com/API";
$mwsc->endpoint = "Test"; //endpoint name in endpoint folder without _ep.php
$mwsc->user = "user"; //one of the user on auth.php $pks array item
$mwsc->inputData = array('task' => "next");
$mwsc->key = "3bdrUdX5g8yd3tKEtLkUCSqhHaUBqFb9BM72NDXzWEnw3auF6KukfXjzqcjQcQtn9qRXQLeYQ37Hq5yQfYBxEUEsCfz5tAU7QzmvqtFVbnp5jDMaHQrepNUuU6PFrDszwcBy33hkJ9dVXvzS9ZXsRkySzKpaXV5uXvR5Kz3Krjw9JKRChXKv334ez79GhpAnFeJszZS68HLcjLWzB5UUBu8x4PywGWzUBxwbt629JKqw3cUMCE7Cr8zGy4Bb8gsKxcfZ4BFjapDuTryXMVYdwCcnmwb8LBTEQwEB9fqUedyzRLZWNwteZNg9YZDty2nV5RyP4SGnXmg8N43EFtFqtkWJxxF3FmzdRVBMG7DXVeaLGsC5LF7zGdNKMF92qKjwDEBaLdNkZqrZyQ5QmaXKn2BzqtcGafYSjxngmupakCPfFgF6b3uU6fAyg8NsRxYTajUErBV2uBn9VtxKFAedRX5H8aRqVcjNmgagTqFzyCDYVXT38YYuPDwEJ9nrkHUPHxtaCEHX6e3j9JyCzuYFQxuDqkbLsbZmBQQeFqzrMXZHkpWyxS4Eqbq4NTudYsQg9SMnr3c5QCGJu8GSGA3wH26HTaKKrkHyxydrdyZ5JpEUfyKgS3zz6NWkB2uAHJLZxrgFDuKBu45qHF2yG3UeLkfD8qar7qqpqFPP4PkxKmusMKw67Nk7CWde9edq47bSg94xveVWqALRMcCw2EvrTAeGKPTpcU6E3YkstzLspMYy99CcNGfGEs5xcmKBbL2EACnvaZzk2EtEZarWQP6KVsqfnSJLwe9zqZRvbuUUBPxexgE9FUSP7wp2GF3p9KjJNWf8EGxYxbmSkYVr2ZnUMEssxcGWdQ6xNQTF5Yu68NPM5Tr6vKKDRXhQSup63aVuKrbJXRdQKnpqRdpQuUXhgVjfwmK24a5UqyzNYAbvWr5yFmwcjR4TrTjxsgzpV9SrTAEwg6yJksTLdd3HrdKbfjXUSJNmnCkJ6vkPu6tT8rPgh8CL5wcwTw53jcJ3VtWe";
$res = $mwsc->do_request();
var_dump($res);




/*

$data = (object)["input" => "data","ez"=>"egy","teszt"=>"adat"];
echo "start: "; var_dump($data). PHP_EOL;
$key =  "3bdrUdX5g8yd3tKEtLkUCSqhHaUBqFb9BM72NDXzWEnw3auF6KukfXjzqcjQcQtn9qRXQLeYQ37Hq5yQfYBxEUEsCfz5tAU7QzmvqtFVbnp5jDMaHQrepNUuU6PFrDszwcBy33hkJ9dVXvzS9ZXsRkySzKpaXV5uXvR5Kz3Krjw9JKRChXKv334ez79GhpAnFeJszZS68HLcjLWzB5UUBu8x4PywGWzUBxwbt629JKqw3cUMCE7Cr8zGy4Bb8gsKxcfZ4BFjapDuTryXMVYdwCcnmwb8LBTEQwEB9fqUedyzRLZWNwteZNg9YZDty2nV5RyP4SGnXmg8N43EFtFqtkWJxxF3FmzdRVBMG7DXVeaLGsC5LF7zGdNKMF92qKjwDEBaLdNkZqrZyQ5QmaXKn2BzqtcGafYSjxngmupakCPfFgF6b3uU6fAyg8NsRxYTajUErBV2uBn9VtxKFAedRX5H8aRqVcjNmgagTqFzyCDYVXT38YYuPDwEJ9nrkHUPHxtaCEHX6e3j9JyCzuYFQxuDqkbLsbZmBQQeFqzrMXZHkpWyxS4Eqbq4NTudYsQg9SMnr3c5QCGJu8GSGA3wH26HTaKKrkHyxydrdyZ5JpEUfyKgS3zz6NWkB2uAHJLZxrgFDuKBu45qHF2yG3UeLkfD8qar7qqpqFPP4PkxKmusMKw67Nk7CWde9edq47bSg94xveVWqALRMcCw2EvrTAeGKPTpcU6E3YkstzLspMYy99CcNGfGEs5xcmKBbL2EACnvaZzk2EtEZarWQP6KVsqfnSJLwe9zqZRvbuUUBPxexgE9FUSP7wp2GF3p9KjJNWf8EGxYxbmSkYVr2ZnUMEssxcGWdQ6xNQTF5Yu68NPM5Tr6vKKDRXhQSup63aVuKrbJXRdQKnpqRdpQuUXhgVjfwmK24a5UqyzNYAbvWr5yFmwcjR4TrTjxsgzpV9SrTAEwg6yJksTLdd3HrdKbfjXUSJNmnCkJ6vkPu6tT8rPgh8CL5wcwTw53jcJ3VtWe";
$crypted = mws_crypt::encrypt($data,$key);
echo "crypted: "; var_dump($crypted) . PHP_EOL;
$decrypted = mws_crypt::decrypt($crypted,$key);
echo "decrypted: "; var_dump($decrypted) . PHP_EOL;



define('heof',"\r\n");

// Create a stream
$opts = array(
    'http'=>array(
      'method'=>"POST",
      'header'=>"WPAUTH: gumi.weblap.pro ". heof
              . "FUNC: Consumer" . heof
    )
  );
  
  $context = stream_context_create($opts);
  
  // Open the file using the HTTP headers set above
  $file = file_get_contents('http://gumi.weblap.pro/API/', false, $context);
  var_dump($file);

*/
