<!-- index.php -->
<!DOCTYPE html>
<html lang="en jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="en jp">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./styles.css">
    <title>K-List, Okaimono List Da Yo</title>
</head>

<body>

<div class="topnav">
    <a href="./index.php">K-Listのホームページ</a>
    <a href="./okaimono.php">お買い物リストを作る</a>
    <a href="./okaimonolist.php">お買い物リストの一覧</a>
    <a href="./useraccount.php">アカウントの管理</a>
    <a href="./userregistration.php">アカウントの作成</a>
    <a href="./userlogin.php">アカウントのログイン</a>
</div>

    <br>

    <div class="container">
        <div id="shopping-list">
            <h2 id="list-title">お買い物リスト名は？</h2>
            <label for="list-name">リスト名；</label>
            <input type="text" id="list-name" placeholder="リスト名を記入してね！">
            <button onclick="changeListName()">変更</button>

            <br>

            <ul id="list">
                <!-- Existing items will go here -->
            </ul>

            <div>
                <label for="item">商品名；</label>
                <input type="text" id="item" placeholder="商品名を追加してね！">
                <button onclick="addItem()">追加</button>
            </div>

            <br>

            <button onclick="saveList()">ダウンロード</button>
            <button id="copy-button" onclick="copyLink()">リンクをコピー</button>
            <button onclick="copyLinkAndGenerateQRCode()">QR コード</button>

        </div>

        <br>

        <div id="qrcode"></div>

    </div>

    <footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h4>令和6年: K-List</h4>
        </div>

        <div class="footer-section">
            <h4>YSE 横浜システム工学院専門学校</h4>
        </div>

        <div class="footer-section">
            <h4>GG IZY TEAM</h4>
            <ul>
                <li>[Your Name]</li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>お問い合わせ:</h4>
            <ul>
                <li>未定</li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <br>
        <p>&copy; <?php echo date("Y"); ?> K-List. All rights reserved.</p>
    </div>
</footer>

<style>

body {
    margin: 0;
    font-family: serif, sans-serif;
    background-color: white;
    padding: 10px;
    box-sizing: border-box;
}

.topnav {
    overflow: hidden;
    background-color: black;
    display: flex;
    justify-content: space-between;
}

@media screen and (max-width: 600px) {
    .topnav {
        flex-direction: column;
        align-items: center;
        max-width: 100%;
    }

    .topnav a {
        width: 100%;
        margin-bottom: 8px;
        max-width: 100%;
    }

    .container {
        max-width: 100%;
    }

    #list {
        margin-left: 10px; /* Adjust the margin for better indentation on smaller screens */
    }
    
    #list li {
        padding-left: 5px; /* Adjust the padding for better indentation on smaller screens */
    }
}

.topnav a {
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    color: white;
}

.topnav a:nth-child(1) {
    background-color: #FF0000;
    color: black;
}

.topnav a:nth-child(2) {
    background-color: #FFFF00;
    color: black;
}

.topnav a:nth-child(3) {
    background-color: #00FF00;
    color: black;
}

.topnav a:nth-child(4) {
    background-color: #0000FF;
    color: white;
}

.topnav a:nth-child(5) {
    background-color: violet;
    color: white;
}

.topnav a:nth-child(6) {
    background-color: grey;
    color: white;
}

.topnav a:hover {
    background-color: #ddd;
    color: black;
}

.topnav a.active {
    background-color: #FF0000;
    color: white;
}

.content {
    padding: 16px;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: fit-content; /* or width: auto; */
    max-width: 100%;
    margin: 20px auto; /* Add margin to the container */
    display: flex;
    flex-direction: column;
    align-items: center;
}

form {
    display: flex;
    flex-direction: column;

    text-align: center;
}

label {
    margin-bottom: 8px;
}

input {
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: darkgreen;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 20px;
    cursor: pointer;

    margin: 8px 0;
}

button:hover {
    background-color: black;
}

.container h1,
.container h2 {
    text-align: center;
}

#qrcode {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px; /* Add some space between the shopping list and the QR code */
}

#list {
    list-style-type: decimal; /* Use decimal numbers as markers for ordered list items */
    padding: 0;
    margin-left: 20px; /* Adjust the margin for better indentation */

    text-align: left;
}

#list li {
    padding-left: 10px; /* Adjust the padding for better indentation within list items */
    margin-bottom: 8px; /* Add some spacing between list items */
}

/* Add this to your existing CSS styles or create a new CSS file */

.footer {
    background-color: #333;
    color: #fff;
    padding: 30px 0; /* Increase padding for the footer */
    text-align: center;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    max-width: 800px;
    margin: 0 auto;
}

.footer-section {
    margin-bottom: 10px;
}

.footer-section h4 {
    color: #fff;
    font-size: 1.2em;
    margin-bottom: 5px;
}

ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

ul li {
    margin-bottom: 5px;
}

