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

final class MediaTable extends AbstractModel
{
    public function set_schema(): void
    {
        $this->sql_schema = "CREATE TABLE $this->table_name (
			id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			attachment BIGINT(20) NOT NULL DEFAULT 0,
			job_id BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			campaign_id BIGINT(20) NOT NULL DEFAULT 0,
			post_id BIGINT(20) NOT NULL DEFAULT 0,
			user_id BIGINT(20) NOT NULL DEFAULT 0,
			uuid VARCHAR(50),
			title VARCHAR(200),
			platform VARCHAR(30) DEFAULT NULL,
			media_type VARCHAR(10) DEFAULT NULL,
			status VARCHAR(200) DEFAULT 'public',
			imdb_code VARCHAR(20) DEFAULT NULL,
			cover_image int DEFAULT 0,
			background_image int DEFAULT 0,
			is_movie TINYINT(1) NOT NULL DEFAULT 0,
			mpa_rating VARCHAR(10) DEFAULT NULL,
			runtime int DEFAULT 0, -- Runtime in minutes
			is_available TINYINT(1) NOT NULL DEFAULT 1,
			genres text DEFAULT NULL,
			language VARCHAR(10) DEFAULT NULL, -- code like 'en', 'es', etc.
			download_links text DEFAULT NULL,
			view_count BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			like_count BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			dislike_count BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			comment_count BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			year year DEFAULT NULL,
			description TEXT DEFAULT NULL,
			category BIGINT(20) UNSIGNED NOT NULL DEFAULT 0,
			tags TEXT DEFAULT NULL,
			thumbnails TEXT DEFAULT NULL,
			channel VARCHAR(50) DEFAULT NULL, -- channel ID: UCxxxxxxxxxxxxxxx
			channel_title VARCHAR(200) DEFAULT NULL,
			publish_date DATETIME DEFAULT NULL,
			created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
			deleted_at DATETIME DEFAULT NULL,
			PRIMARY KEY (id),
			KEY post_id (post_id),
			KEY user_id (user_id),
			KEY uuid (uuid)
		) $this->charset";
    }
}
