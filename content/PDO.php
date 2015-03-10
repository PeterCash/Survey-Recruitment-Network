<?php
$conn = new PDO("mysql:host=sql3.freesqldatabase.com;dbname=sql368720", "sql368720", "kU6*xT5*");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$stmt = $conn->prepare("SELECT * FROM users");
//$stmt->bind_param("sss", $firstname, $lastname, $email);

var_dump($stmt->execute());

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    echo $row['username'];
    echo '<br/>';

}
$var = 1;
$var2 = 1000;
$ins = $conn->prepare("INSERT INTO user_interests (userID, interestId) VALUES (?,?)");
$ins->bindParam(1, $var2);
$ins->bindParam(2, $var2);
$ins->execute();

$grab = $conn->prepare("SELECT * FROM user_interests WHERE userId=?");
$grab->bindParam(1, $var2);
$grab->execute();

foreach ($grab as $row) {
    var_dump($row);
}

?>