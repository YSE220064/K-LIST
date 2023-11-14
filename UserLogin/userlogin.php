<!-- index.php -->
<!DOCTYPE html>
<html lang="en jp">

<?php include 'head.php'; ?>

<body>

    <?php include 'navigation.php'; ?>  

    <br>

    <div class="container">
    <form id="loginForm" action="./userlogincall.php" method="post">
    <h1>K-List</h1>
      <h2>アカウントのログイン</h2>
      <br>
      <label for="username">ユーザー名 ;</label>
      <input type="text" id="username" name="username" required>

      <label for="password">パスワード ;</label>
      <input type="password" id="password" name="password" required>
      <br>
      <button type="submit">ログイン</button>
    </form>
    </div>

    <br>

    <?php include 'footer.php'; ?>

    <script src="./scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

</body>

</html>
