<?php
include("conecta.php");
include("validarLog.php");

$sql = "select * from usuario where email = 'email';";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Usuários</title>
</head>

<body>
    <div class="alert alert-secondary">
        <h5>Usuários</h5>
        <?php
        $conn = new mysqli($host . ':' . $port, $user, $password, $db);

        $sql = "select * from usuario";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo $row["nome"] . " - " . $row["email"] . "<br>";
            }
        }
        ?>
    </div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>