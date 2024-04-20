#!/usr/bin/env bash
sudo apt-get update
sudo apt-get install libcurl4-openssl-dev
wget https://github.com/swow/swow/archive/"${SW_VERSION}".tar.gz -O swow.tar.gz
mkdir -p swow
tar -xf swow.tar.gz -C swow --strip-components=1
rm swow.tar.gz
cd swow/ext || exit

phpize
./configure --enable-swow --enable-swow-ssl --enable-swow-curl
make -j "$(nproc)"
sudo make install
sudo sh -c "echo extension=swow > /etc/php/${PHP_VERSION}/cli/conf.d/swow.ini"
php --ri swow
