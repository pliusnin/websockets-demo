Using websockets for broadcasting messages with Symfony2.

Firstly, follow the next steps to install needed soft:
------------------------------------------------------

Install Node.js

    apt-get install python g++ make
    mkdir ~/nodejs && cd $_
    wget -N http://nodejs.org/dist/v0.8.22/node-v0.8.22.tar.gz
    tar xzvf node-v0.8.22.tar.gz
    cd node-v0.8.22
    ./configure
    make install

Installing ZeroMQ:

    wget http://download.zeromq.org/zeromq-3.2.2.tar.gz 
    tar -xvzf zeromq-3.2.2.tar.gz
    cd zeromq-3.2.2
    ./configure
    make
    sudo make install
    sudo ldconfig

Installing the PHP binding:

    git clone git://github.com/mkoppanen/php-zmq.git
    cd php-zmq
    phpize && ./configure
    make
    sudo make install
    And finally add the following line to your /etc/php5/(apache2|cli)/php.ini:
    extension=zmq.so


After that you can install nodejs modules via npm.
    cd nodejs
    npm install

Also don't forget to install vendors via composer.
Then start NodeJS server 

    node server.js

in the nodejs directory.

That's it, enjoy! 