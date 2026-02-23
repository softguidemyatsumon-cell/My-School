<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- css -->
  <link rel="stylesheet" href="style.css">
  <title>My School</title>
 
</head>
<body>

  <!-- Navbar -->
  <nav>
    <div class="logo">My School</div>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#courses">Courses</a></li>
      <li><a href="#teachers">Teachers</a></li>
      <li><a href="#testimonials">Testimonials</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <a class="sign-in-btn" href="./login.php">
        <i class="fa-solid fa-user-lock me-2"></i>Sign in
    </a>
  </nav>

  
  <!-- Home Section -->
    <div class="image-container" id="home">
      <img src="./images/school2.jpg" alt="School Classroom" class="hero-image">
      <div class="overlay-text">
        <h1>Welcome to My School</h1>
        <p>Explore our courses, meet our teachers, and read student testimonials!</p>
      </div>
    </div>
  <!-- Courses Section -->
  <section id="courses">
    <h2>Our Courses</h2>
    <div class="courses-container">
      <div class="course-card">
        <h3>Web Development</h3>
        <img src="./images/web development.jpg" alt="" style="width: 300px; height: 300px;">
        <p>HTML, CSS, Bootstrap, JavaScript, jQuery, PHP.</p>
      </div>
      <div class="course-card">
        <h3>Programming</h3>
        <img src="./images/programming.png" alt="" style="width: 300px; height: 300px;">
        <p>C++, C#, Java, Python.</p>
      </div>
      <div class="course-card">
        <h3>Graphic Design</h3>
        <img src="./images/graphic design.png" alt="" style="width: 300px; height: 300px;">
        <p>Master Photoshop, Illustrator and design beautiful graphics.</p>
      </div>
    </div>
  </section>

  <!-- Teachers Section -->
  <section id="teachers">
    <h2>Meet Our Teachers</h2>
    <div class="teachers-container">
      <div class="teacher-card">
        <img src="./images/teacher1.jpg" alt="Teacher 1">
        <h3>Jane Smith</h3>
        <p>Web Development Expert</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae, inventore unde perspiciatis pariatur molestias numquam nihil sed reiciendis natus assumenda!</p>
      </div>
      <div class="teacher-card">
        <img src="./images/teacher2.jpg" alt="Teacher 2">
        <h5>John Doe</h5>
        <p>C#</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae, inventore unde perspiciatis pariatur molestias numquam nihil sed reiciendis natus assumenda!</p>
      </div>
      <div class="teacher-card">
        <img src="./images/teacher3.avif" alt="Teacher 3">
        <h3>Julia</h3>
        <p>Java</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae, inventore unde perspiciatis pariatur molestias numquam nihil sed reiciendis natus assumenda!</p>
      </div>
      <div class="teacher-card">
        <img src="./images/teacher4.jpg" alt="Teacher 4">
        <h3>Cindy</h3>
        <p>Python</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae, inventore unde perspiciatis pariatur molestias numquam nihil sed reiciendis natus assumenda!</p>
      </div>
      <div class="teacher-card">
        <img src="./images/teacher5.jpg" alt="Teacher 5">
        <h3>Emily Johnson</h3>
        <p>Graphic Designer</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae, inventore unde perspiciatis pariatur molestias numquam nihil sed reiciendis natus assumenda!</p>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials">
    <h2>What Our Students Say</h2>
    <div class="testimonials-container">
      <div class="testimonial-card">
        <img src="./images/testimonial1.jpg" alt="">
        <p>"The courses are amazing! I learned so much in a short time."</p>
        <strong>Alex</strong>
      </div>
      <div class="testimonial-card">
        <img src="./images/testimonial2.jpg" alt="">
        <p>"The teachers are supportive and experienced."</p>
        <strong>Maria</strong>
      </div>
      <div class="testimonial-card">
        <img src="./images/testimonial3.jpg" alt="">
        <p>"I highly recommend EduWebsite for anyone wanting to upskill."</p>
        <strong>David</strong>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
   <section id="contact">
    <section class="location-section">
    <h2>Contact Us</h2>
    <div class="location-container">
      <div class="map">
        <form class="contact-form">
          <input type="text" placeholder="Name" required>
          <input type="email" placeholder="Email" required>
          <textarea rows="5" placeholder="Message" required></textarea>
          <button type="submit">Send Message</button>
        </form>
      </div>

        <div class="address">
            <iframe 
                src="https://maps.app.goo.gl/vXsJMLtuDKAQH7io8"
                width="100%" 
                height="300" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
            <h3>Our Address</h3>
            <p>Email: info@myschool.com</p>
            <p>Phone: +1 234 567 890</p>
            <p>Address:No(575B),Kamayut Township, Yangon , Myanmar</p>
        </div>   
  </section> 
</section>
<!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>My School</h3>
            <p>Empowering learners with practical skills and modern education.</p>
        </div>

        <div class="footer-section">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">Teachers</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Contact</h4>
            <p>Email: info@myschool.com</p>
            <p>Phone: +1 234 567 890</p>
            <p>Address:No(575B),Kamayut Township, Yangon , Myanmar</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2026 My School. All Rights Reserved.</p>
    </div>
</footer>


</body>
</html>

  
