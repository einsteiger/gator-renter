DROP procedure IF EXISTS `getUserDetail`;

DELIMITER $$
CREATE PROCEDURE `getUserDetail` (in userid varchar(25))
BEGIN

	Select 
		uid, 
        first_name, 
        last_name, 
        email, 
        address, 
        city, 
        created, 
        user_roles_id, 
		is_active 
	From users where is_active <> 0 and (uid = userid or userid is null);

END$$

DELIMITER ;


DROP procedure IF EXISTS `getAllUsersDetails`;

DELIMITER $$
CREATE PROCEDURE `getAllUsersDetails` (in userid varchar(25))
  BEGIN

    Select
      uid,
      first_name,
      last_name,
      email,
      address,
      city,
      created,
      user_roles_id,
      is_active
    From users where (uid = userid or userid is null) ORDER BY is_active DESC;

  END$$

DELIMITER ;

