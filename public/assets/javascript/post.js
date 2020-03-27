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

$('form.photo-add-comment-container .btn').click(function (event) {
  event.preventDefault();
  var formNode = $(this).parent();
  console.log(formNode.serializeArray());
  // get the form data
   var formData = {
     'commentNote': $('input[name=commentNote]').val(),
     'postId': $('input[name=postId]').val(),
   };
  $.ajax({
    type: 'post',
    url: '/addComment',
    data: formData,
    success: function (response) {
      document.location.reload(true)
    }
  });
});

