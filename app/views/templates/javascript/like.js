$("#like").click(function(event) {
  var inputvalue = $("#like").val();

  $.ajax({
    type: "post",
    url: "/app/controller/post.php",
    data: { inputvalue: inputvalue },
    dataType: "json",
    success: function(response) {
      if (!response) {
        $("#enroll_result").html("Enrollment Number Already Exists");
        event.preventDefault();
        alert("Enrollment Number Already Exists");
      } else {
        $("#enroll_result").empty();
      }
    }
  });
});
