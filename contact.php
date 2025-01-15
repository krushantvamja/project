<?php
$msg = ''; // Initialize $msg as an empty string
$error = ''; 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Main contact form submitted
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phno'];
    $packages = $_POST['packages'];
    $message = $_POST['message'];

    // Prepare email content
    $to = "vedvanawellness@gmail.com"; // Change this to required email address
    $subject = "New Contact Form Submission";
    $email_content = "Full Name: $name\nEmail: $email\nPhone Number: $phone\nPackages: $packages\nMessage: $message";
    $headers = "From: $email\r\n";

    // Send email
    $mail_success = mail($to, $subject, $email_content, $headers);

    // Check if data was successfully processed
    if ($mail_success) {
      // Use query parameters to show success message
      header("Location: " . $_SERVER['PHP_SELF'] . "?msg=success");
      exit;
    } else {
        header("Location: " . $_SERVER['PHP_SELF'] . "?msg=error");
        exit;
    }
}

// Handle query parameter for messages
if (isset($_GET['msg'])) {
  if ($_GET['msg'] === 'success') {
      $msg = "Form successfully submitted.";
  } elseif ($_GET['msg'] === 'error') {
      $error = "Something went wrong. Please try again.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
     <!-- navbar for original desktop size-->
     <nav class="navbar m-0 p-0 navbar-expand-lg navbar-light bg-light">
      <div class="divOne">
        <div>
          <p class="mb-0 pb-0">Call us on</p>
          <a href="tel:09920222825" ><h5>09920222825</h5></a>
        </div>
        <span></span>
        <div>
          <p class="mb-0 pb-0">Mail at</p>
          <a href="mailto:vedvanawellness@gmail.com" style="text-transform: none;"><h5>vedvanawellness@gmail.com</h5></a>
        </div>
        <div>
          <button id="enquiryBtn" data-toggle="modal" data-target="#exampleModalLong">ENQUIRE NOW <img src="img/next_arrow.png" alt="arrow"></button>
        </div> 
      </div>
    </nav>
    <div class="logoDiv">
      <div>
       <img src="img/logo.png" alt="logo">
     </div>
    </div>
    <nav class="navbar m-0 p-0 navbar-expand-lg">
       <div></div>
      <div class="divTwo">
        <a href="about.php">About Us </a>  
        <a href="#WellnessPrograms"> Wellness Programs</a>
        <a href="#DiseasesTreated">Diseases Treated</a>
        <a href="#Facilities">Facilities</a>
        <a href="#enquiryBtn" data-toggle="modal" data-target="#exampleModalLong"> Packages & Booking</a>
        <a href="#enquiryBtn" data-toggle="modal" data-target="#exampleModalLong">Events</a>
        <a href="#contact">Contact Us</a>
      </div>
    </nav>

    <!-- Navbar for mobile size screen -->
    <nav class="navbar-ss navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><div>
       <img src="img/logo.png" alt="logo">
     </div></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#WellnessPrograms">Wellness Program</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#DiseasesTreated">Diseases Treated</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Facilities">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#enquiryBtn">Packages & Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#enquiryBtn">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact Us</a>
        </li>
             
      </ul>
      <div class="d-flex justify-content-center">
          <button id="enquiryBtn2" data-toggle="modal" data-target="#exampleModalLong">ENQUIRE NOW <img src="img/next_arrow.png" alt="arrow"></button>
        </div> 
    </div>
  </div>
</nav>
<!-- modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Enquire Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Name*</label>
                        <input type="text" name="name" class="form-control" id="name" required placeholder="Enter Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email*</label>
                        <input type="email" name="email" class="form-control" id="email" required placeholder="Enter Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phno">Mobile Number</label>
                        <input type="text" name="phno" class="form-control" id="phno" required placeholder="Enter Mobile Number">
                        <div id="validationError" class="alert alert-danger" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Packages">Packages*</label>
                    <select class="form-select form-control" name="packages" aria-label="Packages" required>
                        <option selected>Select Package</option>
                        <option value="Weight Management">Weight Management</option>
                        <option value="Stress Management">Stress Management</option>
                        <option value="Pain Management">Pain Management</option>
                        <option value="Rejuvenation">Rejuvenation</option>
                        <option value="Detox">Detox</option>
                        <option value="Beauty">Beauty</option>
                        <option value="Infertility">Infertility</option>
                    </select>
                </div>
                
                <div class="form-group">
                  <label for="Message">Message</label>
                  <textarea class="form-control" id="message" rows="3" placeholder="Message" name="message"></textarea>
                </div>
                <div class="col-md-12">
                    <!---Success Message--->
                    <?php if ($msg) { ?>
                        <div class="alert alert-success text-center success-msg" role="alert">
                            <strong>Well done!</strong>
                            <?php echo htmlentities($msg); ?>
                        </div>
                    <?php } ?>

                    <!---Error Message--->
                    <?php if ($error) { ?>
                        <div class="alert alert-danger text-center error-msg" role="alert">
                            <strong>Oh snap!</strong>
                            <?php echo htmlentities($error); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Submit" name="submit" class="btn Submit_primary" />
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
<footer>
      <div class="container text-center">
        <h3>Your Path to Wellness Awaits</h3>
        <p>Let us help you achieve your wellness goals. Reach out to learn more or book your personalized retreat.</p>
        <div class="row" style="margin-top: 50px;">
          <div class="col-lg-4 col-md-4 col-sm-12" data-aos="flip-down" data-aos-offset="200" data-aos-delay="300">
            <img src="img/call.png" alt="calling">
            <p class="mb-0"><b>Call us on</b></p>
            <a href="tel:09920222825">09920222825</a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12" data-aos="flip-down" data-aos-offset="200" data-aos-delay="300">
            <img src="img/gmail.png" alt="calling">
            <p class="mb-0"><b>Mail at</b></p>
            <a href="mailto:vedvanawellness@gmail.com">vedvanawellness@gmail.com</a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12" data-aos="flip-down" data-aos-offset="200" data-aos-delay="300">
            <img src="img/location.png" alt="calling">
            <p class="mb-0"><b>Visit us</b></p>
            <a href="#">Mumbai</a>
          </div>
        </div>
      </div>
      <div class="vector_4">
        <img src="img/vector_4.png" alt="vector_1">
      </div>
    </footer>
    <!-- <div class="map"  data-aos="zoom-in-down">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.7867095431707!2d73.0532525!3d19.2481252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bdda789ea6b5%3A0x26ea030c08fde6e!2sLodha%20Dham%20Bhiwandi!5e0!3m2!1sen!2sin!4v1736328056609!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div> -->
    <div class="subFooter">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-center">
        <div>
          <p>© All copyrights are reserved.</p>
        </div>
        <!-- <div class="d-flex justify-content-between align-items-baseline" style="gap:12px">
          <p><b>Connect with us</b></p>
          <a href=""><img src="img/x.png" alt="x"></a>
          <a href="https://www.facebook.com/AurumWellnessCentre/"><img src="img/facebook.png" alt="facebook"></a>
          <a href="https://www.instagram.com/aurumwellnesscentre/"><img src="img/insta.png" alt="insta"></a>
          <a href="https://www.youtube.com/@AurumWellnessCentre"><img src="img/youtube.png" alt="youtube"></a>
        </div> -->
      </div>
    </div>
    </div>
</body>
</html>