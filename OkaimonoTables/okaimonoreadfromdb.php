<?php
// okaimonoreadfromdb.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "k-list";

// Function to connect to the database
function connectDB() {
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Save list to the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $conn = connectDB();

    if ($_POST['action'] === 'saveList') {
        $listName = $_POST['listName'];
        $listContent = $_POST['listContent'];
        $creationDateTime = date('Y-m-d H:i:s');

        $sql = "INSERT INTO okaimonolists (list_name, list_content, creation_datetime) VALUES ('$listName', '$listContent', '$creationDateTime')";

        if ($conn->query($sql) === TRUE) {
            echo "リスト　保存されまして！";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($_POST['action'] === 'editList') {
        $listId = $_POST['listId'];
        $listName = $_POST['listName'];
        $listContent = $_POST['listContent'];

        $sql = "UPDATE okaimonolists SET list_name='$listName', list_content='$listContent' WHERE id=$listId";

        if ($conn->query($sql) === TRUE) {
            echo "List updated successfully!";
        } else {
            echo "Error updating list: " . $conn->error;
        }
    } elseif ($_POST['action'] === 'deleteList') {
        $listId = $_POST['listId'];

        $sql = "DELETE FROM okaimonolists WHERE id=$listId";

        if ($conn->query($sql) === TRUE) {
            echo "リスト　削除されました！";
        } else {
            echo "Error deleting list: " . $conn->error;
        }
    }

    $conn->close();
    exit();
}

// Display lists
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['displayLists'])) {
    $conn = connectDB();

    $sql = "SELECT * FROM okaimonolists";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $lists = array();
        while ($row = $result->fetch_assoc()) {
            $lists[] = $row;
        }
        echo json_encode($lists);
    } else {
        echo "No lists found";
    }

    $conn->close();
    exit();
}
?>