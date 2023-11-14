<!-- index.php -->
<!DOCTYPE html>
<html lang="en jp">

<?php include 'head.php'; ?>

<body>

    <?php include 'navigation.php'; ?>  

    <br>

    <div class="container">
    <form id="registrationForm" action="./userregistrationcall.php" method="post">
    <h1>K-List</h1>
      <h2>アカウントの作成</h2>
      <br>
      <label for="username">ユーザー名 ;</label>
      <input type="text" id="username" name="username" required>

      <label for="email">メールアドレス ;</label>
      <input type="email" id="email" name="email" required>

      <label for="password">パスワード ;</label>
      <input type="password" id="password" name="password" required>
      <br>
      <button type="submit">登録</button>
    </form>
    </div>

    <br>

    <?php include 'footer.php'; ?>

    <script src="./scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

</body>

</html>