.footer p {
    margin: 0;
    font-size: 0.9em;
}

.footer-bottom {
    margin-top: 20px; /* Increase margin for the footer bottom */
    border-top: 1px solid #555;
}

@media screen and (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        align-items: center;
    }
    .footer-section {
        flex-basis: 100%;
    }
}

</style>

<script>

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

document.getElementById("list-name").addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        changeListName();
    }
});

function changeListName() {
    var listNameInput = document.getElementById("list-name");
    var listTitle = document.getElementById("list-title");
    listTitle.textContent = listNameInput.value || "K-List";
}

document.getElementById("item").addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        addItem();
    }
});

function addItem() {
    var input = document.getElementById("item");
    var itemText = input.value;

    if (itemText.trim() === "") {
        alert("商品名を記入してください！");
        return;
    }

    var list = document.getElementById("list");
    var listItem = document.createElement("li");
    listItem.innerHTML = `
        <span>${itemText}</span>
        <button onclick="removeItem(this)">削除</button>
    `;
    list.appendChild(listItem);

    input.value = "";
}

function removeItem(button) {
    var listItem = button.parentElement;
    listItem.remove();
}

function saveList() {
    var listName = document.getElementById("list-name").value || "K-List";
    var listContent = getListContentWithBullet();
    var creationDateTime = getJapaneseDateTime();

    var contentToSave = `リスト名: ${listName}\n\n${listContent}\n\n作成日時: ${creationDateTime}`;

    var blob = new Blob([contentToSave], { type: "text/plain" });
    var a = document.createElement("a");
    a.href = URL.createObjectURL(blob);
    a.download = listName + " のリスト " + creationDateTime + ".txt";
    a.click();
}

function getListContentWithBullet() {
    var listContent = "";

    var listItems = document.getElementById("list").getElementsByTagName("li");
    for (var i = 0; i < listItems.length; i++) {
        var itemText = listItems[i].querySelector("span").textContent.trim();
        listContent += `${i + 1}. ${itemText}\n`;
    }

    return listContent;
}

function getJapaneseDateTime() {
    var options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        hour12: false,
        timeZone: 'Asia/Tokyo'
    };

    var japaneseDateTime = new Date().toLocaleString('ja-JP', options);
    return japaneseDateTime;
}

function copyLink() {
    var listName = encodeURIComponent(document.getElementById("list-name").value);
    var listContent = encodeURIComponent(getListContent());
    var shareLink = window.location.href.split('?')[0] + '?list=' + listName + '&items=' + listContent;
    
    navigator.clipboard.writeText(shareLink).then(function() {
        alert("リンクがコピーされました！");
    }).catch(function(err) {
        console.error('リンクがコピー出来ません！', err);
    });
}

function copyLinkAndGenerateQRCode() {
    var listName = encodeURIComponent(document.getElementById("list-name").value);
    var listContent = encodeURIComponent(getListContent());
    var shareLink = window.location.href.split('?')[0] + '?list=' + listName + '&items=' + listContent;

    // Clear existing QR code content
    document.getElementById("qrcode").innerHTML = '';

    // Generate QR code
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: shareLink,
        width: 128,
        height: 128
    });

    navigator.clipboard.writeText(shareLink).then(function() {
        alert("リンクがコピーされて、QRコードが作成されました！");
    }).catch(function(err) {
        console.error('リンクがコピー出来ません！', err);
    });
}

function getListContent() {
    var listContent = "";

    var listItems = document.getElementById("list").getElementsByTagName("li");
    for (var i = 0; i < listItems.length; i++) {
        var itemText = listItems[i].querySelector("span").textContent.trim();
        listContent += itemText + "\n";
    }

    return listContent;
}

function populateListFromUrl() {
    var listName = decodeURIComponent(getUrlParameter('list'));
    var items = decodeURIComponent(getUrlParameter('items'));

    // Clear existing list content
    document.getElementById("list").innerHTML = "";

    if (listName) {
        document.getElementById("list-name").value = listName;
        changeListName();
    }

    if (items) {
        var itemList = items.split('\n');
        var list = document.getElementById("list");

        for (var i = 0; i < itemList.length; i++) {
            var itemText = itemList[i].trim();
            if (itemText !== "") {
                var listItem = document.createElement("li");
                listItem.innerHTML = `
                    <span>${itemText}</span>
                    <button onclick="removeItem(this)">削除</button>
                `;
                list.appendChild(listItem);
            }
        }
    }

    // Reset the numbering of list items
    resetListNumbering();
}

function resetListNumbering() {
    var listItems = document.getElementById("list").getElementsByTagName("li");

    for (var i = 0; i < listItems.length; i++) {
        var itemText = listItems[i].querySelector("span");
        itemText.textContent = itemText.textContent.replace(/^\d+\./, (i + 1) + ".");
    }
}

// Populate the list on page load
populateListFromUrl();

</script>

    <script src="./scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

</body>

</html>
