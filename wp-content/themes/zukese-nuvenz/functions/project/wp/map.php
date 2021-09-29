<?php
function countState($state) {
    $term = get_term_by( 'slug', $state, 'estado' );
    $count = $term->count;

    if ($count != 1) {
        echo $term->count . ' eventos';
    } else {
        echo $term->count . ' evento';
    }
}
?>