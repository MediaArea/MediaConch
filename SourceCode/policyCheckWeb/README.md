# MediaConchOnline README

MediaConch is an open source software project consisting of a toolset that aims to further develop the standardization and validation of preservation-level audiovisual files used within various memory institutions and communities. The software consists of an implementation checker, policy checker, reporter and fixer that will work together to offer its users an advanced level of ability to validate, assess and find solutions to repair the digital files within their collections. Accessible via either the command line, a graphical user interface (GUI), or web-based shell, the MediaConch project will serve to provide detailed individual and batch-level conformance checking analysis using its adaptable, flexible and interoperable software application interface. With a project focus dedicated to furthering the longevity of Matroska, Linear Pulse Code Modulation (LPCM) and FF Video Codec 1 (FFV1) as recommended digital preservation audiovisual formats, MediaConch will anticipate and contribute to the further development of the standardization of these formats. The MediaConch open source project was created and is currently under development by MediaArea, notable for the creation of MediaInfo, an open source media checker software application.

MediaConchOnline is a web application for MediaConch.

Website: <a href="https://mediaarea.net/MediaConch/">:shell: MediaConch project</a>.

A MediaConchOnline instance is available on MediaArea website : [MediaConchOnline](https://mediaarea.net/MediaConchOnline/)

# Funding and Licensing

This project has received funding from PREFORMA, co-funded by the European Commission under its FP7-ICT Programme. All software and source code developed by MediaArea during the PREFORMA project will be provided under the following two open source licenses: GNU General Public License 3.0 (GPLv3 or later), Mozilla Public License (MPLv2 or later).

All open source digital assets for the software developed by MediaArea during the PREFORMA project will be made available under the open access license: Creative Commons license attribution – Sharealike 4.0 International (CC BY-SA v4.0). All assets will exist in open file formats within an open platform (an open standard as defined in the European Interoperability Framework for Pan-European eGovernment Service (version 1.0 2004)).

# How to install

## Dependencies

* Apache web server >= 2.2 (should also work on nginx and lighttpd)
* Php >= 5.4
    * Mandatory packages for debian-like distributions : libapache2-mod-php5, php5-cli, php5-intl, php5-mysql
    * Mandatory packages for RedHat-like distributions : php, php-cli, php-intl, php-mbstring, php-mysql, php-pdo, php-process, php-xml
    * Optional packages for RedHat-like distributions : php-pecl-apc or php-opcache
    * date.timezone should be set in your php.ini (both cli and apache module)
* MySQL >= 5.1
* [MediaConch-cli](https://mediaarea.net/MediaConch/download.html) >= 15.10 (depends on [libmediainfo >= 0.7.79](https://mediaarea.net/en/MediaInfo/Download) and [libzen >= 0.4.31](https://mediaarea.net/en/MediaInfo/Download)) 
* [Composer](https://getcomposer.org/download/)

## Get MediaConchOnline sourcecode

### From git

Clone MediaConchOnline repository
```
git clone https://github.com/MediaArea/MediaConch.git
```
Source directory of MediaConchOnline is "SourceCode/policyCheckWeb/"

### From tarball

@TODO

## Configure MediaConchOnline

### MySQL

Create a new user for MediaConchOnline (you can also use an existing one).
Create a new database for MediaConchOnline (you can also use an existing one).
Give privilege for your user to your database.

```
CREATE USER 'YOUR_USER'@'localhost' IDENTIFIED BY 'YOUR_PASSWORD';
GRANT USAGE ON * . * TO 'YOUR_USER'@'localhost' IDENTIFIED BY 'YOUR_PASSWORD';
CREATE DATABASE IF NOT EXISTS `YOUR_DATABASE`;
GRANT ALL PRIVILEGES ON `YOUR_DATABASE` . * TO 'YOUR_USER'@'localhost';
```

### Project configuration

Enter project directory and run composer to install dependencies and configure the project
```
cd YOUR_PATH/MediaConch/SourceCode/policyCheckWeb/
composer install
```
Parameters :

* database_driver (pdo_mysql): driver to access database server, leave blank to use MySQL
* database_host (127.0.0.1): host of the database server, leave blank if the database server is on the same host than the web server
* database_port (null): port of the database server, leave blank if database server is running on standard port
* database_name (symfony): database for MediaConchOnline
* database_user (root): user for MediaConchOnline database
* database_password (null): password for MediaConchOnline database
* mailer_transport (smtp): mailer server to send emails, leave blank
* mailer_host (127.0.0.1): mailer server host, leave blank
* mailer_user (null): mailer server user, leave blank
* mailer_password (null): mailer server password, leave blank
* locale (en): locale of the project, only english is supported for now, leave blank
* secret (ThisTokenIsNotSoSecretChangeIt): a unique string for your MediaConchOnline instance, used to generating CSRF tokens and encrypt cookies, fill it with a random string (at least 32 characters is recommended)
* mco_check_folder (/some/folder/): a directory containing files to test in "Check server files", set to null to disable this feature
* mco_ga_tracking (null): Google Analytics tracking code, use tracking id (UA-XXXXXXXX-X) or null to disable this feature

You can change these parameters after by editing this file : app/config/parameters.yml

__Create database tables__

```
app/console doctrine:schema:update --force
```

__Add an admin user__
```
app/console fos:user:create YOUR_ADMIN_USER YOUR_EMAIL@domain.com --super-admin
```

__Create a directory to store user policies files and give it rights to apache user__
```
mkdir files && sudo chown apache files
```

### Apache

Add a vhost to access MediaConchOnline, like this minimal example :
```
<VirtualHost *:80>
    ServerName WWW.YOURWEBSITE.COM
    DocumentRoot "YOUR_PATH/MediaConch/SourceCode/policyCheckWeb/web/"
    <Directory "YOUR_PATH/MediaConch/SourceCode/policyCheckWeb/web/">
        AllowOverride All
        Options -Indexes
        <IfModule mod_authz_core.c>
          # Apache 2.4
            Require all granted
        </IfModule>
        <IfModule !mod_authz_core.c>
          # Apache 2.2
            Order allow,deny
            allow from all
        </IfModule>
    </Directory>
</VirtualHost>

```
Allow apache user to write in cache and log directory, some methods are explain in [Symfony documentation](https://symfony.com/doc/current/book/installation.html#checking-symfony-application-configuration-and-setup)


