/**
 * Author:Josh Tuffnell
 * Date: 11/10/2022
 * File: game_detail.class.php
 * Description: handles AJAX methods
 */
var searchBoxObj, suggestionBoxObj;

//first action upon page loading
window.onload = function () {
    //DOM objects
    searchBoxObj = document.getElementById('searchtextbox');
    suggestionBoxObj = document.getElementById('suggestionDiv');
    searchBoxObj.addEventListener('keyup', handleKeyUp);
};
window.onclick = function () {
    suggestionBoxObj.style.display = 'none';
};
function displayTitles(titles){

}
//handles keyup event. function called every keystroke made
function handleKeyUp(e) {

}
