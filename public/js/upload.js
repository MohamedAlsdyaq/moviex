window.arr_uploaded_images_moviex = [];
   function upload(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#upload_target').append('<div  class="uploaded_img" style="background-image: url('+e.target.result +')"></div>');
           window.arr_uploaded_images_moviex.push(e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}



//ajax call to upload imgs;
