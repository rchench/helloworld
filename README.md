This is just a hello world collection of all.

# Linux

Install Ubuntu 20.04 from https://releases.ubuntu.com/20.04/ or https://multipass.run/ or https://hub.docker.com/_/ubuntu.

Use one in all Ubuntu environment to run all hello world.

```
# bash, definitely no need to install
./helloworld.sh

# python3, comes with ubuntu as well
./helloworld.py

# php, needs to install
sudo apt install php7.4-cli
./helloworld.php

# golang, needs to install
wget https://golang.org/dl/go1.17.1.linux-amd64.tar.gz
sudo rm -rf /usr/local/go && sudo tar -C /usr/local -xzf go1.17.1.linux-amd64.tar.gz
export PATH=$PATH:/usr/local/go/bin
go run helloworld.go

# javascript / nodejs
curl -fsSL https://deb.nodesource.com/setup_16.x | sudo -E bash -
sudo apt-get install -y nodejs
node helloworld.js

# java
sudo apt install default-jre
java helloworld.java

# c
sudo apt install build-essential
gcc -o helloworld.c
./helloworld
```
