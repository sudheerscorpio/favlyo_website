-- ============================================
-- FAVLYO DATABASE TABLES
-- Run this SQL in phpMyAdmin to create tables
-- ============================================

-- Contact Submissions Table (NEW)
CREATE TABLE IF NOT EXISTS `contact_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `referer` varchar(500) DEFAULT NULL,
  `status` enum('new','read','replied','spam','archived') DEFAULT 'new',
  `email_sent` tinyint(1) DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_email` (`email`),
  INDEX `idx_status` (`status`),
  INDEX `idx_created_at` (`created_at`),
  INDEX `idx_ip_address` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Registrations Table (UPDATED with security fields)
-- If table exists, run the ALTER statements below instead
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `work_type` varchar(100) DEFAULT NULL,
  `join_time` varchar(50) DEFAULT NULL,
  `training` varchar(10) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `interview_ready` varchar(10) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `vehicle` varchar(10) DEFAULT NULL,
  `know_about` varchar(100) DEFAULT NULL,
  `referral_code` varchar(50) DEFAULT NULL,
  `alt_phone` varchar(15) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  INDEX `idx_status` (`status`),
  INDEX `idx_datetime` (`datetime`),
  INDEX `idx_ip_address` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================
-- IF REGISTRATIONS TABLE ALREADY EXISTS
-- Run these ALTER statements to add new columns:
-- ============================================

-- ALTER TABLE `registrations` ADD COLUMN `ip_address` varchar(45) DEFAULT NULL AFTER `alt_phone`;
-- ALTER TABLE `registrations` ADD COLUMN `user_agent` varchar(500) DEFAULT NULL AFTER `ip_address`;
-- ALTER TABLE `registrations` ADD COLUMN `status` enum('pending','approved','rejected') DEFAULT 'pending' AFTER `user_agent`;
-- ALTER TABLE `registrations` ADD COLUMN `created_at` timestamp DEFAULT CURRENT_TIMESTAMP AFTER `status`;
-- ALTER TABLE `registrations` ADD COLUMN `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER `created_at`;
-- ALTER TABLE `registrations` ADD INDEX `idx_status` (`status`);
-- ALTER TABLE `registrations` ADD INDEX `idx_ip_address` (`ip_address`);


-- ============================================
-- SECURITY: Rate Limiting Table (Optional)
-- For advanced rate limiting across all forms
-- ============================================

CREATE TABLE IF NOT EXISTS `rate_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `action` varchar(50) NOT NULL,
  `attempts` int(11) DEFAULT 1,
  `first_attempt` datetime NOT NULL,
  `last_attempt` datetime NOT NULL,
  `blocked_until` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip_action` (`ip_address`, `action`),
  INDEX `idx_blocked_until` (`blocked_until`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================
-- VIEWS FOR EASY ADMIN ACCESS
-- ============================================

-- View: Recent Contact Messages (Last 7 days)
CREATE OR REPLACE VIEW `recent_contacts` AS
SELECT 
    id,
    name,
    email,
    phone,
    subject,
    LEFT(message, 100) as message_preview,
    status,
    email_sent,
    created_at
FROM contact_submissions
WHERE created_at > DATE_SUB(NOW(), INTERVAL 7 DAY)
ORDER BY created_at DESC;


-- View: Recent Registrations (Last 7 days)
CREATE OR REPLACE VIEW `recent_registrations` AS
SELECT 
    id,
    name,
    email,
    phone,
    role,
    city,
    state,
    status,
    datetime as registered_at
FROM registrations
WHERE datetime > DATE_SUB(NOW(), INTERVAL 7 DAY)
ORDER BY datetime DESC;


-- ============================================
-- SAMPLE QUERIES FOR ADMIN
-- ============================================

-- Get all unread contact messages:
-- SELECT * FROM contact_submissions WHERE status = 'new' ORDER BY created_at DESC;

-- Mark a contact as read:
-- UPDATE contact_submissions SET status = 'read' WHERE id = 1;

-- Get registrations by city:
-- SELECT city, COUNT(*) as count FROM registrations GROUP BY city ORDER BY count DESC;

-- Check for suspicious activity (multiple submissions from same IP):
-- SELECT ip_address, COUNT(*) as attempts FROM contact_submissions GROUP BY ip_address HAVING attempts > 5;
