<?php
if (!function_exists('validate_load')) {
    function validate_load($rule = array())
    {
        if (!function_exists('form_error') || !function_exists('array_push')) {
            echo 'Form validation was not include';
            exit;
        }

        $error = array();
        foreach ($rule as $rule_index => $rule_item) {
            if (strlen(form_error($rule_item['field'])) > 0) {
                array_push($error, array(
                    'id' => $rule_item['field'],
                    'content' => form_error($rule_item['field'])
                ));
            }
        }

        return $error;
    }

}







