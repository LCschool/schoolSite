<!--
<!DOCTYPE html>
<html>
    <head>
        <style>
             body {
                height: 100vh;
            }
            .mainBlock {
                position: relative;
                width: 400px;
                height: 150px;
                border: 2px solid #000;
                left: calc(50% - 200px);
                top: calc(50% - 200px);
            }
            .labels {
                position: relative;
                left: 20%;
                top: 20%;
            }
        </style>
        <script>
            function add_user(){
            -->
            <?php
            $name = $_POST["uName"]; // creates variable $select
            $_SESSION["name"] = $name;
            // build SELECT query
             $query = "INSERT INTO user (name) VALUES (\"" . $name . "\");";
             $msgBoardQuery = "INSERT INTO msg_board (name, subject) VALUES(\"" . $name . "\", \"Stuff\");";
            $servername = "localhost";
             $username = "site";
            $password= "hohoho14";

            // Connect to MySQL
            if ( !( $database =  new mysqli( "localhost",
            "site", "hohoho14","site" ) ) )                      
            die( "Could not connect to database </body></html>" );
         // open Products database
         // query Products database
         $database -> query($query);
         $database -> query($query);

         $database -> close();
         header('Location: roomMaker.php');
        exit;
      ?><!--
            }
            
            addEventListener("load",add_user())
        </script>

    </head>
    <body>
            <div class="mainBlock">
            <form id="signIn" method="post" action="signIn.php">
                <h1 class="labels"> Enter Username:</h1>
                <input type="radio" id="create" name="choice" value="HTML">
                <label for="html">Create a Room</label>
                <input type="radio" id="join" name="choice" value="CSS">
                <label for="css">Join A Room</label><br>
                <input type="submit" name="submit" class="labels" value="Continue" >
            </form>
        </div>
         
    </body>
</html>-->