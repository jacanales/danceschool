mayimbe
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