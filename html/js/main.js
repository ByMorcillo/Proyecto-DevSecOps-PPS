//Global variables
var btnNews = document.getElementById('btnNews');
var btnPhotos = document.getElementById('btnPhotos');
var dataContainer = document.getElementById('content');

//Main Function
window.addEventListener('load', () => {

    //Default getting all the news
    default_function();

    //Function to capture the click in the news btn
    btnNews.addEventListener('click', (e) => {
        e.preventDefault();
        loadContent("news.php");
    });

    //Function to capture the click in the photos btn
    btnPhotos.addEventListener('click', (e) => {
        e.preventDefault();
        loadContent("photos.php");
    });
});



//Functions

//Function to get the default
function default_function() {

    //Getting the actual value
    let url = "sectionChecker.php";
    //Request creation
    let request = new XMLHttpRequest();
    let params = new FormData();
    request.addEventListener("load", function () {
        if (request.status == 200) {
            let data = request.responseText.trim();
            if (data != "") {
                //Checking which function to call
                if (data == "news") {
                    loadContent("news.php");
                } else {
                    loadContent("photos.php");
                };
            } else {
                //If not found alert error

            }
        }
    });
    request.open("POST", url);
    request.send(params);

}

//Function to set the section to the main page
function loadContent(page) {
    //Checking if is the valid pages that are loaded

    //Request to the backend
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Update the content
            document.getElementById("content").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", page, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function getNew(id) {
    //Getting the actual value
    let url = "sectionChecker.php";
    //Request creation
    let request = new XMLHttpRequest();
    let params = new FormData();
    params.append("id", id);
    request.addEventListener("load", function () {
        if (request.status == 200) {
        }
    });
    request.open("POST", url);
    request.send(params);
}
