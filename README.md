# gulu
    php训练营第一次作业
## nginx

server {
        listen 80;
        server_name gulu;

        root /usr/local/nginx/html/gulu;
        index index.html index.php;

        if (!-e $request_filename) {
                rewrite ^/(.*) /index.php last;
                break;
        }

        location ~ \.php$ {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_param  SCRIPT_FILENAME  /usr/local/nginx/html/gulu$fastcgi_script_name;
            include        fastcgi_params;
        }
}
