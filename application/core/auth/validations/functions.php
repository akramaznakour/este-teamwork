<?php


/**
 * Gets a content of a GET variable either by name or position in the path
 * @param $index
 *
 * @return mixed
 */
function getVar($index)
{
    $tree = explode("/", @$_GET['path']);
    $tree = array_filter($tree);

    if (is_int($index)) {
        $res = @$tree[$index - 1];
    } else {
        $res = @$_GET[$index];
    }
    return $res;
}


