<?php
if (!empty($_POST["sentence"])) {
    $sentence = trim($_POST["sentence"]);
    $sentence = strtolower($sentence);
    $sentence = preg_replace("/[^a-zA-Z0-9\s]/", "", $sentence);
    $words = explode(" ", $sentence);
    $wordCounts = array();
    foreach ($words as $word) {
        if (isset($wordCounts[$word])) {
            $wordCounts[$word]++;
        } else {
            $wordCounts[$word] = 1;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Word Frequency Counter</title>
</head>
<body>
    <div  style="text-align:center">
    <form method="POST" action="index.php">
        <label for="sentence">Enter a sentence:</label>
        <input type="text" name="sentence" id="sentence" required>
        <button type="submit">Count Frequency</button>
    </form>
    </div>

    <?php if (!empty($_POST)){ ?>
        <div style="text-align:center">
        <h3>Word frequency counts:</h3>
        <?php foreach ($wordCounts as $word => $count){ ?>
            <p><?php echo $word . ": " . $count; ?></p>
        <?php }?>
        </div>
    <?php } ?>
</body>
</html>