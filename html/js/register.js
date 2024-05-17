//Global variables
var username = document.getElementById("username");
var password = document.getElementById("password");
var dni = document.getElementById("dni");
var email = document.getElementById("email");
var name1 = document.getElementById("name");
var surname = document.getElementById("surname");

//Constants
const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
const dniRegex = /^\d{8}[a-zA-Z]$/;
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

//Main function
window.addEventListener("load", function () {

    document.getElementById("btnForm").addEventListener("click", (e) => {
        e.preventDefault();
        check();

    });
});

//Function to check
function check() {
    var u = username.value;
    var p = password.value;
    var d = dni.value;
    var e = email.value;
    var n = name1.value;
    var s = surname.value;

    // Checking Regular expressions and fields
    if (u === "" || p === "" || d === "" || e === "" || n === "" || s === "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: "You can't leave any field empty!",
        })
        return;
    } else if (!passwordRegex.test(p)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: "The password needs to be 8 characters, 1 uppercase, 1 lowercase and a digit!",
        })
        password.focus();
        return;
    } else if (!emailRegex.test(e)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: "The email is not valid!",
        })
        email.focus();
        return;
    }

    //Function to check if the dni is valid
    let bol = validateDNI(d);
    if (!bol) {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: "The DNI is not valid!",
        })
        return;
    }

    //Call the request function
    request(u, p, d, e, n, s);
}

//Function to validate dni
function validateDNI(dni) {
    var dniRegex = /^\d{8}[a-zA-Z]$/;

    if (!dniRegex.test(dni)) {
        return false;
    }

    var letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    var numero = dni.substr(0, dni.length - 1);
    var letra = dni.substr(dni.length - 1).toUpperCase();
    var indice = numero % 23;

    if (letra === letras.charAt(indice)) {
        return true;
    } else {
        return false;
    }
}



//Function to create the request
function request(u, p, d, e, n, s) {
    // Realizar conexión a register.php
    var xhr = new XMLHttpRequest();
    let params = new FormData();
    params.append('username', u);
    params.append('password', p);
    params.append('dni', d);
    params.append('email', e);
    params.append('name', n);
    params.append('surname', s);
    xhr.addEventListener('load', function () {
        // Manejar la respuesta del servidor si es necesario
        let data = xhr.responseText.trim();
        console.log(xhr.responseText.trim());
        switch (data) {
            case "ok":
                Swal.fire({
                    icon: 'success',
                    title: 'You have been registered correctly!',
                    showConfirmButton: false,
                    timer: 4000
                });

                setTimeout(exit, 1000);
                break;
            case "err1":
                Swal.fire({
                    icon: 'error',
                    title: 'Oops',
                    text: "There was an error, there were missing fields!",
                })
                break;
            case "err2":
                Swal.fire({
                    icon: 'error',
                    title: 'Oops',
                    text: "There was an error, the email is not valid!",
                })
                break;
            case "err3":
                Swal.fire({
                    icon: 'error',
                    title: 'Oops',
                    text: "There was an error, the DNI is not valid!",
                })
                break;
            case "err4":
                Swal.fire({
                    icon: 'error',
                    title: 'Oops',
                    text: "There was an error, the password is not valid!",
                })
                break;
            case "err5":
                Swal.fire({
                    icon: 'error',
                    title: 'Oops',
                    text: "There was an error, registring the user!",
                })
                break;
        }
    }
    );

    xhr.open("POST", "platform/register.php");
    xhr.send(params);
}

//Function to locate to the login page
function exit() {
    location.href = "login.html";
}