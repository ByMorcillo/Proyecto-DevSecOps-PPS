//Global Variables
var username = document.getElementById('username');
var password = document.getElementById('password');
var btnForm = document.getElementById('btnForm');

//Main function
window.addEventListener('load', () => {
    //Call to the function
    btnForm.addEventListener('click',(e)=>{
        e.preventDefault();
        send();
    });
    
});

//Function to send the parameters to the backend
function send() {
    var u = username.value;
    var p = password.value;

    //Checking the parameters are not empty
    if (u == "" && p == "") {
        console.log(u);
        console.log(p);
        //Displaying Error alert
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: "You can't leave any field empty!",
        })
        //return;
    } else {

        let url = "platform/login.php";
        //Request creation
        let request = new XMLHttpRequest();
        let params = new FormData();
        params.append("username", u);
        params.append("password", p);
        request.addEventListener("load", function () {
            if (request.status == 200) {
                let data = request.responseText.trim();
                switch (data) {
                    //The message has been sent correctly
                    case "ok":
                        Swal.fire({
                            icon: 'success',
                            title: 'Login correct',
                            showConfirmButton: false,
                            timer: 4000
                        });

                        setTimeout(exit, 1000);
                        break;
                    //
                    case "err1":
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "Some field was empty!",
                        });
                        break;

                    case "err2":
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "The credentials are not correct!",
                        });
                        username.focus();
                        break;
                    case "err3":
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "There was an error during the process!",
                        });
                        break;
                }
            }
        });

        request.open("POST", url);
        request.send(params);
    }
};

function exit() {
    location.href = "platform/main.php";
}