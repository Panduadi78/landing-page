<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pandu - Landing Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
            <nav class="navbar">
                <div class="logo">Pandu</div>
                <ul class="nav-links left">
                    <li><a href="#home" class="nav-item">Home</a></li>
                    <li><a href="#about" class="nav-item">About</a></li>
                    <li><a href="#services" class="nav-item">Services</a></li>
                    <li><a href="#contact" class="nav-item">Contact</a></li>
                </ul>
            <ul class="nav-links right">
                <?php if(isset($_SESSION['username'])): ?>
                    <li><a href="logout.php" class="nav-item">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php" class="nav-item">Login</a></li>
                    <li><a href="signup.php" class="nav-item">Signup</a></li>
                <?php endif; ?>
            </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>            
        </nav>
    </header>

    <section id="home" class="hero-section">
        <div class="hero-content">
            <h1>
                <?php 
                if (isset($_SESSION['username'])) {
                    echo "Welcome, " . $_SESSION['username'];
                } else {
                    echo "welcome to website";
                }
                ?>
            </h1>
            <p>Explore the amazing journey with us!</p>
            <a href="#about" class="cta-btn">Get Started</a>
        </div>
    </section>

    <section id="about" class="about-section">
        <div class="container">
            <h2>About Us</h2>
            <div class="about-grid">
                <div class="about-item" id="sd">
                    <img src="image/image.png" alt="Vision Image" class="toggle-info">
                    <h3 class="toggle-info">Bina Nurul Haq</h3>
                    <div class="extra-info">
                        <p>Saya sd di sdit bina nurul haq bekasi. Berlokasi di Jl. Perum Villa Indah Permai No.26 Blok E, RT.009/RW.033, 
                            Teluk Pucung, Bekasi Utara, Bekasi, West Java 17121</p>
                    </div>
                </div>
                <div class="about-item" id="smp">
                    <img src="image/image copy 2.png" alt="Mission Image" class="toggle-info">
                    <h3 class="toggle-info">21 Kota Bekasi</h3>
                    <div class="extra-info">
                        <p>Kemudian saya lanjut ke jenjang smp di smpn 21 kota bekasi. Berlokasi di Jl. Perum Villa Indah Permai Jl. Banteng Blok H23, 
                            Tlk. Pucung, Kec. Bekasi Utara, Kota Bks, Jawa Barat 17121</p>
                    </div>
                </div>

                <div class="about-item" id="smk">
                    <img src="image/image copy.png" alt="Our Story Image"class="toggle-info">
                    <h3 class="toggle-info">Taruna Bangsa</h3>
                    <div class="extra-info">
                        <p>Dan sekarang saya sekolah di smk taruna bangsa mengambil jurusan rpl(rekayasa perangkat lunak).
                            Berlokasi di Jl. Kali Abang Tengah, Perwira, Kec. Bekasi Utara, Kota Bks, Jawa Barat 17122
                        </p>
                    </div>
                </div>
                <div class="about-item" id="K/j">
                    <img src="image/image copy 3.png" alt="Values Image"class="toggle-info">
                    <h3 class="toggle-info">Kerja Atau Kuliah?</h3>
                    <div class="extra-info">
                        <p>Penjelasan lebih lanjut mengenai masa k or j saya...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="services-section">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service-cards">
                <div class="card">
                    <i class="fas fa-code card-icon"></i>
                    <h3>Web Development</h3>
                    <p>We create high-performing and visually stunning websites tailored to your needs.</p>
                </div>
                <div class="card">
                    <i class="fas fa-mobile-alt card-icon"></i>
                    <h3>Mobile App</h3>
                    <p>Our mobile apps are designed to provide a seamless experience across devices.</p>
                </div>
                <div class="card">
                    <i class="fas fa-paint-brush card-icon"></i>
                    <h3>Branding</h3>
                    <p>We help you establish a strong brand identity that resonates with your audience.</p>
                </div>
            </div>
        </div>
    </section>
<!-- footer -->
<footer id="contact">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section about">
                <h2>Pandu</h2>
                <p>Thank you for visiting my website. Actually the website is still under development. I will accept any input you give me.</p>
            </div>

            <div class="footer-section links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>
                </ul>
            </div>
            <div class="footer-section feedback">
                <h2>Feedback</h2>
                <p>Enter this website to make it better in the future:</p>
                <form action="progres_feedback.php" method="POST">
                    <textarea name="feedback" rows="4" placeholder="Enter what you want" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        </div>
            <div class="footer-section social">
                <h2>Follow Us</h2>
                <div class="social-icons">
                    <a href="https://www.tiktok.com/@_p4nduuuu"><i class="fab fa-tiktok"></i></a>
                    <a href="https://www.instagram.com/p4nduuuuu_/?hl=en"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 Pandu | All Rights Reserved</p>
        </div>
    </div>
</footer>
    <script src="script.js"></script>
</body>
</html>
