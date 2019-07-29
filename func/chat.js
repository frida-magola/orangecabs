$(".buttonOpenChatApp").on('click', function(){
  $("#chatApp").toggle('fadeIn'); 
  // $(this).css({
  //   "left":"2rem",
  //   "top":"-12rem",
  //   "font-size":"1.5rem"});
  $(this).hide();

});

$("#close-chat").on('click', function(){
  $("#chatApp").hide('fadeIn');
  $(".buttonOpenChatApp").show('fadeOut');
  
});

//fetch users detail login
function fetch_user(){

    $.ajax({
      url: "fetch_user.php",
      type: "POST",
      success: function(data){
          $("#user_details").html(data);
      },
      error: function(){

      }
    });
}
fetch_user();

setInterval(function(){
  fetch_user();
  update_last_activity();
  update_chat_history_data();
},5000);

//last activity of the user
function update_last_activity(){
  $.ajax({
    url:"update_last_activity.php",
    type:"POST",
    success: function(){
    }

  });
}

function make_chat_dialogue_box(to_user_id,to_user_name){
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with &nbsp;'+to_user_name+'">';
  modal_content += '<div style="height:300px;border:1px solid #ccc;overflow-y:scroll;margin-bottom:24px;padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content += '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_modal_details').html(modal_content);
}

$(document).on('click','.start-chat',function(){

  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');

  make_chat_dialogue_box(to_user_id,to_user_name);

  $("#user_dialog_"+to_user_id).dialog({
    autoOpen:false,
    width:400
  });

  $('#user_dialog_'+to_user_id).dialog('open');
  $('#chat_message_'+to_user_id).emojioneArea({
    pickerPosition:"top",
    toneStyle:"bullet"
  });


  
});

$(document).on('click','.send_chat', function(){
    var to_user_id = $(this).attr('id');
    var chat_message = $('#chat_message_'+to_user_id).val();
    $.ajax({
      url:"insert_chat.php",
      type:"POST",
      data:{
        to_user_id:to_user_id,chat_message:chat_message
      },
      success:function(data){
        // $('#chat_message_'+to_user_id).val('');
        var element = $('#chat_message_'+to_user_id).emojioneArea();
        element[0].emojioneArea.setText('');
        $('#chat_history_'+to_user_id).html(data);
      },
      error:function(){}
    });
});

function fetch_user_chat_history(to_user_id){
  $.ajax({
    url:"fetch_user_chat_history.php",
    type:"POST",
    data:{to_user_id:to_user_id},
    success:function(data){
      $('#chat_history_'+to_user_id).html(data);
    },
    error:function(){}
  });
}

function update_chat_history_data(){
  $('.chat_history').each(function(){
      var to_user_id = $(this).data('touserid');
      fetch_user_chat_history(to_user_id);
  });
}

$(document).on('click', '.ui-button-icon',function(){
    $('.user_dialog').dialog('destroy').remove();
});

//typing yes
$(document).on('focus','.chat_message', function(){
    var is_type = 'yes';
    $.ajax({
      url:"update_is_type_status.php",
      type:"POST",
      data:{is_type:is_type},
      success:function(){

      }
    });
});

//typing no
$(document).on('blur','.chat_message',function(){
   var is_type = 'no';
   $.ajax({
     url:"update_is_type_status.php",
     type:"POST",
      data:{is_type:is_type},
      success:function(){

      }
   });
});
