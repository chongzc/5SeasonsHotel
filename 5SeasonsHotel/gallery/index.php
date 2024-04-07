<!DOCTYPE html>
<html>
  <head>
    <title>5 Seasons Hotel | Gallery</title>
    <link rel="stylesheet" href="galleryStyle.css" >
    
  </head>
  <body>
    <?php include('../includes/navigationMenu.php'); ?>
    <br>
      <div class="container">
        <div class="items">
          <div class="img" onclick="openPopup(this)">
            <img src="galleryImages/single.png" alt="Single Room">
            <div class="popup">
              <img src="galleryImages/single.png" alt="Single Room">
              <span class="close-btn" onclick="closePopup(this)">&times;</span>
            </div>
          </div>
          <div class="details">
              <p>Room: Single Room(2x Single bed)</p>
              <p>Price: RM 199</p>
              <p>Availability: 2 ppl</p>
          </div>
        </div>

        <div class="items">
          <div class="img" onclick="openPopup(this)">
            <img src="galleryImages/double.png" alt="Double Room">
            <div class="popup">
              <img src="galleryImages/double.png" alt="Double Room">
              <span class="close-btn" onclick="closePopup(this)">&times;</span>
            </div>
          </div>
          <div class="details">
              <p>Room: Double Room(1x King bed)</p>
              <p>Price: RM 209</p>
              <p>Availability: 2 ppl</p>
          </div>
        </div>

        <div class="items">
        <div class="img" onclick="openPopup(this)">
            <img src="galleryImages/twin.png" alt="Twin Room">
            <div class="popup">
              <img src="galleryImages/twin.png" alt="Twin Room">
              <span class="close-btn" onclick="closePopup(this)">&times;</span>
            </div>
          </div>
          <div class="details">
              <p>Room: Twin Room(2x King bed)</p>
              <p>Price: RM 259</p>
              <p>Availability: 4 ppl</p>
          </div>
        </div>

        <div class="items">
          <div class="img" onclick="openPopup(this)">
            <img src="galleryImages/deluxe.png" alt="Deluxe Room">
            <div class="popup">
              <img src="galleryImages/deluxe.png" alt="Deluxe Room">
              <span class="close-btn" onclick="closePopup(this)">&times;</span>
            </div>
          </div>
          <div class="details">
              <p>Room: Deluxe Room(1x King bed)</p>
              <p>Price: RM 229</p>
              <p>Availability: 2 ppl</p>
          </div>
        </div>

        <div class="items">
        <div class="img" onclick="openPopup(this)">
            <img src="galleryImages/connecting.png" alt="Connecting Room">
            <div class="popup">
              <img src="galleryImages/connecting.png" alt="Connecting Room">
              <span class="close-btn" onclick="closePopup(this)">&times;</span>
            </div>
          </div>
          <div class="details">
              <p>Room: Connecting Room(1x King bed, 2x Single bed)</p>
              <p>Price: RM 339</p>
              <p>Availability: 4 ppl</p>
          </div>
        </div>
      </div>

    <?php include('../includes/footer.php'); ?>

    <script>
    function openPopup(element) {
      var popup = element.querySelector('.popup');
      popup.style.display = 'block';
    }

    function closePopup(element) {
      var popup = element.parentElement;
      popup.style.display = 'none';
      event.stopPropagation();
    }
    </script>
  </body>
</html>
