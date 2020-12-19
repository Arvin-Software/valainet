# ValaiNet v1.0
Valainet is a project that will help IT administrators to monitor their server in realtime and identify the potential issue with it. This project also has modules to manage service tickets, Asset management. Please run the documentation file to learn more about operating the software.

ValaiNet consists of Server and Client Software. The server software is the point to monitor and control all the client systems. Please refer to the documentation on how to operate the software.

## Installing ValaiNet Server
This software requires linux to run using LAMP stack installed. The software is easy to install and configure with minimal effort. I've only tested with Ubuntu server 20.04. This software also works with Windows and other operating systems.

## Installing LAMP stack in Ubuntu 20.04 Server
### 1. Install Apache 2

```Bash
sudo apt-get update

sudo apt-get install apache2
```
### 2. Set Global server name
```Bash
sudo apache2ctl configtest
```
```Bash
Output
AH00558: apache2: Could not reliably determine the server's fully qualified domain name, using 127.0.1.1. Set the 'ServerName' directive globally to suppress this message
Syntax OK
```
Open the main configuration file in your text editor
```Bash
sudo nano /etc/apache2/apache2.conf
```
Add the below text
```Bash
ServerName server_domain_or_IP
```
Check for the error using
```Bash
sudo apache2ctl configtest
```
Now the output should read
```Bash
Output
Syntax OK
```
Now finally restart apache server to implement changes
```Bash
sudo systemctl restart apache2
```
Add exception to firewall so you can access the application over the internet
```Bash
sudo ufw allow in "Apache Full"
```
### 3. Install MySQL or other DB of your choice
```Bash
sudo apt-get install mysql-server
```
optional : you can secure the mysql installation.
### 4. Install PHP
```Bash
sudo apt-get install php libapache2-mod-php php-mysql
```
Finally restart Apache
```Bash
sudo systemctl restart apache2
```
## Creating Database
### 1. Sign in to MySQL
```Bash
sudo mysql -u root
```
### 2. Create Database
Once inside MySQL. Enter the below command
```Bash
CREATE DATABASE IF NOT EXISTS valai;
```
## Install Valai
1. Download the latest release of ValaiNet from the [releases page](https://github.com/Aravindh-Muthuswamy/valainet/releases)
1. Extract it into the /var/www/html folder using the appropriate terminal commands
1. Open your web browser and go to the url below according to your configuration
```
http://your-ip-address/valainet/installation
```
4. Once inside the installation follow the installation wizard until done.

Note : if you use a different database name make sure your configure in valainet/classes/dbOper.php and valainet/classes/khatral.php

## Running Client Software(Linux)
1. Copy the client script from the cient/linux from the installation folder to the folder of your choice.
2. Convert the file to a executable
3. Open the file and change the server address and ip address and other things in the .sh file
4. Run the sh file.

Copy the file to how many computers your want and change the configuration and run.

Thank you for choosing ValaiNet.

Please contact me if you are interested in this project or need support for using this project.

Please also note that there are so many things that are currently in development in this project. Please post any issues if you find anything thanks.