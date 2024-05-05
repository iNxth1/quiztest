<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$questions = [
    "1. The most important diagnostic features of many minerals, and often the most difficult to understand and identify.",
    "2. Most minerals in the earth's crust and mantle are silicate minerals. All silicate
    minerals are built of silicon-oxygen tetrahedra in different bonding arrangements
    which create different crystal lattices.",
    "3. These have a halogen element as the anion, whether it be fluoride, chloride,
    bromide, iodide, or astatine.",
    "4. Minerals that are usually formed in high areas with evaporation rates and
    where salty water slowly evaporates.",
    "5. These are based on the oxygen anion. They are forms as precipitates close to
    Erath's surface or as oxidation products of minerals during the process of weathering."
];

$correct_answers = [
    "Cleavage",
    "Silicates",
    "Halides",
    "Sulfates",
    "Oxides",
];

$fake_answers = [
    ["Luster", "Tenacity", "Diaphaneity"],
    ["Silicates", "Diaphaneity", "Oxides"],
    ["Silicates", "Sulfates", "Oxides"],
    ["Silicates", "Halides", "Oxides"],
    ["Silicates", "Halides", "Sulfates"],
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
        <font color=LIME face=Courier size=6><b>EARTH LIFE SCIENCE</b></font>
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
