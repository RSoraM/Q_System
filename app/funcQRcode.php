<?php
/**
 * Created by PhpStorm.
 * User: tanisha
 * Date: 2017/6/4
 * Time: 01:18
 */

include '../config/phpqrcode/qrlib.php';

$value = "http://projectrsm.com/page/questionnaire.php?id=" . $_GET['id'];

QRcode::png($value);