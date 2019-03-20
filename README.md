#TChatFJ

##Requirement :
- apache server <=2.4
- php version <= 5.6

##Installation guide :

* Clone the project ( you will get the default branch master )

```bash
  git clone https://github.com/FirasGL/TchatFJ
```
* Run this command in the root directory of the project to download all dependencies

```bash
  php composer.phar install
```

* Create a database and run the SQL scripts in infrastructure/database.sql

* Edit the database configuration in the file infrastructure/DBConfig.php

```bash
  return array(
          "database_host" => "<your_database_host>",
          "database_user" => "<your_database_user>",
          "database_password" => "<your_database_password>",
          "database_name" => "<your_database_name>",
          "database_port" => "<your_database_port>",
    );
```
##Create a Virtual Host
* Add the configuration file

```bash
  sudo nano /etc/apache2/sites-available/<file_name>.conf
```
* Add this configuration to the created file

```bash
Define PRJ_PATH <directory_project>
<VirtualHost *:80>
    DocumentRoot ${PRJ_PATH}/web
    serverName tchat-fj.local
    <Directory ${PRJ_PATH}/web>
        Options FollowSymLinks Indexes
        AllowOverride ALL
        Order Allow,Deny
        Allow from All
		Require all granted
    </Directory>
</VirtualHost>
```
* Enable your site

```bash
  sudo a2ensite <file_name>.conf
```
* Restart Apache server

```bash
     sudo service apache2 restart
```
* Add your site to the hosts file

```bash
  sudo nano /etc/hosts
```
```bash
127.0.0.1       localhost
127.0.0.1       tchat-fj.local

# The following lines are desirable for IPv6 capable hosts
::1     ip6-localhost ip6-loopback
fe00::0 ip6-localnet
ff00::0 ip6-mcastprefix
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters
```

And That's it ! Go to http://tchat-fj.local 
