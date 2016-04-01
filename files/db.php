<?php

/**
 * Project: PicoDico
 * File:    db.php
 *
 */

$mysqli = new mysqli ('localhost', 'root', 'bobo', 'picodico');
$db = new MysqliDb ($mysqli);

