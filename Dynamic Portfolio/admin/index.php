<!DOCTYPE html>
<html>
<head>
    <title>Portfolio Table</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>

        body {
            font-family: 'Century Gothic', Arial, sans-serif;
            background: url('images/bgg.png') no-repeat center center fixed;
            background-size: cover;
            padding-top: 50px;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #001327;
        }

        .btn {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #001327;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e2e6ea;
        }

        .btn-primary {
            background-color: #001327;
            border-color: #001327;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Portfolio Table</h1>

        <!-- Portfolio Content Table -->
        <table class="table">
            <h2>Navbar Content Table</h2>
            <a href="insert_nav.php" class="btn btn-info">Insert Data</a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Navbar One</th>
                    <th>Navbar Two</th>
                    <th>Navbar Three</th>
                    <th>Navbar Four</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("includes/sqlconnection.php");
                $sql = "SELECT * FROM navbarport";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['navone']."</td>";
                        echo "<td>".$row['navtwo']."</td>";
                        echo "<td>".$row['navthree']."</td>";
                        echo "<td>".$row['navfour']."</td>";
                        echo "<td>
                                <a href='edit_nav.php?id=".$row['id']."' class='btn btn-primary'>Edit</a>
                                <a href='controller.php?table=navbarport&id=".$row['id']."' class='btn btn-danger'>Delete</a>
                              </td>";
                        echo "</tr>"; 
                    }
                } else {
                    echo "<tr><td colspan='11'>No records found</td></tr>"; 
                }
                $conn->close(); ?>
            </tbody>
        </table>   

        <br><br>

        <table class="table">
            <h2>Body Content Table</h2>
            <a href="insert_data.php" class="btn btn-info">Insert Data</a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Owner</th>
                    <th>Description</th>
                    <th>Skills</th>
                    <th>Pic</th>
                    <th>Multi Pic</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("includes/sqlconnection.php");
                $sql = "SELECT * FROM dynamicport";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['firstData']."</td>";
                        echo "<td>".$row['firstdesc']."</td>";
                        echo "<td>".$row['skilldata']."</td>";
                        echo "<td>".$row['pic']."</td>";
                        echo "<td>".$row['multiPic']."</td>";
                        echo "<td>
                                <a href='edit_data.php?id=".$row['id']."' class='btn btn-primary'>Edit</a>
                                <a href='controller.php?table=dynamicport&id=".$row['id']."' class='btn btn-danger'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No records found</td></tr>"; 
                }
                $conn->close(); ?>
            </tbody>
        </table>
        <a href="../index.php" class="btn btn-success">View Portfolio</a>
    </div>
</body>
</html>
