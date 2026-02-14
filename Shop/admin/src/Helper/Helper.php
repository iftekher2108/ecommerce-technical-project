<?php

use Shop\Admin\Classes\Helper;

function fileUpload($dirPath, $filename, $file)
{
    return Helper::fileUpload($dirPath, $filename, $file);
}

function fileDelete($path)
{
    return Helper::fileDelete($path);
}
