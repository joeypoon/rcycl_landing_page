<?php

    $subscriber_email = addslashes(trim($_POST['email']));
    $subscriber_zip_code = addslashes(trim($_POST['zip-code']));

    $url = 'http://rcycl.herokuapp.com/subscribers';
    $json = array(
         "subscriber" => array(
            "email" => $subscriber_email,
            "zip_code" => $subscriber_zip_code
         )
    );

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($json),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    var_dump($result);

?>