CI Status Badges
=============
| CircleCI | Codefactor.io | Codacy | Codecov | Sonarcloud Quality | Bugs
| ------ | :-------- | :-------- | :-------- | :-------- | :-------- 
| [![CircleCI](https://circleci.com/gh/jacanales/danceschool.svg?style=svg)](https://circleci.com/gh/jacanales/danceschool) | [![CodeFactor](https://www.codefactor.io/repository/github/jacanales/danceschool/badge)](https://www.codefactor.io/repository/github/jacanales/danceschool) | [![Codacy Badge](https://api.codacy.com/project/badge/Grade/e3e5fc28bf1346cdb365136ac765a892)](https://www.codacy.com?utm_source=git@bitbucket.org&amp;utm_medium=referral&amp;utm_content=jacanales/danceschool&amp;utm_campaign=Badge_Grade) | [![codecov](https://codecov.io/gh/jacanales/danceschool/branch/master/graph/badge.svg)](https://codecov.io/gh/jacanales/danceschool) | [![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=jacanales_danceschool&metric=alert_status)](https://sonarcloud.io/dashboard?id=jacanales_danceschool) | [![Bugs](https://sonarcloud.io/api/project_badges/measure?project=jacanales_danceschool&metric=bugs)](https://sonarcloud.io/dashboard?id=jacanales_danceschool)

danceschool
=======

A Symfony scaffolding project.

Installation
============

**Install Compass**
```
gem update --system
gem install compass
```

Install bundler to allow use compass in Heroku
```
gem install bundler
```


**Execute commands**
```
php bin/console doctrine:schema:create --dump-sql
php bin/console assets:install
```

**Dev utilities**
```
npm install grunt --save-dev
npm install grunt-contrib-jshint --save-dev
```

**Extended**
- See SonataAadmin documentation: https://sonata-project.org/bundles/admin/3-x/doc/getting_started/the_list_view.html
