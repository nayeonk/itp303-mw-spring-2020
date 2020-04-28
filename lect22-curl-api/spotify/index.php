<?php
    require("header.php");
?>
<html>

<head>
    <title>mySpotify</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>mySpotify</h1>
        <?php
            $data = array(
                "client_id" => $client_id,
                "response_type" => "code",
                "redirect_uri" => "http://localhost/lect22-curl-api/spotify/oauth.php",
                "scope" => "playlist-read-private playlist-read-collaborative user-top-read"
            );

            $authorization_url = "https://accounts.spotify.com/authorize?" . http_build_query($data);

            ?>
            <a href="<?php echo $authorization_url; ?>">Authorize</a>
        <div id="main-container" class="row">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>

