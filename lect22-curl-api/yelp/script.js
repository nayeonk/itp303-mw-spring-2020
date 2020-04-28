$(document).ready(function() {
    // The code in .ready() will only execute after the page has loaded.

    let $mainContainer = $("#main-container")
        // By convention, prepend a $ onto jQuery object variable names

    let $searchForm = $("#search-form")
    let $searchTerm = $("#search-term")
    let $searchLocation = $("#search-location")

    $searchForm.on("submit", function(e) {
        e.preventDefault()

        let searchTerm = $searchTerm.val()
        let searchLocation = $searchLocation.val()

        // Clears everything in $mainContainer
        $mainContainer.html("")

        $.ajax({
            method: "GET",
            url: "backend.php",
            data: {
                term: searchTerm,
                location: searchLocation
            }
        }).done(function(response) {
            response = JSON.parse(response)

            for (let business of response) {
                console.log(business)

                let bHTML = `
                <div class="col-6 col-md-4 col-lg-3 mt-2">
                    <div class="card">
                        <img src="${ business.image_url }" class="card-img-top" alt="${ business.name }">
                        <div class="card-body">
                            <h5 class="card-title">${ business.name }</h5>
                            <p class="card-text">${ business.categories }</p>
                            <a href="${ business.url }" class="btn btn-primary" target="_blank">Yelp It!</a>
                        </div>
                    </div>
                </div>
                `

                $mainContainer.append(bHTML);

            }

        })
    })
})