/**
 * Author:Josh Tuffnell & Luke Erny
 * Date: 11/10/2022
 * File: game_detail.class.php
 * Description: handles AJAX methods
 */
var xmlHttp;
var numGames = 0 //total number of suggested games
var activeGame = -1 //game currently being selected
var searchBoxObj, suggestionBoxObj;

//function to create a XMLHttpRequest object.
function createXmlHttpRequestObject() {
    //create a XmlHttpRequest object
    if (window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else {
        alert("Error creating the XMLHttpRequest object.");
        return false;
    }
}

//intial actions tot ake when the page loads
window.onload = function () {
    xmlHttp = createXmlHttpRequestObject();
    //DOM objects
    searchBoxObj = document.getElementById('searchtextbox');
    suggestionBoxObj = document.getElementById('suggestionDiv');
};

window.onclick = function () {
    suggestionBoxObj.style.display = 'none';
};

//set and send the XMLHttp request. Parameter is search term
function suggest(query) {
    //if the search term is empty clear the suggestion box
    if (query === "") {
        suggestionBoxObj.innerHTML = "";
        return;
    }

    //open an asynchronus request to the server
    xmlHttp.open("GET", base_url + "/" + media + "/suggest/" + query, true);

    //handle the server's response
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            //extract the JSON received
            var games = JSON.parse(xmlHttp.responseText);
            //display suggested games in a div block
            displayGames(games);
        }
    };

    //make the request
    xmlHttp.send(null);
}

//This function populates the suggestion box with all of the games
function displayGames(games) {
    numGames = games.length;
    //console.log(numGames);
    activeGame = -1;
    if (numGames === 0) {
        suggestionBoxObj.style.display = 'none';
        return false;
    }

    var divContent = "";
    //retrieve the games from the JSON doc and create a new entry for each games
    for (i = 0; i < games.length; i++) {
        divContent += "<span id=s_" + i + " onclick='clickGame(this)'>" + games[i] + "</span>";
    }
    //display the spans in the div block
    suggestionBoxObj.innerHTML = divContent;
    suggestionBoxObj.style.display = 'block';
}

//this function handles keyup event.
function handleKeyUp(e) {
    e = (!e) ? window.event : e;

    //if keystroke is not an up or down arrow key call the suggest fucntion and pass its content ot the search box
    if (e.keyCode !== 38 && e.keyCode !== 40) {
        suggest(e.target.value);
        return;
    }

    //if the up arrow is pressed
    if (e.keyCode === 38 && activeGame > 0) {
        activeGameObj.style.backgroundColor = "#FFF";
        activeGame--;
        activeGameObj = document.getElementById("s_" + activeGame);
        activeGameObj.style.backgroundColor = "#F5DEB3";
        searchBoxObj.value = activeGameObj.innerHTML;
        return;
    }

    //if the down arrow is pressed
    if (e.keyCode === 40 && activeGame < numGames - 1) {
        if (typeof(activeGameObj) !="undefined") {
            activeGameObj.style.backgroundColor = "#FFF";
        }
        activeGame++;
        activeGameObj = document.getElementById("s_" + activeGame);
        activeGameObj.style.backgroundColor = "#F5DEB3";
        searchBoxObj.value = activeGameObj.innerHTML;
    }
}

//when a game is clicked, fill the search box with the game name and hide suggestion list
function clickGame(game) {
    //display the game name in the search box
    searchBoxObj.value = game.innerHTML;

    //hide all suggestions
    suggestionBoxObj.style.display = 'none';
}