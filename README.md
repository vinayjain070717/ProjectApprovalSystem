# Project Approval System
This is a minor project management system which is used by faculty and students to coordinate each other. This is not only uses
in minor project management but also it will be used in application such as practical submission or any type of report submission system.
But currently it is made for making the process of minor project submission through web only.
This has following features:
1) Separate Registration system for faculty and student.
2) Email verification by sending otp via SMTP Mail.
3) Separate Login pages for faculty and student
4) There is faculty assigned to student at the time of registration from assigned faculty
5) At Student Section
* There is a home page in which student see developer detail and some notification if there any
* See the details of group member of their group
* Student can chnage their password
* Faculty detail of their assigned faculty
* Information about material they want to submit like synopsis, SRS and diagram and in which format they have to submit them.
* They can send prepared material to their assigned facutly
* And they can see faculty status that faculty approve their report or reject it.
* We also want to add a section in which student can see some comment that would be written by faculty for improvement of their document
6) At Faculty Section
* Faculty have also a home page in which they see some notifation.
* Faculty can see their details
* Faculty can change password
* Faculty can see the group which are assigned to that faculty
* Faculty can see the reports send by student and can approve or reject their document.
* We also want to add a section in which faculty can write comment to the report send by student for correction and improvement of report.

## PREREQUISITE
PHP, Javascript, HTML, CSS, Mysql

## INSTALLATION
* Firstly fork full project
* Then download mysql from (https://www.mysql.com/downloads/)
* Then install WAMP server from (https://sourceforge.net/projects/wampserver/) or you can also donwload XAMPP server
* Copy whole project files in wamp/www/ folder
* Go to db folder and Login mysql with root by commnad
```
mysql -uUSERNAME -pPASSWORD
```
* Then make a user in mysql from command if you want
```
CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';
```
* Login with your created user and make database by command
```
create database database_name;
use database;
```
* Then import the sql file in your database so all the tables are setup in your database
```
source sql_file_name;
```
* Run wamp server and wait until all services get activated
* Write the url of registration page and now your project is installed and you can start to use it
