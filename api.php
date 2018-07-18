<?php

require_once("config.php");
require_once("db.php");  // $link

// echo "Hello from api.php";
// print_r($_POST);

if( isset($_POST['tweetText']) ) {
    $text = $_POST['tweetText'];
    // echo $text;

    if( $text == '' ) {
        $errors[] = ['title' => 'Введите текст твита'];
    }

    if( empty($errors) ) {
        $text = mysqli_real_escape_string($link, $text);
        //INSERT INTO `tweets` (`id`, `date`, `text`) VALUES (NULL, '2018-07-15 05:00:00', 'новый текст');
        $query = "INSERT INTO tweets (date, text) VALUES ( NOW(), '" . $text . "')";
        $result = mysqli_query($link, $query);
        if( !$result ) {
            // $errors[] = ['title' => 'Ошибка записи в БД', 'desc' = mysqli_error($link)];
            die(mysqli_error($link));
        }

        echo "success";
    } else {
        echo "error";
    }
}

?>