Goal: demonstrate PHP5 programming skills by adding missing pieces of code.

test.db contains sqlite database (for ease of deployment). If you have trouble with sqlite, 
convert it into mysql and attach necessary sql create scripts

1. process login credentials and authenticate users
User table contains 3 entries listed below, but passwords are stored in form of a md5 hash with a salt = 'FOaflFaD', 
eg. hash for first password was obtained using 'FOaflFaDfoo'

adam:foo
mark:bar
peter:baz

2. account.php should be only accessible by users who have passed login process
On this page, display list of accounts for active user with an option to delete them from the database. 
This could be done using Ajax (jquery is included on that page), but it's not an absolute requirement.

3. bootstrap.php should contain basic boilerplate code like database connection

4. complete and create new classes as you see fit

5. create a new table for login attempts and display last 5 on the welcome page

Note: final code should adhere to best practices and represent your best effort in building 
a production ready application in object oriented PHP.