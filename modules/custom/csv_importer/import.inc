<?php

use \Drupal\node\Entity\Node;

function do_airport($options = array(), &$context) {
    $node = Node::create([
        'type' => 'airports',
        'title' => $options['name'],
        'field_name' => $options['name']
    ]);

    $node->save();

    $context['results'][] = $options;

    $message = $options['name'];

    $context['message'] = $message;
}

function do_city($options = array(), &$context) {

    if (!is_null($options) && !empty($options)) {
        $node = Node::create([
            'type' => 'cities',
            'title' => utf8_encode($options),
            'field_cityname' => utf8_encode($options)
        ]);

        $node->save();

        $context['results'][] = $options;

        $message = $options;

        $context['message'] = $message;
    }
}

function do_import($options = array(), &$context) {

    $node = Node::create([
        'type' => 'suburb',
        'title' => $options['suburb'] . ' (' . $options['postal'] . ')' ,
        'field_city' => $options['city'],
        'field_country'  => $options['country'],
        'field_location' => array(
                    'lat' => $options['lat'],
                    'lng' => $options['lng'],
                    'lat_sin' => sin(deg2rad($options['lat'])),
                    'lat_cos' => cos(deg2rad($options['lat'])),
                    'lng_rad' => deg2rad($options['lng']),
                    ),
        'field_postcode' => $options['postal'],
        'field_region' => $options['region'],
        'field_state' => $options['state'],
        'field_suburb' => $options['suburb']
    ]);

   /// \Drupal\field\Entity\FieldConfig::create()

    $node->save();

    $context['results'][] = $options;

    $message = $options['suburb'] . ' - ' . $options['postal'];


    $context['message'] = $message;
}

function import_finished_callback($success, $results, $operations) {
    if ($success) {
        $message = \Drupal::translation()->formatPlural(
            count($results),
            'One post processed.', '@count items processed.'
        );
    }
    else {
        $message = t('Finished with an error.');
    }
    drupal_set_message($message);
}