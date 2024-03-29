<div class="navigationMenu">
        <div>
            <img class="logo" src="\5SeasonsHotel\includes\includesImages\navigationMenuImages\logo.png" alt="logo">
        </div>
        <div class="menuItems">
            <nav>
                <ul>
                    <li><a href="/5SeasonsHotel/">Home</a></li>
                    <li><a href="/5SeasonsHotel/Gallery/index.php">Gallery</a></li>
                    <li><a href="/5SeasonsHotel/contactUs/index.php">Contact Us</a></li>
                    <li><a href="/5SeasonsHotel/bookNow">Book Now</a></li>
                    <li class="profileLink">
                        <a href="/5SeasonsHotel/cart">
                            <img src="\5SeasonsHotel\includes\includesImages\navigationMenuImages\profile-user.png" alt="Profile" width="40" style="height: 40px">
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <button class="menu-toggle" onclick="toggleMenu()">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
            </svg>
        </button>
    </div>

    <div class="sidebar" onclick="toggleMenu()">
        <nav>
            <ul>
                <li><a href="/5SeasonsHotel/">HOME</a></li>
                <li><a href="/5SeasonsHotel/Gallery/index.php">GALLERY</a></li>
                <li><a href="/5SeasonsHotel/contactUs/index.php">CONTACT USs</a></li>
                <li><a href="/5SeasonsHotel/bookNow">BOOK NOW</a></li>
                <li><a href="/5SeasonsHotel/profile">PROFILE</a></li>
            </ul>
        </nav>
    </div>



<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.navigationMenu, .navigationMenu ul, .navigationMenu ul li, .navigationMenu ul li a {
    font-family: sans-serif;
    font-size: 14px;
    font-weight: bold;
}

.navigationMenu {
    width: 100%;
    height: 100px;
    margin-top: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #876;
}

.navigationMenu img {
    max-width: 100px;
    height: 100px;
    display: block;
    margin-left: 20px;
    margin-top: 5px;
    margin-bottom: 5px;
}

.navigationMenu ul {
    display: flex;
    align-items: center;
}

.navigationMenu ul li {
    list-style: none;
    margin: 0 20px;
    position: relative;
    display: flex; /* Use flexbox for horizontal alignment */
    align-items: center; /* Vertically center items */
}

.navigationMenu ul li a {
    text-decoration: none;
    color: #fff;
    text-transform: uppercase;
    font-family: Arial, sans-serif;
    display: inline-block;
    padding: 10px 0; /* Add padding to create vertical space */
    height: 100%; /* Fill the height of the parent */
}

.menu-toggle {
    display: none; /* Initially hide the button on screens wider than 700px */
}

@media (max-width: 700px) {
    .navigationMenu .menuItems nav ul {
        display: none;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%; /* Modified to cover the entire page */
        height: 100vh;
        background-color: #887766; /* Modified sidebar background color */
        transition: transform 0.3s ease-in-out;
        z-index: 2;
        display: flex; /* Use flexbox for centering */
        justify-content: center; /* Center content horizontally */
        align-items: center; /* Center content vertically */
        overflow-x: hidden; /* Ensure horizontal scrollbars are hidden */
    }

    .sidebar nav {
        text-align: center; /* Center text inside nav */
    }

    .sidebar nav ul {
        padding: 0; /* Remove default padding */
    }

    .sidebar nav ul li {
        list-style: none; /* Remove list bullets */
        margin-bottom: 10px; /* Add margin between links */
    }

    .menu-toggle {
        display: block; /* Show the button on screens less than or equal to 700px */
        background-color: #876;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
}

.sidebar {
    display: none; /* Initially hide the sidebar on screens wider than 700px */
}

.sidebar.show {
    display: flex; /* Show the sidebar when toggled */
}

.sidebar nav ul li a {
        color: white; /* Set text color to white */
        text-decoration: none; /* Remove underline from links */
        padding: 10px; /* Add padding for better spacing */
        display: block; /* Make links block-level for full width */
}




</style>


<script>
        function toggleMenu() {
            var sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('show');
        }
    </script>



