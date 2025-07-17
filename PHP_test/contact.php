<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Kontaktformular</title>
</head>
<body>
    <h2>Kontaktformular</h2>
    <form action="action.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <br><br>

        <input type="submit" name="frm_submt" value="Absenden">
    </form>
    
    <?php
    require_once __DIR__ . '/config/config.php';
   
    if (file_exists($cnf_kontakt_path)) {
        $ary_kontakte = file($cnf_kontakt_path); // Считывает строки из файла в массив
        
        if (!empty($ary_kontakte)) {
            echo '<h3>Список контактов:</h3>';
            echo '<ul>';
            foreach ($ary_kontakte as $k => $v) {
                if (trim($v) !== '') {
                    echo '<li>' . htmlspecialchars(trim($v)) . '</li>';
                }
            }
            echo '</ul>';
        }
    }
    ?>
</body>
</html>