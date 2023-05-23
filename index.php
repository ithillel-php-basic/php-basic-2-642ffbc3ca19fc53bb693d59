<?php
require_once 'helpers.php';
require_once 'functions.php';


function connect_to_mysql_db(){
    mysqli_report(MYSQLI_REPORT_OFF);

    $link = mysqli_connect("localhost", "root", "Defaut23322332k", "projects_and_work");

    if ($link === false){

        print("Ошибка: Не вдається підключитися до MySQL: " . mysqli_connect_error());

    }

    mysqli_set_charset($link, 'utf8mb4');

    return $link;
}

$link= connect_to_mysql_db();



//$sql_projects = "SELECT * FROM projects_and_work.projects pp LEFT JOIN projects_and_work.users pu ON pp.user_id = 1";
$sql_projects = "SELECT projects_and_work.projects.title FROM projects_and_work.projects  WHERE user_id = 1";
//$sql_projects = "SELECT * FROM projects AS project LEFT JOIN users AS user ON user.user_id = '%user_id'";
$query_to_projects = mysqli_query($link , $sql_projects);
$projects = mysqli_fetch_all($query_to_projects, MYSQLI_ASSOC);

//$sql_work = "SELECT projects_and_work.work FROM projects_and_work.work WHERE user_id = 1";
$sql_work1 = "SELECT work.* FROM projects_and_work.work AS work RIGHT JOIN projects_and_work.users AS user ON work.user_id = user.id = 1";
$work_query = mysqli_query($link,$sql_work1);
$work = $work_query ? mysqli_fetch_all($work_query, MYSQLI_ASSOC) : false;


$user_name = 'Володимир';
$user_image = 'static/img/user2-160x160.jpg';
$title_name = 'Завдання та проекти | Дошка';
$kanban_template = renderTemplate(
     'kanban.php',
     ['work' => $work]);

$main_content =renderTemplate('main.php', [
    'wrapper_content'=> $kanban_template,
    'work' => $work,
    'user_name'=> $user_name,
    'user_image'=> $user_image,
    'projects' => $projects]);

$layout_template = renderTemplate('layout.php',
    ['body' => $main_content,
     'title_name' => $title_name,
    ]);
echo($layout_template);