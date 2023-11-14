<!-- userwelcome.php -->
<!DOCTYPE html>
<html lang="en jp">
<?php include "../WebComponents/head.php"; ?>
<!-- <link rel="stylesheet" href="/WebCss/WebCss.css"> -->
<body>
    <?php include '../WebComponents/navigation.php'; ?>  
    <div class="container">
    <p align="center">
      <a href="../index.php" target="">
        <img src="../WebResources/K-List.png" width="200" alt="K-List"></a></p>
        <h1 class="home_title">K-List</h1>
        <h3 class="home_subtitle">お買い物リスト</h3>
      
        <!-- <div class="user_registration">
        <a href="./userregistration.php">
          <button type="submit">アカウント　作成</button></a>
      </div>
      
      <div class="user_login">
        <a href="./userlogin.php">
          <button type="submit">アカウント　ログイン</button></a>
      </div> -->

      <div class="okaimono_make">
        <a href="../OkaimonoMake/okaimono.php">
          <button type="submit">リストを作る</button></a>
      </div>
      
    </div>
    <?php include '../WebComponents/footer.php'; ?>
</body>
</html>