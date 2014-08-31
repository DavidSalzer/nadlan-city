
function uploadImage(image, callback) {
    if (image[0].files && image[0].files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            callback(e.target.result);
        }
        reader.readAsDataURL(image[0].files[0]);
    }
}

