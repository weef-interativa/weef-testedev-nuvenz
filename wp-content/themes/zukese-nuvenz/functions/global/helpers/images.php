<?php
/**
 * Transforma uma imagem em base64
 * @param  [type] $attachment [description]
 * @param  string $size       [description]
 * @return [type]             [description]
 */
function base64_image($attachment, $size = "thumb-ico") {
    $uploads     = wp_upload_dir();
    $uploads_url = set_url_scheme($uploads['baseurl']);

    $image_url = $attachment['sizes'][$size];

    $path = str_replace($uploads_url, $uploads['basedir'], $image_url);
    $type = pathinfo($path, PATHINFO_EXTENSION);

    if (file_exists($path)) {
        $data   = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        return $base64;
    } else {
        return $attachment['sizes'][$size];
    }
}

/**
 * Adiciona propriedades src a elementos de midia do wordpress
 * @param  array  $image array de imagem do wordpress
 * @return array
 */
function get_image_model($image = array(), $size = 'thumb-xxlg') {
    if (!empty($image) && isset($image['sizes'][$size])) {
        $image['src'] = $image['sizes'][$size];
    }
    return $image;
}

/**
 * Retorna a model da thumbnail formatada conforme acf para a imagem
 * @param  [type] $post_id [description]
 * @param  string $size    [description]
 * @return [type]          [description]
 */
function get_thumbnail_model($post_id = null, $size = 'thumb-xxlg') {
    $post_id       = empty($post_id) ? get_the_id() : $post_id;
    $attachment_id = get_post_thumbnail_id($post_id);
    if (!empty($attachment_id)) {
        return get_attachment_model($attachment_id, $size);
    }
    return null;
}

/**
 * Retorna model de imagem pelo id do anexo
 * @param  [type] $attachment_id [description]
 * @param  string $size          [description]
 * @return [type]                [description]
 */
function get_attachment_model( $attachment_id, $size = 'thumb-xxlg' ) {
    $acf_attachment = acf_get_attachment( $attachment_id );
    return get_image_model( $acf_attachment, $size );
}

/**
 * Retorna as dimensões de uma imagem svg
 */
function get_svg_dimensions($attachment){
    $filepath = get_attached_file($attachment['ID']);

    $svgfile = simplexml_load_file($filepath);

    $viewbox = $svgfile['viewBox']->__toString();

    if (!empty($viewbox)) {
        $width  = explode(' ', $svgfile['viewBox']->__toString())[2];
        $height = explode(' ', $svgfile['viewBox']->__toString())[3];
    } else {
        $width  = $svgfile['width']->__toString();
        $height = $svgfile['height']->__toString();
    }

    return array_merge($attachment, array(
        'src'    => $attachment['url'],
        'width'  => $width,
        'height' => $height,
        'svg'    => $svgfile->asXML(),
    ));
}
