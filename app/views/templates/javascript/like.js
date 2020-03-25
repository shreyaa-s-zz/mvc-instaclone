$("#like").click(function(event) {
  var inputvalue = $("#like").val();

  $.ajax({
    type: "post",
    url: "/app/controller/post.php",
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
  // var inputvalue = comment;
  // var input post id
  $.ajax({
    type: "post",
    url: "/app/controller/post.php",
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
