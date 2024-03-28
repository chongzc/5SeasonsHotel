<footer>
  <a href="#" class="back-to-top">Back to Top</a>
  <p>&copy; <?php echo date("Y"); ?> 5 Seasons Hotel</p>
  <address>
    5 Seasons Hotel<br>
    123 Main Street<br>
    Anytown, CA 12345<br>
    <a href="tel:+15551234567">(555) 123-4567</a><br>
    <a href="mailto:info@5seasonshotel.com">info@5seasonshotel.com</a>
  </address>
  <ul class="footer-links">
    <li><a href="/5SeasonsHotel/index.php">Home</a></li>
    <li><a href="/5SeasonsHotel/aboutUs/index.php">About Us</a></li>
    <li><a href="/5SeasonsHotel/contactUs/index.php">Contact Us</a></li>
    <li><a href="/5SeasonsHotel/services/index.php">Services</a></li>
  </ul>
  <ul class="social-media">
    <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
    <li><a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
    <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
  </ul>

  <script src="script.js"></script>

  <style>
  footer {
  
  left: 0;
  bottom: 0px;
  width: 100%;
  background-color: #333;
  color: #fff;
  padding: 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

footer a {
  text-decoration: none;
  color: #fff;
  margin: 0 10px;
  transition: all 0.3s ease;
}

footer a:hover {
  color: #ddd;
}

footer p {
  margin: 0;
}

footer address {
  margin: 0 20px;
}

footer ul {
  list-style: none;
  padding: 0;
}

footer ul li {
  display: inline-block;
  margin: 0 10px;
}

.social-media li {
  display: inline-block;
  margin: 0 5px;
}

.social-media a i {
  font-size: 20px;
}

.back-to-top {
  display: none;
}

@media (max-width: 768px) {
  footer {
    flex-direction: column;
    text-align: center;
  }

  footer address,
  footer ul {
    margin: 10px 0;
  }

  .back-to-top {
    display: block;
  }
}
  </style>
</footer>