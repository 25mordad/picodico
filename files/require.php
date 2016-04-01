<?php

/**
 * Project: PicoDico
 * File:    require.php
 *
 */

//included files
require 'vendor/autoload.php';

//initial smarty
$pdTemp                 = new Smarty;
$pdTemp->debugging      = false;
$pdTemp->caching        = false;
$pdTemp->cache_lifetime = 120;
$pdTemp->template_dir   ="web/";
$pdTemp->compile_dir    ="html/templates_c/";
$pdTemp->config_dir     ="html/configs/";
$pdTemp->cache_dir      ="html/cache/";

//initial DB
require 'db.php';

