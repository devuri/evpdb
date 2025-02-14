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

abstract class AbstractModel implements TableInterface
{
    protected $table_name;
    protected $charset;
    protected $sql_schema;

    public function __construct(string $table_name_no_prefix)
    {
        $this->table_name = $this->db()->prefix . $table_name_no_prefix;
        $this->charset    = $this->db()->get_charset_collate();
        $this->set_schema();
    }

    /**
     * @return static
     */
    public static function init(string $table_name_no_prefix): self
    {
        $called_class = static::class;

        return new $called_class($table_name_no_prefix);
    }

    public function insert(array $columns = [])
    {
        $db     = $this->db();
        $result = $db->insert(
            $this->table_name,
            $columns,
        );

        if (! $result) {
            return false;
        }

        return $db->insert_id;
    }

    public function db()
    {
        global $wpdb;

        return $wpdb;
    }

    public function create(): void
    {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($this->get_schema());
    }

    abstract public function set_schema(): void;

    public function find($uniqid, string $column = 'uuid'): ?object
    {
        $item = $this->db()->get_row(
            $this->db()->prepare("SELECT * FROM $this->table_name WHERE $column = %s LIMIT 1", $uniqid)
        );

        if ($item) {
            return $item;
        }

        return null;
    }

    public function count(): int
    {
        $data_count = $this->db()->get_var("SELECT COUNT(*) FROM $this->table_name");

        return (int) $data_count;
    }

    public function all_results(): ?array
    {
        $results = $this->db()->get_results(
            $this->db()->prepare(
                "SELECT * FROM $this->table_name LIMIT %d OFFSET %d",
                $this->count(),
                0
            ),
            ARRAY_A
        );

        if ($results) {
            return $results;
        }

        return null;
    }

    protected function get_schema(): string
    {
        return $this->sql_schema;
    }
}
