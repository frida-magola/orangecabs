<?php $p = 'bookings'; include("headerbook.php");?>
<div class="form-main-container">
        <form action="">
            <div id="form-area">
            <div id="form-title">
                Book your Rider
            </div>
            <div id="form-body">
                <div>
                    
                    <div class="col-2">
                    <div>
                        <input type="radio" class="form__radio-input" id="creditcard" name="size">
                        <label for="creditcard" class="form__radio-label">
                        <span class="form__radio-button"></span>
                        <span class="labeltile_radio">LOCAL <br>Up to 80km trips</span>
                        </label>

                    </div>
                    </div>
                    <div class="col-2">
                    <div>
                    <input type="radio" class="form__radio-input" id="paypal" name="size">
                        <label for="paypal" class="form__radio-label">
                        <span class="form__radio-button"></span>
                        <span>REGIONAL <br>80km + trips</span>
                        </label>
                    </div>
                    </div>
                </div>
                    <div>
                        <div class="col-3">
                            <fieldset class="form-group form__input-icon">
                            <label class="form-label" for="pickuppoint">Origin</label>
                            <input type="text" class="form-control" id="pickuppoint" placeholder="PICK UP POINT:" name="pickuppoint">
                            <i class="fas fa-map-marker-alt"></i>
                        </fieldset>
                    </div>
                    <div class="col-3">
                        <fieldset class="form-group form__input-icon">
                            <label class="form-label" for="dropofpoint">Destination</label>
                            <input type="text" class="form-control" id="dropofpoint" placeholder="DROP-OFF POINT:" name="dropofpoint">
                            <i class="fas fa-map-marker-alt"></i>
                        </fieldset>
                    </div>
                    <div class="col-3">
                        <fieldset class="form-group form__input-icon">
                            <label class="form-label" for="pickupdatetime">Date</label>
                            <input type="text" class="form-control" id="pickupdatetime" placeholder="PICK UP TIME & DATE:" name="pickupdatetime">
                            <i class="far fa-clock"></i>
                        </fieldset>
                    </div>
                </div>
            <div>
                <div class="col-3">
                <fieldset class="form-group form__input-icon">
                    <label class="form-label" for="input4">Amount of riders</label>
                    <input type="text" class="form-control" id="amountofriders" placeholder="AMOUNT OF RIDERS:" name="amountofriders">
                    <i class="fas fa-users"></i>
                </fieldset>
                </div>
                <div class="col-3">
                <fieldset class="form-group form__input-icon">
                    <label class="form-label" for="nomeofonerider">Name of one rider</label>
                    <input type="text" class="form-control" id="nomeofonerider" placeholder="NAME OF ONE RIDER:" name="nomeofonerider">
                    <i class="fas fa-user-tie"></i>
                </fieldset>
                </div>
                <div class="col-3">
                <fieldset class="form-group form__input-icon">
                <i class="fas fa-map-marker-alt"></i>
                    <label class="form-label" for="currentlocation">Current Location</label>
                    <input type="text" class="form-control" id="currentlocation" placeholder="CURRENT LOCATION" name="currentlocation">
                    

                </fieldset>
                </div>
            </div>

            
                  
            </div>
            </div>
         
        </form>

            <div style="margin-bottom:11rem;">
                <div class="left-align button-area">
                    <button type="button" class="btnbook btn-cancel">Cancel</button>
                </div>
                <div class="right-align button-area">
                    <button type="button"  id="geocodingAddress" class="btnbook btn-inline btn-send">Let ’s pay and let ’s go!</button>
                </div>
                <div class="right-align button-save-area">
                    <button type="button"  id="calculateRoute" class="btnbook btn-inline btn-save">Save</button>
                </div>
            </div>


            <div>
                <!-- <div class="col-12"> -->
                    <div class="" id="map"></div>
                <!-- </div> -->
            </div>

            <div>
                <div class="col-12" id="messageOutput"></div>
             </div>
    </div>