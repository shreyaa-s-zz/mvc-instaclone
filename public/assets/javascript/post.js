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

$('.photo-add-comment-container .btn').click(function (event) {
  event.preventDefault();
  // get the form data
  var postId = this.id;
  var commentNote = document.getElementById("comment-"+postId).value;
  console.log(postId,commentNote);
$.ajax({
    type: 'post',
    url: '/addComment',
    data: {
      postId : postId,
      commentNote : commentNote
    } ,
    success: function (response) {
      document.location.reload(true)
    }
});
});

$('.photo-icon .fa fa-heart-o heart fa-lg like_icon').click(function (event) {
  event.preventDefault();
  // get the form data
  var postId = this.id;
  console.log(postId);
$.ajax({
    type: 'get',
    url: '/like',
    data: {
      postId : postId,
    } ,
    success: function (response) {
      document.location.reload(true)
    }
});
});


