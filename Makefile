.PHONY: install

install:
	cp -Rf php /home/isucon/isuumo/webapp
	cp -Rf mysql /home/isucon/isuumo/webapp
	cp -Rf fixture /home/isucon/isuumo/webapp
	cp -Rf nginx /etc

kataribe:
	sudo cat /var/log/nginx/access.log  | kataribe
