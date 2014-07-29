 
h1. LDAP Registration tool (LRT)

h2. install

rename the "config.php.dist" to "config.php" and edit it

import db.sql into mysql

run webserver with php and as root dir "www-root"

h2. add an registation request

got to the webserver und fillout the form and submit it
thats all

h2. show list

run

	php list.php

h2. allow registration from user %user%

run

	php allow.php %user%

h2. delete user request

run

	php delete.php %user%


h2. See  which users are in LDAP 

run 	
	php getusers.php
	
h2. delete users from LDAP
	
	will come
