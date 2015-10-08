#!/bin/bash

mkdir /home/logs
apt-get update > /home/logs/aptget.log 2> /home/logs/aptget.err
apt-get install apache2 php5 php5-cli php5-curl -y > /home/logs/aptget.log 2> /home/logs/aptget.err


cd /var/www/html
git clone https://github.com/Nek-/TestCrawler.git > /home/logs/git.log 2> /home/logs/git.err

cd TestCrawler
curl -sS https://getcomposer.org/installer | php > /home/logs/composer.log 2> /home/logs/composer.err

COMPOSER_HOME="/home/ubuntu" php composer.phar install > /home/logs/composer.log 2> /home/logs/composer.err

cp config.yml.dist config.yml
sed -i 's/foobar@yopmail.com/yourealcredentials@yopmail.com/g' config.yml
sed -i "s/TheAwesomePassword/\'yourealpassword\'/g" config.yml

rm /etc/apache2/sites-enabled/000-default.conf
wget https://s3-eu-west-1.amazonaws.com/valanz-nek/awesome.conf -O /etc/apache2/sites-available/awesome.conf
a2ensite awesome.conf > /home/logs/apache.log 2> /home/logs/apache.err

service apache2 reload > /home/logs/apache.log 2> /home/logs/apache.err
