 DoLikeEdu-mobi
======
The Mobi web client for DoLikeEdu

OOTB Dev: Prerequisite
======
- [php] >=5.6.4
- php5-memcached `apt-get install php5-memcached`
- [composer] to manage and update dependencies
- [Sass] to update and complie sass/css `doLikeEdu-mobi/resources/assets/sass`

OOTB Dev: Setup
======
1. `composer install` to get needed dependencies.
2. copy `.env_example` to `.env` and replace placeholders with needed credentials.
3. The navigate to the root directory and simply run `php artisan serve` and open the url outputted.

Prod: Prerequisite
======
- [apache], [nginx] or a HTTP server with php compatibility
- [php] >=5.6.4
- [memcached]
- php5-memcached `apt-get install php5-memcached`
- [composer]

Prod: Setup
======
1. 'git clone/update https://github.com/the-reach-trust/doLikeEdu-mobi/' in www folder
2. create a virtual host for `virtual host` for `dolikeedu.mobi`
3. Point www_root,docroot or DocumentRoot to `www/doLikeEdu-mobi/public`
4. `composer install` to get needed dependencies
5. copy `.env_example` to `.env` and replace placeholders with needed credentials and settings
> or you can just run `./beanstalk-bundle.sh` and deploy the zip on amazon
then edit the env vairables on there

## Authors
list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the Apache License 2.0 - see the [LICENSE](LICENSE) file for details

[composer]: <https://getcomposer.org/>
[php]: <http://php.net/releases/5_6_4.php>
[apache]: <https://httpd.apache.org/>
[nginx]: <https://www.nginx.com>
[memcached]: <https://memcached.org/>
[Sass]: <https://sass-lang.com/>
