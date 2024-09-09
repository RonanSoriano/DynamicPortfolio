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
            <button type="submit" class="btn btn-primary" name="update_dynamicport_content">Update Portfolio</button>
        </form>
    </div>
</body>
</html>

<?php
    function getTableById($recno) {
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM dynamicport WHERE id='$recno'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                    <input type='hidden' name='txtid' value='".$row['id']."'>
                    <div class='form-group'>
                        <label>Logo Name:</label>
                        <input type='text' name='txtdata' class='form-control' value='".$row['firstData']."'>
                    </div>
                    <div class='form-group'>
                        <label>Objective:</label>
                        <input type='text' name='txtfirstdesc' class='form-control' value='".$row['firstdesc']."'>
                    </div>      
                    <div class='form-group'>
                        <label>Skills Data:</label>
                        <input type='text' name='txtskilldata' class='form-control' value='".$row['skilldata']."'>
                    </div>       
                    <input type='hidden' name='txtid' value='".$row['id']."'>
                    <div class='form-group'>
                        <label>Formal Picture:</label>
                        <input type='file' name='txtonePic'>";
                        if ($row['pic'] !== null && !empty($row['pic'])) {
                            echo "<img src='uploads/".$row['pic']."' width='200'>";
                        }
                        echo"
                    </div>
                    <div class='form-group'>
                        <label>Multi Pics: </label>
                        <input type='file' name='txtmultiPic[]' multiple>";
                        $multiPic = explode(',', $row['multiPic']);
                        foreach ($multiPic as $image) {
                            if ($image !== null && !empty($image)) {
                                echo "<img src='uploads/".$image."' class='img-thumbnail' alt='Image' style='width: 200px;'>";
                            }
                        }
                        echo "
                    </div>
                    ";
            }
        } else {
            echo "no record found";
        }

        $conn->close();
    }
?>
