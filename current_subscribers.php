<?php 

    session_start();

    require 'models/db_functions.php';

    if (!isset($_SESSION['admin'])) {
        header('Location: login.php');
    } 

    
    $subscribers = list_subscribers(0);

 ?>

<?php 
    
    
    include 'admin_header.php'; 
    
?>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <h1 class="content-head"><?php echo 'Number of subscribers: ' . count_subscribers(0); ?></h1>
                    </div>
                    <div class="row">
                        <div class="text mytable table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Attended Master Class</th>
                                    <th>English Level</th>
                                </tr>
                                <?php $i = 1; ?>
                                <?php foreach ($subscribers as $subscriber) : ?>
                                    
                                    <tr>
                                        <td><button class="btn btn-danger" onclick="move_to_archive(<?php echo $subscriber['id']; ?>)">Archive</button></td>
                                        <td><?php echo $i; ?></td>
                                        <td><a href="edit/<?php echo $subscriber['id']; ?>"><?php echo $subscriber['name']; ?></a></td>
                                        <td><?php echo $subscriber['dob']; ?></td>
                                        <td><?php echo $subscriber['mobile']; ?></td>
                                        <td><?php echo $subscriber['email']; ?></td>
                                        <td><?php echo $subscriber['masterclass']; ?></td>
                                        <td><?php echo $subscriber['englishlevel']; ?></td>
                                    </tr>
                                    <?php $i += 1; ?>
                                 <?php endforeach; ?>
                            </table>
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