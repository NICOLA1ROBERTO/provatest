


## how to install chrome headless centos 7 
## create the file   /etc/yum.repos.d/google-chrome.repo
 
[google-chrome]
name=google-chrome
baseurl=http://dl.google.com/linux/chrome/rpm/stable/$basearch
enabled=1
gpgcheck=1
gpgkey=https://dl-ssl.google.com/linux/linux_signing_key.pub


then
	yum install google-chrome-stable



## install chromedriver
wget https://chromedriver.storage.googleapis.com/87.0.4280.88/chromedriver_linux64.zip
unzip chromedriver_linux64.zip
mv chromedriver /usr/bin/




## init
## execute in shell

composer install
./vendor/codeception/codeception/codecept bootstrap

## run tests
./vendor/codeception/codeception/codecept run
















