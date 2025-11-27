<?php

function remove_trailing_slash_on_void_elements($buffer) {
    // List of void elements as per HTML5 specs
    $void_elements = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr'];
    
    // Dla każdego void element, usuń końcowy ukośnik
    foreach ($void_elements as $element) {
        $pattern = '/<' . $element . '([^>]*?)\s*\/>/i';
        $replacement = '<' . $element . '$1>';
        $buffer = preg_replace($pattern, $replacement, $buffer);
    }
    
    return $buffer;
}

// Rozpocznij buforowanie przy załadowaniu strony
add_action('template_redirect', function() {
    ob_start('remove_trailing_slash_on_void_elements');
});

// Zakończ buforowanie przy zakończeniu ładowania strony
add_action('shutdown', function() {
    if (ob_get_length()) {
        ob_end_flush();
    }
}, PHP_INT_MAX);