-- Попытки входа
DROP TABLE IF EXISTS `phpauth_attempts`;
CREATE TABLE `phpauth_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(39) NOT NULL,
  `expiredate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Настройки для библиотеки PHPAuth
DROP TABLE IF EXISTS `phpauth_config`;
CREATE TABLE `phpauth_config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  UNIQUE KEY `setting` (`setting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `phpauth_config` (`setting`, `value`) VALUES
('attack_mitigation_time',  '+30 minutes'),
('attempts_before_ban', '10'),
('attempts_before_verify',  '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+30 minutes'),
('cookie_http', '0'),
('cookie_name', 'authID'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_secure', '0'),
('emailmessage_suppress_activation',  '0'),
('emailmessage_suppress_reset', '0'),
('mail_charset','UTF-8'),
('password_min_score',  '3'),
('site_activation_page',  'activate'),
('site_email',  'no-reply@bestion.ru'),
('site_key',  'PQOo&J=QUBKxhaz.6sPgZQMESgLVBj$t'),
('site_name', 'MFLPHP'),
('site_password_reset_page',  'reset'),
('site_timezone', 'UTC'),
('site_url',  'https://github.com/DimNS/MFLPHP'),
('smtp',  '0'),
('smtp_auth', '1'),
('smtp_host', 'smtp.example.com'),
('smtp_password', 'password'),
('smtp_port', '25'),
('smtp_security', NULL),
('smtp_username', 'email@example.com'),
('table_attempts',  'phpauth_attempts'),
('table_requests',  'phpauth_requests'),
('table_sessions',  'sessions'),
('table_users', 'users'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist',  '1'),
('verify_password_min_length',  '3'),
('request_key_expiration', '+10 minutes');

-- Запросы на изменение пароля
DROP TABLE IF EXISTS `phpauth_requests`;
CREATE TABLE `phpauth_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Сессии пользователей
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Таблица пользователей
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` SET
  `id` = 1,
  `email` = 'info@bestion.ru',
  `password` = '$2y$10$O2g583mPp5VhcHJaTPqPyuQTuqz7embPzH3ZGNenZg9mL.6A0totO',
  `isactive` = 1,
  `dt` = '2016-07-18 05:56:41';

-- Информация о пользователях
DROP TABLE IF EXISTS `users_info`;
CREATE TABLE IF NOT EXISTS `users_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `access` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_login` datetime,
  `created_at` datetime,
  `updated_at` datetime,
  PRIMARY KEY (`id`),
  KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

INSERT INTO `users_info` SET
  `uid` = 1,
  `name` = 'Дмитрий Щербаков',
  `access` = 'admin',
  `created_at` = '2016-07-18 05:56:41';

ALTER TABLE `users_info` ADD FOREIGN KEY (`uid`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE NO ACTION;