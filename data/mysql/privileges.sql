/* Next lines should be executed under MySQL's root user */

CREATE USER 'demo-app-mf-0'@'localhost' IDENTIFIED BY 'demo-app-mf-0';

GRANT USAGE ON *.* TO 'demo-app-mf-0'@'localhost';

GRANT
    SELECT, EXECUTE, SHOW VIEW, ALTER, ALTER ROUTINE,
    CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP,
    EVENT, INDEX, INSERT, REFERENCES, TRIGGER, UPDATE,
    LOCK TABLES  ON `demo-app-mf-0`.* TO 'demo-app-mf-0'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES;