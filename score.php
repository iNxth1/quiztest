<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$questions = count($_POST);
$correct_answers = 0;
$correct_answers_array = [
    "Cleavage",
    "Silicates",
    "Halides",
    "Sulfates",
    "Oxides",
    "Telebisyon",
    "Sitwasyong Pangwika sa
    Pelikula",
    "Internet",
    "Blog",
    "Impormal",
    "6x−1",
    "9x2−12x+5",
    "65",
    "4",
    "10",
    "Speech Act",
    "Locutionary Act",
    "Illocutionary Act",
    "Perlocutionary Act",
    "Interpersonal",
];

foreach ($_POST as $question => $selected_answer) {
    $question_number = substr($question, 1); 
    if (in_array($selected_answer, $correct_answers_array)) {
        $correct_answers++;
    }
}

$fullname = $_SESSION['name'];
$email = $_SESSION['email'];
$session = session_id();

// return to the last subject
$_SESSION['last_subject'] = $_SERVER['HTTP_REFERER'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>TRONO SUIZO QUIZ</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/mainstyle.css">
</head>
<body>
<font color = LIME face = Courier size = 2 ><b>Name: <?php echo $fullname ?></b></font><br>
    <font color = LIME face = Courier size = 2 ><b>Email: <?php echo $email ?></b></font><br>
    <font color = LIME face = Courier size = 2 ><b>Session Code: <?php echo $session ?></b></font>
    <h2 style="color:Red; font-family:Courier New; text-align:center;">SCORE PAGE</h2>
    <br><br>
    <div style="text-align: Center;">
        <font color=LIME face=Courier size=6><b>YOUR SCORE IS: <?php echo $correct_answers; ?>/<?php echo $questions; ?></b></font>
    </div>
    <br><br>
    <!-- Table design -->
    <table align=center width=95% cellpadding=30 bgcolor=black>
        <tr>
            <td style="text-align: center">
                <a href="index.php" class="tdecor"><button class="button button2">HOME</button></a><br>
            </td>
            <td style="text-align: center">
                <a href="view_answers.php" class="tdecor"><button class="button button3">VIEW ANSWERS</button></a><br>
            </td>
            <td style="text-align: center">
                <form action="Retake.php" method="post">
                    <input type="submit" value="RETAKE" class="button button4">
                </form>
            </td>
            <td style="text-align: center">
                <a href="logout.php" class="tdecor"><button class="button button1">LOGOUT</button></a><br>
            </td>
        </tr>
    </table>
</body>
</html>
