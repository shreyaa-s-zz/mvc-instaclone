function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function(){
  readURL(this);
});

$(document).ready(function() {
  $('form').submit(function(event) {
    // get the form data
    var formData = {
        'commentNote': $('input[name=commentNote]').val(),
        'postId': $('input[name=postId]').val(),
    };
  $.ajax({
      type: 'post',
      url: '/addComment',
      data: formData ,
      success: function (response) {
          document.location.reload(true)
      }
  });
  event.preventDefault();
});
});
