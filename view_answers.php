<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$correct_answers_array = [
    "<b>EARTH LIFE SCIENCE:</b>",
    "Cleavage",
    "Silicates",
    "Halides",
    "Sulfates",
    "Oxides",
    "<b>FILIPINO:</b>",
    "Telebisyon",
    "Sitwasyong Pangwika sa
    Pelikula",
    "Internet",
    "Blog",
    "Impormal",
    "<b>MATH:</b>",
    "6x−1",
    "9x2−12x+5",
    "65",
    "4",
    "10",
    "<b>ENGLISH:</b>",
    "Speech Act",
    "Locutionary Act",
    "Illocutionary Act",
    "Perlocutionary Act",
    "Interpersonal",
];

$fullname = $_SESSION['name'];
$email = $_SESSION['email'];

// shows correct answers
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Answers</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/mainstyle.css">
</head>
<style>
    table {
        border: 5px solid lime;
        border-radius: 5px;
        border-collapse: collapse;
    }

    .text {
        font-family: Arial;
    }
</style>
<body>
    <h2 style="color:Red; font-family:Courier New; text-align:center;">CORRECT ANSWERS</h2>
    <br><br>
    <div style="text-align: Center;">
        <font color=LIME face=Courier size=6><b>ANSWERS</b></font>
    </div>
    <br><br>
    <!-- Table design -->
    <table align=center width=90% cellpadding=30 bgcolor="white">
        <?php foreach ($correct_answers_array as $answer): ?>
        <tr>
            <td><?php echo $answer; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br><br>
    <div style="text-align: center;">
        <a href="logout.php" class="tdecor"><button class="button button2"><b>LOGOUT</b></button></a><br>
    </div>
</body>
</html>
