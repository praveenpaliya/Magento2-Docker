#  Magento 2.4 Docker to Development

![Magento 2](https://raw.githubusercontent.com/praveenpaliya/assets/main/magento.png)

### PreRequistie:

**Linux (Ubuntu)**
=> Install Docker on machine: https://docs.docker.com/engine/install/ubuntu/
=> git clone the project

**For Windows Supporting (WSL)**
=> Install Ubuntu on WSL
   https://ubuntu.com/tutorials/ubuntu-on-windows#1-overview
   ![Ubuntu on Windows WSL](https://raw.githubusercontent.com/praveenpaliya/assets/main/ubuntu_wsl.png)
=> Install docker on WSL Ubuntu
=> git clone the project

**Step#1:**
=> Download Magento source code in "magento" folder.

**Step#2:**
=> Run bash script like sudo ./docker-up

**Step#3:**
=> Install Db
=> docker exec -i magento2.4_db mysql -u magento -pmagento magento < dbfile.sql

**Step#4:**
=> Run bash script like sudo ./m2-up

**Step#5:**
=> edit /etc/hosts file
=> add code like below:
    `127.0.0.1  magento2.local`

**Step#5:**
**Magento2 Local URL:** 
https://magento2.local

**PhpMyAdmin URL:**
http://localhost:8080

**Mailhog URL:**
http://localhost:8025
