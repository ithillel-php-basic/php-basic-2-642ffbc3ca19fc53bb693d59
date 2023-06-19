<?php
require_once 'helpers.php';
require_once 'functions.php';

$tasks = '';
function connect_to_mysql_db(){
    mysqli_report(MYSQLI_REPORT_OFF);

    $link = mysqli_connect("localhost", "root", "Defaut23322332k", "projects_and_work");

    if ($link === false){

        print("Ошибка: Не вдається підключитися до MySQL: " . mysqli_connect_error());
        exit();
    }

    mysqli_set_charset($link, 'utf8mb4');

    return $link;
}

$link= connect_to_mysql_db();

    $sql_projects = "SELECT * FROM projects WHERE user_id = 1";
    if($sql_projects) {
        $query_to_projects = mysqli_query($link , $sql_projects);
        $projects = mysqli_fetch_all($query_to_projects, MYSQLI_ASSOC);
    } else {
        print_r("Помилка, немає данних від цього користувача");
        exit();
    }

if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];
    $sql_tasks = "SELECT * FROM work WHERE project_id = $project_id";
    $query_to_tasks = mysqli_query($link, $sql_tasks);
    if (mysqli_num_rows($query_to_tasks) > 0) {
    $tasks = mysqli_fetch_all($query_to_tasks, MYSQLI_ASSOC);
    } else {
        echo 'There is no tasks for this project.';
    }
} else {
    $sql_tasks_all ="SELECT * FROM work AS work RIGHT JOIN users AS user ON work.user_id = user.id = 1";
        $query_to_all_tasks = mysqli_query($link, $sql_tasks_all);
    $tasks = mysqli_fetch_all($query_to_all_tasks, MYSQLI_ASSOC);
}

$user_name = 'Володимир';
$user_image = 'static/img/user2-160x160.jpg';
$title_name = 'Завдання та проекти | Дошка';

$addTask = renderTemplate(
    'add.php', [
        'projects' => $projects
    ]);
$kanban_template = renderTemplate(
     'kanban.php', [
         'tasks' => $tasks,
         'projects' => $projects
     ]);

$main_content =renderTemplate('main.php', [
    'wrapper_content'=> $kanban_template,
    'user_name'=> $user_name,
    'user_image'=> $user_image,
    'projects' => $projects,
    'add' => $addTask,
     ]
);

$layout_template = renderTemplate('layout.php',
    ['body' => $main_content,
     'title_name' => $title_name,
    ]);
echo($layout_template);