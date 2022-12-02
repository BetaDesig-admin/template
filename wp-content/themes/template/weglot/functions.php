<?php
add_filter( 'weglot_get_dom_checkers', 'custom_weglot_dom_check' );
function custom_weglot_dom_check( $dom_checkers ) { //$dom_checkers contains the list of all the class we are checking by default

    class Div_Slide_Title extends Weglot\Parser\Check\Dom\AbstractDomChecker {
        const DOM = 'div'; //Type of tag you want to detect // CSS Selector
        const PROPERTY = 'data-title'; //Name of the attribute in that tag uou want to detect
        const WORD_TYPE = Weglot\Client\Api\Enum\WordType::TEXT; //Do not change unless it's not text but a media URL like a .pdf file for example.
    }

    $dom_checkers[] = '\Div_Slide_Title'; //You add your class to the list because you want the parser to also detect it

    return $dom_checkers;
}