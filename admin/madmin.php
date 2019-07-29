<?php 

//vehicule model
$sqlmodelcar = "SELECT * FROM model_car";
$resultmodelcar = mysqli_query($link,$sqlmodelcar);

//vehicule update model
$sqlmodelcarupdate = "SELECT * FROM model_car";
$resultmodelcarupdate = mysqli_query($link,$sqlmodelcarupdate);

//driver
$sqldriver = "SELECT * FROM users WHERE role='driver' OR role='2' ORDER BY user_id DESC";
$resultdriver = mysqli_query($link,$sqldriver);

$sqldriveradd = "SELECT * FROM users WHERE role='driver' OR role='2' ORDER BY user_id DESC";
$resultdriveradd = mysqli_query($link,$sqldriveradd);


//cars 
$sqlcar = "SELECT * FROM model_car
            INNER JOIN cars
            ON model_car.modelcar_id = cars.vehicule_model
            INNER JOIN users
            ON cars.driver_id = users.user_id
            WHERE status_car='A'";
$resultcars = mysqli_query($link,$sqlcar);

$sqlcaradmin = "SELECT * FROM model_car
            INNER JOIN cars
            ON model_car.modelcar_id = cars.vehicule_model
            INNER JOIN users
            ON cars.driver_id = users.user_id
            WHERE cars.status_car='A'";
$resultcarsadmin = mysqli_query($link,$sqlcaradmin);


