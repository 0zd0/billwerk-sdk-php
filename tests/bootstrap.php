<?php
use Yosymfony\Toml\Toml;

$loader = require __DIR__ . '/../vendor/autoload.php';

$config = Toml::ParseFile('config.dev.toml');
putenv('API_KEY=' . $config['api']['key']);
