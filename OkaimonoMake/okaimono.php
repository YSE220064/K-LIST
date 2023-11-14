<!-- okaimono.php -->
<!DOCTYPE html>
<html lang="en jp">
<?php include '../WebComponents/head.php'; ?>
<body>
    <?php include '../WebComponents/navigation.php'; ?>  
    <div class="container">
        <div id="shopping-list">
            <h2 id="list-title">お買い物リストの名は？</h2>
            <label for="list-name">リスト名；</label>
            <input type="text" id="list-name" placeholder="リスト名を記入してね！">
            <button onclick="changeListName()">変更</button>
            <ul id="list">
                <!-- Existing items will go here -->
            </ul>
            <div>
                <label for="item">商品名；</label>
                <input type="text" id="item" placeholder="商品名を追加してね！">
                <button onclick="addItem()">追加</button>
            </div>
            
            <p align="center">
            <button onclick="saveList()">リスト　ダウンロード</button>
            <!-- <button id="copy-button" onclick="copyLink()">リストのリンクをコピー</button> -->
            <br>
            <button onclick="copyLinkAndGenerateQRCode()">QR　コード　作成</button>
            <!-- <button onclick="savetodb()">データーベースに保存</button> -->
            </p>

        </div>
        <div id="qrcode"></div>
    </div>
    <?php include '../WebComponents/footer.php'; ?>
    <script src="../WebScripts/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
</body>
</html>
