//Main function
window.addEventListener('load', () => {
    document.getElementById('newsForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent form from submitting automatically

        // Get form data
        var formData = new FormData(this);

        // Send AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', this.getAttribute('action'), true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Handle server response
                    let data = xhr.responseText.trim();

                    switch (data) {
                        case "ok":
                            Swal.fire({
                                icon: 'success',
                                title: 'The new has been added correctly!',
                                showConfirmButton: false,
                                timer: 4000
                            });
                            setTimeout(exit, 1000);
                            break;
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
                                text: "Some field was empty!",
                            });
                            break;
                        case "err3":
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: "There was an error adding the new!",
                            });
                            break;
                    }


                } else {
                    // Handle any errors that occur during the request
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "There was an error during the process!",
                    });
                }
            }
        };
        xhr.send(formData);
    });
});

function exit() {
    location.href = "main.php";
}