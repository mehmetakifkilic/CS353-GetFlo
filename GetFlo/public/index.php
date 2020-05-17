<?php include "templates/header.php";
if (isset($_POST['submit'])) {
    require "../config.php";

    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_user = array(
            "name" => $_POST['name'],
            "username"  => $_POST['username'],
            "password"     => $_POST['password'],
            "gender"       => $_POST['gender'],
            "phone_number"       => $_POST['phonenumber']
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "customers",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>

    <ul>
        <li>
            <h2>Add a user</h2>

            <form method="post">
                <label for="name">First-Last Name</label>
                <input type="text" name="name" id="name">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <label for="password">Password</label>
                <input type="text" name="password" id="password">
                <label for="gender">Gender</label>
                <input type="text" name="gender" id="gender">
                <label for="phonenumber">Phone Number</label>
                <input type="text" name="phonenumber" id="phonenumber">
                <input type="submit" name="submit" value="Submit">
            </form>

        </li>
    </ul>

<?php include "templates/footer.php"; ?>