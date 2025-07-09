<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration | LifeBlood</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --blood-red: #c00;
            --dark-red: #900;
            --light-red: #fdd;
            --white: #fff;
            --black: #222;
            --gray: #f5f5f5;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--gray);
            color: var(--black);
        }
        
        .topnav {
            background-color: var(--blood-red);
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            background-color: var(--dark-red);
        }
        
        .topnav a.active {
            background-color: var(--dark-red);
            font-weight: bold;
        }
        
        .registration-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: var(--blood-red);
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid var(--light-red);
            padding-bottom: 10px;
        }
        
        .registration-form {
            width: 100%;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-red);
            font-size: 18px;
        }
        
        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus, 
        .form-group select:focus {
            border-color: var(--blood-red);
            outline: none;
            box-shadow: 0 0 5px rgba(200,0,0,0.2);
        }
        
        .submit-btn {
            background-color: var(--blood-red);
            color: var(--white);
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            font-weight: 600;
        }
        
        .submit-btn:hover {
            background-color: var(--dark-red);
            transform: translateY(-2px);
        }
        
        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            text-align: center;
            font-weight: 500;
        }
        
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .required:after {
            content: " *";
            color: var(--blood-red);
        }
        
        .blood-drop {
            color: var(--blood-red);
            margin-right: 5px;
        }
        
        @media (max-width: 768px) {
            .registration-container {
                padding: 20px;
                margin: 20px 15px;
            }
            
            .topnav a {
                padding: 12px 15px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="topnav">
        <a class="active" href="Home.php"><i class="fas fa-home"></i> Home</a>
        <a class="active" href="reg.php"><i class="fas fa-user-plus"></i> Register</a>
        <a href="search1.php"><i class="fas fa-search"></i> Search</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>

    <div class="registration-container">
        <h1><i class="fas fa-tint blood-drop"></i> Donor Registration</h1>
        
        <?php
        include "connection.php";
        
        if($_SERVER['REQUEST_METHOD']=='POST') {
            // Sanitize and validate input
            $inEmail = mysqli_real_escape_string($conn, $_POST["email"]);
            $inName = mysqli_real_escape_string($conn, $_POST["name"]);
            $inMob = mysqli_real_escape_string($conn, $_POST["phn"]);
            $inCity = mysqli_real_escape_string($conn, $_POST["city"]);
            $inBg = mysqli_real_escape_string($conn, $_POST["bgroup"]);
            
            // Basic validation
            $errors = [];
            if(empty($inEmail)) $errors[] = "Email is required";
            if(empty($inName)) $errors[] = "Name is required";
            if(empty($inMob)) $errors[] = "Mobile number is required";
            if(empty($inBg)) $errors[] = "Blood group is required";
            
            if(!filter_var($inEmail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }
            
            if(!preg_match('/^[0-9]{10}$/', $inMob)) {
                $errors[] = "Mobile number must be 10 digits";
            }
            
            if(count($errors) === 0) {
                $sql = "INSERT INTO register (email, name, mobile, city, blood_group) 
                        VALUES (?, ?, ?, ?, ?)";
                
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sssss", $inEmail, $inName, $inMob, $inCity, $inBg);
                
                if(mysqli_stmt_execute($stmt)) {
                    echo '<div class="message success">
                            <i class="fas fa-check-circle"></i> Thank you for registering as a blood donor! A representative will contact you soon.
                          </div>';
                } else {
                    echo '<div class="message error">
                            <i class="fas fa-exclamation-circle"></i> Error: ' . mysqli_error($conn) . '
                          </div>';
                }
                mysqli_stmt_close($stmt);
            } else {
                echo '<div class="message error">
                        <i class="fas fa-exclamation-circle"></i> ' . implode("<br>", $errors) . '
                      </div>';
            }
            mysqli_close($conn);
        }
        ?>
        
        <form class="registration-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="email" class="required"><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            
            <div class="form-group">
                <label for="name" class="required"><i class="fas fa-user"></i> Full Name</label>
                <input type="text" id="name" name="name" required placeholder="Enter your full name">
            </div>
            
            <div class="form-group">
                <label for="phn" class="required"><i class="fas fa-mobile-alt"></i> Mobile Number</label>
                <input type="tel" id="phn" name="phn" required placeholder="Enter 10-digit mobile number" pattern="[0-9]{10}">
            </div>
            
            <div class="form-group">
                <label for="city"><i class="fas fa-city"></i> City</label>
                <select id="city" name="city">
                    <option value="Jabalpur">Jabalpur</option>
                    <option value="Bhopal">Bhopal</option>
                    <option value="Indore">Indore</option>
                    <option value="Gwalior">Gwalior</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="bgroup" class="required"><i class="fas fa-tint"></i> Blood Group</label>
                <select id="bgroup" name="bgroup" required>
                    <option value="">Select your blood group</option>
                    <option value="O+">O+</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="O-">O-</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            
            <button type="submit" name="b1" class="submit-btn">
                <i class="fas fa-save"></i> Register as Donor
            </button>
        </form>
    </div>

    <script>
        // Client-side validation
        document.querySelector('form').addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = document.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if(!field.value.trim()) {
                    field.style.borderColor = 'var(--blood-red)';
                    isValid = false;
                } else {
                    field.style.borderColor = '#ddd';
                }
            });
            
            // Validate mobile number format
            const mobileField = document.getElementById('phn');
            if(mobileField && !/^[0-9]{10}$/.test(mobileField.value)) {
                mobileField.style.borderColor = 'var(--blood-red)';
                isValid = false;
            }
            
            if(!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields correctly');
            }
        });
    </script>
</body>
</html>
