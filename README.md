# COS10026 "Web Technology Project"

The group assignment taking the majority of the score of this class.

## Project Info

### Goal

A website to advertise/apply for vacant employment positions.

### Group Info

* **ID**: **7**
* **Name**: Duo or Die
* **Members** (2):
  - SWH03403 *"BNQH"* (Leader) https://github.com/SWH03403
  - SWH03303 *"LMS"* https://github.com/SWH03303

### Links

#### Jira

* **[Summary](https://dueordie.atlassian.net/jira/software/projects/WEBTECHPRJ/summary)**
* **[Board](https://dueordie.atlassian.net/jira/software/projects/WEBTECHPRJ/boards/1)**
* **[Backlog](https://dueordie.atlassian.net/jira/software/projects/WEBTECHPRJ/boards/1/backlog)**

## Installation

* **Note**: Our website is only planned to be compatible with php8.4, the latest version at the time
of writing.

To run our application, you can do one of the following from the project's root:

### Use bare `php`

The following example starts the server on port `6284`. On Windows, it is recommended that git-bash
is used to run the command.
```sh
php -S 127.0.0.1:6284 index.php
```

### Use `docker`

<!-- Yes, I know `docker build` is deprecated... -->
The following list of commands was used to build the docker for this project.
```sh
docker build -t cos10026-project .
docker container rm -f cos10026-project-cont
docker run -dit --name cos10026-project-cont -p 6284:80 cos10026-project:latest
```

#### Alternative Build Script

The following script use the official `php:8.4-apache` image as the base image. To use this script,
simply replace the `Dockerfile` file with this one, and repeat the instruction directly above.

```dockerfile
FROM php:8.4-apache
RUN a2enmod rewrite &&
  rm -vrf /var/www/html
COPY . .
RUN chown www-data:www-data -vR . && \
  find . -type f -exec chmod -v 644 {} \; && \
  find . -type d -exec chmod -v 755 {} \;
EXPOSE 80
```
