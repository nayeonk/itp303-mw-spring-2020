<?php
    require("header.php");

    $code = $_GET['code'];

    $token_url = "https://accounts.spotify.com/api/token";

    $curl = curl_init();

    $data = array(
        "grant_type" => "authorization_code",
        "code" => $code,
        "redirect_uri" => "http://localhost/lect22-curl-api/spotify/oauth.php"
    );

    curl_setopt_array($curl, array(
        CURLOPT_URL => $token_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($data),
        CURLOPT_HTTPHEADER => array(
            "Authorization: Basic " . base64_encode($client_id . ":" . $client_secret)
        )
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);

    $_SESSION['access_token'] = $response['access_token'];
    header("Location: index.php");

    // echo $response;