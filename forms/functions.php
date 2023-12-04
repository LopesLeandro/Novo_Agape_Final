<?php

function getFieldValue($field, $array) {
    // return isset($array[$field]) ? $array[$field] : '';
    return $array[$field] ?? '';


}

function isSelected($fieldValue, $optionValue) {
    return isset($fieldValue) && $fieldValue == $optionValue ? 'selected' : '';
}


?>