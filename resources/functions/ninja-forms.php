<?php

// allow mapping session variables to ninja forms' default values
add_filter('ninja_forms_render_default_value', function($value){
    if (preg_match('#{application:(.+)}#', $value, $match)) {
        list(, $variable) = $match;
        $session = request()->session();
        $data = $session->get(App\Http\Controllers\ApplyController::$APPLY_DATA_KEY, []);
        $value = isset($data[$variable]) ? $data[$variable] : '';
    }
    return $value;
}, 10, 10);


add_filter('ninja_forms_localize_field_listcheckbox', function($field){
    $session = request()->session();
    $data = $session->get(App\Http\Controllers\ApplyController::$APPLY_DATA_KEY, []);
    foreach ($field['settings']['options'] as $i => $option) {
        $name = $field['settings']['key'] . '_' . sanitize_title($option['value']);
        if (!empty($data[$name])) {
            $field['settings']['options'][$i]['selected'] = 1;
        }
    }
    return $field;
});


add_filter('ninja_forms_submission_actions', function($actions, $cache, $data){

    $fields = array_reduce($cache['fields'], function($fields, $field){
        return $fields + [$field['id'] => $field['settings']];
    }, []);

    $subscribe = false;
    foreach ($data['fields'] as $field) {
        if (preg_match('#sign.*up#i', $fields[$field['id']]['label']) and $field['value']) {
            $subscribe = true;
        }
    }

    // exclude mailchimp action if checkbox Subscribe is unchecked
    return array_filter($actions, function($action) use ($subscribe) {
        if ($action['settings']['type'] == 'mailchimp' and !$subscribe) {
            return false;
        }
        return true;
    });
    
}, 10, 10);

add_filter('ninja_forms_action_email_message', function($message){
    $message = preg_replace('#([a-z0-9])\s*\|\s*Default\s*".*?"#', '$1', $message);
    $message = preg_replace('#\s*\|\s*Default\s*"(.*?)"#', '$1', $message);
    return $message;
});