
//Global variables
var btnChgPic = document.getElementById('btnChgPic');
var btnSave1 = document.getElementById('btnSave1');
var btnSave2 = document.getElementById('btnSave2');

//Constants
const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

//Main Function
window.addEventListener('load', () => {

    //Load the default image
    btnChgPic.addEventListener('click', (e) => {
        e.preventDefault();
        loadImage();
    });

    //Save the new image
    btnSave1.addEventListener('click', (e) => {
        e.preventDefault();
        saveImage();
    });

    //Change the password for the user
    btnSave2.addEventListener('click', (e) => {
        e.preventDefault();
        changePassword();
    });
});

//Functions
function previewImage() {
    var preview = document.getElementById('preview');
    var file = document.getElementById('user_photo').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
    }
}

function loadImage() {
    let url = "../profile_images/sopIlpGfeekppaeaigqav.png";
    var preview = document.getElementById('preview');
    preview.src = url;
}

function saveImage() {

    // Get the selected image
    var fileInput = document.getElementById('user_photo');
    // Check if the image upload field is not empty
    if (fileInput.files.length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "No image was selected!",
        });
        return; // Exit the function if no image is selected
    }

    var file = fileInput.files[0];

    // Create a FormData object and append the selected image
    var formData = new FormData();
    formData.append('file', file);

    // Make the AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'newProfileImg.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Handle the response here if necessary
                let data = xhr.responseText.trim();
                switch (data) {
                    //The message has been sent correctly
                    case "ok":
                        Swal.fire({
                            icon: 'success',
                            title: 'Image uploaded correctly!',
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
                            text: "The file was empty o wasn't an allowed extension!",
                        });
                        break;

                    case "err2":
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "There was an error uploading the image!",
                        });
                        username.focus();
                        break;
                    case "err3":
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: "The file was an error in the connection with the database!",
                        });
                        break;
                }

            } else {
                // Handle errors here if necessary
                console.error(xhr.responseText);
            }
        }
    };
    xhr.send(formData);

};

function exit() {
    location.reload();
}

function changePassword() {
    //Variables
    var currentPassword = document.getElementById('currentPassword').value;
    var newPassword = document.getElementById('newPassword').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    // Basic Validations
    if (currentPassword === '' || newPassword === '' || confirmPassword === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "All fields are required!",
        });
        return;
    }

    if (newPassword !== confirmPassword) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "New password and confirm password do not match.",
        });
        return;
    }

    if(!passwordRegex.test(newPassword)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "The password needs to be 8 characters long, 1 uppercase, 1 lowercase and 1 special character 1!",
        });
        return;
    }

    //Connection to the php file 
    let url = "changePassword.php";
    //Request creation
    let request = new XMLHttpRequest();
    let params = new FormData();
    params.append("currentPassword", currentPassword);
    params.append("newPassword", newPassword);
    request.addEventListener("load", function () {
        if (request.status == 200) {
            let data = request.responseText.trim();
            switch (data) {
                case "ok":
                    console.log('entra3');
                    Swal.fire({
                        icon: 'success',
                        title: 'The password has updated correctly!',
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
                        text: "There was missing parameters!",
                    });
                    break;

                case "err2":
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "There was an error in the connection!",
                    });
                    username.focus();
                    break;
                case "err3":
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "The current password is not correct!",
                    });
                    break;
                case "err4":
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "The password needs to be 8 characters long, 1 uppercase, 1 lowercase and 1 special character!",
                    });
                    break;
            }
        };
    });
    request.open("POST", url);
    request.send(params);

}