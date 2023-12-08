<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: ../UserLogtin/userlogin.phpt');
} else {
    $user = $_SESSION['user'];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "k-list";

// Function to connect to the database
function connectDB()
{
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
            echo "List saved to database successfully!";
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
            echo "List deleted successfully!";
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

    $sql = "SELECT * FROM okaimonolists WHERE user_id = {$user['id']}";
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

<!DOCTYPE html>
<html lang="en jp">

<?php include '../WebComponents/head.php'; ?>

<body>


    <?php include '../WebComponents/navigation.php'; ?>

    <br>

    <div class="container">
        <h2><?= $user['username'] ?>さんの買い物リスト</h2>
        <table id="lists-table" border="1"></table>
    </div>

    <br>

    <?php include '../WebComponents/footer.php'; ?>

    <script>
        function displayLists() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "?displayLists=1", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var lists = JSON.parse(xhr.responseText);
                    if (lists.length > 0) {
                        populateTable(lists);
                    } else {
                        alert("No lists found");
                    }
                }
            };
            xhr.send();
        }

        function populateTable(lists) {
            var table = document.getElementById("lists-table");
            table.innerHTML = "";

            var headerRow = table.insertRow(0);
            var headers = ["号", "名", "中身", "いつ", "何を"];
            for (var i = 0; i < headers.length; i++) {
                var cell = headerRow.insertCell(i);
                cell.innerHTML = headers[i];
            }

            for (var i = 0; i < lists.length; i++) {
                var row = table.insertRow(i + 1);
                row.insertCell(0).innerHTML = lists[i].id;
                row.insertCell(1).innerHTML = lists[i].list_name;
                row.insertCell(2).innerHTML = lists[i].list_content;
                row.insertCell(3).innerHTML = lists[i].creation_datetime;
                var actionsCell = row.insertCell(4);
                actionsCell.innerHTML = '<button onclick="editList(' + lists[i].id + ', \'' + lists[i].list_name + '\', \'' + lists[i].list_content + '\')">修正</button> ' +
                    '<button onclick="deleteList(' + lists[i].id + ')">削除</button>';
            }
        }

        function editList(id, name, content) {
            var newName = prompt("Enter new name:", name);
            var newContent = prompt("Enter new content:", content);

            if (newName !== null && newContent !== null) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert(xhr.responseText);
                        displayLists();
                    }
                };
                xhr.send("action=editList&listId=" + id + "&listName=" + encodeURIComponent(newName) + "&listContent=" + encodeURIComponent(newContent));
            }
        }

        function deleteList(id) {
            var confirmDelete = confirm("Are you sure you want to delete this list?");
            if (confirmDelete) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        alert(xhr.responseText);
                        displayLists();
                    }
                };
                xhr.send("action=deleteList&listId=" + id);
            }
        }

        window.onload = function() {
            displayLists();
        };
    </script>

</body>

</html>