<?php
/**
 * Helper para arrays
 *
 * @package Weef Assets Theme
 * @subpackage Assets
 * @since Weef Assets Theme - 1.0
 */

/**
 * Converte um array multi-dimensional em um a array dimensional
 */
function array_flatten($array) { 
  if (!is_array($array)) { 
    return false; 
  } 
  $result = array(); 
  foreach ($array as $key => $value) { 
    if (is_array($value)) { 
      $result = array_merge($result, array_flatten($value)); 
    } else { 
      $result[$key] = $value; 
    } 
  } 
  return $result; 
}
function truncate_number( $number, $precision = 2) {
  // Zero causa problemas e não há necessidade de truncar
  if ( 0 == (int)$number ) {
      return $number;
  }
  // É negativo?
  $negative = $number / abs($number);
  // Converta o número para um positivo para resolver o arredondamento
  $number = abs($number);
  // Calcula a precisão do número para dividir / multiplicar
  $precision = pow(10, $precision);
  // Execute a matemática, reaplicando o valor negativo para garantir que retorne corretamente negativo / positivo
  return floor( $number * $precision ) / $precision * $negative;
}