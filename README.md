# [HOME](index.html)

# [http://localhost](http://localhost)

# [https://parisite.net/](https://parisite.net/)

# [TRASH WEB REPLICATOR ON GITHUB](https://github.com/LafeLabs/trashmagic/tree/main/web)

# [WWW DOT SLOANS LAKE DOT ART](https://www.sloanslake.art)

# [WWW DOT SOUTH BROADWAY DOT NET](https://www.southbroadway.net)

# [WWW DOT SOUTH PLATTE DOT NET](https://www.southplatte.net)

# [TRASH MAGIC](https://github.com/LafeLabs/trashmagic/)


The purpose of Trash Magic is to create a civilization of free things entirely built from trash.  We will build things from trash, share them freely, and share how to build them with others so that they can replicate.  We call this replication from person to person of the knowhow and desire to make things "magic".  

The network of web pages built on servers from the trash is called the TRASH WEB. We use the TRASH WEB to build web pages representing places, people and trash.  We use these to create TRASH MAGIC QUESTS, which are actions people can take to build towards full TRASH MAGIC.  We go out into public spaces and connect physical trash with the TRASH MAGIC WEB, and create QUESTS for people to follow to transform all of the trash in the world into self-replicating free things.


# The Web of Trash

self-replicating web pages.


Find any old computer that someone is getting rid of, it could be mac, pc or linux(but not Chromebook).  

You will need a thumb drive.  Follow the instructions below to install Ubuntu and wipe all the old data on the hard drive.

[https://ubuntu.com instructions](https://ubuntu.com/tutorials/install-ubuntu-desktop#1-overview)

Once Ubuntu is installed, open a command line and type:

```
sudo apt update
sudo apt install apache2 -y
sudo apt install php libapache2-mod-php -y
cd /var/www/html
sudo rm index.html
sudo apt install curl
sudo curl -o replicator.php https://raw.githubusercontent.com/LafeLabs/trashmagic/main/web/php/replicator.txt
cd ..
sudo chmod -R 0777 *
cd html
php replicator.php
sudo chmod -R 0777 *
```

This will clone the trash web to your server. 

Now go into the DNS records of a domain you have access to or ask someone else to it for a domain they have access to and add an "A record" with entries "@" and "www" for that domain to the home IP address of wherever the server is located.  Set up port forwarding on ports 80 and 443 on the router for that local network.  To add subdomains, use virtual hosts on apache(check [top level trash magic readme](https://github.com/LafeLabs/trashmagic/blob/main/README.md) or ask for help).

To point multiple domains or subdomains to a server, we want to set up a DUMP DIRECTOR using [nginx proxy manager](https://nginxproxymanager.com/).  We will start with a trash web server from the above instructions(not the general trash magic server, but the web one).

first stop apache to start nginx on port 80 so they don't conflict:

```
sudo update-rc.d apache2 disable
sudo service apache2 stop
```

then install docker[if this is not on a pi replace "pi" with username on that machine, default trash as username should be set on install of ubuntu]:
```
sudo apt update
sudo apt upgrade
curl -sSL https://get.docker.com | sh
sudo usermod -aG docker pi
sudo reboot
```
then go to the home directory from the command line and open a file docker-compost.yml
```
cd ~
sudo nano docker-compose.yml
```
and copy/paste this code into it:
```
version: "3"
services:
  app:
    image: 'jc21/nginx-proxy-manager:latest'
    restart: unless-stopped
    ports:
      # These ports are in format <host-port>:<container-port>
      - '80:80' # Public HTTP Port
      - '443:443' # Public HTTPS Port
      - '81:81' # Admin Web Port
      # Add any other Stream port you want to expose
      # - '21:21' # FTP

    # Uncomment the next line if you uncomment anything in the section
    # environment:
      # Uncomment this if you want to change the location of 
      # the SQLite DB file within the container
      # DB_SQLITE_FILE: "/data/database.sqlite"

      # Uncomment this if IPv6 is not enabled on your host
      # DISABLE_IPV6: 'true'

    volumes:
      - ./data:/data
      - ./letsencrypt:/etc/letsencrypt
```
and then run docker with 

```
docker compose up -d
```

When this is set up, either go to [http://localhost:81](http://localhost:81) on the DUMP DIRECTOR or point a browser on another machine on the network to [ip address of DUMP DIRECTOR]:81 to get to the control panel. Create a proxy host for each of the various domains you are pointing to your home network. You need a separate entry for [domain].[tld] than you do for www.[domain].[tld]. You can forward to any TRASH SERVER on the local network by IP address this way. After they're set up, edit the entries to add ssl "let's encrypt" certificates. Also be sure to add forwarding of the service "https" on your home router on port 443(you've already got port 80 from the above TRASH MAGIC SERVER setup).  Also, you can use this to forward traffic from subdomains(which should all also be forwarded from the DNS records at wherever the domain is registered).

Now to set up the DUMP DIRECTOR server to also be a web server again, we need to make apache listen on port 8080 instead of port 80, and create folders for each page we want to host on there.  
```
cd /etc/apache2/sites-available
sudo nano 000-default.conf
```
Change the port from 80 to 8080 in this file and save it. Use the server fork to create forks named after each domain, spelling out domains, for example southplattedotnet/ or sloanslakedotart.  Copy the .conf file to create one for the new page:
```
sudo cp 000-default.conf southplatte.net.conf
sudo nano southplatte.net.conf
```
and then make sure the port is 8080 and not 80 and edit the file as follows:

```
    DocumentRoot /var/www/html/southplattedotnet
    ServerName southplatte.net
    SeverAlias www.southplatte.net
```

Now we want to turn apache back on with 

```
sudo service apache2 start
```
and then load that site in particular and then reload apache with 
```
sudo a2ensite southplatte.net
sudo systemctl reload apache2
```

add subdomains, add more domains, point any domain or subdomain to any dump and any trash server.  Go find more laptops people are willing to donate and make more trash servers and dump directors.  Use this system to create full trash magic globally.


To make a folder on the desktop in Ubuntu which maps to the html folder use

```
ln -s /var/www/html ~/Desktop
```
and/or add subfolders for specific pages and functions for example

```
ln -s /var/www/html/southplattedotnet/zines ~/Desktop/southplattezines
ln -s /var/www/html/southplattedotnet/episodes ~/Desktop/southplattepodcast
ln -s /var/www/html/southplattedotnet/books ~/Desktop/freelibrary

```


To install science and arduino run:

```
sudo apt-get install arduino
sudo apt-get install python3-scipy
sudo apt install python3-pip
sudo pip3 install jupyter
```

![](https://raw.githubusercontent.com/LafeLabs/trashmagic/main/media/trashmagic/qrcode-pages/recursiveweb.png)
