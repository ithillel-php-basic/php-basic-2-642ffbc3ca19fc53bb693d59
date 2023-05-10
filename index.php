<?php
require_once 'helpers.php';
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
     ['info' => $info]);

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

echo ($layout_template);
