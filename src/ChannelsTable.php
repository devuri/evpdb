<?php

/*
 * This file is part of the Video Publisher plugin.
 *
 * (c) Uriel Wilson
 *
 * The full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace VideoPublisher;

final class ChannelsTable extends AbstractModel
{
    public function set_schema(): void
    {
        $this->sql_schema = "CREATE TABLE $this->table_name (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			uuid VARCHAR(50),
			title VARCHAR(255) DEFAULT NULL,
			user_id BIGINT(20) NOT NULL DEFAULT 0,
			verified TINYINT(1) NOT NULL DEFAULT 0,
			user_avatar BIGINT(20) NOT NULL DEFAULT 0,
			description TEXT DEFAULT NULL,
			custom_url VARCHAR(50) DEFAULT NULL,
			country VARCHAR(20) DEFAULT NULL,
			subscriber_count BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			video_count BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			view_count BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			thumbnails TEXT DEFAULT NULL,
			publish_date datetime DEFAULT NULL,
			created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			deleted_at DATETIME DEFAULT NULL,
			PRIMARY KEY (id),
			KEY uuid (uuid)
		) $this->charset";
    }
}
