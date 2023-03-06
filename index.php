<!--Developed by Frankline Bwire Omondi-->
<!--© Notchcom Solutions Kenya-->

<!DOCTYPE html>
<html>
<head><title>Arrays</title></head>
    <body>
    <form method="post" action="index.php">
        <input type="text" name="names1">
        <input type="text" name="names2">
        <input type="text" name="names3">
        <input type="text" name="location1">
        <input type="text" name="location2">
        <input type="text" name="location3">
        <button type="submit" name="submit">Submit</button>
        </form>
    </body>
</html>

 
<?php 
if(isset($_POST["submit"])){
    
    $db_conn = mysqli_connect("localhost", "root", "", "array_db");

$user_data  = array(
    "0" => array($_POST["names1"], $_POST["location1"], "True"),
    "1" => array($_POST["names2"], $_POST["location2"], "True"),
    "2" => array($_POST["names3"], $_POST["location3"], "False")
);
if(is_array($user_data)){
    foreach ($user_data as $row) {
        $val1 = mysqli_real_escape_string($db_conn, $row[0]);
        $val2 = mysqli_real_escape_string($db_conn, $row[1]);
        $val3 = mysqli_real_escape_string($db_conn, $row[2]);
        $query ="INSERT INTO `array_data` (`names`, `data`) VALUES ( '".$val1."','".$val2."')";	
        mysqli_query($db_conn, $query);
    }
};
    
};
    

?>