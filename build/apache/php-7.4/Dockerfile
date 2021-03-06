FROM php:7.4-apache

MAINTAINER echo <paliyapraveen@gmail.com>

ENV XDEBUG_PORT 9000

# Install System Dependencies

RUN apt-get update \
	&& DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
	software-properties-common \
	&& apt-get update \
	&& DEBIAN_FRONTEND=noninteractive apt-get install -y \
	nodejs \
	libfreetype6-dev \
	libicu-dev \
    libssl-dev \
	libjpeg62-turbo-dev \
	libmcrypt-dev \
	libedit-dev \
	libedit2 \
	libxslt1-dev \
	libzip-dev \
	apt-utils \
	gnupg \
	redis-tools \
	mariadb-client \
	zlib1g-dev \
	libpng-dev \
	libjpeg-dev \
	git \
	vim \
	wget \
	curl \
	lynx \
	psmisc \
	unzip \
	tar \
	cron \
	bash-completion \
	&& apt-get clean

# Install Magento Dependencies

RUN docker-php-ext-configure \
  	gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/; \
  	docker-php-ext-install \
  	opcache \
  	bcmath \
  	gd \
  	intl \
  	mysqli \
  	pdo_mysql \
  	soap \
  	xsl \
  	zip \
  	sockets

# Install oAuth

RUN apt-get update \
  	&& apt-get install -y \
  	libpcre3 \
  	libpcre3-dev \
  	# php-pear \
  	&& pecl install oauth \
  	&& echo "extension=oauth.so" > /usr/local/etc/php/conf.d/docker-php-ext-oauth.ini

# Install Node, NVM, NPM and Grunt

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - \
  	&& apt-get install -y nodejs build-essential \
    && npm i -g grunt-cli yarn

# Install Composer

RUN	curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

ENV PATH="/var/www/.composer/vendor/bin/:${PATH}"

# Install XDebug

RUN yes | pecl install xdebug-2.9.8 && \
	 echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.iniOLD

# Install Mhsendmail

RUN DEBIAN_FRONTEND=noninteractive apt-get -y install golang-go \
   && mkdir /opt/go \
   && export GOPATH=/opt/go \
   && go get github.com/mailhog/mhsendmail

# Configuring system

ADD /docker_config/config/php.ini /usr/local/etc/php/php.ini
ADD /docker_config/config/magento.conf /etc/apache2/sites-available/magento.conf
ADD /docker_config/config/custom-xdebug.ini /usr/local/etc/php/conf.d/custom-xdebug.ini
COPY /docker_config/bin/* /usr/local/bin/
COPY /docker_config/users/* /var/www/
RUN chmod +x /usr/local/bin/*
RUN ln -s /etc/apache2/sites-available/magento.conf /etc/apache2/sites-enabled/magento.conf

RUN chmod 777 -Rf /var/www /var/www/.* \
	&& chown -Rf www-data:www-data /var/www /var/www/.* \
	&& usermod -u 1000 www-data \
	&& chsh -s /bin/bash www-data\
	&& a2enmod rewrite \
	&& a2enmod headers

RUN a2enmod ssl

Expose 80 443

COPY /docker_config/config/domains.ext /var/www/domains.ext

RUN rm -rf /etc/apache2/apache2.conf
COPY /build/apache/php-7.4/apache2.conf /etc/apache2/apache2.conf

RUN openssl req -x509 -nodes -new -sha256 -days 1024 -newkey rsa:2048 -keyout RootCA.key -out RootCA.pem -subj "/C=US/CN=magento-Root-CA"
RUN openssl x509 -outform pem -in RootCA.pem -out RootCA.crt
RUN openssl req -new -nodes -newkey rsa:2048 -keyout /var/www/magento.key -out /var/www/magento.csr -subj "/C=US/ST=YourState/L=YourCity/O=magento-Certificates/CN=magento2.local"
RUN openssl x509 -req -sha256 -days 1024 -in /var/www/magento.csr -CA RootCA.pem -CAkey RootCA.key -CAcreateserial -extfile /var/www/domains.ext -out /var/www/magento.crt

VOLUME /var/www/html
WORKDIR /var/www/html

RUN chmod 777 -R /var/www/html
