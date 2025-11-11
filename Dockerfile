FROM tomsik68/xampp:8
RUN rm -vrf /opt/lampp/htdocs
WORKDIR /opt/lampp/htdocs
COPY . .
RUN \
	chown daemon:daemon -vR . && \
	find . -type f -exec chmod -v 644 {} \; && \
	find . -type d -exec chmod -v 755 {} \;
EXPOSE 22 80
