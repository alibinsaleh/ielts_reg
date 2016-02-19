<?php 

    session_start();

    require 'models/db_functions.php';
    require_once 'models/ad.php';

    if (!isset($_SESSION['admin'])) {
        header('Location: login.php');
    } 
    
    $myAd = new Ad();
    $ads = $myAd->listAds();

    // if (isset($_POST['submitted'])){
    //     // echo '<pre>';
    //     // print_r($_FILES['file_upload']);
    //     // echo '</pre>';

        

    //     $upload_errors = array(

    //         UPLOAD_ERR_OK           => 'There is no error.',
    //         UPLOAD_ERR_INI_SIZE         => 'The uploaded file exceeds the upload_max_filesize directive.',
    //         UPLOAD_ERR_FORM_SIZE    => 'The uploaded file exceeds the MAX_FILE_SIZE directive.',
    //         UPLOAD_ERR_PARTIAL      => 'The uploaded file was only partially uploaded.',
    //         UPLOAD_ERR_NO_FILE      => 'No file was uploaded.',
    //         UPLOAD_ERR_NO_TMP_DIR   => 'Missing a temporary folder.',
    //         UPLOAD_ERR_CANT_WRITE   => 'Failed to write file to disk.',
    //         UPLOAD_ERR_EXTENSION    => 'A PHP extension stopped the file upload.'

    //     );

        
        

    //     $temp_name = $_FILES['file_upload']['tmp_name'];
    //     $file_name = $_FILES['file_upload']['name'];
    //     $directory = getcwd() . '/uploads/ads';

        
        

    //     if (move_uploaded_file($temp_name, $directory . DIRECTORY_SEPARATOR . $file_name)) {
    //         $message = 'File uploaded successfully!';
    //         $myAd->newAd('testing', 1, 200, 500, $directory, $file_name, date('Y-m-d'), );
    //         $myAd->save();
    //     } else {
    //         $error = $_FILES['file_upload']['error'];
    //         $message = $upload_errors[$error];
    //     }

    // }



    
    include 'admin_header.php'; 



 ?>


        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">

                        


                        <div class="col-sm-10 col-sm-offset-1 form-box content-head">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Ads Control Panel / لوحة التحكم في الاعلانات</h3>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-cog"></i>
                                </div>
                            </div>

                            <div class="form-bottom">

                                <div class="add-btn">
                                    <a href="#addAdModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i> Add Advertisment / اضافة اعلان</a>
                                </div>

                                <table class="table table-condensed">

                                    <tr>
                                        <th style="text-align:center">Ad Title</th>
                                        <th style="text-align:center">Status</th> 
                                        <th style="text-align:center">Height</th>
                                        <th style="text-align:center">Width</th>
                                        <th style="text-align:center">Thumbnail</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                    <?php foreach ($ads as $ad): ?>
                                    <tr>
                                        <td style="text-align:center; vertical-align:middle"><?php echo $ad->title; ?></td>
                                        <td style="text-align:center; vertical-align:middle"><?php echo $ad->active; ?></td>
                                        <td style="text-align:center; vertical-align:middle"><?php echo $ad->height; ?></td>
                                        <td style="text-align:center; vertical-align:middle"><?php echo $ad->width; ?></td>
                                        <td style="text-align:center"><img width="100" height="100" src="<?php echo 'assets/img/ads/' . $ad->file_name; ?>" alt="PIC"></td>

                                        <td style="text-align:center; vertical-align:middle">
                                                <a href="#editAdModal" class="btn btn-primary" data-toggle="modal" 
                                                    data-id="<?php echo $ad->id; ?>"
                                                    data-file="<?php echo $ad->file_name; ?>"
                                                    data-title="<?php echo $ad->title; ?>"
                                                    data-height="<?php echo $ad->height; ?>"
                                                    data-width="<?php echo $ad->width; ?>" 
                                                    data-active="<?php echo $ad->active; ?>" 
                                                    data-displayFrom="<?php echo $ad->display_from; ?>" 
                                                    data-order="<?php echo $ad->ad_order; ?>"
                                                ><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-id="<?php echo $ad->id; ?>" data-name-ar="<?php echo $ad->title; ?>"><i class="fa fa-trash"></i> Delete</a>
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
        <div class="modal fade" id="addAdModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Add Adverisment</h4>
                    </div>

                    <div class="modal-body">
                        
                        <div class="form-bottom contact-form">

                            <div id="status"></div>

                            <form class="form-horizontal" enctype="multipart/form-data" role="form" id="adForm" action="add_ad.php" method="POST">

                                <div class="form-group">
                                    <label for="theFile" class="white-text">Advertisment /  الاعلان :</label>
                                    <input type="file" class="form-control" name="theFile" id="theFile">
                                </div>

                                <div class="form-group">
                                    <label for="adTitle" class="white-text">Ad. Title/ عنوان الاعلان :</label>
                                    <input type="text" class="form-control" name="adTitle" id="adTitle">
                                </div>

                                <div class="form-group">
                                    <label for="active" class="white-text">Active / فعال  :</label>
                                    <input type="checkbox"  name="active" id="active"  value="1">
                                </div>

                                <div class="form-group">
                                    <label for="adHeight" class="white-text">Ad. Height / طول الاعلان :</label>
                                    <input type="text" class="form-control" name="adHeight" id="adHeight">
                                </div>

                                <div class="form-group">
                                    <label for="adWidth" class="white-text">Ad. Width / عرض الاعلان :</label>
                                    <input type="text" class="form-control" name="adWidth" id="adWidth">
                                </div>

                                <div class="form-group">
                                    <label for="displayFrom" class="white-text">Display From / يعرض من تاريخ :</label>
                                    <input type="text" class="form-control" name="displayFrom" id="displayFrom">
                                </div>

                                <div class="form-group">
                                    <label for="adOrder" class="white-text">Ad. Order / ترتيب ظهور الاعلان :</label>
                                    <input type="text" class="form-control" name="adOrder" id="adOrder">
                                </div>

                                

                                

                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" id="ad_post" value="Save Advertisment">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end of add workshop modal -->


        <!-- EDIT WORKSHOP MODAL -->
        <div class="modal fade" id="editAdModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Edit Advertisment</h4>
                    </div>

                    <div class="modal-body">
                        
                        <div class="form-bottom contact-form">

                            <div id="status"></div>

                            <form class="form-horizontal" enctype="multipart/form-data" role="form" id="adEditForm" action="edit_ad.php" method="POST">

                            <input type="hidden" name="adID" id="adID">

                                <div class="form-group">
                                    <label for="currentFile" class="white-text">Current File Name /  اسم الملف الحالي :</label>
                                    <input type="text" class="form-control" name="currentFile" id="currentFile" disabled="true">
                                </div>

                                <div class="form-group">
                                    <label for="theFile" class="white-text">Advertisment /  الاعلان :</label>
                                    <input type="file" class="form-control" name="theFile" id="theFile">
                                </div>

                                <div class="form-group">
                                    <label for="adTitle" class="white-text">Ad. Title/ عنوان الاعلان :</label>
                                    <input type="text" class="form-control" name="adTitle" id="adTitle">
                                </div>

                                <div class="form-group">
                                    <label for="active" class="white-text">Active / فعال  :</label>
                                    <input type="checkbox"  name="active" id="active"  value="1">
                                </div>

                                <div class="form-group">
                                    <label for="adHeight" class="white-text">Ad. Height / طول الاعلان :</label>
                                    <input type="text" class="form-control" name="adHeight" id="adHeight">
                                </div>

                                <div class="form-group">
                                    <label for="adWidth" class="white-text">Ad. Width / عرض الاعلان :</label>
                                    <input type="text" class="form-control" name="adWidth" id="adWidth">
                                </div>

                                <div class="form-group">
                                    <label for="displayFrom" class="white-text">Display From / يعرض من تاريخ :</label>
                                    <input type="text" class="form-control" name="displayFrom" id="displayFrom">
                                </div>

                                <div class="form-group">
                                    <label for="adOrder" class="white-text">Ad. Order / ترتيب ظهور الاعلان :</label>
                                    <input type="text" class="form-control" name="adOrder" id="adOrder">
                                </div>

                                

                                

                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" id="adEdit" value="Save Advertisment">
                                </div>

                            </form>

                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
        </div> <!-- end of edit workshop modal -->



        <!-- DELETE WORKSHOP MODAL -->
        <div class="modal fade" id="deleteAdModal">
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
        <script src="assets/js/ads.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>