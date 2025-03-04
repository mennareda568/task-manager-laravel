Task Manager Laravel Project

Overview
This Laravel project is a task management system that allows users to create, edit, delete, and mark tasks as complete. Additionally, it features a restore functionality for completed tasks.

Features
- Create new tasks with a title, description, and due date
- Edit existing tasks to update their title, description, and due date
- Mark tasks as complete to track progress
- Delete tasks or move them to a completed tasks table
- Restore tasks from the completed tasks table

Installation Guide:

1_composer install

2_composer update

3_Open PHPMyAdmin (http://localhost/phpmyadmin)

*Create a database with name tasks

4_Upload .env and connect it with database

5_php artisan migrate

6_php artisan serve
