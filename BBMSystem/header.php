<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeBlood Donation System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --blood-red: #c00;
            --dark-red: #900;
            --light-red: #fdd;
            --white: #fff;
            --black: #222;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        
        #page {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        #header {
            background-color: var(--blood-red);
            padding: 0 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        
        #header:hover {
            background-color: var(--dark-red);
        }
        
        #header > div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }
        
        .logo {
            height: 60px;
            transition: transform 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .logo img {
            height: 100%;
            width: auto;
        }
        
        #navigation {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        #navigation li {
            position: relative;
            margin-left: 15px;
        }
        
        #navigation li a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 4px;
            display: block;
            transition: all 0.3s ease;
            position: relative;
        }
        
        #navigation li a:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--white);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        #navigation li a:hover:after {
            width: 80%;
        }
        
        #navigation li.selected a {
            background-color: rgba(255,255,255,0.2);
        }
        
        #navigation li.selected a:after {
            width: 80%;
        }
        
        .menu ul {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: var(--white);
            list-style: none;
            padding: 0;
            margin: 0;
            width: 200px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 0 0 4px 4px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            transform: translateY(10px);
        }
        
        .menu:hover ul {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .menu ul li a {
            color: var(--black);
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        
        .menu ul li a:hover {
            background-color: var(--light-red);
            color: var(--dark-red);
        }
        
        .menu ul li:last-child a {
            border-bottom: none;
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(255,0,0,0.4); }
            70% { box-shadow: 0 0 0 10px rgba(255,0,0,0); }
            100% { box-shadow: 0 0 0 0 rgba(255,0,0,0); }
        }
        
        .donate-btn {
            background-color: var(--white);
            color: var(--blood-red) !important;
            font-weight: bold;
            padding: 10px 20px !important;
            border-radius: 50px;
            margin-left: 10px;
            animation: pulse 2s infinite;
        }
        
        .donate-btn:hover {
            background-color: var(--light-red) !important;
        }
        
        .mobile-menu-btn {
            display: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
        
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }
            
            #navigation {
                position: fixed;
                top: 80px;
                left: 0;
                width: 100%;
                background-color: var(--dark-red);
                flex-direction: column;
                padding: 20px 0;
                transform: translateY(-150%);
                transition: transform 0.3s ease;
            }
            
            #navigation.active {
                transform: translateY(0);
            }
            
            #navigation li {
                margin: 0;
            }
            
            #navigation li a {
                padding: 15px 20px;
            }
            
            .menu ul {
                position: static;
                width: 100%;
                box-shadow: none;
                border-radius: 0;
                display: none;
            }
            
            .menu:hover ul {
                display: block;
            }
        }
    </style>
</head>
<body>
    <div id="page">
        <div id="header">
            <div>
                <a href="index.html" class="logo"><img src="images/logo.png" alt="LifeBlood Logo"></a>
                <div class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
                <ul id="navigation">
                    <li class="selected">
                        <a href="index.html"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="about.html"><i class="fas fa-info-circle"></i> About</a>
                    </li>
                    <li class="menu">
                        <a href="projects.html"><i class="fas fa-project-diagram"></i> Projects <i class="fas fa-chevron-down"></i></a>
                        <ul class="primary">
                            <li>
                                <a href="proj1.html">Blood Drive 2025</a>
                            </li>
                            <li>
                                <a href="proj2.html">Community Outreach</a>
                            </li>
                            <li>
                                <a href="proj3.html">Mobile Donation Units</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="blog.html"><i class="fas fa-newspaper"></i> Blog <i class="fas fa-chevron-down"></i></a>
                        <ul class="secondary">
                            <li>
                                <a href="singlepost.html">Success Stories</a>
                            </li>
                            <li>
                                <a href="news.html">Latest News</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html"><i class="fas fa-envelope"></i> Contact</a>
                    </li>
                    <li>
                        <a href="donate.html" class="donate-btn"><i class="fas fa-tint"></i> Donate Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('navigation').classList.toggle('active');
        });
        
        // Add active class to current page
        const currentPage = window.location.pathname.split('/').pop();
        const navLinks = document.querySelectorAll('#navigation li a');
        
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPage) {
                link.parentElement.classList.add('selected');
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
