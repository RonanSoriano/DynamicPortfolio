<!DOCTYPE html>
<head>
    <title>Edit Portfolio</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <style>
        body {
            font-family: 'Century Gothic', Arial, sans-serif;
            background: url('images/bgg.png');
            background-size: cover;
            background-position: center;
            padding-top: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #001327;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="file"] {
            cursor: pointer;
        }
        img {
            margin-top: 10px;
            display: block;
            max-width: 100%;
            height: auto;
        }
        .btn-primary {
            display: block;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Portfolio</h1>
        <form action="controller.php" method="POST" enctype="multipart/form-data">
            <?php 
                getTableById($_GET['id']);
            ?>
            <button type="submit" class="btn btn-primary" name="update_navbarport_content">Update Portfolio</button>
        </form>
    </div>
</body>
</html>

<?php
    function getTableById($recno) {
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM navbarport WHERE id='$recno'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                    <input type='hidden' name='txtid' value='".$row['id']."'>
                    <div class='form-group'>
                        <label>Navbar One:</label>
                        <input type='text' name='txtnavone' class='form-control' value='".$row['navone']."'>
                    </div>  
                    <div class='form-group'>
                        <label>Navbar Two:</label>
                        <input type='text' name='txtnavtwo' class='form-control' value='".$row['navtwo']."'>
                    </div>  
                    <div class='form-group'>
                        <label>Navbar Three:</label>
                        <input type='text' name='txtnavthree' class='form-control' value='".$row['navthree']."'>
                    </div>  
                    <div class='form-group'>
                        <label>Navbar Four:</label>
                        <input type='text' name='txtnavfour' class='form-control' value='".$row['navfour']."'>
                    </div>                 
                    ";
            }
        } else {
            echo "no record found";
        }

        $conn->close();
    }
?>
