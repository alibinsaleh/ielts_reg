<?php 

    session_start();

    require 'models/db_functions.php';

    if (!isset($_SESSION['admin'])) {
        header('Location: login.php');
    } 

    
    $subscribers = list_subscribers(0);
    $settings = get_settings();

    

 ?>

<?php include 'admin_header.php'; ?>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">

                        


                        <div class="col-sm-8 col-sm-offset-2 form-box content-head">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Set Workshop Information / ضبط معلومات الورش التدريبية</h3>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-cog"></i>
                                </div>
                            </div>

                            <div class="form-bottom contact-form">

                                <form role="form" action="save_settings.php" method="post">
                                    <input type="hidden" name="updated_by" value="<?php echo $_SESSION['admin'] ?>"></input>

                                    <div class="form-group">
                                        <label class="white-text" for="workshop_name_ar">Workshop Name (Arabic):</label>
                                        <input type="text" name="workshop_name_ar" placeholder="Next Workshop Name (Arabic) ..." class="form-control" id="workshop_name_ar" value="<?php echo $settings->workshop_name_ar; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="white-text" for="workshop_name_en">Workshop Name (English):</label>
                                        <input type="text" name="workshop_name_en" placeholder="Next Workshop Name (English) ..." class="form-control" id="workshop_name_en" value="<?php echo $settings->workshop_name_en; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="white-text" for="workshop_name_en">Workshop Max Subscribers:</label>
                                        <input type="text" name="max_subscribers" placeholder="Max Subscribers ..." class="form-control" id="max_subscribers" value="<?php echo $settings->max_subscribers; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="white-text" for="next_workshop_date">Next Workshop On:</label>
                                        <input type="text" name="next_workshop_date" placeholder="Next Workshop Date  ..." class="form-control" id="next_workshop_date" value="<?php echo $settings->next_workshop_date; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="white-text" for="next_workshop_time">Next Workshop Time:</label>
                                        <select id="next_workshop_time" name="next_workshop_time" placeholder="Next Workshop Time ..." class="form-control">
                                            <?php if ($settings->next_workshop_time == '1:00') { ?>
                                                <option value="1:00" selected>1:00</option>
                                            <?php } else { ?>
                                                <option value="1:00">1:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '1:30') { ?>
                                                <option value="1:30" selected>1:30</option>
                                            <?php } else { ?>
                                                <option value="1:30">1:30</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '2:00') { ?>
                                                <option value="2:00" selected>2:00</option>
                                            <?php } else { ?>
                                                <option value="2:00">2:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '2:30') { ?>
                                                <option value="2:30" selected>2:30</option>
                                            <?php } else { ?>
                                                <option value="2:30">2:30</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '3:00') { ?>
                                                <option value="3:00" selected>3:00</option>
                                            <?php } else { ?>
                                                <option value="3:00">3:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '3:30') { ?>
                                                <option value="3:30" selected>3:30</option>
                                            <?php } else { ?>
                                                <option value="3:30">3:30</option>
                                            <?php } ?>

                                           <?php if ($settings->next_workshop_time == '4:00') { ?>
                                                <option value="4:00" selected>4:00</option>
                                            <?php } else { ?>
                                                <option value="4:00">4:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '4:30') { ?>
                                                <option value="4:30" selected>4:30</option>
                                            <?php } else { ?>
                                                <option value="4:30">4:30</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '5:00') { ?>
                                                <option value="5:00" selected>4:00</option>
                                            <?php } else { ?>
                                                <option value="5:00">5:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '5:30') { ?>
                                                <option value="5:30" selected>4:30</option>
                                            <?php } else { ?>
                                                <option value="5:30">5:30</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '6:00') { ?>
                                                <option value="6:00" selected>6:00</option>
                                            <?php } else { ?>
                                                <option value="6:00">6:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '6:30') { ?>
                                                <option value="6:30" selected>6:30</option>
                                            <?php } else { ?>
                                                <option value="6:30">6:30</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '7:00') { ?>
                                                <option value="7:00" selected>7:00</option>
                                            <?php } else { ?>
                                                <option value="7:00">7:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '7:30') { ?>
                                                <option value="7:30" selected>7:30</option>
                                            <?php } else { ?>
                                                <option value="7:30">7:30</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '8:00') { ?>
                                                <option value="8:00" selected>8:00</option>
                                            <?php } else { ?>
                                                <option value="8:00">8:00</option>
                                            <?php } ?>

                                           <?php if ($settings->next_workshop_time == '8:30') { ?>
                                                <option value="8:30" selected>8:30</option>
                                            <?php } else { ?>
                                                <option value="8:30">8:30</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '9:00') { ?>
                                                <option value="9:00" selected>9:00</option>
                                            <?php } else { ?>
                                                <option value="9:00">9:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '9:30') { ?>
                                                <option value="9:30" selected>9:30</option>
                                            <?php } else { ?>
                                                <option value="9:30">9:30</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '10:00') { ?>
                                                <option value="10:00" selected>10:00</option>
                                            <?php } else { ?>
                                                <option value="10:00">10:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '10:30') { ?>
                                                <option value="10:30" selected>10:30</option>
                                            <?php } else { ?>
                                                <option value="10:30">10:30</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '11:00') { ?>
                                                <option value="11:00" selected>11:00</option>
                                            <?php } else { ?>
                                                <option value="11:00">11:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '11:30') { ?>
                                                <option value="11:30" selected>11:30</option>
                                            <?php } else { ?>
                                                <option value="11:30">11:30</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '12:00') { ?>
                                                <option value="12:00" selected>12:00</option>
                                            <?php } else { ?>
                                                <option value="12:00">12:00</option>
                                            <?php } ?>

                                            <?php if ($settings->next_workshop_time == '12:30') { ?>
                                                <option value="12:30" selected>12:30</option>
                                            <?php } else { ?>
                                                <option value="12:30">12:30</option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="white-text" for="am_pm">AM / PM :</label>
                                        <select id="am_pm" name="am_pm" placeholder="AM or PM ..." class="form-control">
                                            <?php if ($settings->am_pm == 'am') { ?>
                                                <option value="am" selected>AM</option>
                                                <option value="pm">PM</option>
                                            <?php } else { ?>
                                                <option value="am">AM</option>
                                                <option value="pm" selected>PM</option>
                                            <?php } ?>

                                            
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="white-text" for="workshop_location_ar">Location in Arabic:</label>
                                        <input type="text" name="workshop_location_ar" placeholder="Location in Arabic ..." class="form-control" id="workshop_location_ar" value="<?php echo $settings->workshop_location_ar; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="white-text" for="workshop_location_en">Location in English:</label>
                                        <input type="text" name="workshop_location_en" placeholder="Location in English ..." class="form-control" id="workshop_location_en" value="<?php echo $settings->workshop_location_en; ?>">
                                    </div>


                                    
                                    
                                    
                                    <button type="submit" class="btn">Save</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <?php include 'admin_footer.php'; ?>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/jquery.datetimepicker.js"></script>
        <script src="assets/js/main.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>