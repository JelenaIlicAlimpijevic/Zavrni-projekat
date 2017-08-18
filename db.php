
<?php
function getConnection() {
    
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "vivify_blog_3_dan";    
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $error) {
        
        echo $error->getMessage();
    }
    return $connection;
}

function getPreparedStatement($sql) {       
         $connection = getConnection();
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement;
    }

function redirect($url) {
    header("Location: http://localhost:1234/" . ltrim($url, '/'));
    exit();
}

function fetchAllQueryResults($sql) {
    return getPreparedStatement($sql)->fetchAll();    
  }

function fetchSingleQueryResult($sql) {
    return getPreparedStatement($sql)->fetch();
}

function fetchFromTableById($table, $id) {
        
        $sql ="SELECT * FROM $table WHERE {$table}.id = $id";        
        return getPreparedStatement($sql);
    }

function executeQuery($sql) {
    getPreparedStatement($sql);
}

function fetchPostById($id){
    $sql = "SELECT posts.id, posts.title, posts.created_at, posts.content,
                       profiles.first_name, profiles.last_name FROM posts
                       INNER JOIN users ON users.id = posts.created_by
                       LEFT JOIN profiles ON users.id = profiles.user_id
                       WHERE posts.id='{$id}'";

         // var_dump($sql);
          $post=fetchSingleQueryResult($sql); 
          return  $post;         

  }

?>


