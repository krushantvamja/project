<?php
$msg = '';
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
    <title>VedVana Wellness</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
        <a href="facilities.php">Facilities</a>
        <a > Packages & Booking</a>
        <a >Events</a>
        <a href="contact.php">Contact Us</a>
      </div>
    </nav>

    <!-- Navbar for mobile size screen -->
    <nav class="navbar-ss navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><div>
       <img src="img/logo.png" href="index.php" alt="logo">
     </div></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about.html">About Us</a>
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
    
    <!-- 481 to 767 -->
    

    <!-- Modal form -->
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
    <script>
      // Prevent popup from closing on form submission
      document.getElementById('enquiryForm').addEventListener('submit', function (event) {
          event.preventDefault(); // Prevent the default form submission

          const phoneInput = document.getElementById('phno');
          const phoneNumber = phoneInput.value;

          // Mobile number validation
          const phoneRegex = /^[6-9][0-9]{9}$/;
          if (!phoneRegex.test(phoneNumber)) {
              alert('Please enter a valid mobile number starting with 6-9 and exactly 10 digits.');
              return;
          }

          // Submit the form programmatically
          this.submit();
      });

      // Close the popup only when the close button is clicked
      document.getElementById('closeModalButton').addEventListener('click', function () {
          $('#exampleModalLong').modal('hide');
      });


      if (!phoneRegex.test(phoneNumber)) {
        const errorDiv = document.getElementById('validationError');
        errorDiv.style.display = 'block';
        errorDiv.textContent = 'Please enter a valid mobile number.';
        setTimeout(() => errorDiv.style.display = 'none', 5000); // Hide after 5 seconds
        return;
      }

        // Wait for the DOM to load before executing the script
      document.addEventListener('DOMContentLoaded', () => {
          // Hide success or error message after 10 seconds
          setTimeout(() => {
              const successMessage = document.querySelector('.success-msg');
              const errorMessage = document.querySelector('.error-msg');
              if (successMessage) successMessage.style.display = 'none';
              if (errorMessage) errorMessage.style.display = 'none';
          }, 10000); // 10 seconds
      });
    </script>
    <!-- header  -->
    <section>
      <div>
          <img src="img/banner.png" alt="VedVana Wellness Banner" width="100%">
      </div>
    </section>

    <!-- about us -->
    <section>
      <div class="aboutSecBG">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-2 col-md-2 iconImg">
              <img src="img/img1.png" alt="image">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" data-aos="zoom-in">
              <h6><span>VedVana</span> Elevating Every Moment</h6>
              <h2>Elevating Every Moment</h2>
              <p>VedVana isn’t just a place it’s an experience-a harmonious blend of Kerala’s authentic Ayurvedic  traditions and the elegance of modern luxury. Nestled in the heart of Mumbai yet worlds away from  its chaos, VedVana sprawls across acres, offering the peace and solitude of nature as you embark on  your journey toward wellness.</p>
              <button>Know more <img src="img/next_arrow.png" alt="next arrow"></button>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <img src="img/abt img.png" alt="aboutus image" width="100%"  data-aos="flip-right">
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="vector_1">
      <img src="img/vector_1.png" alt="vector_1">
    </div>
    <!-- Our Holistic Wellness Programs -->
    <section id="WellnessPrograms">
      <div class="container mt-5">
        <h3 class="text-center">Our Holistic Wellness Programs</h3>
        <div class="swiper mySwiper mt-5">
          <div class="swiper-wrapper mb-5">
            <!-- Ayurveda Panchakarma -->
            <div class="swiper-slide">
              <div class="card" data-aos="zoom-out-up" data-aos-offset="200" data-aos-delay="300">
                <img class="card-img-top" src="img/Panchkarma massage.jpg" alt="Ayurveda Panchakarma">
                <div class="card-body">
                  <h5 class="card-title">Ayurveda Panchakarma</h5>
                  <p class="card-text">At VedVana Wellness, our Ayurveda Panchakarma treatments are rooted in 5,000-year-old Vedic wisdom, offering...</p>
                  <a href="#" class="learn-more-link">learn more <img src="img/color arrow.png" alt="color arrow" class="arrow-icon"></a>
                </div>
              </div>
            </div>
            
            <!-- Acupuncture & Reflexology -->
            <div class="swiper-slide">
              <div class="card" data-aos="zoom-out-up" data-aos-offset="200" data-aos-delay="300">
                <img class="card-img-top" src="img/Acupuncture & Reflexology.png" alt="Acupuncture & Reflexology">
                <div class="card-body">
                  <h5 class="card-title">Acupuncture & Reflexology</h5>
                  <p class="card-text">Restore your body’s energy balance with therapies like Acupuncture, Reflexology, Cupping, and Moxibustion. These powerful...</p>
                  <a href="#" class="learn-more-link">learn more <img src="img/color arrow.png" alt="color arrow" class="arrow-icon"></a>
                </div>
              </div>
            </div>
            
            <!-- Yoga and Meditation -->
            <div class="swiper-slide">
              <div class="card" data-aos="zoom-out-up" data-aos-offset="200" data-aos-delay="300">
                <img class="card-img-top" src="img/Yoga and Meditation.png" alt="Yoga and Meditation">
                <div class="card-body">
                  <h5 class="card-title">Yoga and Meditation</h5>
                  <p class="card-text">Unite your mind, body, and soul through VedVana’s yoga retreats. With practices like Kriya, Asana, and Pranayama...</p>
                  <a href="#" class="learn-more-link">learn more <img src="img/color arrow.png" alt="color arrow" class="arrow-icon"></a>
                </div>
              </div>
            </div>
            
            <!-- Physiotherapy -->
            <div class="swiper-slide">
              <div class="card" data-aos="zoom-out-up" data-aos-offset="200" data-aos-delay="300">
                <img class="card-img-top" src="img/physiotherapy.jpeg" alt="Physiotherapy">
                <div class="card-body">
                  <h5 class="card-title">Physiotherapy</h5>
                  <p class="card-text">Physiotherapy is anchored in movement sciences and aims to enhance or restore function of multiple body systems.</p>
                  <a href="#" class="learn-more-link">learn more <img src="img/color arrow.png" alt="color arrow" class="arrow-icon"></a>
                </div>
              </div>
            </div>

            <!-- cuisine -->
            <div class="swiper-slide">
              <div class="card" data-aos="zoom-out-up" data-aos-offset="200" data-aos-delay="300">
                <img class="card-img-top" src="img/holisticcuisine.jpg" alt="Physiotherapy">
                <div class="card-body">
                  <h5 class="card-title">Holistic Cuisine</h5>
                  <p class="card-text">At VedVana Wellness, we view food as medicine. Our nutrient-rich, seasonal meals are crafted to repair cells,....</p>
                  <a href="#" class="learn-more-link">learn more <img src="img/color arrow.png" alt="color arrow" class="arrow-icon"></a>
                </div>
              </div>
            </div>

          </div>
          <div class="swiper-pagination mt-5"></div>
        </div>
      </div>
    </section>

    <!-- Diseases Treated at VedVana Wellness -->
    <section id="DiseasesTreated">
      <div class="vector_2">
        <img src="img/vector_2.png" alt="vector_1">
      </div>
      <div class="treatment mt-5">
        <div class="container">
          <div class="text-center">
            <p class="mb-0"><b>Natural Healing for a Healthier You</b></p>
            <h2 class="mt-0">Diseases Treated at VedVana Wellness</h2>
            <p style="line-height: normal; font-size:16px">At VedVana Wellness, we specialize in holistic treatments that address the underlying causes of health challenges. Combining <br> Ayurveda, naturopathy, yoga, and physiotherapy, we offer personalized care for conditions such as</p>
          </div>
          <div class="row mt-5">
            <div class="col-lg-4 col-md-4 col-sm-12 treatmentImg">
              <img src="img/treatmentImg.png" alt="treatmentImg" width="100%">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="treatmentCart" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-offset="200" data-aos-delay="300">
                    <img src="img/chronic pain.png" alt="Chronic Pain">
                    <h6>Chronic Pain</h6>
                    <p>Relieve morning joint stiffness and pain from musculoskeletal disorders.</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="treatmentCart" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-offset="200" data-aos-delay="300">
                    <img src="img/harmones.png" alt="Hormonal Imbalances">
                    <h6>Hormonal Imbalances</h6>
                    <p>Including thyroid disorders, PCOS, and menopausal 
                      symptoms.</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="treatmentCart" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-offset="200"  data-aos-delay="300">
                    <img src="img/Stress & Anxiety.png" alt="Stress & Anxiety">
                    <h6>Stress & Anxiety</h6>
                    <p>Helping you find calm and clarity through tailored 
                      relaxation therapies.</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="treatmentCart" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-offset="200"  data-aos-delay="300">
                    <img src="img/metabolic.png" alt="Stress & Anxiety">
                    <h6>Metabolic Concerns</h6>
                    <p>Including weight management and diabetes support.</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="treatmentCart" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  data-aos-offset="200" data-aos-delay="300">
                    <img src="img/digestion.png" alt="Stress & Anxiety">
                    <h6>Digestive Issues</h6>
                    <p>Such as acidity, bloating, and irritable bowel 
                      syndrome (IBS).</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="treatmentCart" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  data-aos-offset="200" data-aos-delay="300">
                    <img src="img/skin.png" alt="Stress & Anxiety">
                    <h6>Skin Disorders</h6>
                    <p>Addressing acne, eczema, and other conditions with a 
                      holistic approach.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <div class="vector_3">
      <img src="img/vector_3.png" alt="vector_1">
    </div>
    <!-- <section>
      <div class="container text-center mt-5 mb-5">
      <h3 class="text-center">ॐ सर्वे भवन्तु सुखिनः</h3>
      </div>
    </section> -->
    <!-- Facilities at VedVana -->
    <section id="Facilities">
  <div class="facilitiesBg">
    <div class="container mt-5">
      <h3 class="text-center">Facilities at VedVana</h3>
      <!-- Swiper Container -->
      <div class="swiper facilitiesSwiper mt-5" data-aos="fade-right" data-aos-offset="200" data-aos-delay="300">
        <div class="swiper-wrapper">
          <!-- Swiper Slide -->
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="img/Therapy Centre.png" alt="Therapy Centre">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="img/Library.png" alt="Library">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="img/Yoga Hall.png" alt="Yoga Hall">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="img/jungle walk at VedVana Wellness.jpg" alt="Jungle Walk">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="img/rooms.jpg" alt="Rooms">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="img/restaurant at VedVana.jpg" alt="Restaurant">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="img/gym at vedvana.jpg" alt="Gym">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="img/game area.jpg" alt="Game Area">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="img/swimming pool at VedVana wellness.jpg" alt="Swimming Pool">
            </div>
          </div>
        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>

    
    <footer>
      <div class="container text-center">
        <h3>Contact Details</h3>
        <p>Have any questions?</p>
        <div class="row">
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
    <div class="map"  data-aos="zoom-in-down">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.7867095431707!2d73.0532525!3d19.2481252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bdda789ea6b5%3A0x26ea030c08fde6e!2sLodha%20Dham%20Bhiwandi!5e0!3m2!1sen!2sin!4v1736328056609!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="subFooter">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-center">
        <div>
          <p>© All copyrights are reserved.</p>
        </div>
        <div class="d-flex justify-content-between align-items-baseline" style="gap:12px">
          <p><b>Connect with us</b></p>
          <!-- <a href=""><img src="img/x.png" alt="x"></a> -->
          <a href="https://www.facebook.com/AurumWellnessCentre/"><img src="img/facebook.png" alt="facebook"></a>
          <a href="https://www.instagram.com/aurumwellnesscentre/"><img src="img/insta.png" alt="insta"></a>
          <a href="https://www.youtube.com/@AurumWellnessCentre"><img src="img/youtube.png" alt="youtube"></a>
        </div>
      </div>
    </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    AOS.init();
    var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 5000,
    },
    breakpoints: {
      0:{
        slidesPerView:1,
      },
      480:{
      slidesPerView: 1,
      },
      767:{
        slidesPerView:2,
      },
      1025:{
        slidesPerView:3,
      }
    },
  });
  var facilitiesSwiper = new Swiper(".facilitiesSwiper", {
  slidesPerView: 3, // Default number of slides to show
  spaceBetween: 20, // Space between slides
  pagination: {
    el: ".facilitiesSwiper .swiper-pagination", // Ensure unique pagination
    clickable: true,
  },
  autoplay: {
    delay: 3000, // Autoplay delay in milliseconds
  },
  breakpoints: {
    0: {
      slidesPerView: 1, // 1 slide for small screens
    },
    480: {
      slidesPerView: 2, // 2 slides for tablets
    },
    767: {
      slidesPerView: 3, // 3 slides for desktops
    },
  },
});

  </script>
</body>
</html>