<?php

define('BASE_DIR', dirname(__DIR__));
define('SITE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

const ASSET_URL = SITE_URL . '/assets';
const IMG_URL = ASSET_URL . '/img';
const APP_DIR = BASE_DIR . '/app';
const VIEW_DIR = APP_DIR . '/Views';
const STORAGE_DIR = BASE_DIR . '/public/assets/storage';
const STORAGE_URL = ASSET_URL . '/storage';

