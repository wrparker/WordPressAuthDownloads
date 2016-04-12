# WordPressAuthDownloads
PHP snippet which streams file from a localhost-only accessible directory to authenticated wordpress users.

##Instructions
* Create a directory to serve as your "secret_files" directory that the web server can access.

* Place the .htaccess file in the directory created in 1.  On line 4 fill the quotation marks with the full path to your secret directory.
```
<Directory "/var/www/secret_files/">
```
* Place the protected_user_files.php in the same directory as your wp-load.php file in your wordpress site (typically the root of your wordpress directory).

* Change the variable $protected_path to the path of the directory created in #1 in protected_user_files.php

* Change the variable $wp_url to WordPress Address (URL) -- where your WordPress core files reside.
**Able to be located on the Settings->General screen

* Change $web_name to the name of your site.

* Upload files using a means of file transfers to your secret directory

* Go to $wp_url/protected_user_files.php and you will see a table of file names and the associated link which will cause them to be able to be downloaded by users logged in on your WordPress site.  This page will only show for authenticated users on your wordpress site.  

* Copy/Paste the link generated for the corresponding file name.  The script will use the name $_GET variable to stream the file to logged in users on your website.

* Note: This will work for any logged in WordPress user.  There is no distinction in user privillege level.

Contact W. Ryan Parker for comments or questions (w.ryan.parker@gmail.com)

