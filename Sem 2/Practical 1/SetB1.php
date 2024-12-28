<!Doctype html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Set B1
    </title>
</head>
<body>
    <h2>Preference's Choice</h2>

    <form method="post">
        Font Style : <select name="font_style">
            <option value="Arial">Arial</option>
            <option value="Verdana">Verdana</option>
            <option value="Times New Roman">Times New Roman</option>
            <option value="Courier New">Courier New</option>
        </select> <br><br>

        Font Size : <select name="font_size">
            <option value="12px">12px</option>
            <option value="16px">16px</option>
            <option value="20px">20px</option>
            <option value="24px">24px</option>
        </select> <br><br>

        Font Color : <input type="color" name="font_color"> <br> <br>

        Background Color : <input type="color" name="bgcolor"> <br> <br>

        <input type="submit" name="submit" value="Save Preferences">
    </form>
</body>
</html>

<?php

if(isset($_POST['submit'])) {

    setcookie('font_style',$_POST['font_style'], time()+(60*60),'/');
    setcookie('font_size',$_POST['font_size'], time()+(60*60),'/');
    setcookie('font_color',$_POST['font_color'], time()+(60*60),'/');
    setcookie('bgcolor',$_POST['bgcolor'], time()+(60*60),'/');

    header("Location: SetB1b.php");
    exit();
}

?>