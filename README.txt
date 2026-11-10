LSB SIGN IN - ACTIVITY 1

FILES INCLUDED:
- index.php       Main page; sends users to login or dashboard
- db.php          Database connection
- login.php       Login page and login checking
- register.php    Registration page and saving new accounts
- dashboard.php   Page shown after a successful login
- logout.php      Ends the user's session
- style.css       Page design
- database.sql    SQL file for creating the database and users table

DATABASE:
Database name: activity1_db
Table name: users

IMPORTANT:
The database and users table were already created manually in your Termux setup.
You do not need to create them again if they are still there.

RUNNING ON TERMUX:
1. Start MariaDB in Termux.
2. Open another Termux session and go to this project folder.
3. Run: php -S 0.0.0.0:8000
4. Open Chrome and visit: http://localhost:8000

The database connection in db.php uses:
Host: localhost
Username: root
Password: (blank)
Database: activity1_db

If your MariaDB root account has a password, update db.php to use it.
