//Global Variables
var btnSave1 = document.getElementById('btnSave1');


//Main Function 
window.addEventListener('load', () => {

    loadImage();
    //Save the new image
    btnSave1.addEventListener('click', (e) => {
        e.preventDefault();
        saveImage();
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
    xhr.open('POST', 'newImg.php', true);
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
    location.href = "main.php";
}