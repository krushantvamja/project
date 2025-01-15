<?php
$pageTitle = "Our Facilities - VedVana";
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
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color:rgb(247, 233, 246);
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 64px 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 64px;
        }
        .header h2{
            color: #608b4f;
            font-family: "DM Serif Display", serif;
        }
        .main-title {
            font-size: 2.5em;
            color: #608b4f;
            margin-bottom: 24px;
            font-weight: 600;
        }
        .description {
            font-size: 1.25em;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
        }
        .facilities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
            margin-bottom: 64px;
        }
        .facility-card {
            background: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
        }
        .facility-card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .facility-title {
            font-size: 1.25em;
            color: #2c3e50;
            margin-bottom: 12px;
        }
        .facility-description {
            color: #666;
        }
        .footer-text {
            text-align: center;
            font-size: 1.1em;
            color: #666;
            margin-bottom: 32px;
        }
        .cta-button {
            background: #AF1E45;
            color: white;
            font-family: Open Sans;
            font-size: 16px;
            font-weight: 600;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            margin-top: 20px;
            cursor: pointer;
        }
        .cta-button:hover {
            background-color:rgb(203, 107, 174);
        }
        .text-center {
            text-align: center;
        }
    </style>
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
       <a href="index.php"> <img src="img/logo.png" alt="logo"></a>
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

    <div class="container">
        <div class="header">
            <h1 class="main-title">Facilities: A haven for Wellness</h1>
            <h2> Spaces Designed for Comfort and Healing</h2>
            <p class="description">
                At VedVana Wellness, our state-of-the-art facilities are designed to provide an unparalleled experience. 
                Each space is thoughtfully curated to enhance your wellness journey and offer moments of tranquility.
            </p>
        </div>

        <div class="facilities-grid">
            <?php
            $facilities = [
                ['title' => 'Rooms', 'description' => 'Luxurious and serene spaces for a restful retreat.'],
                ['title' => 'Restaurant', 'description' => 'Wellness-inspired meals crafted to nourish and delight.'],
                ['title' => 'Gym', 'description' => 'A well-equipped space for fitness and rejuvenation.'],
                ['title' => 'Library', 'description' => 'A peaceful sanctuary for quiet reflection and reading.'],
                ['title' => 'Game Area', 'description' => 'Engaging indoor and outdoor games for relaxation.'],
                ['title' => 'Swimming Pool', 'description' => 'A tranquil spot for refreshing mind and body.'],
                ['title' => 'Yoga Halls', 'description' => 'Indoor and outdoor spaces for connecting mind, body, and spirit.'],
                ['title' => 'Jungle Walk', 'description' => 'A serene nature trail to reconnect with the outdoors.']
            ];

            foreach ($facilities as $facility) {
                echo '<div class="facility-card">
                    <h3 class="facility-title">' . $facility['title'] . '</h3>
                    <p class="facility-description">' . $facility['description'] . '</p>
                </div>';
            }
            ?>
        </div>

        <p class="footer-text">
            Each facility is designed to create a balance between relaxation, rejuvenation, and recreation.
        </p>
        
        <div class="text-center">
            <a href="#" class="cta-button">Explore Our World of Wellness</a>
        </div>
    </div>
</body>
</html>