<?php
    require("header.php");

    $curl = curl_init();

    $base_url = "https://api.spotify.com/v1/me/top/tracks";

    curl_setopt_array($curl, array(
        CURLOPT_URL => $base_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer " . $_SESSION['access_token']
        )
    ));

    $response = curl_exec($curl);

    echo $response;