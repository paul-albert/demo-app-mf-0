# demo-app-mf-0

## Prepare steps:

_(environment: Linux / Nginx / MySQL 5.x / PHP 5.6 / Yii 2)_

### Database (MySQL)

* `mysql -u root -p`

* Make commands from `data/mysql/privileges.sql`

* `mysql -u demo-app-mf-0 -p` and make commands from:

    [Schema](data/mysql/schema.sql)
    
    [Triggers](data/mysql/triggers.sql)
    
    [Data](data/mysql/data.sql)

### Web-server (Nginx)

* Nginx's configuration sample - see in `configuration/nginx.conf`

### PHP application (Yii)

* Check configuration of application in `basic/config/*.php`

* Check write permissions for directories `basic/runtime` and `basic/web/assets`

## Running:

* Open in browser link "http://demo-app-mf-0.dev"
