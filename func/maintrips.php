<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Orange cabs</title>

    <!-- Bootstrap core CSS -->
    <link href="../src/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../src/DataTablesBootstrap/datatables.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <!-- fonts icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <!-- jquery ui -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <!-- Custom styles for this template -->
    <link href="../src/css/dashboard.css" rel="stylesheet">
    <link href="../src/css/trip.css" rel="stylesheet"> 

    <link href="../src/dist/emojionearea.min.css" rel="stylesheet"> 
 
    <!-- message box style -->
    <link rel="stylesheet" href="../src/css/footer.css">

    <!-- datepicker bootstrap -->
    <!-- <link href="../src/css/datetimepicker.css" rel="stylesheet" type="text/css"/> -->

  </head>
  
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
// var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
// (function(){
// var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
// s1.async=true;
// s1.src='https://embed.tawk.to/5bfe7fa040105007f379f5ca/default';
// s1.charset='UTF-8';
// s1.setAttribute('crossorigin','*');
// s0.parentNode.insertBefore(s1,s0);
// })();
// </script>
<!--End of Tawk.to Script-->

  <body>

    <?php include('../inc/headerbook.php');?>

    <div class="container-fluid">

        <div class="row">
            <?include('../inc/sidebar.php');?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            
                <?= $content; ?>
                
                 <!-- Open message box -->
                <!-- <div > data-touserid="<?//echo $user_id;?>" data-tousername="<?//echo $username;?>" -->
                    <i class="fa fa-comments buttonOpenChatApp"></i>
                    
                    <!-- </div> -->
                
            </main>
            
        </div>
    </div>

    <?php include('../inc/footer.php');?>
     
                <!-- update password -->
                <form action="#" class="form" id="updatepasswordform">
                        <div class="modal fade" id="updatepasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header edit-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update password:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body edit-body">
                                        <div id="updatepasswordMessage"></div>
                                        <div class="form-group">
                                            <label for="currentpassword" class="col-form-label">Enter Current Password:</label>
                                            <input type="password" class="form-control" id="currentpassword" name="currentpassword">
                                        </div>
                                        <div class="form-group">
                                            <label for="newpassword" class="col-form-label">Choose New password:</label>
                                            <input type="password" class="form-control" id="newpassword" name="newpassword">
                                        </div>

                                        <div class="form-group">
                                            <label for="confirmpassword" class="col-form-label">Confirm password:</label>
                                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                                        </div>
                                    </div>
                                    <div class="modal-footer edittripfooter">
                                        <input type="submit" class="btn btn-primary" name="updatepassword" id="updatepassword" value="Update">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>


                <!-- contact number -->
                <form action="#" class="form" id="updatemobilenumber">
                    <div class="modal fade" id="updatecontactnumberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header edit-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update your contact number:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body edit-body">
                                    <div id="mobilenumberMessage"></div>
                                    <div class="form-group">
                                        <label for="mobilenumber" class="col-form-label">Enter New number:</label>
                                        <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?echo $mobile?>">
                                    </div>
                                </div>
                                <div class="modal-footer edittripfooter">
                                    <input type="submit" class="btn btn-primary" name="Updatemobile" id="Updatemobile" value="Update">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <!-- update fullname -->
                <form action="#" class="form" id="updateusernameform">
                    <div class="modal fade" id="updateusernameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header edit-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update  Username:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                <div class="modal-body">
                                    <div id="messageusername"></div>
                                    <div class="form-group">
                                        <label for="username" class="col-form-label">Username:</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?echo $username?>">
                                    </div>
                                </div>

                                <div class="modal-footer edittripfooter">
                                    <input type="submit" class="btn btn-primary" name="Updateusername" id="Updateusername" value="Update">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

                <!-- update email -->
                <form action="#" class="form" id="updateemailform">
                    <div class="modal fade" id="updateemailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header edit-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update  Email:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body edit-body">
                                    <div id="emailupdateMessage"></div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email Address:</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?echo $email?>">
                                    </div>
                                </div>
                                <div class="modal-footer edittripfooter">
                                    <input type="submit" class="btn btn-primary" name="Updateemail" id="Updateemail" value="Update">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                 <!-- Edit form -->
                <form action="" id="Edittripform">
                    <div class="modal fade" id="edittripModal" tabindex="-1" role="dialog" aria-labelledby="edittriptripTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header edit-header">
                                <h5 class="modal-title editTitle" id="edittriptripTitle">Edit Trip:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body edit-body">

                                <div id="edittripmessage"></div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pickuppoint2" class="">PICK UP POINT:</label>
                                        <input type="text" class="form-control text-lowercase" id="pickuppoint2"  name="pickuppoint2">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dropofpoint2" class="">DROP-OFF POINT:</label>
                                        <input type="text" class="form-control text-lowercase" id="dropofpoint2" name="dropofpoint2">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                            <label for="distance2" class="">DISTANCE:</label>
                                            <input type="text" class="form-control text-lowercase" id="distance2"  readonly="readonly" name="distance2">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="duration2" class="">DURATION:</label>
                                            <input type="text" class="form-control text-lowercase" id="duration2" readonly="readonly"  name="duration2">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="price2" class="">PRICE:</label>
                                            <input type="text" class="form-control text-lowercase" id="price2" readonly="readonly" name="price2">
                                        </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    <label for="result2" class="text-uppercase">Date & Time Pick up:</label>
                                        <div id="picker2"> </div>
                                        <input class="form-control " type="hidden" id="result2" value="" name="date2"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="amountofriders2" class="text-uppercase">Amount of riders:</label>
                                        <input type="number" class="form-control text-lowercase" id="amountofriders2" name="amountofriders2">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nameofonerider2" class="text-uppercase">Name of one rider:</label>
                                        <input type="text" class="form-control text-lowercase" id="nameofonerider2" placeholder="Name of one rider:" name="nameofonerider2">
                                    </div>

                                </div>

                            </div>
                            
                            <div class="modal-footer edittripfooter">
                                <!-- <button type="button" class="btn btn-primary"></button> -->
                                <input type="submit" class="btn btn-primary" name="edittrip" value="Update Trip">
                                <button type="button" class="btn btn-danger" id="deleteTrip">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- payment method form -->
                <form action="https://sandbox.payfast.co.za/eng/process" method="POST">
                    <div class="modal fade" id="paytripModal" tabindex="-1" role="dialog" aria-labelledby="edittriptripTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header edit-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pay your ride with PayFast:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body edit-body">

                                    <div id="paytripmessage"></div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="pickuppoint2" class="">Price / Rand :</label>
                                            <input type="text" id="price3" readonly="readonly" style="border:0;">
                                            <!-- <input type="text" class="form-control text-lowercase" id="pickuppoint2"  name="pickuppoint2"> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer edittripfooter">
                                    <button type="button" class="btn btn-primary">Pay now</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- start chat -->
                <div class="card" id="chatApp">
                    <div id="user_details" class="" style="font-size:.9rem;"></div>
                    
                </div>
                <div id="user_modal_details"></div>

                

   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../src/js/jquery-3.3.1.min.js"></script>
    <script src="../src/js/popper.min.js"></script>
    <script src="../src/js/bootstrap.min.js"></script>
    <script src="../src/dist/emojionearea.min.js"></script>

    <!-- jquery ui -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-1SZLcvFN_cxb2HXrmtf7EhfA2O94SUs&libraries=places">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

    <script src="maps.js"></script>
    <script src="javascript.js"></script>
    <script src="mytrip.js"></script>
    <script src="profile.js"></script>
    <script src="chat.js"></script>
    <script src="notification.js"></script>
    
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <script>
        $(".datatable").dataTable({});
    </script>

    
  </body>
</html>









