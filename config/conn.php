<?php
/**
 * Created by PhpStorm.
 * User: ashir
 * Date: 3/22/16
 * Time: 10:07 AM
 */

?>

<?php
/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=webstore;host=127.0.0.1';
$user = 'webuser';
$password = '';
try {
    $conn = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
