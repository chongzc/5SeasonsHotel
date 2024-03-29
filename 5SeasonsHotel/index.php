<!DOCTYPE html>
<html>
<head>
    <title>5 Seasons Hotel | Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" >
    <link rel="stylesheet" type="text/css" href="\5SeasonsHotel\homePage\homePageStyle.css">
    <link rel="stylesheet" href="footer.css">
    <style>
        .next-section {
            text-align: center;
            margin-top: 20px; /* Adjust as needed */
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .next-section img {
            max-width: 960px; 
            height: auto; 
            margin: 5px; 
        }
        
    </style>
</head>
<body>
    <?php include('includes/navigationMenu.php');?>

    <section>
        <div class="banner">
            <img src="\5SeasonsHotel\homePage\homePageImages\homePageBanner.png"> 
            <div class="homepageSlogan fade-in">
                <h1>WELCOME TO 5 SEASONS HOTEL</h1>
                <p>Elevate Your Stay,<br> Experience the Pinnacle of Luxury at 5 Seasons Hotel.</p>
                <div>
                    <a href="/5SeasonsHotel/gallery/index.php"> 
                        <button type="button"> <span> </span> LEARN MORE </button>
                    </a>

                    <a href="/5SeasonsHotel/bookNow/index.php"> 
                        <button type="button"> <span> </span> BOOK NOW </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="next-section">
        <div class="image-container">
            <img src="\5SeasonsHotel\gallery\galleryImages\IMG_15318.png">
            <img src="\5SeasonsHotel\gallery\galleryImages\IMG_20078.png" width="960" height="540">
        </div>
    </section>
    
    <?php include('includes/footer.php'); ?>
</body>
</html>
