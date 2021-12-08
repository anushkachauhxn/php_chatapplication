SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";

--
-- Table structure for table `user`
--
CREATE TABLE `users` (
  `user_id`     int(200) NOT NULL,
  `unique_id`   int(200) NOT NULL,
  `fname`       varchar(255) NOT NULL,
  `lname`       varchar(255) NOT NULL,
  `email`       varchar(255) NOT NULL,
  `password`    varchar(255) NOT NULL,
  `img`         varchar(400) NOT NULL,
  `status`      varchar(255) NOT NULL
);

