-- Додавання юзерів
INSERT INTO `projects_and_work`.`users`(`name`,`email`,`password`);
VALUES (
        'Andrew',
        'drew1997@gmail.com',
        '1234567890home'
       ),
       (
           'Max',
           'maximum_power@yahoo.com',
           'aqwgnkefwmgmrgksf3311_'),
       (
           'Samantha',
        'dolphine@gmail.com',
        'superuniquepassword123456789-1'
       )
-- Внесення проектів у базу
INSERT INTO `projects_and_work`.`projects`(`title`,`user_id`);
Values ('Вхідні',1),
        ('Навчання',1),
        ('Робота',1),
        ('Домашні справи',1),
        ('Авто',1);

-- Внесення в таблицю завдань
INSERT INTO `projects_and_work`.work(`title`,`project_id`,`deadline`,`status`,`user_id`,);
VALUE ('Співбесіда в IT компанії',3,'01.07.2023','backlog',1),
    ('Виконати тестове завдання',3,'25.07.2023','backlog',1),
    ('Зробити завдання до першого уроку',2,'27.04.2023','done',1),
    ('Зустрітись з друзями',1,'25.07.2023','to-do',1),
    ('Купити корм для кота',4,null,'in-progress',1),
    ('Замовити піцу',4,null,'to-do',1);

-- Запити в БД
-- Список проектів для користувача
SELECT project.id,project.title, user.name;
FROM `projects_and_work`.`projects` AS project;
LEFT JOIN `projects_and_work`.`users` AS user;
ON project.user_id = user.id
WHERE project.user_id = 1;

-- Отримання списку всіх завдань для для одного проєкту
SELECT work.id, work.title, work.description, project.title, work.deadline, work.file, work.status
FROM `tasks_and_projects`.`work` AS work
         LEFT JOIN `tasks_and_projects`.`projects` AS project
                   ON work.project_id = project.id
WHERE project.id = 4 AND work.user_id = 1;

-- Оновлення статусу на to-do
UPDATE `tasks_and_projects`.`tasks`
SET `status` = 'to-do'
WHERE id = 1;

-- Оновлення статусу на done
UPDATE `tasks_and_projects`.`tasks`
SET `status` = 'done'
WHERE id = 4;

-- Оновлена назва завдання по ідентифікатору
UPDATE `tasks_and_projects`.`tasks`
SET `title` = 'Зробити завдання до сьомого уроку'
WHERE id = 3;