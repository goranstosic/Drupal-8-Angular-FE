<?php

/**
 * @file
 * Contains \Drupal\agent_search\Controller\SearchController.php
 * @version PHP: 7
 */

namespace Drupal\agent_search\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Drupal\node\Entity\Node;
use \Drupal\file\Entity\File;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Database\Database;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @package Drupal/agent_search/Controller
 */
class SearchController extends ControllerBase {
    /**
     * Returns the search airport autocomplete
     * *
     * @return string
     *   A JSON-formatted string with the airport autocomplete.
     */
    public function airport(Request $request, $query) 
    {
        $connection = Database::getConnection();

        $mySquery = "SELECT nid,title FROM node_field_data WHERE type = 'airports' AND title LIKE '%" . stripslashes($query) . "%' LIMIT 10";

        $result = $connection->query($mySquery, array(), array());  
        $records = $result->fetchAll();
        
        return new JsonResponse($records);
    }

    /**
     * Returns the search city autocomplete
     * *
     * @return string
     *   A JSON-formatted string with the city autocomplete.
     */
    public function city(Request $request, $query) 
    {
        $connection = Database::getConnection();

        $mySquery = "SELECT nid,title FROM node_field_data WHERE type = 'cities' AND title LIKE '%" . stripslashes($query) . "%' LIMIT 10";

        $result = $connection->query($mySquery, array(), array());  
        $records = $result->fetchAll();
        
        return new JsonResponse($records);
    }    

    /**
     * Returns the search autocomplete
     * *
     * @return string
     *   A JSON-formatted string with the search autocomplete.
     */
    public function autocomplete(Request $request, $query) 
    {
        $connection = Database::getConnection();

        $mySquery = "SELECT nid,title FROM node_field_data WHERE type = 'suburb' AND title LIKE '%" . stripslashes($query) . "%' LIMIT 10";

        $result = $connection->query($mySquery, array(), array());  
        $records = $result->fetchAll();
        
        return new JsonResponse($records);
    }

    /**
     * Returns the uid list 
     * *
     * @return string
     *   A JSON-formatted string with the uid list.
     */
    public function search(Request $request, $id, $distance)
    {

        $ids = explode(",", $id);

        if (count($ids) > 0) {

            $response = array();
            $response['agents_lenght'] = 0;

            foreach ($ids as $nid) {
                $suburb = Node::load($nid);
                $suburbs = array();
                $entity_ids = array();
                
                $lat = $suburb->field_location->lat;
                $lng = $suburb->field_location->lng;

                /// 3959 - for miles
                /// 6371 - for kilometers
                $query = 'SELECT
                            entity_id, (
                                6371 * acos (
                                cos ( radians(:lat) )
                                * cos( radians( field_location_lat ) )
                                * cos( radians( field_location_lng ) - radians(:lng) )
                                + sin ( radians(:lat) )
                                * sin( radians( field_location_lat ) )
                                )
                            ) AS distance
                            FROM node__field_location
                            HAVING distance < :distance
                            ORDER BY distance';

                $connection = Database::getConnection();

                $result = $connection->query($query, array(':lat' => $lat, ':lng'=> $lng, ':distance' => $distance), array());  
                $records = $result->fetchAll();
                
                foreach ($records as $record) {
                    $suburbs[] = $record->entity_id;
                }                 

                if (count($suburbs) > 0) {
                    $query = \Drupal::entityQuery('user');
                    $query->condition('field_suburb', $suburbs,'in');
                    $entity_ids = $query->execute();
                }     
                
                $users = \Drupal::entityTypeManager()->getStorage('user')->loadMultiple(array_values($entity_ids));

                foreach ($users as $user) {
                    $suburbId = $user->get('field_suburb')->getValue()[0]['target_id'];
                    $userSuburb = Node::load($suburbId);

                $country = $userSuburb->get('field_country')->getValue()[0]['value'];
                $region = $userSuburb->get('field_region')->getValue()[0]['value'];
                $state = $userSuburb->get('field_state')->getValue()[0]['value'];
                $city = $userSuburb->get('field_city')->getValue()[0]['value'];
                $suburb = $userSuburb->get('field_suburb')->getValue()[0]['value'];
                $title = $userSuburb->get('title')->getValue()[0]['value'];


                $response['countries'][$country]['selected'] = true;
                $response['countries'][$country]['states'][$state]['selected'] = true;
                $response['countries'][$country]['states'][$state]['cities'][$city]['selected'] = true;
                $response['countries'][$country]['states'][$state]['cities'][$city]['regions'][$region]['selected'] = true;
                $response['countries'][$country]['states'][$state]['cities'][$city]['regions'][$region]['suburbs'][$suburb]['selected'] = true;
                $response['countries'][$country]['states'][$state]['cities'][$city]['regions'][$region]['suburbs'][$suburb]['values'][] = array(
                        'agent_uid' => $user->get('uid')->getValue()[0]['value'],
                        'suburb_nid' => $suburbId
                    );
                }

                $response['agents_lenght'] += count($users);
            }


        }

        ///return array('type' => 'markup', '#markup' => 'bla');

        return new JsonResponse($response);
    }
}