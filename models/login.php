<?php
class Login {
    public static function cheackLogin() {
         if(isset($_POST["submit"])){
            if(!empty($_POST['username']) and !empty($_POST['password'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $db = Db::getConnection();
                $result = $db->query("SELECT * FROM user WHERE username='".$username."' AND password='".$password."'");
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $row = $result->fetch();
                if($row != NULL) {
                    $_SESSION['session_username'] = $row;
                    header('Location: http://test25');
                }
                else {
                    echo "net";
                }
            }
         }
    }
}
      