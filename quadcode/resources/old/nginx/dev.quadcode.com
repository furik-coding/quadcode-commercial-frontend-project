server {
    listen 80;
    server_name dev.quadcode.com;

    location / {
        root /Users/ivan/quadcode;
        proxy_pass http://127.0.0.1:9000;
    }
}