<!-- userwelcome.php -->
<!DOCTYPE html>
<html lang="en jp">
<?php include "../WebComponents/head.php"; ?>
<body>
    <?php include '../WebComponents/navigation.php'; ?>  
    <div class="container">
    <p align="center">
      <a href="../index.php" target="">
      <img src="../WebResources/K-List-Logo.jpg" width="200" alt="K-List"></a></p>
        <!-- <h1 class="home_title">K-List</h1> -->
        <!-- <h3 class="home_subtitle">お買い物リスト</h3> -->
      
        <div class="user_registration">
        <!-- <a href="../UserRegistration/userregistration.php" >
          <button type="submit">アカウント　作成</button></a> -->
          <a href="../UserRegistration/userregistration.php" class="btn btn-flat"><span>アカウント　登録</span></a>
      </div><br>
      
      <div class="user_login">
        <!-- <a href="../UserLogin/userlogin.php"> -->
          <!-- <button type="submit">アカウント　ログイン</button></a> -->
          <a href="../UserLogin/userlogin.php" class="btn btn-flat"><span>アカウント　ログイン</span></a>
      </div><br>

      <!-- <div class="okaimono_make">
        <a href="../OkaimonoMake/okaimono.php">
          <button type="submit">リスト　作る</button></a>
          <a href="../OkaimonoMake/okaimono.php" class="btn btn-flat"><span>リストを作る</span></a>
      </div><br> -->

      <div class="okaimono_make">
        <a href="../OkaimonoMake/okaimono.php" class="btn btn-flat"><span>リスト　作る</span></a>
      </div>
      
    </div>
    <?php include '../WebComponents/footer.php'; ?>
</body>
</html>