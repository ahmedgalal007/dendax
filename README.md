![Dendax Logo](http://dendax.com/assets/images/logo-dendax@2x.jpg)
# dendax

**_Auther: Ahmed Galal Mohamed_**

**_Company: Akhbar El Yom - Egypt_**

**_Email: ahmedgalal007@gmail.com_**


-----------------------------------------------------------------------------------------------------------------------------

## This project is a test case for dendax application


> **The requirement** 

1.  Create a simple Web form that will send a message from a Web page to the server, 
    Post the data to JSON service from JQuery Ajax method in the services file "/Services/user.php",
    With the content (Name, Email, Phone(Optional), Message)
    The FrontEnd(JQuery, HTML, CSS3, Bootstrap), and The BackEnd(PHP, MySql).
 
2.  Client menu with loading content through AJAX
    Built a javscript  file  "js/dropdownmenu.js" to extend the behviour of  Bootstrap Dropdown item.

    :green_book: Reference [source code example](http://jsfiddle.net/chirayu45/e02t2jcc/1/) .
     
    Build service file  "/Services/menu.php" to get the child elements when mouseover event triggerd  using Ajax .
     
3.  Work with MySQL
    Built  a GET json php service  "/Services/menu.php" to query the database table 'menu' , 
    That table store hierarchical menu Items.
    With recursive relationship between parent and ID fields, So that way the parent can have unlimited childs.
       
4.  Work with MySQL
    Create a script to build the database and the user, log Tables as in the requirments
    user (ID, name, email, message) 
    log (userId, message, modified)
    The ID field in the user table has been added because of the dependency of the log table field 'userId'.

    Create a PROCEDURE "GET_USER_LOGS"  to get the user logs by userid.
    **example**
    ```
    call GET_USER_LOGS(1);
    ```
    Please refere to the "/DB/DB.sql" file

>INSTALLATION INSTRUCTION
>_______________________
>
>- [x] Build the database by running the SQL file in the directory "/DB/DB.sql".
>- [x] Creat the menu table by running the SQL file in the directory "/DB/MenuData.sql".
>- [x] Modify the Config file "/Config.php" with your MySql server database configuration (host, port, user, password, database).
>- [x] Host the application on Apatch server and run it.





