
<!DOCTYPE html>
<?php
session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        $full_name = $_POST['name'];
        $email = $_POST['email'];
        
        // limits the user to only enter email with ending "@ici.edu.ph"
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/@ici\.edu\.ph/", $email)) {
                    echo "<font color = lime face = Courier size = 4>Email needs to end with @ici.edu.ph";
            } else {
                header("Location: index.php");
                exit();
            }
        }
?>
    <head>
      <title>TRONO SUIZO QUIZ</title>
      <link rel="stylesheet" href="css/mainstyle.css">
    </head>
    <body>
     <h2 style = "color:Lime; font-family:Courier New; text-align:center;">Performance Task 10</h2>
      <br><br>
      <div style = "text-align: Center;">
        <font color = Red face = Courier size = 6 ><b>SIMPLE QUIZ GAME</b></font>
      </div>
      <br><br>
      <!-- Table design -->
      <table align = center width = 90% cellpadding = 30 bgcolor = black>
        <tr>
          <td style = "text-align: Center"><font color = lime face = Courier size = 6><B>LOGIN</B></font><br><br>
        </tr>
          <td style = "text-align: Center">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="name"><font color = lime face = Courier size = 4>Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>
    <label for="email"><font color = lime face = Courier size = 4>Email:</label><br>
    <input type="text" id="email" name="email" required><br><br>

    <input type="submit" value="Login">
</form>
          </td>
        </tr>
    </body>
  </html>