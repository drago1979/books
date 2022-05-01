<?php

function convertPublishedDateFormatFileToTable($value): string
{
    return \Carbon\Carbon::createFromFormat('d/m/Y', $value)->toDateString();
}
