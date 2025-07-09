<!DOCTYPE html>
<html lang="en">
<head>
    <title>LifeSaver Blood Bank System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #e63946;
            --secondary: #f1faee;
            --accent: #457b9d;
            --dark: #1d3557;
            --light: #a8dadc;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: var(--secondary);
            margin: 0;
            padding: 0;
        }
        
        .topnav {
            background-color: var(--dark);
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .topnav a {
            float: left;
            color: white;
            text-align: center;
            padding: 16px 20px;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        
        .topnav a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }
        
        .topnav a.active {
            background-color: var(--accent);
            font-weight: bold;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h1, h2 {
            color: var(--primary);
            text-align: center;
            margin-bottom: 20px;
        }
        
        h1 {
            font-size: 2.5rem;
            border-bottom: 3px solid var(--accent);
            display: inline-block;
            padding-bottom: 10px;
        }
        
        h2 {
            font-size: 2rem;
            margin-top: 40px;
        }
        
        .card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        
        .stats-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 30px 0;
        }
        
        .stat-box {
            background: var(--dark);
            color: white;
            border-radius: 10px;
            padding: 20px;
            width: 200px;
            text-align: center;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--light);
            margin: 10px 0;
        }
        
        .blood-types {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 30px 0;
        }
        
        .blood-type {
            width: 200px;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            text-align: center;
            color: white;
            font-weight: bold;
        }
        
        .type-a { background-color: #e63946; }
        .type-b { background-color: #457b9d; }
        .type-ab { background-color: #1d3557; }
        .type-o { background-color: #a8dadc; color: #333; }
        
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 40px auto;
        }
        
        .timeline-item {
            padding: 10px 40px;
            position: relative;
            background-color: white;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            left: -10px;
            background-color: var(--primary);
            border-radius: 50%;
            top: 20px;
        }
        
        .footer {
            background-color: var(--dark);
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
        
        .donate-btn {
            display: block;
            width: 200px;
            background-color: var(--primary);
            color: white;
            text-align: center;
            padding: 15px;
            margin: 30px auto;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .donate-btn:hover {
            background-color: #c1121f;
            transform: scale(1.05);
        }
        
        @media (max-width: 768px) {
            .stats-container, .blood-types {
                flex-direction: column;
                align-items: center;
            }
            
            .blood-type, .stat-box {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <div class="topnav">
        <a class="active" href="Home.php"><i class="fas fa-home"></i> Home</a>
        <a href="reg.php"><i class="fas fa-user-plus"></i> Register</a>
        <a href="search1.php"><i class="fas fa-search"></i> Search</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>

    <div class="container">
        <h1>Welcome to LifeSaver Blood Bank</h1>
        
        <div class="card">
            <p style="text-align: center; font-size: 1.2rem;">Every drop counts. Your donation can save up to <strong>3 lives</strong>.</p>
        </div>
        
        <a href="reg.php" class="donate-btn">Donate Now <i class="fas fa-heartbeat"></i></a>
        
        <div class="stats-container">
            <div class="stat-box">
                <div class="stat-number">1937</div>
                <p>First blood bank established in Chicago</p>
            </div>
            <div class="stat-box">
                <div class="stat-number">16M</div>
                <p>Blood donations collected annually in US</p>
            </div>
            <div class="stat-box">
                <div class="stat-number">1/7</div>
                <p>Hospital patients need blood</p>
            </div>
            <div class="stat-box">
                <div class="stat-number">2s</div>
                <p>Someone needs blood every 2 seconds</p>
            </div>
        </div>

        <h2><i class="fas fa-tint"></i> Understanding Blood Groups</h2>
        
        <div class="blood-types">
            <div class="blood-type type-a">
                <h3>Type A</h3>
                <p>Has A antigens, anti-B antibodies</p>
                <p>Can donate to A & AB</p>
            </div>
            <div class="blood-type type-b">
                <h3>Type B</h3>
                <p>Has B antigens, anti-A antibodies</p>
                <p>Can donate to B & AB</p>
            </div>
            <div class="blood-type type-ab">
                <h3>Type AB</h3>
                <p>Universal recipient</p>
                <p>Has both antigens, no antibodies</p>
            </div>
            <div class="blood-type type-o">
                <h3>Type O</h3>
                <p>Universal donor</p>
                <p>No antigens, both antibodies</p>
            </div>
        </div>

        <h2><i class="fas fa-history"></i> History of Blood Banking</h2>
        
        <div class="timeline">
            <div class="timeline-item">
                <h3>1937</h3>
                <p>The first hospital blood bank was established at Cook County Hospital in Chicago.</p>
            </div>
            <div class="timeline-item">
                <h3>1940</h3>
                <p>Dr. Charles Drew developed methods for processing and storing blood plasma.</p>
            </div>
            <div class="timeline-item">
                <h3>1971</h3>
                <p>Apheresis technology was introduced, allowing specific blood components to be collected.</p>
            </div>
        </div>

        <h2><i class="fas fa-ambulance"></i> Why Donate Blood?</h2>
        
        <div class="card">
            <p>A blood donation truly is a "gift of life" that a healthy individual can give to others in their community who are sick or injured. In one hour's time, a person can donate one unit of blood that can be separated into four individual components that could help save multiple lives.</p>
            
            <p><strong>Accident victims:</strong> A single car accident victim can require as many as <strong>100 units of blood</strong>. In the US alone, there are about 6 million car accidents annually, with 2.5 million people injured.</p>
            
            <p><strong>Cancer patients:</strong> Chemotherapy patients often need platelet transfusions. A single leukemia patient can require up to 8 units of blood per week.</p>
            
            <p><strong>Surgical patients:</strong> Open heart surgery can require 6 units of blood, while organ transplants may need 40 units or more.</p>
        </div>

        <h2><i class="fas fa-calendar-alt"></i> Donation Frequency</h2>
        
        <div class="card">
            <p><strong>Whole Blood:</strong> Can be donated every 56 days (about 6 times per year)</p>
            <p><strong>Platelets:</strong> Can be donated every 7 days, up to 24 times per year</p>
            <p><strong>Plasma:</strong> Can be donated every 28 days</p>
            <p><strong>Double Red Cells:</strong> Can be donated every 112 days</p>
            
            <p>The average adult has about 10 pints of blood in their body. A standard donation is 1 pint. Your body replaces the fluid within 24 hours and red cells in 4-6 weeks.</p>
        </div>
    </div>

    <div class="footer">
        <p>© LifeSaver Blood Bank System | Saving Lives One Donation at a Time</p>
        <p>Contact us: sumtimehta.01@gmail.com | Emergency: 1-800-BLOOD-911</p>
        <div style="margin-top: 10px;">
            <a href="#" style="color: white; margin: 0 10px;"><i class="fab fa-facebook-f"></i></a>
            <a href="#" style="color: white; margin: 0 10px;"><i class="fab fa-twitter"></i></a>
            <a href="#" style="color: white; margin: 0 10px;"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</body>
</html>
