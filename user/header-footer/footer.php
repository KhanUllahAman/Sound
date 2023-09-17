



 <div class="extra">
<footer>
  <div class="container-1">
      <div class="sec aboutus">
      <img class="logo-1" src="images/rhythm.png" alt="">
        <br><br>
      <p> Music affects how we think, feel and act.
It has the power to change us, to heal us, to connect us, to inspire, and to move us, among other things.
That's why it's so pervasive and used in almost every form of media.
Now, it's not all great and there are some negative aspects of the sound we hear around us, but that's what makes it so interesting and used in so many forms of media. </p>
          <ul class="sci">
              <li><a href=""><i class="text-light fa-brands fa-facebook"></i></a></li>
              <li><a href=""><i class="text-light fa-brands fa-twitter"></i></a></li>
              <li><a href=""><i class="text-light fa-brands fa-instagram"></i></a></li>
              <li><a href=""><i class="text-light fa-brands fa-youtube"></i></a></li>

          </ul>
      </div>
      <div class="sec quicklinks">
          <h2>Quick Links</h2>
          <ul>
              <li><a href="home.php">Home</a></li>
              <li><a href="songs.php">Songs</a></li>
              <li><a href="videos.php">Videos</a></li>
              <li><a href="album.php">Albums</a></li>
          </ul>
      </div>
      <div class="sec quicklinks">
        <h2>Categories</h2>
        <ul>
            <li><a href="artist.php">Artist</a></li>
            <li><a href="newsong.php">New Songs</a></li>
            <li><a href="newvideo.php">New Videos</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="setting.php">Setting</a></li>
        </ul>
    </div>
      
      <div class="sec contact">
          <h2>Contact Info</h2>
          <ul class="info">
              <li>
                  <span><i class="fa-solid fa-location-dot"></i></span>
                  <span>Aptech, Metro Star Gate, main Shahrahe Faisal, Karachi,<br> Pakistan</span>
                  </li>
              <li>
                  <span><i class="fa-solid fa-phone"></i></i></span>
                 <p><a href="tel:123456789">03406886905</a><br>
                  <!-- <a href="tel:123456789">03095247848</a></p> -->
              </li>
              <li>
                  <span><i class="fa-solid fa-envelope"></i></span>
                  <p><a href="mailto:rehmanabdul1445@gmail.com">rehmanabdul1445@gmail.com</a></p>
              </li>
          </ul>

      </div>
  </div>
</footer>
<div class="copyrighttext">
  <p>Copyright @ 2022 RHYTHM RANG. All Right Reserved</p>
</div>
</div>

 
 
 <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"
></script>

  </body>
</html>

<script>
   const panels = document.querySelectorAll(".panel");

panels.forEach((panel) => {
  panel.addEventListener("click", () => {
    removeActiveClasses(); // Add fuctions to remove active class first
    panel.classList.add("active");
  });
});

function removeActiveClasses() {
  panels.forEach((panel) => {
    panel.classList.remove("active");
  });
}
</script>