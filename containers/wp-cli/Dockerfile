FROM wordpress

# Install requirements for wp-cli support
RUN apt-get update \
  && apt-get install -y sudo less mysql-common git-all \
  && rm -rf /var/lib/apt/lists/*

# Add Composer
RUN curl -o /usr/bin/composer.phar https://getcomposer.org/download/1.8.6/composer.phar
RUN mv /usr/bin/composer.phar /usr/bin/composer
RUN chmod +x /usr/bin/composer

# Add WP-CLI
RUN curl -o /usr/bin/wp-cli.phar https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN mv /usr/bin/wp-cli.phar /usr/bin/wp
RUN chmod +x /usr/bin/wp

# Add SSH support
RUN mkdir ~/.ssh && ln -s /run/secrets/host_ssh_key ~/.ssh/id_rsa