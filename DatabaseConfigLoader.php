<?php
namespace App;
class DatabaseConfigLoader {
    private string $path;
    public function __construct(string $path) {
        $this->path = $path;
    }

    public function load(string $env): array {
        $filename = "{$this->path}/database.{$env}.json";
        $raw = file_get_contents($filename);
        $config = json_decode($raw, associative: true);

        if (isset($config['extend'])) {
            $config = array_merge($this->load($config['extend']), $config);
            unset($config['extend']);
        }

        return $config;
    }
}