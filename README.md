# WordPressAuthDownloads
PHP snippet which streams file from a localhost accessible directory to authenticated wordpress users.

##Instructions
1. Create a directory to serve as your "secret_files" directory that the web server can access.
2. Place the .htaccess file in the directory created in 1.  On line 4 fill the quotation marks with the full path to your secret directory.
```
<Directory "/var/www/secret_files/">
```
3. Place the protected_user_files.php in the same directory as your wp-load.php file in your wordpress site (typically the root of your wordpress directory).
4. Change the variable $protected_path to the path of the directory created in #1 in protected_user_files.php
5. Change the variable $wp_url to the URL of the root of your wordpress site.  (You should be able to go to the $wp_url/protected_user_files.php)
6. Change $web_name to the name of your site.
7. Upload files using a means of file transfers to your secret directory
8. Go to $wp_url/protected_user_files.php and you will see a table of file names and the associated link which will cause them to stream.

Contact W. Ryan Parker for Concers or questions (w.ryan.parker@gmail.com)

