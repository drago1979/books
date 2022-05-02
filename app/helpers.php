<?php

/**
 * Converts date from dd/mm/yyyy to yyyy-mm-dd
 *
 * @param string $value
 * @return string
 */
function convertPublishedDateFormatFileToTable(string $value): string
{
    return \Carbon\Carbon::createFromFormat('d/m/Y', $value)->toDateString();
}
