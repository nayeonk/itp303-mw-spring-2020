<?php
// Think of this page as acting as the adapter between your
// application and the external API
//
// Your application will make a call to this page via Ajax,
// and this page will make the call to the API via cURL.

// Yelp API:

// Documentation: https://www.yelp.com/developers/documentation/v3
// Getting Started: https://www.yelp.com/developers/documentation/v3/get_started
// Authentication: https://www.yelp.com/developers/documentation/v3/authentication
// Business Search: https://www.yelp.com/developers/documentation/v3/business_search

/*
************************************************************************
$data when using cURL
************************************************************************

It may be useful to put all the information
you need to send in an array $data and use
`http_build_query($data)` to send the data
(See @Determining URL / Sending data)

Tip: When using the API for the first time, use dummy data before processing a form inputs

$data = array(
    "term" => "korean food",
    "location => "los angeles"
)

************************************************************************
General PHP cURL usage
************************************************************************

// Determine your $full_url
// (See @Determining URL / Sending data)

// Initialize a cURL session
$curl = curl_init();

// Set options
// - You'll usually always want these two options

curl_setopt_array($curl, array(
    CURLOPT_URL => $full_url,
    CURLOPT_RETURNTRANSFER => true,

    CURL_OPTION_3 => '',
    CURL_OPTION_4 => ''
));

// Execute and assign it to a $response variable
$response = curl_exec($curl);

// Will usually get a JSON back - Decode it into a PHP associative array (easier to use)
$response = json_decode($response, true);

************************************************************************
Determining URL / Sending data
************************************************************************

1. If using GET
    - Append http_build_query($data) to the base URL
        - $full_url = $base_url . "?" . http_build_query($data)

2. If using POST
    - Don't need to change add anything to the base URL
    - Set option CURLOPT_POST = 1
    - Set option CURLOPT_POSTFIELDS = http_build_query($data)

3. Read API documentation and see if you need to add headers
    - Set option CURLOPT_HTTPHEADER = array('header1', 'header2')
    - Sometimes, you'll need to send your API key through a header (refer to official documentation)
        - "Authorization: Bearer <token>"
    - If a "Content Type" needs to be specified, add it as a header
        - "Content-Type: application/json"

4. Windows users -may- need to set the option CURLOPT_SSL_VERIFYPEER = false

*/

$API_KEY = "";

$base_url = "https://api.yelp.com/v3/businesses/search";

$data = array(
    "term" => $_GET["term"],
    "location" => $_GET["location"]
);

$full_url = $base_url . "?" . http_build_query($data);

// echo $full_url;

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $full_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $API_KEY
    )
));

$response = curl_exec($curl);
$response = json_decode($response, true);

$myResponse = array();

foreach($response["businesses"] as $business) {

    $categories = array();

    foreach($business["categories"] as $category) {
        $categories[] = $category["title"];
    }

    $businessInfo = array(
        "name" => $business["name"],
        "image_url" => $business["image_url"],
        "url" => $business["url"],
        "categories" => implode(", ", $categories)
    );

    $myResponse[] = $businessInfo;

    // echo $business['name'] . "<hr>";
}

echo json_encode($myResponse);

// echo "<pre>";
// print_r($myResponse);
// echo "</pre>";

// echo json_encode($myResponse);

// echo "<pre>";
// print_r($response);
// echo "</pre>";