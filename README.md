# Manage your vmail accounts with ease

## Installation
```
composer require jprangenbergde/vmail-manager
```

## Dovecot
```
password_query = SELECT username AS user, domain, password FROM accounts WHERE username = '%n' AND domain = '%d' and enabled = true;
user_query = SELECT concat('*:storage=', quota, 'M') AS quota_rule FROM accounts WHERE username = '%n' AND domain = '%d' AND sendonly = false;
iterate_query = SELECT username, domain FROM accounts where sendonly = false;
```

## Database
```
CREATE TABLE `domains` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `domain` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`domain`)
);

CREATE TABLE `accounts` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(64) NOT NULL,
    `domain` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `quota` int unsigned DEFAULT '0',
    `enabled` boolean DEFAULT '0',
    `sendonly` boolean DEFAULT '0',
    PRIMARY KEY (id),
    UNIQUE KEY (`username`, `domain`),
    FOREIGN KEY (`domain`) REFERENCES `domains` (`domain`)
);

CREATE TABLE `aliases` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `source_username` varchar(64) NOT NULL,
    `source_domain` varchar(255) NOT NULL,
    `destination_username` varchar(64) NOT NULL,
    `destination_domain` varchar(255) NOT NULL,
    `enabled` boolean DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY (`source_username`, `source_domain`, `destination_username`, `destination_domain`),
    FOREIGN KEY (`source_domain`) REFERENCES `domains` (`domain`)
);

CREATE TABLE `tlspolicies` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `domain` varchar(255) NOT NULL,
    `policy` enum('none', 'may', 'encrypt', 'dane', 'dane-only', 'fingerprint', 'verify', 'secure') NOT NULL,
    `params` varchar(255),
    PRIMARY KEY (`id`),
    UNIQUE KEY (`domain`)
);
```