<?php
require_once 'helpers.php';

function date_calculating($date) {
    if($date === 'null') { return '';}

    $current_date = time();
    $hour = 3600;

    $transfered_date = strtotime($date);

    $difference = floor(($transfered_date - $current_date) / $hour);
    $difference_day = floor($difference / 24);
    if($difference <= 24) {
        echo '<small class="badge badge-danger"><i class="far fa-clock"></i>'.str_pad($difference, strlen($difference) + 11 ,"Годин:",STR_PAD_LEFT).'</small>';
    } else {echo '<small class="badge badge-success"><i class="far fa-clock"></i>'.str_pad($difference_day, strlen($difference_day) +9,"Днів:",STR_PAD_LEFT).'</small>';}
}


$user_name = 'Володимир';
$user_image = 'static/img/user2-160x160.jpg';
$category = ['Вхідні', 'Навчання', 'Робота', 'Домашні справи', 'Авто'];
$title_name = 'Завдання та проекти | Дошка';
$info = [
    [
        'task' => 'Співбесіда в IT компанію',
        'date' => '01.07.2023',
        'category' => 'Робота',
        'status' => 'backlog',
    ], [
        'task' => 'Виконати тестове завдання',
        'date' => '25.07.2023',
        'category' => 'Робота',
        'status' => 'backlog',
    ], [
        'task' => 'Зробити завдання до першого уроку',
        'date' => '27.04.2023',
        'category' => 'Навчання',
        'status' => 'done',
    ], [
        'task' => 'Зустрітись з друзями',
        'date' => '11.05.2023',
        'category' => 'Вхідні',
        'status' => 'to-do',
    ], [
        'task' => 'Купити корм для кота',
        'date' => 'null',
        'category' => 'Домашні справи',
        'status' => 'in-progress',
    ],
    [
        'task' => 'Замовити піцу',
        'date' => '11.05.2023',
        'category' => 'Домашні справи',
        'status' => 'to-do',
    ],
];

function taskSum( array $array, string $projectName): int
{
    $number = 0;
    foreach ($array as $el) {
        if ($el['category'] === $projectName) {
            $number += 1;
        }
    }
    return $number;
}

$kanban_template = renderTemplate(
     'kanban.php',
     ['info' => $info,
         ]);

$main_content =renderTemplate('main.php', [
    'wrapper_content'=> $kanban_template,
    'info' => $info,
    'user_name'=> $user_name,
    'user_image'=> $user_image,
    'category' => $category]);

$layout_template = renderTemplate('layout.php',
    ['body' => $main_content,
     'title_name' => $title_name,
    ]);

echo($layout_template);
