CI Status Badges
=============
| CircleCI | Codefactor.io | Codacy | PHPSpec Coverage | PHPUnit Coverage 
| ------ | :-------- | :-------- | :-------- | :-------- 
| [![CircleCI](https://circleci.com/gh/jacanales/danceschool.svg?style=svg)](https://circleci.com/gh/jacanales/danceschool) |
[![CodeFactor](https://www.codefactor.io/repository/github/jacanales/danceschool/badge)](https://www.codefactor.io/repository/github/jacanales/danceschool) | [![Codacy Badge](https://api.codacy.com/project/badge/Grade/e3e5fc28bf1346cdb365136ac765a892)](https://www.codacy.com?utm_source=git@bitbucket.org&amp;utm_medium=referral&amp;utm_content=jacanales/danceschool&amp;utm_campaign=Badge_Grade) | N/A | N/A 

danceschool
=======

A Symfony scaffolding project.

Installation
============

** Install Compass **
```
gem update --system
gem install compass
```

Install bundler to allow use compass in Heroku
```
gem install bundler
```


** Execute commands **
```
php app/console doctrine:schema:create --dump-sql
php app/console assetic:dump
```

** Dev utilities **
```
npm install grunt --save-dev
npm install grunt-contrib-jshint --save-dev
```

** Extended **
- See SonataAadmin documentation: https://sonata-project.org/bundles/admin/3-x/doc/getting_started/the_list_view.html
