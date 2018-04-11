<?php

/**
 * @file
 * Contains \Drupal\csv_importer\Controller\ImportController.php
 * @version PHP: 7
 */

namespace Drupal\csv_importer\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Field\BaseFieldDefinition;
use \Drupal\node\Entity\Node;
use \Drupal\file\Entity\File;


/**
 * @package Drupal/csv_importer/Controller
 */
class ImportController extends ControllerBase {

    /**
     * Returns the import result.
     * *
     * @return string
     *   A HTML-formatted string with the import result.
     */
    public function import()
    {

        $geoImport = array();

        $handle = fopen('public://test.csv', 'r');

        while ($line = fgetcsv($handle) ) {

            $geo = array(
                'country' => $line[1],
                'state' => $line[4],
                'city' => $line[5],
                'region' => $line[6],
                'suburb' => $line[8],
                'postal' => $line[9],
                'lat' => $line[11],
                'lng' => $line[12],
            );

            $geoImport[] = array('do_import', array($geo));

        }

        fclose($handle);

//        return array(
//            '#type' => 'markup',
//            '#markup' => $this->t('Hello, World!'),
//        );


        $batch = array(
            'title' => t('Importing'),
            'operations' => $geoImport,
            'finished' => 'import_finished_callback',
            'file' => drupal_get_path('module', 'csv_importer') . '/import.inc',
        );

        batch_set($batch);
        return batch_process('/');

    }

    /**
     * Returns the import result.
     * *
     * @return string
     *   A HTML-formatted string with the import result.
     */
    public function importCity()
    {
        $citiesImport = array();

        $handle = fopen('public://cities-test.csv', 'r');

        while ($line = fgetcsv($handle) ) {

            $citiy = array(
                'name' => $line[10]
            );

            $citiesImport[] = array('do_city', array($line[10]));

        }

        fclose($handle);

        ///return array('#type' => 'markup', '#markup' => 'Hello cities');

        $batch = array(
            'title' => t('Importing'),
            'operations' => $citiesImport,
            'finished' => 'import_finished_callback',
            'file' => drupal_get_path('module', 'csv_importer') . '/import.inc',
        );

        batch_set($batch);
        return batch_process('/');
    }    

    /**
     * Returns the import result.
     * *
     * @return string
     *   A HTML-formatted string with the import result.
     */
    public function importAirport()
    {
        $airportImport = array();

        $handle = fopen('public://airports-test.csv', 'r');

        while ($line = fgetcsv($handle) ) {

            $airport = array(
                'name' => $line[4]
            );

            $airportImport[] = array('do_airport', array($airport));

        }

        fclose($handle);

    //    kpr($airportImport);

    //    return array(
    //        '#type' => 'markup',
    //        '#markup' => $this->t('Hello, Aero!'),
    //    );

        $batch = array(
            'title' => t('Importing'),
            'operations' => $airportImport,
            'finished' => 'import_finished_callback',
            'file' => drupal_get_path('module', 'csv_importer') . '/import.inc',
        );

        batch_set($batch);
        return batch_process('/');
    }
}