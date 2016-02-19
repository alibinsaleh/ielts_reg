<?php 

    session_start();

    require 'models/db_functions.php';

    if (!isset($_SESSION['admin'])) {
        header('Location: login.php');
    } 

    
    
    $workshops = get_workshops();

    

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
                                    <h3>Workshops Settings / اعدادات الورش التدريبية</h3>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-cog"></i>
                                </div>
                            </div>

                            <div class="form-bottom">

                                <div class="add-btn">
                                    <a href="#workshopModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i> Add Workshop / اضافة ورشة</a>
                                </div>

                                <table class="table table-condensed">

                                    <tr>
                                        <th>Workshop Name / عنوان الورشة</th>
                                        <th>Actions / العمليات</th>
                                    </tr>
                                    
                                    <?php  foreach($workshops as $workshop) : ?>
                                        <tr>
                                            
                                            <td><?php echo $workshop->workshop_name_en . ' / ' . $workshop->workshop_name_ar; ?></td>
                                            
                                            <td>
                                                <a href="#editWorkshopModal" class="btn btn-primary" data-toggle="modal" 
                                                    data-id="<?php echo $workshop->id; ?>"
                                                    data-name-en="<?php echo $workshop->workshop_name_en; ?>"
                                                    data-name-ar="<?php echo $workshop->workshop_name_ar; ?>"
                                                    data-note="<?php echo $workshop->note; ?>"
                                                    data-active="<?php echo $workshop->active; ?>"
                                                ><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="#deleteWorkshopModal" class="btn btn-danger" data-toggle="modal" data-id="<?php echo $workshop->id; ?>" data-name-ar="<?php echo $workshop->workshop_name_ar; ?>"><i class="fa fa-trash"></i> Delete</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>

                                </table>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>



        <!-- ADD WORKSHOP MODAL -->
        <div class="modal fade" id="workshopModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Add Workshop</h4>
                    </div>

                    <div class="modal-body">
                        
                        <div class="form-bottom contact-form">

                            <div id="status"></div>

                            <form class="form-horizontal" role="form" id="workshopForm" action="add_workshop.php" method="POST">

                                <div class="form-group">
                                    <label for="workshopName_ar" class="white-text">Workshop Arabic Name / اسم الورشة بالعربي:</label>
                                    <input type="text" class="form-control" name="workshopName_ar" id="workshopName_ar">
                                </div>

                                <div class="form-group">
                                    <label for="workshopName_en" class="white-text">Workshop English Name / اسم الورشة بالانجليزي:</label>
                                    <input type="text" class="form-control" name="workshopName_en" id="workshopName_en">
                                </div>

                                

                                <div class="form-group">
                                    <label class="sr-only" for="note">Note / ملحوظات</label>
                                    <textarea name="note" class="form-control" id="note"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="active" class="white-text">Active / فعال  :</label>
                                    <input type="checkbox"  name="active" id="active"  value="1">
                                </div>

                                <div class="form-group">
                                    <input type="button" class="btn btn-success" id="workshop_post" value="Save Workshop">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end of add workshop modal -->


        <!-- EDIT WORKSHOP MODAL -->
        <div class="modal fade" id="editWorkshopModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Add Workshop</h4>
                    </div>

                    <div class="modal-body">
                        
                        <div class="form-bottom contact-form">

                            <div id="status"></div>

                            <form class="form-horizontal" role="form" id="editWorkshopForm" action="update_workshop.php" method="POST">

                                <input type="hidden" name="workshop_id" id="workshop_id">

                                <div class="form-group">
                                    <label for="workshopName_ar" class="white-text">Workshop Arabic Name / اسم الورشة بالعربي:</label>
                                    <input type="text" class="form-control" name="workshopName_ar" id="workshopName_ar">
                                </div>

                                <div class="form-group">
                                    <label for="workshopName_en" class="white-text">Workshop English Name / اسم الورشة بالانجليزي:</label>
                                    <input type="text" class="form-control" name="workshopName_en" id="workshopName_en">
                                </div>

                                

                                <div class="form-group">
                                    <label class="sr-only" for="note">Note / ملحوظات</label>
                                    <textarea name="note" class="form-control" id="note"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="active" class="white-text">Active / فعال  :</label>
                                    <input type="checkbox"  name="active" id="active"  value="TRUE">
                                </div>

                                <div class="form-group">
                                    <input type="button" class="btn btn-success" id="edit_workshop_post" value="Update Workshop">
                                </div>

                            </form>

                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
        </div> <!-- end of edit workshop modal -->



        <!-- DELETE WORKSHOP MODAL -->
        <div class="modal fade" id="deleteWorkshopModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Delete / حذف</h4>
                    </div>

                    <div class="modal-body">
                        <h1 class="white-text">Are You Sure? / هل أنت متأكد؟</h1>
                        <div>
                            <form class="form-horizontal" role="form" id="deleteWorkshopForm" action="delete_workshop.php" method="POST">
                                <input type="hidden" name="workshop_id" id="workshop_id">
                                <input type="button" class="btn btn-danger" id="delete_workshop" value="Yes /  نعم">
                                <input type="button" class="btn btn-success" data-dismiss="modal" id="cancel_delete" value="Cancel /  الغاء">
                            </form>
                            
                        </div>
                       
                    </div>
                </div>
            </div>

        </div>
        </div> <!-- end of delete workshop modal -->


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