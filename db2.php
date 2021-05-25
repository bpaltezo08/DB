<?php 

    $DBNAME = "DB_NAME";
    $DBPWD = "DB_PASSWORD";
    $DBUSER = "DB_USER";
    $DBHOST = "DB_HOST";
    
    class createCon  {

        function connect() {
            $this->host = $DBHOST;
            $this->user = $DBUSER;
            $this->pass = $DBPWD;
            $this->db = $DBNAME;

            print_r($this->host);
            
            $con = mysqli_connect("localhost", "id14996776_max", "/1AGr(YxkbjqEq?=", "id14996776_bustracker");
            if (!$con) {
                die('Could not connect to database!');
            } else {
                $this->myconn = $con;
                // echo 'Connection established!';}
            }
            return $this->myconn;
        }

        function close() {
            mysqli_close($myconn);
            // echo 'Connection closed!';
        }

    }

    function Fetch($query){
        $connection = new createCon();
        $connection->connect();
        $result = mysqli_query($connection->myconn, $query);
        $connection->close();
        return $result;
    }
    
    function GetFetch($query){
        $connection = new createCon();
        $connection->connect();
        $result = mysqli_query($connection->myconn, $query);
        $res = [];
        $res[] = $result;
        $res[] = mysqli_insert_id($connection->myconn);
        $connection->close();
        return $res;
    }

?>
