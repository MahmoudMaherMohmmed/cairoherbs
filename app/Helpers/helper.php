<?php

function getDefaultValueKey($value)
{
    return $value[LaravelLocalization::getCurrentLocale()] ?? null;
}
