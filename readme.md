## How to install Chrome headless CentOS 7.0 
### Create the file /etc/yum.repos.d/google-chrome.repo
[google-chrome]\
name=google-chrome\
baseurl=http://dl.google.com/linux/chrome/rpm/stable/$basearch \
enabled=1\
gpgcheck=1\
gpgkey=https://dl-ssl.google.com/linux/linux_signing_key.pub

#### Then
yum install google-chrome-stable

### Install Chromedriver
wget https://chromedriver.storage.googleapis.com/87.0.4280.88/chromedriver_linux64.zip \
unzip chromedriver_linux64.zip\
mv chromedriver /usr/bin/

#### Initialize Chromedriver

### Execute in shell
composer install\
./vendor/codeception/codeception/codecept bootstrap

### Run tests
./vendor/codeception/codeception/codecept run

## How to start Chromedriver as a service in CentOS 7.0
### Create a script file chromedriver.sh
\#!bin/bash\
/path/to/chromedriver --url-base=/wd/hub

### Create a new service file
cd /etc/systemd/system\
sudo vim chromedriver.service\

[Unit]\
Description=Run Chromedriver\
After=network.target\

[Service]\
ExecStart=/path/to/chromedriver.sh\
User=user\
Group=group\

[Install]\
WantedBy=multi-user.target

### Start Chromedriver and enable auto-start at boot
systemctl start chromedriver\
systemctl enable chromedriver

### Check chromedriver.service status
systemctl status chromedriver

#### Should look like this
- chromedriver.service - Run Chromedriver\
	Loaded: loaded (/etc/systemd/system/chromedriver.service; enabled; vendor preset: disabled)\
	Active: active (running) since lun 2021-06-14 12:02:52 CEST; 24min ago











