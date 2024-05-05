<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$questions = [
    "1. Evaluate the function f(x) = 2x + 1 at x = 3x -1",
    "2. Evaluate the function f(x) = x2 – 2x + 2 at x = 3x – 1.",
    "3. Evaluate the function f(x) = 3x2 + 4x + 1 at x =4.",
    "4. Evaluate the function f(x) = √(2x +2) at x = 7.",
    "5. Evaluate the function f(x) = x2 – 2x + 2 at x = 4."
];

$correct_answers = [
    "6x−1",
    "9x 
    2
     −12x+5",
    "65",
    "4",
    "10",
];

$fake_answers = [
    ["7x", "5x+1", "5x"],
    ["9x 
    2
     −6x+1", "3x2−6x+2", "6x 
     2
      −4x+2"],
    ["53", "57", "61"],
    ["3", "5", "6"],
    ["12", "8", "6"],
];

for ($i = 0; $i < count($fake_answers); $i++) {
    shuffle($fake_answers[$i]);
}

$fullname = $_SESSION['name'];
$email = $_SESSION['email'];
$session = session_id();

?>
<head>
    <title>TRONO SUIZO QUIZ</title>
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
<font color = LIME face = Courier size = 2 ><b>Name: <?php echo $fullname ?></b></font><br>
    <font color = LIME face = Courier size = 2 ><b>Email: <?php echo $email ?></b></font><br>
    <font color = LIME face = Courier size = 2 ><b>Session Code: <?php echo $session ?></b></font>
    <h2 style="color:Red; font-family:Courier New; text-align:center;">QUIZ</h2>
    <br><br>
    <div style="text-align: Center;">
        <font color=LIME face=Courier size=6><b>MATH</b></font>
    </div>
    <br><br>
    <!-- Table design -->
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="index.php" class="tdecor"><button class="button button1">BACK</button></a><br><br>
    <table align=center width=90% cellpadding=30 bgcolor=white class=text>
        <tr>
            <td>
                <form action="score.php" method="post">
                    <?php for ($i = 0; $i < count($questions); $i++): ?>
                        <p><?php echo $questions[$i]; ?></p>
                        <?php 
                            $correctAnswer = $correct_answers[$i];
                            shuffle($fake_answers[$i]);
                            $fake_answers[$i][] = $correctAnswer;
                            shuffle($fake_answers[$i]);
                        ?>
                        <?php foreach ($fake_answers[$i] as $index => $answer): ?>
                            <?php $letter = chr(97 + $index); ?>
                            <input type="radio" name="q<?php echo $i; ?>" value="<?php echo $answer; ?>"> <?php echo $letter; ?>. <?php echo $answer; ?><br>
                        <?php endforeach; ?>
                        <br>
                    <?php endfor; ?>
                    <input type="submit" value="Submit Answer">
                </form>
            </td>
        </tr>
    </table>
</body>
