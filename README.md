# WordPressAuthDownloads
PHP snippet which streams file from a localhost-only accessible directory to authenticated WordPress users on a particular WordPress website.

##Instructions
* Create a directory to serve as the "secret_files" directory that the web server can access.

* Place the .htaccess file in the directory created in 1.  On line 4 fill the quotation marks with the full path to the secret directory.  **Include trailing slash /**
```
<Directory "/var/www/secret_files/">
```
* Place the protected_user_files.php in the same directory as the wp-load.php file in your wordpress site (the directory with all core WordPress files).

* Change the variable $protected_path to the path of the directory created in #1 in protected_user_files.php.  **Include trailing slash '/'**

* Change the variable $wp_url to the site's "WordPress Address (URL)" --This is where the WordPress core files reside.  **Include trailing slash '/'**
  * Able to be located on the Settings->General screen

* Change $web_name to the name of the site.

* Put files into the secret directory (any type is compatible)

* Go to $wp_url/protected_user_files.php and you will see a table of file names and the associated link which will cause them to be able to be downloaded by users logged in on your WordPress site.  This page will only show for authenticated users on the wordpress site.  

* Copy/Paste the link generated for the corresponding file name.  The script will use the name $_GET variable to stream the file to logged in users on the website.

* Note: This will work for any logged in WordPress user.  There is no distinction in user privillege level.

Contact W. Ryan Parker for comments or questions (w.ryan.parker@gmail.com)

