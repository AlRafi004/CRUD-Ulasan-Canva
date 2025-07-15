<!-- Program tersebut merupakan halaman untuk mengelola komentar pada suatu konten, dengan kemampuan untuk memperbarui detail komentar. 
Dengan demikian, halaman ini memungkinkan admin atau pengguna yang berwenang untuk mengelola dan memperbarui detail komentar pada suatu 
konten dalam sistem dengan mudah dan aman, serta memberikan notifikasi yang jelas tentang status operasi yang dilakukan.-->

<!--Server side code to handle Comment Update-->
<?php
    session_start();
    include('assets/inc/config.php');
    if(isset($_POST['update_comment']))
    {
        $id=$_POST['id'];
        $user_name=$_POST['user_name'];
        $score=$_POST['score'];
        $tgl = $_POST['tgl'];
        $content=$_POST['content'];
        $label=$_POST['label'];
        //sql to update captured values
        $query="UPDATE komentar SET user_name=?, score=?, tgl=?, content=?, label=? WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $rc=$stmt->bind_param('sisssi', $user_name, $score, $tgl, $content, $label, $id);
        $stmt->execute();

        if($stmt)
        {
            $success = "Komentar berhasil di-Update";
        }
        else {
            $err = "Silakan coba lagi atau coba nanti";
        }
    }
?>
<!--End Server Side-->
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
                                            <li class="breadcrumb-item"><a>Komentar</a></li>
                                            <li class="breadcrumb-item active">Kelola Komentar</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Update Komentar</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <!--LETS GET DETAILS OF SINGLE COMMENT GIVEN THEIR ID-->
                        <?php
                            $id=$_GET['id'];
                            $ret="SELECT * FROM komentar WHERE id=?";
                            $stmt= $mysqli->prepare($ret);
                            $stmt->bind_param('i', $id);
                            $stmt->execute();
                            $res=$stmt->get_result();
                            while($row=$res->fetch_object())
                            {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Isi semua kolom</h4>
                                        <!--Update Comment Form-->
                                        <form method="post">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputName" class="col-form-label">Nama Pengguna</label>
                                                    <input type="text" required="required" value="<?php echo $row->user_name;?>" name="user_name" class="form-control" id="inputName">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputScore" class="col-form-label">Skor</label>
                                                    <input type="number" required="required" value="<?php echo $row->score;?>" name="score" class="form-control" id="inputScore">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputDate" class="col-form-label">Tanggal</label>
                                                    <input type="date" required="required" value="<?php echo $row->tgl;?>" name="tgl" class="form-control" id="inputDate">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputContent" class="col-form-label">Konten</label>
                                                    <textarea required="required" name="content" class="form-control" id="inputContent"><?php echo $row->content;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputLabel" class="col-form-label">Label</label>
                                                    <input type="text" required="required" value="<?php echo $row->label;?>" name="label" class="form-control" id="inputLabel">
                                                </div>
                                            </div>
                                            <button type="submit" name="update_comment" class="btn btn-success">Update Komentar</button>
                                        </form>
                                        <!--End Update Comment Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <?php }?>
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
    </body>
</html>
