<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
$fullname = $_SESSION['name'];
$email = $_SESSION['email'];
$session = session_id();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TRONO SUIZO QUIZ</title>
      <link rel="stylesheet" href="css/style1.css">
      <link rel="stylesheet" href="css/mainstyle.css">
    </head>
    <body >
    <font color = LIME face = Courier size = 2 ><b>Name: <?php echo $fullname ?></b></font><br>
    <font color = LIME face = Courier size = 2 ><b>Email: <?php echo $email ?></b></font><br>
    <font color = LIME face = Courier size = 2 ><b>Session Code: <?php echo $session ?></b></font>
    <h2 style = "color:Red; font-family:Courier New; text-align:center;">HOME PAGE</h2>
      <br><br>
      <div style = "text-align: Center;">
        <font color = LIME face = Courier size = 6 ><b>PICK A SUBJECT</b></font>
      </div>
      <br><br>
      <!-- Table design -->
      <table align = center width = 90% cellpadding = 30 bgcolor = black>
        </tr>
          <td style = "text-align: Center">
          <!-- subjects -->
        <a href="els.php?subject=english" class = "tdecor"><button class = "button button1"><b>ELS</b></button></a>
        &nbsp;
        <a href="filipino.php?subject=math" class = "tdecor"><button class = "button button2"><b>FILIPINO</b></button></a>
        &nbsp;
        <a href="math.php?subject=english" class = "tdecor"><button class = "button button3"><b>MATH</b></button></a>
        &nbsp;
        <a href="english.php?subject=math" class = "tdecor"><button class = "button button4"><b>ENGLISH</b></button></a>
        &nbsp;
                <a href="logout.php" class = "tdecor"><button class = "logoutbutton button button5"><b>LOG OUT</b></button></a>
          </td>
        </tr>
    </body>
  </html>