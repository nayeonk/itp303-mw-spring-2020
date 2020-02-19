function displayResults(responseText) {
	// Displays iTunes results on the browser

	// Reset the results by removing all <tr> tags within <tbody>
	let tbody = document.querySelector("tbody");

	// hasChildNodes returns true if there are children
	while(tbody.hasChildNodes()) {
		tbody.removeChild(tbody.lastChild);
	}
	

	// Convert the JSON string into JS objects
	let response = JSON.parse(responseText);
	console.log(response);
	console.log("First song result is " + response.results[0].trackName);

	// For every single result, create a new row for the <table> and append it to the table
	for(let i = 0; i < response.results.length; i ++) {
		// Create HTML elements on the fly with JS
		let trTag = document.createElement("tr");

		let coverTdTag = document.createElement("td");
		let imgTag = document.createElement("img");
		imgTag.src = response.results[i].artworkUrl100;
		console.log(imgTag);

		// Append Image tag together
		coverTdTag.appendChild(imgTag);

		let artistsTdTag = document.createElement("td");
		artistsTdTag.innerHTML = response.results[i].artistName;

		let trackTdTag = document.createElement("td");
		trackTdTag.innerHTML = response.results[i].trackName;

		let albumTdTag = document.createElement("td");
		albumTdTag.innerHTML = response.results[i].collectionName;

		let audioTdTag = document.createElement("td");
		let audioTag = document.createElement("audio");
		audioTag.src = response.results[i].previewUrl;
		audioTag.controls = true;

		audioTdTag.appendChild(audioTag);

		// Append all the elements together
		trTag.appendChild(coverTdTag);
		trTag.appendChild(artistsTdTag);
		trTag.appendChild(trackTdTag);
		trTag.appendChild(albumTdTag);
		trTag.appendChild(audioTdTag);

		// console.log(trTag);

		// Append <tr> to <tbody>
		document.querySelector("tbody").appendChild(trTag);
	}
}

// Make HTTP request using AJAX
function ajax(url, returnFunction) {

	let httpRequest = new XMLHttpRequest();
	httpRequest.open("GET", url);
	httpRequest.send();

	// We will get alerted when itunes gives back some kind of response
	httpRequest.onreadystatechange = function(){
		// This function runs when we get some kind of response back from iTunes
		console.log(httpRequest);
		// When we get back a DONE state (readyState == 4, let's do something with it)
		if(httpRequest.readyState == httpRequest.DONE) {
			// Check for errors - status code 200 means success
			if(httpRequest.status == 200) {
				console.log(httpRequest.responseText);

				// Display the results on the browser - a separate function is created for this purpose
				returnFunction(httpRequest.responseText);

			}
			else {
				console.log("AJAX Error!!");
				console.log(httpRequest.status);
				console.log(httpRequest.statusText);
			}
			
		}
	}
}

// When user submits the form
document.querySelector("#search-form").onsubmit = function(event) {

	// Prevent from actually submitting the form
	// console.log(event);
	event.preventDefault();

	// Grab user input
	let searchInput = document.querySelector("#search-id").value;
	let limitInput = document.querySelector("#limit-id").value;

	// console.log(searchInput);
	// console.log(limitInput);

	let url = "https://itunes.apple.com/search?term=" + searchInput + "&limit=" + limitInput;

	// Separate out the function that makes http requests via ajax
	// Two params - the url and the name of function that gets called after a response is received 
	ajax(url, displayResults);
	
	console.log("Hey");
	console.log("Hey");
	console.log("Hey");
	console.log("Hey");

}