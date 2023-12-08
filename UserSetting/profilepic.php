<?php

// Handle profile picture upload
if (isset($_POST['change_picture'])) {
    $targetDir = "uploads/";  // Create a directory to store uploaded profile pictures
    $targetFile = $targetDir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (you can adjust the size limit)
    if ($_FILES["profile_picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats (you can add more formats)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // If everything is ok, try to upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["profile_picture"]["name"]) . " has been uploaded.";

            // Update the user's profile picture in the database (replace this with your logic)
            // Example: updateProfilePicture($userId, $targetFile);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Example function to update the profile picture path in the database
function updateProfilePicture($userId, $profilePicturePath) {
    $conn = connectDB();
    $sql = "UPDATE users SET profile_picture = '$profilePicturePath' WHERE id = '$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "Profile picture updated successfully.";
    } else {
        echo "Error updating profile picture: " . $conn->error;
    }
    $conn->close();
}


?>