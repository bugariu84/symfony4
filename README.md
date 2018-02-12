# Symfony 4 app

**Objective:**
* Support multiple authentication system
    1. http_basic auth for "^/admin/" routes
    2. token authentication for "^/api/" routes
    3. *add more if necessary ??*
* To be used as a startup template for future Sf4 projects

## Install:

1. _git clone git@github.com:bugariu84/symfony4.git_
2. _composer install_
3. _./bin/console doctrine:database:create_
4. _./bin/console doctrine:migrations:migrate_

### TODO:
1. ~~Add fixture for dummy users~~
2. Set up Encore, sass(or less), js and maybe some bootstrap
3. install packages:
    * profiler –dev
    * sec-checker --dev
    * debug --dev
    * form
    * twig
