<?php

namespace Davidvandertuijn;

/**
 * Class HideEmail
 */
class HideEmail
{
    /**
     * Format.
     *
     * @param string $email
     *
     * @return string
     */
    public static function format(string $email): string
    {
        list($first, $last) = explode('@', $email);
        $localPart = strlen($first) < 3 ? str_repeat('*', strlen($first)) : substr($email, 0, 1).str_repeat('*', strlen($first) - 2).substr($first, -1);
        $domain = strlen(substr($last, 0, strrpos($last, '.'))) < 3 ? str_repeat('*', strlen(substr($last, 0, strrpos($last, '.')))) : substr($last, 0, 1).str_repeat('*', strrpos($last, '.') - 2).substr($last,strrpos($last, '.') - 1, 1);
        $tld = substr($last, strrpos($last, '.'));
        return $localPart.'@'.$domain.$tld;
    }
}
