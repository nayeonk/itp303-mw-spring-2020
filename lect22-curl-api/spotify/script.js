$(document).ready(function() {
    let $mainContainer = $("#main-container")

    $.ajax({
            method: "POST",
            url: "backend.php",
            data: {

            }
        })
        .done(function(response) {
            response = JSON.parse(response)

            for (let song of response.items) {
                let songHTML = `
                <div class="col-12 col-md-4 col-lg-3 mt-2">
                    <div class="card">
                        <img src="${song.album.images[0].url}" class="card-img-top" alt="${song.name}">
                        <div class="card-body">
                            <h5 class="card-title"> ${song.name}</h5>
                            <small>by ${song.artists[0].name}</small>
                            <hr>
                            <p class="card-text">
                            <audio controls style="width:100%">
                                <source src="${song.preview_url}" type="audio/mp3">
                            </audio>
                            </p>
                        </div>
                    </div>
                </div>`

                $mainContainer.append(songHTML)
            }

            console.log(response)
        })
})




/*
let playlistHTML = `
<div class="col-6 col-md-4 col-lg-3 mt-2">
    <div class="card">
        <img src="${playlist.images[0].url}" class="card-img-top" alt="${playlist.name}">
        <div class="card-body">
            <h5 class="card-title">${playlist.name}</h5>
            <small>by ${playlist.owner.display_name}</small>
            <hr>
            <p class="card-text">
            ${playlist.description}
            </p>
            <a href="${playlist.uri}" target="_blank" class="btn btn-light">Spotify It!</a>
        </div>
    </div>
</div>
`

let songHTML = `
    <div class="col-12 col-md-4 col-lg-3 mt-2">
        <div class="card">
            <img src="${song.album.images[0].url}" class="card-img-top" alt="${song.name}">
            <div class="card-body">
                <h5 class="card-title"> ${song.name}</h5>
                <small>by ${song.artists[0].name}</small>
                <hr>
                <p class="card-text">
                <audio controls style="width:100%">
                    <source src="${song.preview_url}" type="audio/mp3">
                </audio>
                </p>
            </div>
        </div>
    </div>`
*/