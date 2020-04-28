<html>

<head>
    <title>YelpGrid</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>YelpGrid</h1>
        <!-- START form -->
        <form id="search-form">
            <div class="row">
                <div class="col ">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                        <input id="search-term" type="text" class="form-control" placeholder="Query">
                        <input id="search-location" type="text" class="form-control" placeholder="Location" value="Los Angeles">
                    </div>
                </div>
            </div>
        </form>
        <!-- END form -->
        <!-- START grid -->
        <!-- Bootstrap Cards: https://getbootstrap.com/docs/4.4/components/card/ -->
        <div id="main-container" class="row">
            <div class="col-6 col-md-4 col-lg-3 mt-2">
                <div class="card">
                    <img src="https://s3-media2.fl.yelpcdn.com/bphoto/-yALT-EdPqE6g6s6zsS9aQ/o.jpg" class="card-img-top" alt="Sun Nong Dan">
                    <div class="card-body">
                        <h5 class="card-title">Sun Nong Dan</h5>
                        <p class="card-text">Korean, Soup</p>
                        <a href="https://www.yelp.com/biz/sun-nong-dan-los-angeles-4" class="btn btn-primary" target="_blank">Yelp It!</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END grid -->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>