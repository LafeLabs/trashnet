## [home](scrolls/home)

# [Pibrary](https://github.com/LafeLabs/pibrary)

by [trash robot](https://www.trashrobot.org)

The pibrary is a self-replicating network of free media propagated using the [Raspberry Pi](https://www.raspberrypi.org), a cheap open source computer we give out for free to the community.    We can take donations from individuals, charities, non profits and governments, and spend them on hardware, travel, and time for people to do training.  The Raspberry Pi terminal described here is built and given away for free to people in an under-resourced community for general use  as a media resource.  The same system can be installed on just a Pi board and a TV on a home network to be used as a web server only.  We also build off grid mesh networks and provide free Internet access for them to provide free wireless Internet in public spaces.  

Our aim is to have all public spaces in the world have totally free media networks, which include Internet access, devices to read and write media on, servers to deliver media over the network, and solar power to run it all without the Grid.  We also raise money from donations for the payments to keep these mesh networks free and connected to the Internet. 

Media is all posted and maintained by human Operators.  There are no users or logins or private data.  There is no encryption.  There are no algorithms, the Operators decide what to post where, based on the content they get from content creators.  We are building a media network in which both content creators and Operators can live directly off the network.  We are a mutual aid based media swarm.  We ask for community support which can be non monetary.  There is a way of living as a mendicant on the network, where we ask for food, shelter, medicine, places to work on our projects, and other resources from the communities we provide free media to.  Our network always prioritizes direct aid to whoever has the greatest need.  As the network provides more value to the community we ask for more aid back, and direct that at those who have the greatest need until they no longer have need and then we optimize traffic like any other network until we have abolished poverty.

This network can form the basis of a whole society.  If the network proves to provide value, more people will pay to replicate it more.  If it replicates, it will have more value due to network effects, and so on.  We don't need any central infrastructure, we just keep getting donations, buying hardware, training users, and so on.  

[replicator.txt global link](https://raw.githubusercontent.com/LafeLabs/pibrary/main/php/replicator.txt)

## Basic Raspberry Pi kit with screen:

 - [Raspberry Pi 4 4 gb($55, pishop.us)](https://www.pishop.us/product/raspberry-pi-4-model-b-4gb/)
 - [microSD Card and SD adapter($7, pishop.us)](https://www.pishop.us/product/microsd-card-32-gb-class-10-blank/)
 - [SD card reader($3, Pishop.us)](https://www.pishop.us/product/high-speed-micro-sd-card-reader-maximum-128gb-black/)
  - [HDMI Screen($102, Sundfounder)](https://www.sunfounder.com/collections/monitors/products/7-inch-hdmi-monitor)
 - [raspberry pi keyboard and mouse, official, from sunfounder($36)](https://www.sunfounder.com/collections/keyboard-gamepad/products/keyboard-mouse)
 - [raspberry pi wall power supply($8, pishop.us)](https://www.pishop.us/product/raspberry-pi-15w-power-supply-us-black/)


## Terminal Assembly

![](https://i.imgur.com/Y46szlG.jpg)

![](https://i.imgur.com/N4ItAdo.jpg) 

## Solar power kit

 - [solar panel and charger, (Amazon $60)](https://www.amazon.com/SOLPERK-Controller%EF%BC%8C-Automotive-Motorcycle-Powersports/dp/B07TTMF3FZ)
 - [barrel connector pigtails ($10 for 10 pack)](https://www.amazon.com/dp/B0915T6NLL)
 - [12 V 9 A-h lead acid battery($40 Amazon)](https://www.amazon.com/Mighty-Max-Battery-Replacement-Electric/dp/B00KAVH1GU/)
 - [12 V to USB charger converter, (Amazon $16)](https://www.amazon.com/dp/B09FKHK5MY)
 - [adafruit panel voltmeter $8](https://www.adafruit.com/product/575)


##  Set up the Raspberry Pi

Get a SD card with 8 GB or more storage and a SD card USB reader

Download and install, then use the Raspberry Pi Imager:

[https://www.raspberrypi.org/software/](https://www.raspberrypi.org/software/)

Turn on the pi click through all the things, put it on the wifi network.

## Install Apache and PHP so that geometron can run

Open a command prompt(black link on menu bar) and type:

```
sudo apt update
sudo apt install apache2 -y
sudo apt install php libapache2-mod-php -y
```

## Install geometron with this document for self-documentation and replication

```
cd /var/www/html
sudo rm index.html
sudo curl -o replicator.php https://raw.githubusercontent.com/LafeLabs/pibrary/main/php/replicator.txt
cd ..
sudo chmod -R 0777 *
cd html
php replicator.php
sudo chmod -R 0777 *
```

Check the IP address by hovering over the wifi icon, put that into the browser on another machine on the same local wifi network to see and edit the server.  Or open a browser on the pi and point it to [http://localhost](http://localhost)

## Set up to have names for other servers

edit hosts file to have the IP address of the other servers and then the name you want to use, copying the format in the existing file.

```
sudo nano /etc/hosts
```
edit, and use control-x and say "yes" to save changes.

## connect pi to outside internet over router

Look up "set up port forwarding raspberry pi" and follow instructions to log onto your router and forward port 80 to the raspberry pi.  Use [whatismyipaddress.com](https://whatismyipaddress.com/) to get your global IP address.  Now your home Raspberry pi server will be visible on that IP address.  Take that address and make it a link on the remote raspberry pi terminal as well as a QR code on both.   

edit the /etc/hosts file on the remote pi terminal so that home/ and remote/ point to home pi server either on the local network or on the public network.  So "home" will point to the local IP address on the wifi and "remote" will point to the global IP address of the home raspberry pi server(which everyone can see).  


[link to pi my life up](https://pimylifeup.com/raspberry-pi-port-forwarding/)

[link to setting up basic website with pi with external connection](http://unixetc.co.uk/2013/09/21/create-a-basic-website-on-a-raspberry-pi/)

## Install arduino

```
sudo apt-get install arduino
```

this installs a old version which is missing some features, namely the serial plotter.  following more complicated instructions leads to non-working version which is impossible to uninstall.


how to do the tar ball thing to get a later version of arduino which has the plotting

[https://www.raspberrypi-spy.co.uk/2020/12/install-arduino-ide-on-raspberry-pi/](https://www.raspberrypi-spy.co.uk/2020/12/install-arduino-ide-on-raspberry-pi/)

go get the Arduino software at:

[https://www.arduino.cc/en/software](https://www.arduino.cc/en/software)

and download "Linux ARM 32 bits".

Open a terminal and go to the home directory:

```
cd ~
```

Go to downloads folder:
```
cd Downloads
```
list the files with 
```
ls
```
See the name of an archive with a name like "arduino-####-linuxarm.tar.xz", where #### is a version number.

extract with 
```
tar -xf arduino-####-linuxarm.tar.xz
```

move the extracted information to opt directory(directory for package installation)

```
sudo mv arduino-#### /opt
```

then run the install script:
```
sudo /opt/arduino-####/install.sh
```

## Add python that we need for doing science

[https://matplotlib.org/](https://matplotlib.org/)

matplotlib install:

```
sudo apt install python3-matplotlib
```

[https://matplotlib.org/](https://matplotlib.org/)

[https://www.instructables.com/Jupyter-Notebook-on-Raspberry-Pi/](https://www.instructables.com/Jupyter-Notebook-on-Raspberry-Pi/)

```
sudo apt-get update
sudo apt-get install python3-scipy
sudo pip3 install --upgrade pip
reboot
sudo pip3 install jupyter
```

 - [github for Documentation for nyc mesh network](https://github.com/nycmeshnet/docs)
 - [nycmesh.net](https://www.nycmesh.net/)
 - [wireless networking in the developing world](http://wndw.net/)

Instead of the Raspberry Pi, this system can be installed on a stripped down laptop with nothing else on it running any version of Linux with the same installation instructions, or Linux virtual machines on an internal network.  It can also run on private machines, but that is not appropriate for public use.

## Editing and replicating Magic Book



## Media file distribution workflow

 - how to create, copy and edit magic books, delete
 - how to copy files onto the server and link to them
 - music
 - digital art
 - images
 - videos
 - podcasts
 - word and pdf documents
 - web pages
 - lists of links

## Operators

## Venues 

## Content Creators

## Windows  and Mac Installation

## Github Workflow

## Android installation

## Public Web Pages

 - domains and how to buy them and set them up
 - free web hosting option
 - how to design and sew flags
 - the cardboard sign
 - the icon token with a url
 - images, examples of use
 - Making Web 1.0 pages


## Sets
 
 - code set
 - map book
 - file set:this needs to have a better name for the directory, better linked list
 - file set needs a better work flow with media of all kinds being integrated into a scroll, this has to be super easy
 - image set
 - icon set
 - symbols set, geometron, links to book

## CHAOS

 - mixed reality immersive game
 - how to use the maps
 - maps and scrolls linked
 - building story onto space to activate the spaces

## QR codes

## Coins

 - what the coins are for, the universal philosophical metalanguage
 - examples of coins for the whole system, this set represented in coins
 - sewing the bags
 - designing the coins and sharing the files
 - replicating a print to a stamp to a coin
 - pendants
 - examples of sets and icons, with links to sets, images of the set: runes, hebrew, corporate logos, elements of this system, trash physics, trash robot, chess pieces, email address, phone number, web address, GPS coordinates

## Gallery

![](https://i.imgur.com/4zetaPf.png)