//cars available for trips
$sqlcarsavailable = "SELECT * FROM model_car
INNER JOIN cars 
ON model_car.modelcar_id = cars.vehicule_model
INNER JOIN users
ON cars.driver_id = users.user_id
WHERE cars.status_car='A'";


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>OrangeMadmin</title>

    <!-- Bootstrap core CSS -->
    <link href="../src/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <!-- fonts icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <!-- jquery ui -->
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <!-- Custom styles for this template -->
    <link href="../src/css/dashboard.css" rel="stylesheet">
    <link href="../src/css/trip.css" rel="stylesheet">
    <link href="../src/DataTablesBootstrap/datatables.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.dataTables.min.css"> 
    <!-- datepicker bootstrap -->
    <link href="../src/css/datetimepicker.css" rel="stylesheet" type="text/css"/>

    <link href="../src/dist/emojionearea.min.css" rel="stylesheet">
    
    <!-- box chat app -->
    <link rel="stylesheet" href="../src/css/footer.css">
    <!-- <link rel="manifest" href="../manifest.json"> -->
  
  </head>

  <body>
                <?php include('headeradmin.php');?>

                <div class="container-fluid">

                    <div class="row">
                        <?include('sidebar.php');?>

                        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="margin-bottom:10rem;">
                        
                            <?= $content; ?>

                            <!-- Open message box -->
                            <!-- <a href="chat.php"><i class="fa fa-comments buttonOpenChatAppadmin"></i></a> -->
                        </main>
                    </div>
                </div>

                <!-- add adddriverform car -->
                <form action="" id="adddriverform">
                            <div class="modal fade" id="addmodelcarModal2" tabindex="-1" role="dialog" aria-labelledby="addmodalcarTitle" aria-hidden="true">
                                
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header edit-header">
                                        <h5 class="modal-title editTitle" id="addmodalcarTitle">Add Driver:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body edit-body">

                                        <div id="adddrivermessage"></div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                    <label for="name" class="sr-only">Driver name:</label>
                                                    <input type="text" class="form-control text-lowercase" placeholder="Driver name" id="name"  name="name">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="driverusername" class="sr-only">Driver username:</label>
                                                <input type="text" class="form-control text-lowercase" id="driverusername" placeholder="Driver username" name="driverusername">
                                            </div>
    
                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="mobile" class="text-uppercase sr-only">mobile number:</label>
                                                <input type="text" class="form-control text-lowercase" placeholder="Enter mobile number" id="mobile"  name="mobile">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email" class="text-uppercase sr-only">EMAIL ADDRESS:</label>
                                                <input type="text" class="form-control text-lowercase" placeholder="Enter email address" id="email" name="email">
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01">Choose driver:</label>
                                                    </div>
                                                    <select class="custom-select" id="role" name="role">
                                                        <option value="1">admin</option>
                                                        <option value="2" selected>driver</option>
                                                    </select>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                                <div class=" form-group col-md-3 imagePreview">
                                                    <img src='profilepicture/carprofile.png' id='imagePreviewdriveradd'>
                                                </div>

                                                <div class="form-group col-md-9">
                                                    <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="picturedriver" class="form-group col-md-6" name="picturedriver">
                                                        <label class="custom-file-label" for="picturedriver">Choose file</label>
                                                    </div>
                                                    </div>
                                                </div>

                                        </div>

                                    </div>
                                    
                                    <div class="modal-footer edittripfooter">
                                        <!-- <button type="button" class="btn btn-primary"></button> -->
                                        <input type="submit" class="btn btn-primary" name="adddriver" value="Add Driver">
                                        <!-- <button type="button" class="btn btn-danger" id="deleteTrip">Delete</button> -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                </form>

                <!-- Edit driverform cars -->
                <form action="" id="editdriverform">
                            <div class="modal fade" id="editdriverModal" tabindex="-1" role="dialog" aria-labelledby="editdriverTitle" aria-hidden="true">
                                
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header edit-header">
                                        <h5 class="modal-title editTitle" id="editdriverTitle">Edit Driver:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body edit-body">

                                        <div id="editdrivermessage"></div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="driverusername2" class="text-uppercase">Driver username:</label>
                                                <input type="text" class="form-control text-lowercase" id="driverusername2" name="driverusername2">
                                            </div>

                                             <div class="form-group col-md-6">
                                                <label for="mobile2" class="text-uppercase">mobile number:</label>
                                                <input type="text" class="form-control text-lowercase" id="mobile2"  name="mobile2">
                                            </div>
    
                                        </div>

                                        <div class="form-row">

                                           <div class="form-group col-md-6">
                                                    <label class="text-uppercase" for="inputGroupSelect01">Choose driver:</label>
                                                    <select class="custom-select" id="role2" name="role2">
                                                        <option value="1">admin</option>
                                                        <option value="2" selected>driver</option>
                                                    </select>  
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email2" class="text-uppercase">EMAIL ADDRESS:</label>
                                                <input type="text" class="form-control text-lowercase" id="email2" name="email2">
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer edittripfooter">
                                        <input type="submit" class="btn btn-primary" name="editdriver" id="editdriver" value="Update">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                </form>

                <!-- Update picture driver -->
                <form action="" id="updateDriverPictureForm">
                    <div class="modal fade" id="updateDriverPictureModal" tabindex="-1" role="dialog" aria-labelledby="updateDriverpictureTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header edit-header">
                                    <h5 class="modal-title editTitle" id="updateDriverpictureTitle">Update picture Driver:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            
                                <div class="modal-body edit-body">

                                    <div id="updatepicturedrivermessage"></div>

                                    <div class="form-row">
                                        <div class=" form-group col-md-3 imagePreview">
                                            <img src="profilepicture/carprofile.png" alt="" id='imagePreviewdriver2'>
                                        </div>

                                        <div class="form-group col-md-9">
                                            <div class="input-group mb-3">
                                            <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="picturedriver2" class="form-group col-md-6" name="picturedriver2">
                                                    <label class="custom-file-label" for="picturedriver2">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer edittripfooter">
                                    <input type="submit" class="btn btn-primary" value="Update" name="updatedriverpicture" id="updatedriverpicture">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Delete driver form-->
                <form action="" id="deletedriverform">
                            <div class="modal fade" id="deletedriverModal" tabindex="-1" role="dialog" aria-labelledby="editdriverTitle" aria-hidden="true">
                                
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header edit-header">
                                        <h5 class="modal-title editTitle" id="editdriverTitle">Delete Driver:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body edit-body">

                                        <div id="deletedrivermessage"></div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="driverusername3" class="text-uppercase">Driver username:</label>
                                                <input type="text" class="form-control text-lowercase" id="driverusername3" name="driverusername3">
                                            </div>

                                             <div class="form-group col-md-6">
                                                <label for="mobile3" class="text-uppercase">mobile number:</label>
                                                <input type="text" class="form-control text-lowercase" id="mobile3"  name="mobile3">
                                            </div>
    
                                        </div>

                                        <div class="form-row">

                                           <div class="form-group col-md-6">
                                                    <label class="text-uppercase" for="inputGroupSelect01">Choose driver:</label>
                                                    <select class="custom-select" id="role3" name="role3">
                                                        <option value="1">admin</option>
                                                        <option value="2" selected>driver</option>
                                                    </select>  
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email3" class="text-uppercase">EMAIL ADDRESS:</label>
                                                <input type="text" class="form-control text-lowercase" id="email3" name="email3">
                                            </div>

                                        </div>

                                        <div class="form-row">
                                                <div class=" form-group col-md-3 imagePreview" id='imagePreviewdriver3'>
                                                </div>

                                                <div class="form-group col-md-9">
                                                    <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="picturedriver3" class="form-group col-md-6" name="picturedriver3">
                                                        <label class="custom-file-label" for="picturedriver3">Choose file</label>
                                                    </div>
                                                    </div>
                                                </div>

                                        </div>

                                    </div>
                                    
                                    <div class="modal-footer edittripfooter">
                                        <button type="button" class="btn btn-danger" id="deletedriver">Delete</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                </form>

                <!-- Delete cars form-->
                <form action="" id="deletecarsform">
                            <div class="modal fade" id="deletecarsModal" tabindex="-1" role="dialog" aria-labelledby="deletecarsTitle" aria-hidden="true">
                                
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header edit-header">
                                        <h5 class="modal-title editTitle" id="addmdeletecarsTitleodalcarTitle">Delete Car:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body edit-body">

                                        <div id="deletecarsmessage"></div>

                                        <div class="form-row">
                                           
                                           <div class="form-group col-md-12">
                                                <label for="title" class="" for="vehiculemodeldelete">Model car:</label>
                                               <input type="text" class="form-control text-lowercase" id="vehiculemodeldelete" name="vehiculemodeldelete">

                                               <!-- <div class="input-group mb-3">
                                                   <div class="input-group-prepend">
                                                       <label class="input-group-text" for="vehiculemodeldelete">Model car</label>
                                                   </div>
                                                   <select class="custom-select" id="vehiculemodeldelete" name="vehiculemodeldelete">
                                                       <option value="" disabled selected>Choose car model</option>
                                                       <?php //while ($row = mysqli_fetch_array($resultmodelcar)):; ?>
                                                       <option name="<?php //echo $row['0'];?>" value="<?php //echo $row['0'];?>"><?php //echo $row['1'].'&nbsp; | &nbsp;'.$row['2'] .'&nbsp; | &nbsp;'. $row['3'];?></option>
                                                       <?php //endwhile;?>
                                                   </select>
                                               </div> -->
                                               
                                           </div>
                                       </div>

                                       <div class="form-row">

                                           <div class="form-group col-md-6">
                                               <label for="title" class="" for="vehiculeRegistrationNdelete">Vehicule Registration Num.:</label>
                                               <input type="text" class="form-control text-lowercase" id="vehiculeRegistrationNdelete" name="vehiculeRegistrationNdelete">
                                           </div>

                                           <div class="form-group col-md-6">  
                                               <label for="LicenceNumdelete">Vehicule Licence Number</label>
                                               <input type="text" class="form-control text-lowercase" id="LicenceNumdelete" name="LicenceNumdelete">
                                           </div>
                                           
                                       </div>

                                       <div class="form-row">

                                           <div class="form-group col-md-6">
                                               <label for="seatavailabledelete" class="">Seat available:</label>
                                               <input type="number" class="form-control text-lowercase" id="seatavailabledelete" name="seatavailabledelete">
                                           </div>

                                           <div class="form-group col-md-6">
                                                <label for="rateperkmdelete">Rate per Km</label>
                                               <input type="text" class="form-control text-lowercase" id="rateperkmdelete" name="rateperkmdelete">
                                           </div>

                                       </div>

                                       <div class="form-row">
                                           <div class="form-group col-md-12">
                                                <label for="driverdelete">Driver Name</label>
                                               <input type="text" class="form-control text-lowercase" id="driverdelete" name="driverdelete">
                                               
                                                   <!-- <div class="input-group mb-3">
                                                       <div class="input-group-prepend">
                                                           <label class="input-group-text" for="driver">Select Driver</label>
                                                       </div>
                                                       <select class="custom-select" id="driverupdate" name="driverupdate">
                                                           <option value="" disabled selected>Choose driver</option>
                                                           <?php //while ($row = mysqli_fetch_array($resultdriver)):; ?>
                                                           <option name="<?php //echo $row['0'];?>" value="<?php //echo $row['0'];?>"><?php //echo $row['1'];?></option>
                                                           <?php //endwhile;?>
                                                       </select>
                                                   </div> -->
                                           </div>
                                       </div>

                                       <!-- <div class="form-row">
                                               <div class=" form-group col-md-3 imagePreview">
                                                   <img src='profilepicture/carprofile.png' id='imagePreview'>
                                               </div>

                                               <div class="form-group col-md-9">
                                                   <div class="input-group mb-3">
                                                   <div class="custom-file">
                                                       <input type="file" class="custom-file-input" id="picturecar" class="form-group col-md-6" name="picturecar">
                                                       <label class="custom-file-label" for="picturecar">Choose file</label>
                                                   </div>
                                                   </div>
                                               </div>
                                       </div> -->

                                    </div>
                                    
                                    <div class="modal-footer edittripfooter">
                                        <button type="button" class="btn btn-danger" name="deletecar" id="deletecar">Delete</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                </form>

                <!-- Edit or Update cars form -->
                <form action="" id="updatecarsform">
                            <div class="modal fade" id="updatecarsModal" tabindex="-1" role="dialog" aria-labelledby="updatecarsTitle" aria-hidden="true">
                                
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header edit-header">
                                        <h5 class="modal-title editTitle" id="updatecarsTitle">Edit Car:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body edit-body">

                                        <div id="updatecarsmessage"></div>

                                        <div class="form-row">
                                           
                                           <div class="form-group col-md-12">

                                               <div class="input-group mb-3">
                                                   <div class="input-group-prepend">
                                                       <label class="input-group-text" for="vehiculemodelupdate">Model car</label>
                                                   </div>
                                                   <select class="custom-select" id="vehiculemodelupdate" name="vehiculemodelupdate">
                                                       <!-- <option value="" disabled selected>Choose car model</option> -->
                                                       <?php while ($row = mysqli_fetch_array($resultmodelcarupdate)):; ?>
                                                       <option name="<?php echo $row['0'];?>" value="<?php echo $row['0'];?>" id="selectedvalue">
                                                        <?php echo $row['1'].'&nbsp; | &nbsp;'.$row['2'] .'&nbsp; | &nbsp;'. $row['3'];?></option>
                                                       <?php endwhile;?>
                                                   </select>
                                               </div>
                                               
                                           </div>
                                       </div>

                                       <div class="form-row">

                                           <div class="form-group col-md-6">
                                               <label for="title" class="" for="vehiculeRegistrationNupdate">Vehicule Registration Num.:</label>
                                               <input type="text" class="form-control text-lowercase" id="vehiculeRegistrationNupdate" name="vehiculeRegistrationNupdate">
                                           </div>

                                           <div class="form-group col-md-6">  
                                               <label for="LicenceNumupdate">Vehicule Licence Number</label>
                                               <input type="text" class="form-control text-lowercase" id="LicenceNumupdate" name="LicenceNumupdate">
                                           </div>
                                           
                                       </div>

                                       <div class="form-row">

                                           <div class="form-group col-md-6">
                                               <label for="seatavailableupdate" class="">Seat available:</label>
                                               <input type="number" class="form-control text-lowercase" id="seatavailableupdate" name="seatavailableupdate">
                                           </div>

                                           <div class="form-group col-md-6">
                                                <label for="rateperkmupdate">Rate per Km</label>
                                               <input type="text" class="form-control text-lowercase" id="rateperkmupdate" name="rateperkmupdate">
                                           </div>

                                       </div>

                                       <div class="form-row">
                                           <div class="form-group col-md-12">
                                                   <div class="input-group mb-3">
                                                       <div class="input-group-prepend">
                                                           <label class="input-group-text" for="driver">Select Driver</label>
                                                       </div>
                                                       <select class="custom-select" id="driverupdate" name="driverupdate">
                                                           <option value="" disabled selected>Choose driver</option>
                                                           <?php while ($row = mysqli_fetch_array($resultdriver)):; ?>
                                                           <option name="<?php echo $row['0'];?>" value="<?php echo $row['0'];?>"><?php echo $row['1'];?></option>
                                                           <?php endwhile;?>
                                                       </select>
                                                   </div>
                                           </div>
                                       </div>

                                       <!-- <div class="form-row">
                                               <div class=" form-group col-md-3 imagePreview">
                                                   <img src='profilepicture/carprofile.png' id='imagePreview'>
                                               </div>

                                               <div class="form-group col-md-9">
                                                   <div class="input-group mb-3">
                                                   <div class="custom-file">
                                                       <input type="file" class="custom-file-input" id="picturecar" class="form-group col-md-6" name="picturecar">
                                                       <label class="custom-file-label" for="picturecar">Choose file</label>
                                                   </div>
                                                   </div>
                                               </div>
                                       </div> -->

                                    </div>
                                    
                                    <div class="modal-footer edittripfooter">
                                        <input type="submit" class="btn btn-primary" name="updatecars" id="updatecars" value="Update">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                </form>

                <!-- add cars form -->
                <form action="" id="addcarsform">
                            <div class="modal fade" id="addcarsModal" tabindex="-1" role="dialog" aria-labelledby="addcarTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header edit-header">
                                        <h5 class="modal-title editTitle" id="addcarTitle">Add Car:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body edit-body">

                                        <div id="addcarsResult"></div>

                                        <div class="form-row">
                                           
                                            <div class="form-group col-md-12">

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="vehiculemodel">Model car</label>
                                                    </div>
                                                    <select class="custom-select" id="vehiculemodel" name="vehiculemodel">
                                                        <option value="" disabled selected>Choose car model</option>
                                                        <?php while ($row = mysqli_fetch_array($resultmodelcar)):; ?>
                                                        <option name="<?php echo $row['0'];?>" value="<?php echo $row['0'];?>"><?php echo $row['1'].'&nbsp; | &nbsp;'.$row['2'] .'&nbsp; | &nbsp;'. $row['3'];?></option>
                                                        <?php endwhile;?>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="title" class="">Vehicule Registration Num.:</label>
                                                <input type="text" class="form-control text-lowercase" id="vehiculeRegistrationN" name="vehiculeRegistrationN">
                                            </div>

                                            <div class="form-group col-md-6">  
                                                <label for="LicenceNum">Vehicule Licence Number</label>
                                                <input type="text" class="form-control text-lowercase" id="LicenceNum" name="LicenceNum">
                                            </div>
                                            
                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="seatavailable" class="">Seat available:</label>
                                                <input type="number" class="form-control text-lowercase" id="seatavailable" name="seatavailable">
                                            </div>

                                            <div class="form-group col-md-6">
                                                 <label for="rateperkm">Rate per Km</label>
                                                <input type="text" class="form-control text-lowercase" id="rateperkm" name="rateperkm">
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="driver">Select Driver</label>
                                                        </div>
                                                        <select class="custom-select" id="driver" name="driver">
                                                            <option value="" disabled selected>Choose driver</option>
                                                            <?php while ($row = mysqli_fetch_array($resultdriveradd)):; ?>
                                                            <option name="<?php echo $row['0'];?>" value="<?php echo $row['0'];?>"><?php echo $row['1'];?></option>
                                                            <?php endwhile;?>
                                                        </select>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                                <div class=" form-group col-md-3 imagePreview">
                                                    <img src='profilepicture/carprofile.png' id='imagePreview'>
                                                </div>

                                                <div class="form-group col-md-9">
                                                    <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="picturecar" class="form-group col-md-6" name="picturecar">
                                                        <label class="custom-file-label" for="picturecar">Choose file</label>
                                                    </div>
                                                    </div>
                                                </div>

                                        </div>

                                    </div>
                                    
                                    <div class="modal-footer edittripfooter">
                                        <!-- <button type="button" class="btn btn-primary"></button> -->
                                        <input type="submit" class="btn btn-primary" name="addcars" value="Add Car">
                                        <!-- <button type="button" class="btn btn-danger" id="deleteTrip">Delete</button> -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                </form>

                <!-- add model car -->
                <form action="" id="addmodelcarform">
                            <div class="modal fade" id="addmodelcarModal" tabindex="-1" role="dialog" aria-labelledby="addmodalcarTitle" aria-hidden="true">
                                
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header edit-header">
                                        <h5 class="modal-title editTitle" id="addmodalcarTitle">Add Model car:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body edit-body">

                                        <div id="addmodelcarmessage"></div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="model_car" class="">Model type car:</label>
                                                <input type="text" class="form-control text-lowercase" id="model_car"   name="model_car">
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label for="brand_car" class="">Brand car:</label>
                                                    <input type="text" class="form-control text-lowercase text-muted" id="brand_car" name="brand_car" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="color" class="">Car color:</label>
                                                <input type="text" class="form-control text-lowercase" id="color" name="color">
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="modal-footer edittripfooter">
                                        <!-- <button type="button" class="btn btn-primary"></button> -->
                                        <input type="submit" class="btn btn-primary" name="addmodelcar" value="Add Model car">
                                        <!-- <button type="button" class="btn btn-danger" id="deleteTrip">Delete</button> -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                </form>

                <!-- delete users form -->
                <form action="" id="deleteuserform">
                            <div class="modal fade" id="deleteuserModal" tabindex="-1" role="dialog" aria-labelledby="deleteuserTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header edit-header">
                                        <h5 class="modal-title editTitle" id="deleteuserTitle">Delete User:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body edit-body">

                                        <div id="deleteusermessage"></div>

                                         <div class="form-row">
                                                <div class=" form-group col-md-12 imagePreview" id='imagePreviewuserdelete'>
                                                </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="usernamdelete" class="">USER NAME:</label>
                                                <input type="text" class="form-control text-lowercase" id="usernamdelete"  name="usernamdelete">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="mobileuserdelete" class="">MOBILE:</label>
                                                <input type="number" class="form-control text-lowercase" id="mobileuserdelete" name="mobileuserdelete">
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="emailuserdelete" class="text-uppercase">EMAIL ADDRESS:</label>
                                                <input type="text" class="form-control text-lowercase" id="emailuserdelete" name="emailuserdelete">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="dateregistrationdelete" class="text-uppercase">Name of one rider:</label>
                                                <input type="text" class="form-control text-lowercase" id="dateregistrationdelete"  name="dateregistrationdelete">
                                            </div>

                                        </div>

                                    </div>
                                    
                                    <div class="modal-footer edittripfooter">
                                        <button type="button" class="btn btn-danger" id="deleteuser">Delete</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                </form>

                <!-- More information of the user -->
                <div class="modal fade" id="infouser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Current user : </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row" id="userinfo">

                                    <div class="col-md-4 moreinfo" id="pictureuser"></div>

                                    <div class="col-md-8" id="moreinfouser">
                                        <div id="userinfoMessage"></div>
                                        <ul>
                                            <li >User name: &nbsp;<span class="username" style="font-weight: 800;"></span></li>
                                            <li >Mobile number: &nbsp;<span class="mobile" style="font-weight: 800;"></span></li>
                                            <li >Email: &nbsp;<span class="email" style="font-weight: 800;"></span></li> 
                                            <li >Date Registration:&nbsp;<span class="date" style="font-weight: 800;"></span></li>
                                            <li >Status:&nbsp;<span class="status" style="font-weight: 800;"></span></li>
                                            
                                        </ul>

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                </div>

                <!-- More information about  the driver -->
                <div class="modal fade" id="infodriver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Current driver : </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row" id="driverinfo">

                                    <div class="col-md-4 moreinfo" id="picturedriverinfo"></div>

                                    <div class="col-md-8" id="moreinfouser">
                                        <div id="driverinfoMessage"></div>
                                        <ul class="moreinfouserul">
                                            <li class="moreinfouserli">Driver name: &nbsp;<span class="driverusername" style="font-weight: 800;"></span></li>
                                            <li class="moreinfouserli">Mobile number: &nbsp;<span class="mobile" style="font-weight: 800;"></span></li>
                                            <li class="moreinfouserli">Email: &nbsp;<span class="email" style="font-weight: 800;"></span></li> 
                                            <li class="moreinfouserli">Date Registration:&nbsp;<span class="date" style="font-weight: 800;"></span></li>
                                            <li class="moreinfouserli">Role:&nbsp;<span class="role" style="font-weight: 800;"></span></li>
                                            <li class="moreinfouserli">Status:&nbsp;<span class="status" style="font-weight: 800;"></span></li>
                                            
                                        </ul>

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                </div>

                <!-- More information about  the car -->
                <div class="modal fade" id="infocars" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Current car : </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row" id="carinfo">

                                    <div class="col-md-4 moreinfo" id="morepicturecarinfo"></div>

                                    <div class="col-md-8" id="moreinfouser">
                                        <div id="carinfoMessage"></div>
                                        <ul class="moreinfouserul">
                                            <li class="moreinfocarli">Car model: &nbsp;<span class="carmodel" style="font-weight: 800;"></span></li>
                                            <li class="moreinfocarli">Car brand: &nbsp;<span class="carbrand" style="font-weight: 800;"></span></li>
                                            <li class="moreinfocarli">Seat available: &nbsp;<span class="seatavailable" style="font-weight: 800;"></span></li> 
                                            <li class="moreinfocarli">Rate per Km:&nbsp;<span class="rateperkm" style="font-weight: 800;"></span></li>
                                            <li class="moreinfocarli">Driver:&nbsp;<span class="driver" style="font-weight: 800;"></span></li>
                                            <li class="moreinfocarli">Status car:&nbsp;<span class="statuscar" style="font-weight: 800;"></span></li>
                                            <li class="moreinfocarli">Color car:&nbsp;<span class="colorcar" style="font-weight: 800;"></span></li>
                                            <li class="moreinfocarli">Car registration:&nbsp;<span class="carregistration" style="font-weight: 800;"></span></li>
                                            <li class="moreinfocarli">car licenceN:&nbsp;<span class="carlicencen" style="font-weight: 800;"></span></li>
                                            <li class="moreinfocarli">Date added:&nbsp;<span class="date" style="font-weight: 800;"></span></li>
                                            
                                        </ul>

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                </div>

                <!-- More information about the request bookings -->
                <div class="modal fade bookingsmodal" id="inforequestbookings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Current Request bookings : </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row" id="requestbookingsinfo">

                                    <!-- <div class="col-md-4 moreinfo" id="morepicturecarinfo"></div> -->

                                    <div class="col-md-12" id="moreinfouser">
                                        <div id="requestbookingsinfoMessage"></div>
                                        <table class="table table-stripped moreinfouserul">
                                            <tr>
                                                <td>Pick up point</td>
                                                <td class="pickuppoint" style="font-weight: 800;"><span class="carmodel" style="font-weight: 800;"></span></td>
                                            </tr>  
                                            <tr>
                                                <td>Drop of point</td>
                                                <td class="dropofpoint" style="font-weight: 800;"><span class="carbrand" style="font-weight: 800;"></span></li>
                                             </tr> 
                                             
                                             <tr>
                                                <td>Distance</td>
                                                <td class="distance" style="font-weight: 800;"><span class="seatavailable" style="font-weight: 800;"></span></li> 
                                             </tr>  
                                             
                                             <tr>
                                                <td>Duration</td>
                                                <td class="duration" style="font-weight: 800;"><span class="rateperkm" style="font-weight: 800;"></span></li>
                                              </tr> 
                                              
                                              <tr>
                                                <td>Price / Rand</td>
                                                <td class="price" style="font-weight: 800;"><span class="driver" style="font-weight: 800;"></span></li>
                                              </tr> 
                                              
                                              <tr>
                                                <td>Amount of rider</td>
                                                <td class="amountofrider" style="font-weight: 800;"><span class="statuscar" style="font-weight: 800;"></span></li>
                                             </tr>   

                                             <tr>
                                                <td>Name of one rider</td>
                                                <td class="nameofonerider" style="font-weight: 800;"><span class="colorcar" style="font-weight: 800;"></span></li>
                                            </tr>

                                            <tr>
                                                <td>Status payment</td>
                                                <td class="statuspayment" style="font-weight: 800;"><span class="carregistration" style="font-weight: 800;"></span></li>
                                             </tr> 
                                             <tr>  
                                                <td>Date bookings</td>
                                                <td class="date" style="font-weight: 800;"><span class="carlicencen" style="font-weight: 800;"></span></li>
                                            </tr>
            
                                            
                                        </table>

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                </div>

                  <!-- Add picture car Modal -->
                  <form action="" id="picturecarsupdateform">
                            <div class="modal fade" id="addmodelcarModal" tabindex="-1" role="dialog" aria-labelledby="addmodalcarTitle" aria-hidden="true">
                                
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header edit-header">
                                        <h5 class="modal-title editTitle" id="addmodalcarTitle">Add Model car:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body edit-body">

                                        <div id="uploadpicturecarsmessage"></div>

                                       <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="uploadPictureCar">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="picturecar" aria-describedby="uploadPictureCar">
                                                <label class="custom-file-label" for="picturecar">Choose file</label>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="modal-footer edittripfooter">
                                        <!-- <button type="button" class="btn btn-primary"></button> -->
                                        <input type="submit" class="btn btn-primary" name="addmodelcar" value="Add Model car">
                                        <!-- <button type="button" class="btn btn-danger" id="deleteTrip">Delete</button> -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                </form>

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

                 <!-- Edit trip admin form -->
                <form action="" id="Edittripadminform">
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

                                <div id="edittripadminmessage"></div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pickuppointadmin2" class="label-form">PICK UP POINT:</label>
                                        <input type="text" class="form-control text-lowercase" id="pickuppointadmin2"  name="pickuppointadmin2" placeholder="PICK UP POINT:">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dropofpointadmin2" class="label-form">DROP-OFF POINT:</label>
                                        <input type="text" class="form-control text-lowercase" id="dropofpointadmin2" placeholder="DROP-OFF POINT:" name="dropofpointadmin2">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                            <label for="distanceadmin2" class="label-form">DISTANCE:</label>
                                            <input type="text" class="form-control text-lowercase" id="distanceadmin2"  readonly="readonly" name="distanceadmin2" placeholder="DISTANCE:">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="durationadmin2" class="label-form">DURATION:</label>
                                            <input type="text" class="form-control text-lowercase" id="durationadmin2" readonly="readonly" placeholder="DURATION:" name="durationadmin2">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="priceadmin2" class="label-form">PRICE &nbsp; / &nbsp; Rand:</label>
                                            <input type="text" class="form-control text-lowercase" id="priceadmin2" readonly="readonly" placeholder="Price:" name="priceadmin2">
                                        </div>
                                    
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="carselect2">Select car</label>
                                            </div>
                                        <select class="custom-select" id="carselect2" name="carselect2">
                                            <option value="" disabled selected>Choose car</option>
                                            <?php while ($row = mysqli_fetch_array($resultcars)):; ?>
                                            <option name="<?php echo $row['0'];?>" value="<?php echo $row['0'];?>"><?php echo $row['1'].'&nbsp; | &nbsp;'.$row['2'] .'&nbsp; | &nbsp;'. $row['3'].'&nbsp; | &nbsp;'. $row['seatavailable'].'&nbsp; | &nbsp;'. $row['username'];?></option>
                                            <?php endwhile;?>
                                        </select>
                                        </div>
                                    </div>

                                </div> 

                            </div>
                            
                            <div class="modal-footer edittripfooter">
                                <input type="submit" class="btn btn-primary" name="edittrip" value="Update Trip">
                                <button type="button" class="btn btn-danger" id="deleteTrip">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- add trip by admin -->
                <form action="" id="addTripadminform">
                        <div class="modal" id="addtripadminModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header edit-header">
                                <h5 class="modal-title">Add Trip</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body edit-body">

                                <div id="addtripadminmessage"></div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pickuppointadmin" class="label-form">PICK UP POINT:</label>
                                        <input type="text" class="form-control text-lowercase" id="pickuppointadmin"  name="pickuppointadmin" placeholder="PICK UP POINT:">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dropofpointadmin" class="label-form">DROP-OFF POINT:</label>
                                        <input type="text" class="form-control text-lowercase" id="dropofpointadmin" placeholder="DROP-OFF POINT:" name="dropofpointadmin">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                            <label for="distanceadmin" class="label-form">DISTANCE:</label>
                                            <input type="text" class="form-control text-lowercase" id="distanceadmin"  readonly="readonly" name="distanceadmin" placeholder="DISTANCE:">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="durationadmin" class="label-form">DURATION:</label>
                                            <input type="text" class="form-control text-lowercase" id="durationadmin" readonly="readonly" placeholder="DURATION:" name="durationadmin">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="priceadmin" class="label-form">PRICE &nbsp; / &nbsp; Rand:</label>
                                            <input type="text" class="form-control text-lowercase" id="priceadmin" readonly="readonly" placeholder="Price:" name="priceadmin">
                                        </div>
                                    
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="carselect">Select car</label>
                                            </div>
                                        <select class="custom-select" id="carselect" name="carselect">
                                            <option value="" disabled selected>Choose car</option>
                                            <?php while ($row = mysqli_fetch_array($resultcarsadmin)):; ?>
                                            <option name="<?php echo $row['0'];?>" value="<?php echo $row['0'];?>"><?php echo $row['1'].'&nbsp; | &nbsp;'.$row['2'] .'&nbsp; | &nbsp;'. $row['3'].'&nbsp; | &nbsp;'. $row['seatavailable'].'&nbsp; | &nbsp;'. $row['username'];?></option>
                                            <?php endwhile;?>
                                        </select>
                                        </div>
                                    </div>

                                </div> 

                            </div>

                            <div class="modal-footer edittripfooter">
                                <input type="submit" class="btn btn-primary" name="addtrip" value="Add Trip">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>

                <!-- check available cars -->
                <form action="" id="caravailableform">
                    <div class="modal fade" id="checkcarsavalaibleModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Cars Available</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="checkavalaiblecarmessage"></div>
                                <div class="form-check">
                                    <?if($resultcarsavailable = mysqli_query($link,$sqlcarsavailable)):;?>
                                        <?php if(mysqli_num_rows($resultcarsavailable)>0):;?>
                                            <?while ($row = mysqli_fetch_array($resultcarsavailable)):; ?>
                                            <input class="form-check-input" type="radio" name="checkavailablecar" value="<?php echo $row['0'];?>" id="caravailableinput">
                                            <label class="form-check-label" for="caravailableinputRadioslabel">
                                                <?echo "&nbsp;&nbsp;<span><strong>Car :</strong></span>&nbsp;&nbsp;". $row['1']."&nbsp;&nbsp;<span><strong>Seat available :</strong></span>&nbsp;&nbsp;".$row['seatavailable'].
                                                "&nbsp;&nbsp;<span><strong>Driver name:</strong></span>&nbsp;&nbsp; ".$row['username']."&nbsp;&nbsp;<span><strong>Driver Mobile number:</strong></span>&nbsp;&nbsp; ".$row['mobile'];?>
                                            </label>
                                            <hr>
                                            <?php endwhile;?>
                                        <? endif;?>
                                    <? endif;?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="checkavalaiblecar" value="Submit">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
           

                <?php include('../inc/footer.php');?>

                <!-- start chat -->
                

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../src/js/jquery-3.3.1.min.js"></script>
    <script src="../src/js/popper.min.js"></script>
    <script src="../src/js/bootstrap.min.js"></script>
    <script src="../src/dist/emojionearea.min.js"></script>

    <!-- jquery ui -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../src/js/datetimepicker.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-1SZLcvFN_cxb2HXrmtf7EhfA2O94SUs&libraries=places">
    </script>
    
    <script src="../src/DataTablesBootstrap/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>
    <!-- https://code.jquery.com/jquery-3.3.1.js -->

    <script src="../func/maps.js"></script>
    <script src="../func/javascript.js"></script>
    <script src="../func/mytrip.js"></script>
    <script src="../func/profile.js"></script>
    <script src="../func/chat.js"></script>
    <script src="../func/notification.js"></script>
    <script src="madmin.js"></script>


    <!-- <script src="push-notification.js"></script> -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });

    //   tooltip 
    $('[data-toggle="tooltip"]').tooltip();
    </script>

  </body>
</html>