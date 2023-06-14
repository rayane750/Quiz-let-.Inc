<?php
include_once '../api/config/database.php';

session_start();

  $content = '  
  <!-- Header Start -->
  <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
      <div class="container text-center my-5 py-5">
          <h1 class="text-white mt-4 mb-4">  <div class="text"></div></h1>
          <h1 class="text-white display-1 mb-5">Education Courses</h1>
          <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
              <div class="input-group">
                  <div class="input-group-prepend">
                  </div>
                  <input type="text" class="form-control border-light" style="padding: 30px 25px;" placeholder="Keyword">
                  <div class="input-group-append">
                      <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- About Start -->
  <section id="about-section">
  <div class="container-fluid py-5">
      <div class="container py-5">
          <div class="row">
              <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                  <div class="position-relative h-100">
                      <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                  </div>
              </div>
              <div class="col-lg-7">
                  <div class="section-title position-relative mb-4">
                      <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">About Us</h6>
                      <h1 class="display-4">First Choice For Online Education</h1>
                  </div>
                  <p>We offer an extensive range of courses spanning various disciplines, ensuring that learners of all backgrounds and interests can find relevant and engaging content. From academic subjects to professional development and personal growth, our course catalog covers it all.

                  Our instructors are highly knowledgeable and experienced in their respective fields. They are experts in delivering engaging and effective online lessons, ensuring that learners receive high-quality education from industry professionals.
                  Interactive Learning Tools: We understand that effective learning goes beyond reading materials and watching videos. That is why we provide interactive learning tools such as virtual labs, quizzes, and collaborative projects. These tools enhance the learning experience, allowing learners to apply their knowledge and skills in practical scenarios.</p>
                  <div class="row pt-3 mx-0">
                      <div class="col-3 px-0">
                          <div class="bg-success text-center p-4">
                              <h1 class="text-white" data-toggle="counter-up">';
                            
// Create a new instance of the Database class
$database = new Database();
$conn = $database->getConnection();

// Assuming you have a database connection established
$sql = "SELECT COUNT(*) AS catCount FROM category";
$stmt = $conn->query($sql);

if ($stmt !== false) {
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $catCount = $row['catCount'];

  $content .= $catCount;
} else {
  $content .= "No exercises found.";
}

                              $content .= '</h1>
                              <h6 class="text-uppercase text-white">Available<span class="d-block">Subjects</span></h6>
                          </div>
                      </div>
                      <div class="col-3 px-0">
                          <div class="bg-primary text-center p-4">
                              <h1 class="text-white" data-toggle="counter-up">';
// Create a new instance of the Database class
$database = new Database();
$conn = $database->getConnection();

// Assuming you have a database connection established
$sql = "SELECT COUNT(*) AS exerciseCount FROM exercices";
$stmt = $conn->query($sql);

if ($stmt !== false) {
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $exerciseCount = $row['exerciseCount'];

  $content .= $exerciseCount;
} else {
  $content .= "No exercises found.";
}                             
            $content .='</h1>
                              <h6 class="text-uppercase text-white">Online<span class="d-block">Courses</span></h6>
                          </div>
                      </div>
                      <div class="col-3 px-0">
                          <div class="bg-warning text-center p-4">
                              <h1 class="text-white" data-toggle="counter-up">';
// Create a new instance of the Database class
$database = new Database();
$conn = $database->getConnection();

// Assuming you have a database connection established
$sql = "SELECT COUNT(*) AS userCount FROM users";
$stmt = $conn->query($sql);

