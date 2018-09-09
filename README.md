CI Status Badges
=============
| Branch | CircleCI | 
| ------ | :-------- |
| develop | [![CircleCI](https://circleci.com/bb/jacanales/danceschool.svg?style=svg)](https://circleci.com/bb/jacanales/danceschool) 

danceschool
=======

A Symfony project created on April 29, 2015, 11:08 pm.

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