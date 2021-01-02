<?php 
/*
//session_start();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
//session_destroy();
*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title> Admin</title>
        <link rel="stylesheet" type="text/css" href="./app/view/assets/backend/css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="./app/view/assets/backend/css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="./app/view/assets/backend/css/grid.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="./app/view/assets/backend/css/layout.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="./app/view/assets/backend/css/nav.css" media="screen" />
          <link rel="stylesheet" type="text/css" href="./app/view/assets/backend/css/costome.css" media="screen" />
        <link href="./app/view/assets/backend/css/table/demo_page.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN: load jquery -->
        <script src="./app/view/assets/backend/js/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="./app/view/assets/backend/js/jquery-ui/jquery.ui.core.min.js"></script>
        <script src="./app/view/assets/backend/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
        <script src="./app/view/assets/backend/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
        <script src="./app/view/assets/backend/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
        <script src="./app/view/assets/backend/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
        <script src="./app/view/assets/backend/js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
        <script src="./app/view/assets/backend/js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
        <script src="./app/view/assets/backend/js/table/jquery.dataTables.min.js" type="text/javascript"></script>
        <!-- END: load jquery -->
        <script type="./app/view/assets/backend/text/javascript" src="js/table/table.js"></script>
        <script src="./app/view/assets/backend/js/setup.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                setupLeftMenu();
                
                 $('.datatable').dataTable();
                setSidebarHeight();
            });
        </script>

    </head>
    <body>
        <div class="container_12">
            <div class="grid_12 header-repeat">
                <div id="branding">
                    <div class="floatleft logo">
                        <img src="./app/view/assets/backend/img/livelogo.png" alt="Logo" />
                    </div>
                    <div class="floatleft middle">
                        <h1>Training with live project</h1>
                        <p>www.trainingwithliveproject.com</p>
                    </div>
                    <div class="floatright">
                        <div class="floatleft">
                            <img src="./app/view/assets/backend/img/img-profile.jpg" alt="Profile Pic" /></div>
                        <div class="floatleft marginleft10">
                            <ul class="inline-ul floatleft">
                                <li>Hello Admin</li>
                                <li><a href="<?=BASE_URL?>Login/logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </div>
            </div>
            <div class="clear">
            </div>
            <div class="grid_12">
                <ul class="nav main">
                    <li class="ic-dashboard"><a href="<?=BASE_URL?>admin/dashboard"><span>Dashboard</span></a> </li>
                    <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
                    <li class="ic-typography"><a href="changepassword.html"><span>Change Password</span></a></li>
                    <li class="ic-grid-tables"><a href="inbox.html"><span>Inbox</span></a></li>
                    <li class="ic-charts"><a href="postlist.html"><span>Visit Website</span></a></li>
                </ul>
            </div>
            <div class="clear">
            </div>