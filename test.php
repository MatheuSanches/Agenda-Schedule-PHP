<?php
    //conexão com a database
    require 'conecta.php';
    if(isset($_GET['page'])){
        $page_num = filter_var($_GET['page'], FILTER_VALIDATE_INT[
            'options'=>[
                'default'=> 1,
                'min_range'=>1
            ]
        ]);
    } else {
        $page_num = 1;
    }
    //Define o limite de campos na página 
    $page_limit = 2;
    $page_offset= $page_limit * ($page_num - 1); 

    function showPosts($conn, $current_page_num, $page_limit, $page_offset){
        $query = mysqli_query($conn, "SELECT * FROM cliente ORDER BY id LIMIT $page_limit OFFSET $page_offset");
        if(mysqli_num_rows($query > 0)){
            while($row = mysqli_fetch_array($query)){
                echo '<li><h2>'.$row['nome'].'</h2><p>'.$row['telefone1'].'</p></li>';
            }
        $total_posts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cliente"));
        $total_page = ceil($total_posts / $page_limit);
        $next_page = $current_page_num+1;
        $prev_page = $current_page_num-1;
        echo "<li>";
        if($current_page_num > 1){
            echo '<a href="?page='.$prev_page.'" class="page_link">Anterior</a>';
        }
        for($i = 1;$i <= $total_page; $i++){
            if($i == $current_page_num){
                echo '<a href="?page='.$i.'" class="page_linkactivepage">'.$i.'</a>';
            } else {
                echo '<a href="?page='.$i.'class="page_link">'.$i.'</a>';
            }
        }
        if($total_page + 1 != $next_page){
            echo '<a href="?page='.$next_page.'" class="page_link">Próxima</a>';
        }
        echo "</li>";
        } else {
            echo "Sem dados...";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title> LiNaK Pagination </title>
        <style>
            body{
                padding: 0;
                margin: 0;
                font-family: sans-serif, arial;
            }
            .page_link{
                display: inline-block;
                color: #222;
                border: 1px solid #ddd;
                padding: 5px 10px;
                margin: 0 5px;
                text-decoration: none;
                cursor: pointer;
            }   
            .active-page{
                background-color: dodgerblue;
                color: #FFF;
                outline: none;
                border: 1px solid rgba(0,0,0,0,.1);
            } 
            .container{
                border: 5px solid #ccc;
                padding: 10px;
            }
            .posts{
                margin: 0;
                list-style: none;
                padding: 0;
            }
            .posts li{
                padding: 10px 5px;
                margin: 0;
                border-bottom: 1px solid #ddd;
            }
            .h2{
                margin: 0;
                padding: 0;
            }
            p{
                margin: 0;
                padding: 10px 10px 0 10px;
                color: #444;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align:center;">Linak Pagination</h1>
        <div class="container">
            <ul class="posts">
                <?php
                    showPosts($conn,$page_num,$page_limit,$page_offset)
                ?>
            </ul>
        </div>
    </body>
</html>