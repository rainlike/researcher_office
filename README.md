composer create-project symfony/skeleton researcher_office

git init
git commit -m "initial commit"
git remote add origin git@github.com:katebalan/researcher_office.git
git push -u origin master

composer require server
composer require annotations
composer require sec-checker
composer require twig

composer require symfony/maker-bundle --dev
 php bin/console list make

composer require profiler --dev
composer require debug --dev

composer require security
composer require orm
composer require doctrine
php bin/console make:user
php bin/console make:auth

composer require orm-fixtures --dev
bin/console make:fixtures

composer require symfony/asset

Webpack
yarn encore dev
yarn encore dev --watch
yarn encore production

```apacheconfig
<VirtualHost *:80>
    ServerName researcher.loc

    DocumentRoot "/var/www/researcher_office/public"
    <Directory "/var/www/researcher_office/public">
        AllowOverride None
        Order Allow,Deny
        Allow from All

        <IfModule mod_rewrite.c>
            Options -MultiViews
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^(.*)$ index.php [QSA,L]
        </IfModule>
    </Directory>

    <Directory /var/www/researcher_office/public/bundles>
        <IfModule mod_rewrite.c>
            RewriteEngine Off
        </IfModule>
    </Directory>

    ErrorLog /var/log/apache2/tenders_symfony.log
    CustomLog /var/log/apache2/tenders_symfony.log combined
</VirtualHost>
```
composer require annotations
