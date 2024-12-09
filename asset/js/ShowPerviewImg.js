// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function(e) {
//             $('#blah').attr('src', e.target.result);
//         }

//         reader.readAsDataURL(input.files[0]); // convert to base64 string
//     }
// }
// $("#recruit_img").change(function() {
//     readURL(this);
// });

function readURL_certificateEdu(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#show_certificateEdu').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
$("#recruit_certificateEdu").change(function() {
    readURL_certificateEdu(this);
});

function readURL_certificateEduB(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#show_certificateEduB').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
$("#recruit_certificateEduB").change(function() {
    readURL_certificateEduB(this);
});

function readURL_copyidCard(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#show_copyidCard').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
$("#recruit_copyidCard").change(function() {
    readURL_copyidCard(this);
});

function readURL_copyAddress(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#show_copyAddress').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
$("#recruit_copyAddress").change(function() {
    readURL_copyAddress(this);
});