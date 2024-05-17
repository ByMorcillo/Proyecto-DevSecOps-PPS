//Global variables
var form = document.getElementById('contactForm');
var btnForm = document.getElementById('btnForm');
var email = document.getElementById('email');
var name1 = document.getElementById('name');
var message = document.getElementById('message');

//Regular Expressions
const regEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

//Main function
window.addEventListener('load', () => {
    btnForm.addEventListener('click', (e) => {
        e.preventDefault();
        checkAndSend();
    });
});

//Functions
function checkAndSend() {
    //Getting Values
    let e = email.value;
    let n = name1.value;
    let m = message.value;

    if (n != "") {
        if (e != "") {
            if (m != "") {
                //Check email regular expression
                if (!regEmail.test(e)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops',
                        text: "The email format is not correct!",
                    })
                    email.focus();
                } else {
                    send(n, e, m);
                }

            } else {
                //SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Oops',
                    text: "You can't leave the message field empty!",
                })
                message.focus();
            }

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: "You can't leave the email field empty!",
            })
            email.focus();
        }

    } else {
        //Sweetalert
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: "You can't leave the name field empty!",
        })
        name1.focus();
    }
}

function send(n, e, m) {
    let url = "platform/contactus.php";
    //Request creation
    let request = new XMLHttpRequest();
    let params = new FormData();
    params.append("name", n);
    params.append("email", e);
    params.append("message", m);
    request.addEventListener("load", function () {
        if (request.status == 200) {
            let data = request.responseText.trim();
            console.log(data);
            switch (data) {
                //The message has been sent correctly
                case "ok":
                    console.log('Entra');
                    Swal.fire({
                        icon: 'success',
                        title: 'The message has been sent correctly!',
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
                        text: "The email wasn't valid!",
                    });
                    break;

                case "err3":
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "There has been an error sending the message!",
                    });
                    break;
            }
        }
    });

    request.open("POST", url);
    request.send(params);
};

function exit() {
    location.href = "index.html";
}
