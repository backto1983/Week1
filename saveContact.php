<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Save Contact</title>
    </head>
    <body>
        <h1>Saving contact...</h1>
        <?php
            $firstName = $_POST['firstName'];
            echo 'First Name: ' . $firstName . '<br />';
            $lastName = $_POST['lastName'];
            echo 'Last Name: ' . $lastName . '<br />';
            $email = $_POST['email'];
            echo 'email: ' . $email;

            #Connecting to the database and saving file
            $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200358165', 'gc200358165','lyXAs4jl8F');

            #Connect to the DB
            //$conn = new PDO('mysql:host=localHost;dbname=php', 'root','');

            #Create a SQL command
            $sql = 'INSERT INTO contacts (firstName, lastName, email)    
                    VALUES (:firstName, :lastName, :email)';

            #Prevent SQL injection attacks
            $cmd = $conn->prepare($sql);
            $cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 30);
            $cmd->bindParam(':lastName', $lastName, PDO::PARAM_STR, 30);
            $cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);

            #Execute the SQL command
            $cmd->execute();

            #Close the connection to the DB
            $conn = null;

            #Redirect to a new page
            header('location:contacts.php');
        ?>
    </body>
</html>