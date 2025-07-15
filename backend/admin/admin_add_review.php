<!--Program tersebut adalah halaman untuk menangani penambahan ulasan Canva baru secara server-side.
Dengan demikian, halaman ini memungkinkan admin untuk melakukan penambahan ulasan baru 
secara langsung melalui antarmuka web, dengan validasi data dan notifikasi status operasi yang jelas.-->
<?php
    session_start();
    include('assets/inc/config.php');

    if(isset($_POST['add_review']))
    {
        $id=$_POST['id'];
        $user_name=$_POST['user_name'];
        $score=$_POST['score'];
        $tgl = $_POST['tgl'];
        $content=$_POST['content'];
        $label=$_POST['label'];

        //sql to insert captured values
        $query="insert into komentar (id, user_name, score, tgl, content, label) values(?,?,?,?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('isssss', $id, $user_name, $score, $tgl, $content, $label);        
        $stmt->execute();

        if($stmt)
        {
            $success = "Patient Details Added";
        }
        else {
            $err = "Please Try Again Or Try Later";
        }
    }
?>

<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a>Patients</a></li>
                                            <li class="breadcrumb-item active">Add Patient</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Patient Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                        <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label for="inputName" class="col-form-label">id</label>
                                                <input type="text" required="required" name="id" class="form-control" id="inputName" placeholder="Patient's First Name">
                                            </div>
                                        </div>     
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputName" class="col-form-label">user_name</label>
                                                <input type="text" required="required" name="user_name" class="form-control" id="inputName" placeholder="Patient's First Name">
                                            </div>
                                        </div>        
                                            <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputName" class="col-form-label">score</label>
                                                <input type="text" required="required" name="score" class="form-control" id="inputName" placeholder="Patient's First Name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputName" class="col-form-label">Tanggal</label>
                                                <input type="date" required="required" name="tgl" class="form-control" id="inputName" placeholder="Patient's First Name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAge" class="col-form-label">Content</label>
                                                <input required="required" type="text" name="content" class="form-control"  id="inputAge" placeholder="Patient's Age">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputGender" class="col-form-label">label</label>
                                                <select required="required" name="label" class="form-control" id="inputGender">
                                                    <option value="positif">positif</option>
                                                    <option value="negatif">negatif</option>
                                                </select>
                                            </div>
                                        </div>

                                            <button type="submit" name="add_patient" class="ladda-button btn btn-primary" data-style="expand-right">Add Patient</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>