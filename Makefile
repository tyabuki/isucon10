.PHONY: install

install:
	cp -Rf php /home/isucon/isuumo/webapp
	cp -Rf mysql /home/isucon/isuumo/webapp
	cp -Rf fixture /home/isucon/isuumo/webapp
	cp -Rf nginx /etc

kataribe:
	sudo cat /var/log/nginx/access.log  | kataribe

logrotate:
	sudo gzip /var/log/nginx/access.log -c | sudo tee /var/log/nginx/access.`date +"%T"`.gz > /dev/null
	sudo cp /dev/null /var/log/nginx/access.log
	sudo systemctl restart nginx
