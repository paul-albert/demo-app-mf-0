# demo-app-mf-0

## Prepare steps:

(here we are assumed using of Linux)

### Database (MySQL)

* `mysql -u root -p`

* Make commands from `data/mysql/privileges.sql`

* `mysql -u demo-app-mf-0 -p` and make commands from:

    `data/mysql/schema.sql`
    
    `data/mysql/triggers.sql`
    
    `data/mysql/data.sql`

### Web-server (Nginx)

* Nginx's configuration sample - see in `configuration/nginx.conf`

### PHP application

* Check configuration of application in `basic/config/*.php`

* Check write permissions for directories `basic/runtime` and `basic/web/assets`

## Running:

* Open in browser link "http://demo-app-mf-0.dev"
