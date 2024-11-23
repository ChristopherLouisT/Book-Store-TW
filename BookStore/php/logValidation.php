<?php

function is_empty($var, $location, $ms, $data) {
    if (empty($var)) {
        $em = "Email Or Password Is Required";
        header("Location: $location?$ms=$em&$data");
        exit;
    }
    return 0;
}