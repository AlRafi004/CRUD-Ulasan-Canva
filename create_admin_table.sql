-- Create his_admin table for CRUD Ulasan Canva
-- This table stores admin login credentials

CREATE TABLE IF NOT EXISTS `his_admin` (
  `ad_id` int(20) NOT NULL AUTO_INCREMENT,
  `ad_fname` varchar(200) DEFAULT NULL,
  `ad_lname` varchar(200) DEFAULT NULL,
  `ad_email` varchar(200) DEFAULT NULL,
  `ad_pwd` varchar(200) DEFAULT NULL,
  `ad_dpic` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert default admin user
-- Password: Password@123 (double encrypted with sha1(md5()))
INSERT INTO `his_admin` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`) VALUES
(1, 'Admin', 'Canva', 'admin@mail.com', '4c7f5919e957f354d57243d37f223cf31e9e7181', 'doc-icon.png');

-- Alternative admin with simple credentials  
-- Password: admin123 (double encrypted with sha1(md5()))
INSERT INTO `his_admin` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`) VALUES
(2, 'Super', 'Admin', 'admin', '036d0ef7567a20b5a4ad24a354ea4a945ddab676', 'doc-icon.png');
