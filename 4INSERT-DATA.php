<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            zoom: 1.5;
        }
        input {
            margin: 10px;
        }
        p {
            color: green;
            text-shadow: 0 0 12px green;
            position: absolute;
        }
        span {
            color: red;
            text-shadow: 0 0 12px red;
            position: absolute;
        }
        pre {
            margin-top: 40px;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.1);
            }
        }
        #submit {
            animation: pulse 1s alternate-reverse infinite;
            box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.3);
            padding: 7px 20px;
            background: #00458f;
            color: #fff;
            border-radius: 5px; 
            position: relative;
            top: 87%;
            left: 20%;
        }
    </style>
</head>
<body>
    <?php 
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        
        try {
            $con = new PDO("mysql:host=localhost;dbname=test", "SAMIR", "samir123");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $con->prepare("INSERT INTO data1(lastname, firstname, email) VALUES (:lastname, :firstname, :email)");
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            header("location:5_LAST-ID.php");
            echo "<p>* CONNECT ✅*</p>";
        } catch(PDOException $e) {
            echo "<span>* NOTE CONNECT ❌: " . $e->getMessage() . "</span>";
        }
    }
    ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <pre>
            
            lastname_: <input type="text" name="lastname">
            firstname: <input type="text" name="firstname">
            email____: <input type="email" name="email">

            <input type="submit" id="submit"> 
        </pre>
    </form>
</body>
</html>
