DELIMITER //
DROP TRIGGER IF EXISTS `update_client_before_insert`
//
CREATE TRIGGER `update_client_before_insert` BEFORE INSERT ON `client`
FOR EACH ROW
BEGIN
    SET NEW.`name` = CONCAT(NEW.`first_name`, ' ', NEW.`last_name`);
END
//
DROP TRIGGER IF EXISTS `update_client_before_update`
//
CREATE TRIGGER `update_client_before_update` BEFORE UPDATE ON `client`
FOR EACH ROW
BEGIN
    SET NEW.`name` = CONCAT(NEW.`first_name`, ' ', NEW.`last_name`);
END
//