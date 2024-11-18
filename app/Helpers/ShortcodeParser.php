<?php

namespace App\Helpers;

class ShortcodeParser
{
    public static function parse($content, $shortcodes)
    {
        dd($shortcodes);
        foreach ($shortcodes as $shortcode => $callback) {
            $pattern = '/\[' . $shortcode . '(.*?)\]/';
            $content = preg_replace_callback($pattern, function ($matches) use ($callback) {
                // Extract attributes
                $attributes = [];
                if (isset($matches[1])) {
                    preg_match_all('/(\w+)="(.*?)"/', $matches[1], $attrMatches, PREG_SET_ORDER);
                    foreach ($attrMatches as $attr) {
                        $attributes[$attr[1]] = $attr[2];
                    }
                }

                return call_user_func($callback, $attributes);
            }, $content);
        }

        return $content;
    }
}