if ($stmt !== false) {
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $userCount = $row['userCount'];

  $content .= $userCount;
} else {
  $content .= "No exercises found.";
}                             
                              $content .='</h1>
                              <h6 class="text-uppercase text-white">Happy<span class="d-block">Users</span></h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </section>
  <!-- About End -->


  <!-- Courses Start -->
  <div class="container-fluid px-0 py-5">
      <div class="row mx-0 justify-content-center pt-5">
          <div class="col-lg-6">
              <div class="section-title text-center position-relative mb-4">
                  <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Our Courses</h6>
                  <h1 class="display-4">Recently uploaded</h1>
              </div>
          </div>
      </div>
      <div class="owl-carousel courses-carousel">';
          $database = new Database();
          $conn = $database->getConnection();
          
          // Assuming you have a database connection established
          $sql = "SELECT * FROM exercices";
          $stmt = $conn->query($sql);
          
          $rowLimit = 6; // Set the desired row limit
          $rowCount = 0; // Initialize the row counter
          
          if ($stmt !== false) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $idExercice = $row['idExercice'];
              $descTache = $row['descTache'];
              $stars = $row['stars'];
              $author = $row['author'];
          
              $content .= '
              <div class="courses-item position-relative">
              <img class="img-fluid" src="img/courses-' . $idExercice . '.jpg" alt="">
              <div class="courses-text"><h4 class="text-center text-white px-3">' . $descTache . '</h4>
              <div class="border-top w-100 mt-3">
                  <div class="d-flex justify-content-between p-4">
                      <span class="text-white"><i class="fa fa-user mr-2"></i>' . $author . '</span>
                      <span class="text-white"><i class="fa fa-star mr-2"></i>' . $stars . '<small></small></span>
                  </div>
              </div>
              <div class="w-100 bg-white text-center p-4">
                  <a class="btn btn-primary" href="quizz.php?id=' . $idExercice . '">Course Detail</a>
              </div>
          </div>
          </div>';
          
              $rowCount++; // Increment the row counter
          
              if ($rowCount == $rowLimit) {
                break; // Break out of the loop when the desired row limit is reached
              }
            }
          } else {
            echo "No exercises found.";
          }

      $content .= '</div>
  </div>
  <!-- Courses End -->
  <!-- Team End -->


  <!-- Testimonial Start
  <section id="testimonial">
  <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
      <div class="container py-5">
          <div class="row align-items-center">
              <div class="col-lg-5 mb-5 mb-lg-0">
                  <div class="section-title position-relative mb-4">
                      <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Testimonial</h6>
                      <h1 class="display-4">What Say Our Students</h1>
                  </div>
                  <p class="m-0">Dolor est dolores et nonumy sit labore dolores est sed rebum amet, justo duo ipsum sanctus dolore magna rebum sit et. Diam lorem ea sea at. Nonumy et at at sed justo est nonumy tempor. Vero sea ea eirmod, elitr ea amet diam ipsum at amet. Erat sed stet eos ipsum diam</p>
              </div>
              <div class="col-lg-7">
                  <div class="owl-carousel testimonial-carousel">
                      <div class="bg-white p-5">
                          <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                          <p>Sed et elitr ipsum labore dolor diam, ipsum duo vero sed sit est est ipsum eos clita est ipsum. Est nonumy tempor at kasd. Sed at dolor duo ut dolor, et justo erat dolor magna sed stet amet elitr duo lorem</p>
                          <div class="d-flex flex-shrink-0 align-items-center mt-4">
                              <img class="img-fluid mr-4" src="img/testimonial-2.jpg" alt="">
                              <div>
                                  <h5>Student Name</h5>
                                  <span>Web Design</span>
                              </div>
                          </div>
                      </div>
                      <div class="bg-white p-5">
                          <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                          <p>Sed et elitr ipsum labore dolor diam, ipsum duo vero sed sit est est ipsum eos clita est ipsum. Est nonumy tempor at kasd. Sed at dolor duo ut dolor, et justo erat dolor magna sed stet amet elitr duo lorem</p>
                          <div class="d-flex flex-shrink-0 align-items-center mt-4">
                              <img class="img-fluid mr-4" src="img/testimonial-1.jpg" alt="">
                              <div>
                                  <h5>Student Name</h5>
                                  <span>Web Design</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </section>
  <!-- Testimonial Start --> -->


  <!-- Contact Start -->
  <section id="contact">
  <div class="container-fluid py-5">
      <div class="container py-5">
          <div class="row align-items-center">
              <div class="col-lg-5 mb-5 mb-lg-0">
                  <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                      <div class="d-flex align-items-center mb-5">
                          <div class="btn-icon bg-primary mr-4">
                              <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                          </div>
                          <div class="mt-n1">
                              <h4>Our Location</h4>
                              <p class="m-0">3 Rue de la Chocolaterie, 41000 Blois</p>
                          </div>
                      </div>
                      <div class="d-flex align-items-center mb-5">
                          <div class="btn-icon bg-secondary mr-4">
                              <i class="fa fa-2x fa-phone-alt text-white"></i>
                          </div>
                          <div class="mt-n1">
                              <h4>Call Us</h4>
                              <p class="m-0">02 54 55 84 00</p>
                          </div>
                      </div>
                      <div class="d-flex align-items-center">
                          <div class="btn-icon bg-warning mr-4">
                              <i class="fa fa-2x fa-envelope text-white"></i>
                          </div>
                          <div class="mt-n1">
                              <h4>Email Us</h4>
                              <p class="m-0">qzl@Quiz-let.fr</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-7">
                  <div class="section-title position-relative mb-4">
                      <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Need Help?</h6>
                      <h1 class="display-4">Contact Us</h1>
                  </div>
                  <div class="contact-form">
                      <form>
                          <div class="row">
                              <div class="col-6 form-group">
                                  <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Name" required="required">
                              </div>
                              <div class="col-6 form-group">
                                  <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Email" required="required">
                              </div>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Subject" required="required">
                          </div>
                          <div class="form-group">
                              <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Message" required="required"></textarea>
                          </div>
                          <div>
                              <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </section>
  <!-- Contact End -->';
    
  include('../master.php');
?>
<!-- page script -->
<!-- <script>
  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "../api/doctor/read.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var user in data){
                response += "<tr>"+
                "<td>"+data[user].name+"</td>"+
                "<td>"+data[user].email+"</td>"+
                "<td>"+data[user].phone+"</td>"+
                "<td>"+((data[user].gender == 0)? "Male": "Female")+"</td>"+
                "<td>"+data[user].specialist+"</td>"+
                "<td><a href='/doctor/update.php?id="+data[user].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[user].id+"')>Remove</a></td>"+
                "</tr>";
            }
            $(response).appendTo($("#doctors"));
        }
    });
  });
  function Remove(id){
    var result = confirm("Are you sure you want to Delete the Doctor Record?"); 
    if (result == true) { 
        $.ajax(
        {
            type: "POST",
            url: '../api/doctor/delete.php',
            dataType: 'json',
            data: {
                id: id
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("Successfully Removed Doctor!");
                    window.location.href = '/doctor';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
  }
</script> -->