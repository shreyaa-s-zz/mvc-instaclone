$("#like").click(function(event) {
  var inputvalue = $("#like").val();
  $(this).removeClass('fa fa-heart-o heart fa-lg like_icon');
  $(this).addClass('fa heart-red fa-heart heart fa-lg like_icon');

  $.ajax({
    type: "post",
    url: "/post",
    data: { inputvalue: inputvalue },
    dataType: "json",
    success: function(response) {
      if (!response) {
        // no change
      } else {
        // button colour changes to red
      }
    }
  });
});

function comment() {
  var commentNote = $(".comment").val();
  var postId = $("#comment").val();
  $.ajax({
    type: "post",
    url: "/post",
    data: { postId: postId, commentNote = comment },
    dataType: "json",
    success: function(response) {
      if (!response) {
        // no change
      } else {
        // reload comments
      }
    }
  });
}
