<?php
session_start();
include 'login.php';
if(isset($_SESSION['ID'])){
    //session_start();
    $status = 'loggedin';
    $loginClass = 'notloggedin';
    $id = $_SESSION['ID'];
}
else{
    $status = 'notloggedin';
    $loginClass = 'loggedin';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Simple app by Allen">
    <meta name="Allen" content="Allen">
    <title><?php echo $firstname ?></title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/whytee.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">




    <a href="components.html" class="btn btn-primary btn-component" data-spy="affix" data-offset-top="600"><i class="ti-shift-left-alt"></i> Components</a>
    <header class="header">
        <div class="container">
            <ul class="social-icons pt-3">
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-google" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link text-light" href="#"><i class="ti-github" aria-hidden="true"></i></a></li>
            </ul>  
            <div class="header-content <?php echo $status;?>">
                <h4 class="header-subtitle" >Hello, I am</h4>
                <h1 class="header-title"><?php echo $firstname." ".$lastname; ?></h1>
                <h6 class="header-mono" >Born : <?php echo $dob. " | Gender : ". $gender; ?>
                <br> <br>
                <?php
                
                $sql = $conn->query("SELECT * FROM loginlog WHERE userid = '$id'  ORDER BY id DESC");
                
                if($row = $sql->fetch_assoc()){
                    echo "Last logged in :".$row['dates'];
                }
                
                ?></h6>
                <a href ="logout.php" ><button class="btn btn-primary btn-rounded"><i class="ti-hand-point-left pr-2"></i>Logout</button></a>
            </div>



    <div class="section <?php echo $loginClass; ?>" id="contact">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-4">
                    <div>
                       

                        <div class="col-lg-12">
                            <div>
                                <h4 class="contact-title">Login</h4>
                                <p class="login-error subtitle"></p>
                                <span class="line mb-4 col-lg-12"></span>
                                <form action="" method = "POST">
                                    <div class="form-group">
                                        <input  class="form-control" name = "username" type="text" placeholder="Username" id = "username" autofill="false" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name = "password" type="password" placeholder="Password" id = "password" required>
                                    </div>
                                </form>
                     </div>
                    </div>

                       
                        <ul class="social-icons pt-4">
                            <li class="social-item"><a class="social-link text-dark" href="#"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i class="ti-google" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link text-dark" href="#"><i class="ti-github" aria-hidden="true"></i></a></li>
                        </ul> 
                    </div>
                </div>
            </div>

        </div>
    </div>



        </div>
    </header>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white <?php echo $status; ?>" data-spy="affix" data-offset-top="510">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
                <ul class="navbar-nav brand">
                    <img src="<?php echo $profilepic;?>" alt="" class="brand-img">
                    <li class="brand-txt">
                        <h5 class="brand-title"><?php echo $firstname." ".$lastname; ?></h5>
                        <div class="brand-subtitle">Web Designer | Developer</div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#portfolio" class="nav-link">Portfolio</a>
                    </li>
                    <li class="nav-item last-item">
                        <a href="#contact" class="nav-link">Messages</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid <?php echo $status; ?>">
        <div id="about" class="row about-section">
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light">Who am I ?</h3>
                <span class="line mb-5"></span>
                <h5 class="mb-3">A Web Designer / Developer Located In Our Lovely Earth</h5>
                <p class="mt-20">About Me and other Stuff you need to know.</p>
                <button class="btn btn-outline-danger"><i class="icon-down-circled2 "></i>Download My CV</button>
            </div>
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light">Personal Info</h3>
                <span class="line mb-5"></span>
                <ul class="mt40 info list-unstyled">
                    <li><span>Date of Birth</span> : <?php echo $dob; ?></li>
                    <li><span>Firstname</span> : <?php echo $firstname; ?></li>
                    <li><span>Lastname</span> : <?php echo $lastname; ?></li>
                    <li><span>Gender</span> : <?php echo $gender; ?></li>
                </ul>
                <ul class="social-icons pt-3">
                    <li class="social-item"><a class="social-link" href="#"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="#"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="#"><i class="ti-google" aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="#"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                    <li class="social-item"><a class="social-link" href="#"><i class="ti-github" aria-hidden="true"></i></a></li>
                </ul>  
            </div>
            <div class="col-lg-4 about-card">
                <h3 class="font-weight-light">My Expertise</h3>
                <span class="line mb-5"></span>
                <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-widget icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>UX Design</h6>
                        <p class="subtitle">The best UX designer.</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-paint-bucket icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Web Development</h6>
                        <p class="subtitle">I can build any website for you.</p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-danger pt-1"><i class="ti-stats-up icon-lg"></i></div>
                    <div class="col-10 ml-auto mr-3">
                        <h6>Digital Marketing</h6>
                        <p class="subtitle">An outstanding Digital Marketer.</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section bg-dark text-center <?php echo $status; ?>">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 col-lg-3">
                    <div class="row ">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-alarm-clock icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">500</h1>
                            <p class="text-light mb-1">Hours Worked</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-layers-alt icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">50K</h1>
                            <p class="text-light mb-1">Project Finished</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-face-smile icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">200K</h1>
                            <p class="text-light mb-1">Happy Clients</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-5 text-right text-light border-right py-3">
                            <div class="m-auto"><i class="ti-heart-broken icon-xl"></i></div>
                        </div>
                        <div class="col-7 text-left py-3">
                            <h1 class="text-danger font-weight-bold font40">2k</h1>
                            <p class="text-light mb-1">Coffee Drinked</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 

    <div class="section contact <?php echo $status; ?>" id="contact">
     
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form-card">
                        <h4 class="contact-title">Send a message</h4>
                        <form action="">
                           
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Type your message here!!!" required>
                            </div>
                           
                            <div class="form-group ">
                                <button type="submit" class="form-control btn btn-primary" >Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info-card">
                        <div class="col-lg-12 about-card">
                            <h3 class="font-weight-light">Contacts</h3>
                            <p class="subtitle">Select contact to send message.</p>
                            <span class="line mb-5"></span>
                             <div class="row">
                            <div class="col-2 text-danger pt-1"><i class="ti-user icon-lg"></i></div>
                            <div class="col-9 ml-auto mr-3">
                            <h6>Kali2</h6>
                            <p class="subtitle">Allen Njiva.</p>
                            <hr>
                        </div>
                </div>
            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer py-3">
        <div class="container">
            <p class="small mb-0 text-light">
                &copy; <script>document.write(new Date().getFullYear())</script> Created by <a href="http://whytee.rf.gd" target="_blank"><span class="text-danger" title="Allen">< /Whytee?></span></a> 
            </p>
        </div>
    </footer>

	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope  -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>
    
    <!-- Google mpas -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- whytee js -->
    <script src="assets/js/whytee.js"></script>

    <script src="assets/js/yt.js"></script>
    

</body>
</html>
