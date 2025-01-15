<?php
$msg = ''; // Initialize $msg as an empty string
$error = ''; // Initialize $error as an empty string

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
    <title>About Us - VedVana Wellness</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="about_style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<!-- background-color:rgb(250, 239, 243); -->
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
      <a href="index.php" ><img src="img/logo.png" alt="logo"></a>
     </div>
    </div>
    <nav class="navbar m-0 p-0 navbar-expand-lg">
       <div></div>
      <div class="divTwo">
        <a href="about.php">About Us </a>  
        <a href="#WellnessPrograms"> Wellness Programs</a>
        <a href="#DiseasesTreated">Diseases Treated</a>
        <a href="facilities.php">Facilities</a>
        <a href="#enquiryBtn" data-toggle="modal" data-target="#exampleModalLong"> Packages & Booking</a>
        <a href="#enquiryBtn" data-toggle="modal" data-target="#exampleModalLong">Events</a>
        <a href="contact.php">Contact Us</a>
      </div>
    </nav>

    <!-- Navbar for mobile size screen -->
    <nav class="navbar-ss navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><div>
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
          <a class="nav-link" href="facilities.php">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#enquiryBtn">Packages & Booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#enquiryBtn">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
             
      </ul>
      <div class="d-flex justify-content-center">
          <button id="enquiryBtn2" data-toggle="modal" data-target="#exampleModalLong">ENQUIRE NOW <img src="img/next_arrow.png" alt="arrow"></button>
        </div> 
    </div>
  </div>
</nav>

<!-- Modal -->
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

<header>
    <h1>About Us: A Harmonious Blend</h1>
</header>
<main>
    <section>
        <h2>Where Traditions Meet Modern Wellness</h2>
        <div class="container">
            <div class="row align-items-center m-5">
                <!-- Image Section -->
                <div class="col-md-4">
                    <img src="img/" alt="VedVana Restaurant" class="img-fluid">
                </div>
                <!-- Text Section -->
                <div class="col-md-8">
                    <p>
                        <b>VedVana</b> isn’t just a destination; it’s an experience that seamlessly integrates the wisdom of Ayurveda with contemporary practices. Spread across lush acres, VedVana offers a haven for those seeking tranquility and holistic healing.
                    </p>
                    <p>
                        Guided by a team of seasoned professionals, our philosophy centers on personalized care, ensuring every moment contributes to your well-being. From detox therapies to emotional healing, VedVana caters to your unique wellness goals.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="text-center m-5">
            <a href="our-story.php" class="cta-button">Discover Our Story</a>
        </div>
    </section>
</main>
<footer>
    <p>&copy; 2023 VedVana Wellness. All rights reserved.</p>
</footer>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>