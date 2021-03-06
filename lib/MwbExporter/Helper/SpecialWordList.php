<?php

/*
 * The MIT License
 *
 * Copyright (c) 2010 Johannes Mueller <circus2(at)web.de>
 * Copyright (c) 2012-2013 Toha <tohenk@yahoo.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace MwbExporter\Helper;

/**
 * simple word list to handle exceptions
 * of singularization and pluralization rule
 */
class SpecialWordList
{
    /**
     * @var array
     */
    protected static $specialWordList = array(
        // ***************************************************
        // **       add special words here
        // ***************************************************
        array('s' => 'cache',   'p' => 'caches'),
        array('s' => 'status',  'p' => 'statuses'), // real plural of status is status
        array('s' => 'profile', 'p' => 'profiles'),
        array('s' => 'address', 'p' => 'addresses'),
        array('s' => 'bureau',  'p' => 'bureaus'),
        array('s' => 'bonus',   'p' => 'bonuses'),
    );

    /**
     * Get the plural form of singular word.
     *
     * @param string $singular
     * @return string 
     */
    public static function getPluralOf($singular)
    {
        // late static binding requires PHP > 5.3
        foreach (static::$specialWordList as $word) {
            if ($word['s'] === strtolower($singular)) {
                return ucfirst($word['p']);
            }
        }
    }

    /**
     * Get the singular form of plural word.
     *
     * @param string $plural
     * @return string
     */
    public static function getSingularOf($plural)
    {
        // late static binding requires PHP > 5.3
        foreach (static::$specialWordList as $word) {
            if ($word['p'] === strtolower($plural)) {
                return ucfirst($word['s']);
            }
        }
    }
}
