$("#formnotify").submit(function(event){

  event.preventDefault();
  var form_data = $(this).serializeArray();
  // console.log(form_data);
  // alert('hell0');
    

    $.ajax({
      url: "notifications.php",
      type: "POST",
      data: form_data,
      success: function(data){

          $("#notificationMessage").html(data).fadeIn();

          $("#formnotify")[0].reset();

          setTimeout(function(){
            $("#notificationMessage").hide();
          },3000)

          load_comment_stuff();
  
      },
      error: function(){
        $("#notificationMessage").html("<div class='alert alert-danger'>Notification can't be sent try again later!</div>")
      }
  
    });


});

load_comment_stuff();
   
function load_comment_stuff(){
  $.ajax({
    url:"load_stuff_comment.php",
    method: "POST",
    success: function(data){
      $("#load-allmessage-stuff").html(data);
    },
    error: function(){
      
    }
  });
}

$(document).on('click','.like-button', function(){
  alert('Hi')
    // var content_id = $(this).data('content_id');
    // console.log(content);
    // $(this).attr('disabled','disabled');

    // $.ajax({
    //   url: "like.php",
    //   type: "POST",
    //   data: {content_id:content_id},
    //   success: function(data){
    //       if(data == 'done'){
    //         load_comment_stuff();
    //       }
    //   }
    // });
});
   
