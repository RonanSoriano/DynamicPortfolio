<?php
	session_start();
	include("includes/sqlconnection.php");

	if(isset($_POST['save_navbarport_content'])){
		$navone = $_POST['txtnavone'];
		$navtwo = $_POST['txtnavtwo'];
		$navthree = $_POST['txtnavthree'];
		$navfour = $_POST['txtnavfour'];


		$sql_idtbl  = "INSERT INTO idtbl () VALUES ()";
		$conn->query($sql_idtbl );

        $sql_content = "INSERT INTO navbarport (navone, navtwo, navthree, navfour)
        VALUES ('$navone', '$navtwo', '$navthree', '$navfour')";

        if ($conn->query($sql_content) === TRUE) {
            $id = $conn->insert_id;

            $_SESSION['status'] = "Portfolio Content Record Inserted Successfully";
            header('location:index.php');
        }
        else {
            $_SESSION['status'] = "Error: Insert Failed.....";
            header('location:insert_nav.php');
        }
        $conn->close();

    }



	// INSERTION NG PORTFOLIO CONTENT
	if (isset($_POST['save_dynamicport_content'])) {
		// Data for dynamicport
		$firstData = $_POST['txtdata'];
		$firstdesc = $_POST['txtfirstdesc'];
		$skilldata = $_POST['txtskilldata'];
		$pic = $_FILES['txtonePic']['name'];

		$sql_idtbl  = "INSERT INTO idtbl () VALUES ()";
		$conn->query($sql_idtbl );

		// Handle file uploads for the pic
		move_uploaded_file($_FILES["txtonePic"]["tmp_name"], "uploads/" . $pic);

		// Insert into dynamicport for the multi pics
		$Images = [];
		foreach ($_FILES['txtmultiPic']['name'] as $key => $image) {
			$multiPic = $_FILES['txtmultiPic']['name'][$key];
			move_uploaded_file($_FILES['txtmultiPic']['tmp_name'][$key], "uploads/" . $multiPic);
			$Images[] = $multiPic;
		}
		$Images = implode(',', $Images);

		// Insertion for the dynamicport
		$sql_content = "INSERT INTO dynamicport (firstData, firstdesc, skilldata, pic, multiPic)
		VALUES ('$firstData', '$firstdesc', '$skilldata', '$pic', '$Images')";

		if ($conn->query($sql_content) === TRUE) {
			$id = $conn->insert_id;

			$_SESSION['status'] = "Portfolio Content Record Inserted Successfully";
			header('location:index.php');
		}
		else {
			$_SESSION['status'] = "Error: Insert Failed.....";
			header('location:insert_data.php');
		}
		$conn->close();
	}



	// UPDATE YUNG PORTFOLIO CONTENT
	if(isset($_POST['update_navbarport_content'])){

		$id = $_POST['txtid'];
		$navone = $_POST['txtnavone'];
		$navtwo = $_POST['txtnavtwo'];
		$navthree = $_POST['txtnavthree'];
		$navfour = $_POST['txtnavfour'];


        $sql_content = "UPDATE navbarport SET navone='$navone', navtwo='$navtwo', navthree='$navthree', navfour='$navfour' WHERE id='$id'";
        $conn->query($sql_content);

        if ($conn->query($sql_content) === TRUE) {
            $_SESSION['status'] = "Portfolio Content Record Updated Successfully";
            header('location:index.php');
        } else {
            $_SESSION['status'] = "Error: Update Failed";
            header('location:edit_data.php?id=' . $id); // Redirect back to edit page with ID
        }

        $conn->close();

    }
	

	// UPDATE YUNG PORTFOLIO CONTENT
	if(isset($_POST['update_dynamicport_content'])){
		include("includes/sqlconnection.php");
	
		$id = $_POST['txtid'];
		$firstData = $_POST['txtdata'];
		$firstdesc = $_POST['txtfirstdesc'];
		$skilldata = $_POST['txtskilldata'];


		// Check if a new first image is uploaded
		if(isset($_FILES['txtonePic']) && $_FILES['txtonePic']['name'] != ''){
			$pic = $_FILES['txtonePic']['name'];
			move_uploaded_file($_FILES["txtonePic"]["tmp_name"], "uploads/" . $_FILES['txtonePic']['name']);
		} else {
			// No new image uploaded, keep the existing image
			$sql_first_pic = "SELECT pic FROM dynamicport WHERE id='$id'";
			$result_first_pic = $conn->query($sql_first_pic);
			if ($result_first_pic->num_rows > 0) {
				$row_first_pic = $result_first_pic->fetch_assoc();
				$pic = $row_first_pic['pic'];
			} else {
				$pic = ''; // No existing image found
			}
		}

		// Update the dynamicport record for pic
		if(!empty($pic)){
			$sql_first_pic = "UPDATE dynamicport SET pic='$pic' WHERE id='$id'";
			$conn->query($sql_first_pic);
		}

		// Check if new images are uploaded for secondNavImages
		if(isset($_FILES['txtmultiPic']) && $_FILES['txtmultiPic']['name'][0] != ''){
			$multiPic = $_FILES['txtmultiPic']['name'];
			$newMultiPic = [];
			foreach ($multiPic as $key => $image) {
				move_uploaded_file($_FILES['txtmultiPic']['tmp_name'][$key], "uploads/" . $image);
				$newMultiPic[] = $image;
			}
			$multiPic = implode(',', $newMultiPic);
		} else {
			// No new image uploaded, keep the existing images
			$sql_multiPic = "SELECT multiPic FROM dynamicport WHERE id='$id'";
			$result_multiPic = $conn->query($sql_multiPic);
			if ($result_multiPic->num_rows > 0) {
				$row_multiPic = $result_multiPic->fetch_assoc();
				$multiPic = $row_multiPic['multiPic'];
			} else {
				$multiPic = ''; // No existing images found
			}
		}

		// Update
		$sql_content = "UPDATE dynamicport SET firstData='$firstData', firstdesc='$firstdesc', skilldata='$skilldata', pic='$pic', multiPic='$multiPic' WHERE id='$id'";
		$conn->query($sql_content);
	
		if ($conn->query($sql_content) === TRUE) {
			$_SESSION['status'] = "Portfolio Content Record Updated Successfully";
			header('location:index.php');
		} else {
			$_SESSION['status'] = "Error: Update Failed";
			header('location:edit_data.php?id=' . $id); // Redirect back to edit page with ID
		}
		
		$conn->close();
	}	
		
	// DELETION
	if (isset($_GET['id']) && isset($_GET['table'])) {
		include("includes/sqlconnection.php");
	
		$id = $_GET['id'];
		$table = $_GET['table'];

		// Delete the record based on the provided table name
		if ($table === 'dynamicport') {
			$conn->query("DELETE FROM dynamicport WHERE id='$id'");
		} elseif ($table === 'navbarport') {
			$conn->query("DELETE FROM navbarport WHERE id='$id'");
		} else {
			echo "Invalid table name";
			exit; // Exit the script if the table name is invalid
		}
	
		$_SESSION['status'] = "Record Deleted Successfully";
		header('location:index.php');
		$conn->close();
	} else {
		echo "ID or table parameter missing";
	}
	
?>