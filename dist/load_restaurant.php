<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel='shortcut icon' href='assets/img/sample.png' type='image/x-icon' />
        <title><?php echo $_GET['restaurantname']; ?> | StarveLater</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <style type="text/css">
        	li {
        		width: 100%;
        	}
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">



        <?php
              $FoodLicenceErr = $LabourLicenceErr = "";

              $FoodLicence = $LabourLicence = "";
              $boolean = false;


                //Remove spaces, slashes and prevent XSS
                function test_input($data) {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
                }

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                     
                      //Food Licencse Validation
                    if (empty($_POST["FoodLicence"])) {
                    $FoodLicenceErr = "Food License Number is required";
                    $boolean = false;
                  } else {
                      $FoodLicence = test_input($_POST["FoodLicence"]);
                      $boolean = true;
                    }


                     //Labour Licencse Validation
                    if (empty($_POST["LabourLicence"])) {
                    $LabourLicenceErr = "Labour License Number is required";
                    $boolean = false;
                  } else {
                      $LabourLicence = test_input($_POST["LabourLicence"]);
                      $boolean = true;
                    }



function updateData(){

        $sql = "UPDATE restaurants SET FoodLicence = '".$_POST["FoodLicence"]."', LabourLicence = '".$_POST["LabourLicence"]."' where Restaurant_Name= '".$_GET['restaurantname']."' ";


        $result = mysqli_query($GLOBALS['con'],$sql) or die("Error: " . mysqli_error($con));

        if($result) {
            echo "<script> alert('Data Updated Successfully !'); </script>";
        } else {
            echo "<script> alert('Something Went Wrong !'); </script>";
        }
}
                  

                  if($boolean){
                    $dbname = "starvelater";
                    $con = mysqli_connect("localhost","root","",$dbname);
    
                    //Check for DB Connection
                    if(!$con){
                        die("Connection Failed :" + mysqli_connect_error());
                    }else{

                        if(isset($_POST["submit"])){
                        updateData();
                        mysqli_close($GLOBALS["con"]);
                        $boolean = false;
                       }

                    }
                }

              }
        ?>

            <!-- Top Navigation bar -->
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">STARVE<B>LATER</B></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Logout Dropdown-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

         <!-- Side Navigation Bar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Interface</div>

                            <!-- Restaurants in Nav Bar--> 
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-utensils"></i></div>
                                Restaurants
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="register.php">Register Restaurant</a><a class="nav-link" href="manage_restaurants.php">Manage Restaurants</a></nav>
                            </div>

                            <!-- Locations in Nav Bar --> 
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocationData" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                Locations
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLocationData" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Add New Location</a><a class="nav-link" href="layout-sidenav-light.html">Manage Locations</a></nav>
                            </div>
                            
                            <!-- Users in Nav Bar--> 
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsersData" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Users 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseUsersData" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Register User</a><a class="nav-link" href="layout-sidenav-light.html">Manage Users</a></nav>
                            </div>


                            <!-- Notifications in Nav Bar--> 
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNotification" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                Notification
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseNotification" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Send Notification</a></nav>
                            </div>


                           <!--  Statistics -->
                            <div class="sb-sidenav-menu-heading">STATISTICS</div>
                            <a class="nav-link" href="charts.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Orders Data</a
                            ><a class="nav-link" href="tables.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Restaurants Data</a>
                                <a class="nav-link" href="tables.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-pie"></i></div>
                                Users Data</a>
                        
                        </div>
                    </div>

                    <!-- Login Status -->
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Administrator
                    </div>

                </nav>
            </div>

            <!-- Title -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?php echo $_GET['restaurantname']; ?></h1>

                       <!--  Marquee -->
                        <ol class="breadcrumb mb-4" width="100%">
                            <li class="breadcrumb-item active" width="100%"><marquee>Welcome to <span><?php echo $_GET['restaurantname']; ?></span> Dashboard.</marquee></li>
                        </ol>

                        <!-- Food Licence & Labour Licence -->

                        <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputFoodLicence">Food Licence No.</label><input class="form-control py-4" id="inputFoodLicence" type="text" placeholder="Enter Food Licence No." name="FoodLicence" />
                                    <span id="span"><?php echo $FoodLicenceErr; ?></span>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputLabourLicence">Labour Licence</label><input class="form-control py-4" id="inputLabourLicence" type="text" placeholder="Enter Labour Licence No." name="LabourLicence" />
                                    <span id="span"><?php echo $LabourLicenceErr; ?></span>
                                    </div>
                                </div>
                        </div>

                        <!-- Submit Button -->
                                            <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" type="submit" name="submit" id="btnsub" value="Submit"/></div>

                    </form>

                        <!-- Items Table -->
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-concierge-bell mr-1"></i>Items</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Item ID</th>
                                                <th>Item Name</th>
                                                <th>Item Type</th>
                                                <th>Item Category</th>
                                                <th>Item Price</th>
                                                <th>Item Availability</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>

                                                <th>Item ID</th>
                                                <th>Item Name</th>
                                                <th>Item Type</th>
                                                <th>Item Category</th>
                                                <th>Item Price</th>
                                                <th>Item Availability</th>
                                                </tr>
                                        </tfoot>
                                        <tbody>
                                        
                                             <tr>
                                                <td>1</td>
                                                <td>Veg Biryani</td>
                                                <td>Veg</td>
                                                <td>Main Course</td>
                                                <td>₹ 200 </td>
                                                <td>Available</td>
                                            </tr>

                                             <tr>
                                                <td>2</td>
                                                <td>Butter Naan</td>
                                                <td>Veg</td>
                                                <td>Main Course</td>
                                                <td>₹ 40 </td>
                                                <td>Not Available</td>
                                            </tr>
                                             <tr>
                                                <td>3</td>
                                                <td>Masala Dosa</td>
                                                <td>Veg</td>
                                                <td>Tiffin</td>
                                                <td>₹ 60 </td>
                                                <td>Available</td>
                                            </tr>
                                             <tr>
                                                <td>4</td>
                                                <td>Veg Manchuria</td>
                                                <td>Veg</td>
                                                <td>Starters</td>
                                                <td>₹ 180 </td>
                                                <td>Available</td>
                                            </tr>
                                             <tr>
                                                <td>5</td>
                                                <td>Baby Corn 65</td>
                                                <td>Veg</td>
                                                <td>Starters</td>
                                                <td>₹ 280 </td>
                                                <td>Not Available</td>
                                            </tr>

                                            <tr>
                                                <td>5</td>
                                                <td>Baby Corn 65</td>
                                                <td>Veg</td>
                                                <td>Starters</td>
                                                <td>₹ 280 </td>
                                                <td>Not Available</td>
                                            </tr>
                                            
                                                 
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                       <!--  Restaurant Orders Table -->
                       <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-clipboard mr-1"></i>Orders Served</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Bill ID</th>
                                                <th>Order Type</th>
                                                <th>Booked Time</th>
                                                <th>Status of Order</th>
                                                <th>Net Bill</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>

                                                <th>Customer Name</th>
                                                <th>Bill ID</th>
                                                <th>TakeAway/Dine-in</th>
                                                <th>Booked Time</th>
                                                <th>Status of Order</th>
                                                <th>Net Bill</th>
                                                </tr>
                                        </tfoot>
                                        <tbody>
                                        
                                              

                                            

                                                 <tr>
                                                <td>Saikiran Kopparthi</td>
                                            
                                                <td>SL1</td>
                                                <td>Dine-in</td>
                                                <td>2020/05/03 22:15:02</td>
                                                <td>Completed</td>
                                                <td>₹500.00</td>
                                            </tr>
                                                 
                                            <tr>
                                                <td>Koushik Modekurti</td>
                                                
                                                <td>SL2</td>
                                                <td>Take Away</td>
                                                <td>2020/06/15 12:28:15</td>
                                                <td>In progress</td>
                                                <td>₹250.00</td>
                                            </tr>
                                            <tr>
                                                <td>Santosh Burada</td>
                                            
                                                <td>SL3</td>
                                                <td>Dine-in</td>
                                                <td>2020/05/25 17:23:12</td>
                                                <td>In progress</td>
                                                <td>₹300.00</td>
                                            </tr>
                                            <tr>
                                                <td>Prathyusha Kuppili</td>
                                            
                                                <td>SL4</td>
                                                <td>Take Away</td>
                                                <td>2020/05/22 11:10:02</td>
                                                <td>Completed</td>
                                                <td>₹520.00</td>
                                            </tr>
                                            <tr>
                                                <td>Manikanta Gontu</td>
                                            
                                                <td>SL5</td>
                                                <td>Dine-in</td>
                                                <td>2020/12/13 18:25:58</td>
                                                <td>In Progress</td>
                                                <td>₹275.00</td>
                                            </tr> 
                                                 
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                       <!-- Update & Delete Button -->
                        <div class="form-row">
                                <div class="col-md-6">
                                            <div class="form-group mt-4 mb-0"><input class="btn btn-primary " type="button" name="Update" id="btnupdate" value="Update" /></div>
                                </div>
                                <div class="col-md-6">
                                            <div class="form-group mt-4 mb-0"><input class="btn btn-danger " type="button" name="Delete" id="btndelete" value="Delete"/></div>
                                </div>
                        </div>
                 <P>&nbsp;</P>




                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; STARVE<b>LATER</b></div>
                            <div class="text-muted">Made with love by <b>Umang Solutions</b></div>
                                <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="assets/demo/datatables1-demo.js"></script>
    </body>
</html>
