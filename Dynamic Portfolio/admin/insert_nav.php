<!DOCTYPE html>
<html>
<head>
    <title>Insert Page</title>
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

        h1, h2, h3 {
            text-align: center;
            color: #001327;
            margin-bottom: 20px;
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

        .btn-success {
            display: block;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><b>INSERT PAGE</b></h1>
        <form action="controller.php" method="POST" enctype="multipart/form-data">
            <h3><b>Navbar One Data</b></h3>
            <div class="form-group">
                <label>Navbar One:</label>
                <input type="text" name="txtnavone" class="form-control">
            </div>  
            <h3><b>Navbar Two Data</b></h3>
            <div class="form-group">
                <label>Navbar Two:</label>
                <input type="text" name="txtnavtwo" class="form-control">
            </div>  
            <h3><b>Navbar Three Data</b></h3>
            <div class="form-group">
                <label>Navbar Three:</label>
                <input type="text" name="txtnavthree" class="form-control">
            </div>  
            <h3><b>Navbar Four Data</b></h3>
            <div class="form-group">
                <label>Navbar Four:</label>
                <input type="text" name="txtnavfour" class="form-control">
            </div>         
            <button type="submit" name="save_navbarport_content" class="btn btn-success">Save Portfolio</button>
        </form>
    </div>
</body>
</html>
