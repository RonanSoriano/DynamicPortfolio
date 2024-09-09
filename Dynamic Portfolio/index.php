    <!DOCTYPE html>
    <html>
    <head>
        <title>Dynamic Portfolio</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <style>
            body {
                font-family: 'Century Gothic', 'Open Sans', sans-serif;
                font-weight: bold;
                background-color: #E9E2C3;
            }

            a, input, h1 {
                font-weight: bold;
            }

            .cl_white{
                    color: white;
            }

            .navbar-nav > li > a {
                padding: 15px 20px; /* Adjust padding here */
                color: white !important;
            }

            .navbar-nav > li:hover > a {
                background-color: #1a1a1a;
            }

            .navbar-nav > li.active > a {
                background-color: #1a1a1a;
            }


            img{
                width:300px;
                transition: opacity 1s ease-in-out;
            }

            .cl_black{
                    color: black;
            }

            .navbar {
                background-color: #292929;
            }

            html {
                scroll-behavior: smooth;
            }

            section {
                width: 100vw;
                height: auto;
                min-height: 100vh;
                padding: 50px 0;

            }

            .img-thumbnail {
                width: 600px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 20px;
                border: none;
                cursor: pointer;
                transition: transform 0.2s;
            }

            .img-thumbnail:hover {
                transform: scale(1.05);
                opacity: .10;
            }

            .col-text{
                -webkit-column-count: 3;
                column-count: 3;
                }

        </style>
    </head>
    <body data-spy="scroll" data-target=".navbar">

    <?php
        include("admin/includes/sqlconnection.php");

        $sql = "SELECT * FROM idtbl id1
                LEFT JOIN dynamicport dnp ON id1.id = dnp.id
                LEFT JOIN navbarport nbp ON id1.id = nbp.id"; 

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Arrays to store values
            $firstDataArr = [];
            $secondDataArr = [];
            $thirdDataArr = [];
            $navOneDataArr = [];
            $navTwoDataArr = [];
            $navThreeDataArr = [];
            $navFourDataArr = [];
            $onePicArr = [];
            $multiPicArr = [];

            while ($row = $result->fetch_assoc()) {
                $firstDataArr[]= $row['firstData'];
                $secondDataArr[] = $row['firstdesc'];
                $thirdDataArr[] = $row['skilldata'];
                $navOneDataArr[] = $row['navone'];
                $navTwoDataArr[] = $row['navtwo'];
                $navThreeDataArr[] = $row['navthree'];
                $navFourDataArr[] = $row['navfour'];
                $onePicArr[] = $row['pic'];
                $multiPicArr[] = $row['multiPic'];
                
            }

            echo "
            <nav class='navbar navbar-inverse navbar-fixed-top' style='padding-right: 15px'>
            <nav class='navbar-header' style='padding-left: 10px'>
        
            <a class='navbar-brand'>";
            foreach ($firstDataArr as $firstData) {
                echo "$firstData";
            }

            echo "
            </a>
            </nav>";
            
            echo " 
            <ul class='nav navbar-nav navbar-right'>
            <li><a href='#home'>";
            foreach ($navOneDataArr as $navOne) {
                echo "$navOne";
            }
            echo "
            </a></li>
            <li><a href='#work'>";
            foreach ($navTwoDataArr as $navTwo) {
                echo "$navTwo";
            }
            echo "</a></li>
            <li><a href='#about'>";
            foreach ($navThreeDataArr as $navThree) {
                echo "$navThree";
            }
            echo "</a></li>
            <li><a href='#contact'>";
            foreach ($navFourDataArr as $navFour) {
                echo "$navFour";
            }
            echo "</a></li>
        </ul>

            </nav>";

                echo "
                <!-- ONE PIC -->
                <section id='home' class='jumbotron text-center' style='background: url(images/headerr.png); background-size: 100% 100%;' >
                    <div class='container'>
                    <br>";
                    foreach ($onePicArr as $onePic) {
                        if ($onePic !== null && !empty($onePic)) {
                            echo "<img src='admin/uploads/$onePic' class='img-circle center-block' width='500px'> ";
                        }
                    }
                    echo"</p>
                    <div style='text-align: center;' class='cl_white'>
                    <br>
                    <h1>OBJECTIVES</h1>
                    </div>
                    <div class='text-container'>";
                    
                    foreach ($secondDataArr as $secondData) {
                        echo "<p class='secondData lead cl_white'>$secondData</p>";
                    }
                    echo "<br>";

                    echo "
                    </div>
                </section>";
                // Existing code
                echo "
                <!-- MULTI PICS -->
                <section id='work' class='container' style='color: #333;'>
                <div class='page-header'>
                    <h1 class='text-center'>My Work</h1>
                </div>";
                
                // Loop through each row
                foreach ($multiPicArr as $multiPic) {
                    // Check if $multiPic is not null
                    if ($multiPic !== null && !empty($multiPic)) {
                        // Explode the images string into an array
                        $images = explode(",", $multiPic);

                        // Loop through the images array and display them
                        foreach ($images as $image) {
                            echo "<img src='admin/uploads/$image' class='img-thumbnail' alt='Image'/>";
                        }
                    }
                }

                echo "
                    </div>
                </section>";

                echo "
                <section id='about' class='container' style='color: #333;'>
                <div class='page-header'>
                    <h1 class='text-center'>My Skills</h1>
                </div>
                    <div class='text-container col-text'>";

                    foreach ($thirdDataArr as $thirdData) {
                        echo "<p class='thirdData lead cl_black'>$thirdData</p>";
                    }
                    echo "<br>";
                    echo "
                    </div>
                    </br>
                
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class='panel panel-primary'>
                                <div class='panel-heading'>
                                    <h4>PHP Programmer</h4>
                                </div>
                                <div class='panel-body'>
                                    <img src='images/port.jpg' class='img-circle center-block'>
                                    <br>
                                    <p class='lead text-center'>I Do PHP Programming</p>
                                </div>
                                <div class='panel-footer'>
                
                                </div>
                
                            </div>
                
                        </div>
                        <div class='col-md-6'>
                            <div class='panel panel-primary'>
                                <div class='panel-heading'>
                                    <h4>Game Developer</h4>
                                </div>
                                <div class='panel-body'>
                                    <img src='images/port3.jpg' class='img-circle center-block'>
                                    <br>
                                    <p class='lead text-center'>I Am Senior Game Developer in Riot Games</p>
                                </div>
                                <div class='panel-footer'>
                
                                </div>
                
                            </div>
                
                        </div>
                
                    </div>
                </section>";

                echo "
                <section id='contact' style='background: url(images/bgg.png); background-size: 100% 100%;'>
                        <h1 class='text-center cl_white'>Contact Me</h1>
                        <br><br>
                    <form class='col-md-6 col-md-offset-3'>
                        <div class='form-group'>
                            <input class='form-control' placeholder='Enter Your Name' type='text'></input>
                        </div>
                        <div class='form-group'>
                            <input class='form-control' placeholder='Enter Your E-mail' type='email'></input>
                        </div>
                        <div class='form-group'>
                            <input class='form-control' placeholder='Subject' type='text'></input>
                        </div>
                        <div class='form-group'>
                            <textarea class='form-control' rows='10'>Comments</textarea>
                        </div>
                        <div class='form-group'>
                            <input class='btn btn-success btn-block' type='submit'></input>
                        </div>
                    </form>
                </section>";
                
                
        } else {
            echo "No records found";
        }
        $conn->close();
    ?>
    </body>
    </html>