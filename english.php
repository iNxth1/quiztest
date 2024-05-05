<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$questions = [
    "1. An utterance that serves a function in communication.",
    "2. This act happens with the utterance of a sound, a word, or even a phrase as a natural unit of speech.",
    "3. This act is also called the act of doing something in saying something.",
    "4. This act refers to the effect the utterance has on the thoughts or actions of the other person.",
    "5. This refers to communication between and among people and establishes personal relationship between and among them."
];

$correct_answers = [
    "Speech Act",
    "Locutionary Act",
    "Illocutionary Act",
    "Perlocutionary Act",
    "Interpersonal",
];

$fake_answers = [
    ["Locutionary Act", "Illocutionary Act", "Perlocutionary Act"],
    ["Speech Act", "Illocutionary Act", "Perlocutionary Act"],
    ["Speech Act", "Locutionary Act", "Perlocutionary Act"],
    ["Speech Act", "Locutionary Act", "Illocutionary Act"],
    ["Speech Act", "Intrapersonal", "None of the above"],
];

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
        <font color=LIME face=Courier size=6><b>ENGLISH</b></font>
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
