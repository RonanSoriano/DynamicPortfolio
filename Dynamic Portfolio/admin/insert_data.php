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
            <h3><b>First Data Page</b></h3>
            <!-- FIRST INPUT -->
            <div class="form-group">
                <label>Name of Portfolio:</label>
                <input type="text" name="txtdata" class="form-control">
            </div>
            <!-- SECOND INPUT -->
            <h3><b>Objective Data</b></h3>
            <div class="form-group">
                <label>Objective:</label>
                <input type="text" name="txtfirstdesc" class="form-control">
            </div>    
            <!-- THIRD INPUT -->
            <h3><b>Skills Data</b></h3>
            <div class="form-group">
                <label>Skills:</label>
                <input type="text" name="txtskilldata" class="form-control">
            </div>
            <h2><b>Formal Picture Data</b></h2>
            <!-- FOURTH INPUT -->
            <div class="form-group">
                <label>Formal Picture:</label>
                <input type="file" name="txtonePic">
            </div>

            <br>
            <br>
            <h2><b>Work Pictures Data</b></h2>
            <!-- FOURTH INPUT -->
            <div class="form-group">
                <label>Work Pictures: </label>
                <input type="file" name="txtmultiPic[]" multiple>
            </div>
            <button type="submit" name="save_dynamicport_content" class="btn btn-success">Save Portfolio</button>
        </form>
    </div>
</body>
</html>
