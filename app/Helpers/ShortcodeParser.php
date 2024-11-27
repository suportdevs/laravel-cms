<?php

namespace App\Helpers;

class ShortcodeParser
{
    public static function parse($content)
    {
        // Parse [google-maps] shortcode
        $content = preg_replace_callback(
            '/\[google-maps\s+title="([^"]+)"\s+iframe="([^"]+)"\](.*?)\[\/google-maps\]/',
            function ($matches) {
                $title = $matches[1];
                $iframe = $matches[2];

                return "
                <div class='google-map'>
                    <h3>{$title}</h3>
                    <iframe src='{$iframe}' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'></iframe>
                </div>
                ";
            },
            $content
        );

        // Parse [contact-form] shortcode
        $content = preg_replace_callback(
            '/\[contact-form\s+title="([^"]*)"\s+display_fields="([^"]*)"\s+mandatory_fields="([^"]*)"\](.*?)\[\/contact-form\]/',
            function ($matches) {
                $title = $matches[1];
                $displayFields = explode(',', $matches[2]);
                $mandatoryFields = explode(',', $matches[3]);

                $formFields = '';
                foreach ($displayFields as $field) {
                    $isRequired = in_array($field, $mandatoryFields) ? 'required' : '';
                    $formFields .= "
                        <div class='form-group'>
                            <label for='{$field}'>" . ucfirst($field) . "</label>
                            <input type='text' id='{$field}' name='{$field}' class='form-control' {$isRequired}>
                        </div>
                    ";
                }

                return "
                <div class='contact-form'>
                    <h3>{$title}</h3>
                    <form action='/submit-contact' method='POST'>
                        {$formFields}
                        <button type='submit' class='btn btn-primary'>Submit</button>
                    </form>
                </div>
                ";
            },
            $content
        );

        // Example: Add other shortcode parsers here, e.g., [slider]
        $content = preg_replace_callback(
            '/\[slider\s+images="([^"]+)"\](.*?)\[\/slider\]/',
            function ($matches) {
                $images = explode(',', $matches[1]);
                $slider = '<div class="slider">';
                foreach ($images as $image) {
                    $slider .= "<img src='{$image}' alt='Slider Image' />";
                }
                $slider .= '</div>';

                return $slider;
            },
            $content
        );

        return $content;
    }
}
