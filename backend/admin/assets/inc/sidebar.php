<!--Program ini adalah bagian dari tata letak halaman HTML yang menampilkan sisi kiri dari menu navigasi.
Secara keseluruhan, program ini bertanggung jawab untuk menampilkan dan mengatur menu navigasi di sisi kiri 
halaman dengan tautan ke berbagai fungsi terkait pengelolaan ulasan Canva dan administrasi sistem. -->

<div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Menu</li>

                            <li>
                                <a style="pointer-events: none; cursor: default;">
                                    <i class="fas fa-comments"></i>
                                    <span> Manajemen Ulasan </span>
                                </a>
                                <ul class="nav-second-level in" aria-expanded="true">
                                    <li>
                                        <a href="admin_add_review.php">Tambah Ulasan</a>
                                    </li>
                                    <li>
                                        <a href="admin_view_reviews.php">Lihat Semua Ulasan</a>
                                    </li>
                                    <li>
                                        <a href="admin_manage_reviews.php">Kelola Ulasan</a>
                                    </li>
                                </ul>
                            </li>
                
                            <li>
                                <a style="pointer-events: none; cursor: default;">
                                    <i class="fas fa-cog"></i>
                                    <span> Pengaturan Sistem </span>
                                </a>
                                <ul class="nav-second-level in" aria-expanded="true">
                                    <li>
                                        <a href="admin_manage_password_resets.php">Kelola Reset Password</a>
                                    </li>
                                                                        
                                </ul>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>