  <?php
  require "./layout/header.php";
  ?>
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
      </div>
      <div class="teacher-card">
        <img src="./images/teacher2.jpg" alt="Teacher 2">
        <h3>John Doe</h3>
        <p>C#</p>
      </div>
      <div class="teacher-card">
        <img src="./images/teacher3.png" alt="Teacher 3">
        <h3>Julia</h3>
        <p>Java</p>
      </div>
      <div class="teacher-card">
        <img src="./images/teacher4.jpg" alt="Teacher 4">
        <h3>Cindy</h3>
        <p>Python</p>
      </div>
      <div class="teacher-card">
        <img src="./images/teacher5.jpg" alt="Teacher 5">
        <h3>Emily Johnson</h3>
        <p>Graphic Designer</p>
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
<?php
require "./layout/footer.php";
?>

  
