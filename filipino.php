<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$questions = [
    "1. Itinuturing na pinakamakapangyarihang media.",
    "2. Gumagamit ng midyum na Filipino at ilang mga barayti.",
    "3. Dalawang pinagsamangsalita na inter at networking",
    "4. Sinasabing ang blog aygaling sa dalawang salita,web at log.",
    "5. Ginagamitsa berbal na talastasansa bahay, lansangan,kuwentuhan, huntuhanat iba pa."
];

$correct_answers = [
    "Telebisyon",
    "Sitwasyong Pangwika sa
    Pelikula",
    "Internet",
    "Blog",
    "Impormal",
];

$fake_answers = [
    ["Pelikula", "Blog", "Internet"],
    ["Blog", "Telebisyon", "Wala sa nabangit"],
    ["Blog", "Telebisyon", "Pelikula"],
    ["Internet", "Pelikula", "Wala sa nabangit"],
    ["Konsultatibo", "Akademik", "Estatistiko"],
];

// Shuffler
for ($i = 0; $i < count($fake_answers); $i++) {
    shuffle($fake_answers[$i]);
}

$fullname = $_SESSION['name'];
$email = $_SESSION['email'];
$session = session_id();

// Form HTML
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
        <font color=LIME face=Courier size=6><b>FILIPINO</b></font>
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
