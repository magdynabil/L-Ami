
<header class="header">

    <!-- Top Bar -->

    <!-- Header Content -->
    <div class="header_container fixed-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start ">
                        <div class="logo_container mr-auto">
                            <a href="index.php">
                                <div class="logo_text " style="font-size: xxx-large">L’Ami </div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner">
                            <ul class="main_nav">



                                <li class="active font-weight-bold "><a href="index.php">الرئيسيه</a></li>

                                <?php if(isset($_SESSION['user_id'])){
                                    if ($_SESSION['status']=='admin'){
                                        echo '
                                <li class=" dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        الطلاب
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="level1_std.php">طلاب الفرقه الاولي </a>
                                        <a class="dropdown-item" href="level2_std.php">طلاب الفرقه الثانية </a>
                                        <a class="dropdown-item" href="level3_std.php">طلاب الفرقه الثالثة </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="search.php">بحث بالاسم </a>
                                        <a class="dropdown-item" href="search_by_degree.php">بحث بالدرجات  </a>
                                    </div>
                                </li>
                                <li class=" dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        الاضافات  
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="add_test_for_1.php">اضافة اختبار   </a>
                                        <a class="dropdown-item" href="upload_video.php">اضافةفديو شرح    </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="add_test_data_for_1.php">اضافة بينات اختبار   </a>
                                    </div>
                                </li>
                                <li><a href="code.php">الاكواد </a></li>
                                <li><a href="add_ads.php">التنبيهات </a></li>
                                <li class=" dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        تواصل مع الطلاب
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="comment_1.php">تواصل مع طلاب الفرقه الاولي  </a>
                                        <a class="dropdown-item" href="comment_2.php">تواصل مع طلاب الفرقة الثانيه  </a>
                                        <a class="dropdown-item" href="comment_3.php">تواصل مع طلاب الفرقه الثالثه   </a>
                                    </div>
                                </li>
                                <li><a href="login.php">الصفحة الشخصيه </a></li>
                                <li><a href="include/logout.php?id='.$_SESSION['user_id'].'">تسجيل الخروج  </a></li>';}
                                    elseif ($_SESSION['level']=='level1'){
                                        echo '
                                        <li><a href="add_test_for_1.php"> الصف الاول  </a></li>
                                     <li><a href="all_test_for_1.php"> اختبارات الصف الاول </a></li>

                                        <li><a href="comment_1.php">تواصل مع المدرس  </a></li>
                                        <li><a href="login.php">الصفحة الشخصيه </a></li>
                                        <li><a href="include/logout.php?id='.$_SESSION['user_id'].'"> تسجيل الخروج  </a></li>
                                       
                                        ';}
                                    elseif ($_SESSION['level']=='level2'){
                                        echo ' <li><a href="all_lesson_for_1.php"> الصف الثاني   </a></li>
                                         <li><a href="all_test_for_2.php"> اختبارات الصف الثاني </a></li>
                                        <li><a href="comment_2.php">تواصل مع المدرس  </a></li>
                                        <li><a href="login.php">الصفحة الشخصيه </a></li>
                                        <li><a href="include/logout.php?id='.$_SESSION['user_id'].'"> تسجيل الخروج  </a></li>';}
                                    elseif ($_SESSION['level']=='level3'){
                                        echo ' 
                                        <li><a href="all_lesson_for_2.php"> الصف الثالث   </a></li>
                                        <li><a href="all_test_for_3.php"> اختبارات الصف الثالث </a></li>
                                        <li><a href="comment_3.php">تواصل مع المدرس  </a></li>
                                        <li><a href="login.php">الصفحة الشخصيه </a></li>
                                        <li><a href="include/logout.php?id='.$_SESSION['user_id'].'"> تسجيل الخروج  </a></li>';}
                                }
                                else{
                                    echo '<li><a href="login.php">تسجيل الدخول  </a></li>
                                <li><a href="register.php">انشاء حسساب جديد </a></li>';
                                }?>
                            </ul>
                        </nav>
                        <div class="header_content_right ml-auto text-right">


                            <!-- Hamburger -->

                            <div class="user"><a href="login.php"><i class="fa fa-user" aria-hidden="true"></i>  </a></div>
                            <div class="hamburger menu_mm">
                                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
    <nav class="menu_nav">
        <ul class="menu_mm">
            <li class="active font-weight-bold "><a href="index.php">الرئيسيه</a></li>

            <?php if(isset($_SESSION['user_id'])){
                if ($_SESSION['status']=='admin'){
                    echo '
                                <li class=" dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        الطلاب
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="level1_std.php">طلاب الفرقه الاولي </a>
                                        <a class="dropdown-item" href="level2_std.php">طلاب الفرقه الثانية </a>
                                        <a class="dropdown-item" href="level3_std.php">طلاب الفرقه الثالثة </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="search.php">بحث بالاسم </a>
                                        <a class="dropdown-item" href="search_by_degree.php">بحث بالدرجات  </a>
                                    </div>
                                </li>
                                <li class=" dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        الاضافات  
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="add_test_for_1.php">اضافة اختبار   </a>
                                        <a class="dropdown-item" href="upload_video.php">اضافةفديو شرح    </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="add_test_data_for_1.php">اضافة بينات اختبار   </a>
                                    </div>
                                </li>
                                <li><a href="code.php">الاكواد </a></li>
                                <li><a href="add_ads.php">التنبيهات </a></li>
                                <li class=" dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        تواصل مع الطلاب
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="comment_1.php">تواصل مع طلاب الفرقه الاولي  </a>
                                        <a class="dropdown-item" href="comment_2.php">تواصل مع طلاب الفرقة الثانيه  </a>
                                        <a class="dropdown-item" href="comment_3.php">تواصل مع طلاب الفرقه الثالثه   </a>
                                    </div>
                                </li>
                                <li><a href="login.php">الصفحة الشخصيه </a></li>
                                <li><a href="include/logout.php?id='.$_SESSION['user_id'].'">تسجيل الخروج  </a></li>';}
                elseif ($_SESSION['level']=='level1'){
                    echo '
                                        <li><a href="add_test_for_1.php"> الصف الاول  </a></li>
                                     <li><a href="all_test_for_1.php"> اختبارات الصف الاول </a></li>

                                        <li><a href="comment_1.php">تواصل مع المدرس  </a></li>
                                        <li><a href="login.php">الصفحة الشخصيه </a></li>
                                        <li><a href="include/logout.php?id='.$_SESSION['user_id'].'"> تسجيل الخروج  </a></li>
                                       
                                        ';}
                elseif ($_SESSION['level']=='level2'){
                    echo ' <li><a href="all_lesson_for_1.php"> الصف الثاني   </a></li>
                                         <li><a href="all_test_for_2.php"> اختبارات الصف الثاني </a></li>
                                        <li><a href="comment_2.php">تواصل مع المدرس  </a></li>
                                        <li><a href="login.php">الصفحة الشخصيه </a></li>
                                        <li><a href="include/logout.php?id='.$_SESSION['user_id'].'"> تسجيل الخروج  </a></li>';}
                elseif ($_SESSION['level']=='level3'){
                    echo ' 
                                        <li><a href="all_lesson_for_2.php"> الصف الثالث   </a></li>
                                        <li><a href="all_test_for_3.php"> اختبارات الصف الثالث </a></li>
                                        <li><a href="comment_3.php">تواصل مع المدرس  </a></li>
                                        <li><a href="login.php">الصفحة الشخصيه </a></li>
                                        <li><a href="include/logout.php?id='.$_SESSION['user_id'].'"> تسجيل الخروج  </a></li>';}
            }
            else{
                echo '<li><a href="login.php">تسجيل الدخول  </a></li>
                                <li><a href="register.php">انشاء حسساب جديد </a></li>';
            }?>
        </ul>
    </nav>

</div>