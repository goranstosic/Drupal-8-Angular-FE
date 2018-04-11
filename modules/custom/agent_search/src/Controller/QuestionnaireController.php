<?php

/**
 * @file
 * Contains \Drupal\agent_search\Controller\QuestionnaireController.php
 * @version PHP: 7
 */

namespace Drupal\agent_search\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Drupal\node\Entity\Node;
use \Drupal\file\Entity\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Dompdf\Dompdf;
use Drupal\Core\Routing\TrustedRedirectResponse;

/**
 * @package Drupal/agent_search/Controller
 */
class QuestionnaireController extends ControllerBase {

    /**
     * Returns generated link for accepted questionnaire
     * *
     * @return string
     *   A JSON-formatted string with the generated link.
     */
    public function accept(Request $request)
    {
        $jsonContent = $request->getContent();

        $questionnaire = json_decode($jsonContent);
        $tripName = $questionnaire->step_1->trip_name->value;


        $hash = md5(\Drupal::request()->getClientIp() . $tripName . time());

        $node = Node::create([
            'type' => 'questionnaire',
            'title' => $tripName,
            'field_hash_id' => $hash,
            'field_json_data' => $jsonContent
        ]);

        sendRequest($node,[\Drupal\user\Entity\User::load(1)]);

        $node->save();

        return new JsonResponse(array('link' => \Drupal::request()->getSchemeAndHttpHost() . '/search?q=' . $hash));
    }

    /**
     * Returns the single questionnaire
     * *
     * @return string
     *   A JSON-formatted string with the single questionnaire
     */
    public function get(Request $request, $hash)
    {
        $entity_ids = hashQuery($hash);

        $response = new Response();

        if(count($entity_ids) > 0) {
            $questionnaire = Node::load($entity_ids[0]);
            $jsonContent = $questionnaire->get('field_json_data')->value;
            $response->setContent($jsonContent);
        } else {
            $response->setContent('Access denied');
        }

        return $response;

    }

    /**
     * Returns generated links for updated questionnaire
     * *
     * @return string
     *   A JSON-formatted string with the generated links
     */
    public function update(Request $request, $hash)
    {
        $entity_ids = hashQuery($hash);

        $response = new Response();

        if(count($entity_ids) > 0) {
            $jsonContent = $request->getContent();
            $questionnaire = Node::load($entity_ids[0]);
            $questionnaire->set('field_json_data', $jsonContent);

            if (count($questionnaire->get('field_travel_agents')->getValue()) > 0) {
                $resend = true;
            } else {
                $resend = false;
            }

            $questionnaire->save();
        }

        $host = \Drupal::request()->getSchemeAndHttpHost();

        return new JsonResponse(array('link' => $host . '/search?q=' . $hash,
        'resend' => $resend
        ));

    }

    /**
     * Returns sending status
     * *
     * @return string
     *   A JSON-formatted string with sending status
     */
    public function send(Request $request, $hash)
    {
        $hashEntity = hashQuery($hash);
        $mailMe = $request->get('mail_me');

        if(count($hashEntity) > 0) {
            $questionnaire = Node::load($hashEntity[0]);
            $jsonContent = $questionnaire->get('field_json_data')->value;

            $travelAgents = user_load_multiple(json_decode($request->getContent()));

            $response = sendRequest($questionnaire, $travelAgents, $mailMe);

        }

        return new JsonResponse($response);
    }

    /**
     * Returns resending status
     * *
     * @return string
     *   A JSON-formatted string with resending status
     */
    public function resend(Request $request, $hash)
    {
        $hashEntity = hashQuery($hash);

        if(count($hashEntity) > 0) {
            $questionnaire = Node::load($hashEntity[0]);

            $travelAgentIds = array();

            foreach ($questionnaire->get('field_travel_agents')->getValue() as $key => $value) {
                $travelAgentIds[] = $value['target_id'];
            }

            $travelAgents = user_load_multiple($travelAgentIds);

            $response = sendRequest($questionnaire, $travelAgents);

        }

        return new JsonResponse($response);
    }

    /**
     * Returns copy status
     * *
     * @return string
     *   A JSON-formatted string with copy status
     */
    public function copy(Request $request, $hash)
    {

        $hashEntity = hashQuery($hash);

        if(count($hashEntity) > 0) {
            $questionnaire = Node::load($hashEntity[0]);

            $jsonContent = json_decode($questionnaire->get('field_json_data')->value);

            $name = $request->get('name');

            if (count($name) > 0) {
                 $tripName = $name;
            } else {
                $tripName = 'Copy of ' . $jsonContent->step_1->trip_name->value;
            }

            $jsonContent->step_1->trip_name->value = $tripName;

            $hash = md5(\Drupal::request()->getClientIp() . $tripName . time());

            $copy = $questionnaire->createDuplicate();
            $copy->setTitle($tripName);
            $copy->set('field_hash_id', $hash);
            $copy->set('field_json_data', json_encode($jsonContent));
            $copy->set('uid',\Drupal::currentUser()->id());

            unset($copy->field_travel_agents);
            unset($copy->field_sent);

            $response = $copy->save();
        }

        ///return array('#type' => 'markup', '#markup' => t('Hello World!'));

        return new TrustedRedirectResponse('/user');
    }

     /**
     * Returns questionnaire pdf
     * *
     * @return string
     *   Questionnaire pdf
     */
    public function pdf(Request $request, $hash)
    {
        $hashEntity = hashQuery($hash);

        if(count($hashEntity) > 0) {

            $questionnaire = Node::load($hashEntity[0]);

            $jsonContent = $questionnaire->get('field_json_data')->value;
            $content = json_decode($jsonContent);

            //DELETE-AFTER-FROM
            $htmlContent .= '<style>.pdf-img-wrap {width:500px; height:180px; border-right:2px solid #003663; float:left;} .pdf-tagline-wrap {width:500px; height: 180px; float: left;} .clear {clear:both;}</style>';
            $htmlContent .= '<div class="pdf-img-wrap"><img src="http://dev.tripogater.com.au/themes/tripogater/images/pdf/tq-logo.png" /></div>';
            $htmlContent .= '<div class="pdf-tagline-wrap"><img src="http://dev.tripogater.com.au/themes/tripogater/images/pdf/tagline.png" /></div>';
            $htmlContent .= '<h2 style="color:#003663;">Contact Information</h2>';
            $htmlContent .= '<div style="border:1px solid #808285; float:left; width:45%; color:#808285; padding:20px;"><strong>Full name: </strong>' . $content->step_1->full_name->value . '</div>';
            $htmlContent .= '<div style="border:1px solid #808285; float:right; width:45%; color:#808285; padding:20px;"><strong>Contact number: </strong>' . $content->step_1->contact_number->value . '</div>';
            $htmlContent .= '<div style="clear:both;"></div>';
            $htmlContent .= '<div style="border:1px solid #808285; float:left; width:45%; color:#808285; padding:20px;"><strong>Email: </strong>' . $content->step_1->email->value . '</div>';
            $htmlContent .= '<div style="border:1px solid #808285; float:right; width:45%; color:#808285; padding:20px;"><strong>Suburb: </strong>' . $content->step_1->suburb->value . '</div>';
            $htmlContent .= '<div><strong>Contact at bussiness hours: </strong>' . $content->step_1->what_times->value->business_hours . '</div>';
            $htmlContent .= '<div><strong>Contact at after hours: </strong>' . $content->step_1->what_times->value->after_hours . '</div>';
            $htmlContent .= '<div><strong>Contact at weekends: </strong>' . $content->step_1->what_times->value->weekends . '</div>';
            $htmlContent .= '<div><strong>Contact at anytime: </strong>' . $content->step_1->what_times->value->anytime . '</div>';
            $htmlContent .= '<div><strong>Do you need visa?: </strong>' . $content->step_1->visa->value . '</div>';
            $htmlContent .= '<div><strong>Receive quote via phone: </strong>' . $content->step_1->receive_quote->value->phone . '</div>';
            $htmlContent .= '<div><strong>Receive quote via sms: </strong>' . $content->step_1->receive_quote->value->sms . '</div>';
            $htmlContent .= '<div><strong>Receive quote via email: </strong>' . $content->step_1->receive_quote->value->email . '</div>';
            $htmlContent .= '<div><strong>Trip name: </strong>' . $content->step_1->trip_name->value . '</div>';

            switch ($content->step_2->quote) {
                case 'flights':
                    $htmlContent .= '<h2>Flights</h2>';
                    $htmlContent .= '<div><strong>Return trip From: </strong>' . $content->step_2->values->flights_from->value . '</div>';
                    $htmlContent .= '<div><strong>Return trip To: </strong>' . $content->step_2->values->flights_to->value . '</div>';
                    $htmlContent .= '<div><strong>Return trip Depart: </strong>' . $content->step_2->values->flights_depart->value . '</div>';
                    $htmlContent .= '<div><strong>Return trip Duration of trip: </strong>' . $content->step_2->values->flights_duration->value . '</div>';
                    $htmlContent .= '<div><strong>Return trip Arrival: </strong>' . $content->step_2->values->flights_arrival->value . '</div>';
                    $htmlContent .= '<div><strong>Return trip Passengers: </strong>' . $content->step_2->values->flights_passengers->value . '</div>';
                    $htmlContent .= '<div><strong>One way From: </strong>' . $content->step_2->values->flights_from_one_way->value . '</div>';
                    $htmlContent .= '<div><strong>One way To: </strong>' . $content->step_2->values->flights_to_one_way->value . '</div>';
                    $htmlContent .= '<div><strong>One way Depart: </strong>' . $content->step_2->values->flights_depart_one_way->value . '</div>';
                    $htmlContent .= '<div><strong>One way Passengers: </strong>' . $content->step_2->values->flights_passengers_one_way->value . '</div>';
                     foreach ($content->step_2->values->cities->values as $index => $city) {
                        $htmlContent .= '<h3>City ' . ($index + 1) . '</h3>';
                            $htmlContent .= '<div><strong>Multi-city From: </strong>' . $city->cities_values_from->value . '</div>';
                      }
                    $htmlContent .= '<div><strong>Are your dates flexibile: </strong>' . $content->step_2->values->flights_flex_dates->value . '</div>';
                    $htmlContent .= '<div><strong>Preffered Airline: </strong>' . $content->step_2->values->flights_preffered_airline->value . '</div>';
                    $htmlContent .= '<div><strong>Cabin class economy: </strong>' . $content->step_2->values->flights_cabin_class->value->economy . '</div>';
                    $htmlContent .= '<div><strong>Cabin class premium economy: </strong>' . $content->step_2->values->flights_cabin_class->value->premium_economy . '</div>';
                    $htmlContent .= '<div><strong>Cabin class business: </strong>' . $content->step_2->values->flights_cabin_class->value->business . '</div>';
                    $htmlContent .= '<div><strong>Cabin class first_class: </strong>' . $content->step_2->values->flights_cabin_class->value->first_class . '</div>';
                    $htmlContent .= '<div><strong>Comments: </strong>' . $content->step_2->values->flights_comments->value . '</div>';
                break;
                case 'accommodation':
                $htmlContent .= '<h2>Accommodation</h2>';
                    $htmlContent .= '<div><strong>Desired city / Location for accommodation: </strong>' . $content->step_2->values->accomm_location->value . '</div>';
                    $htmlContent .= '<div><strong>Check in: </strong>' . $content->step_2->values->accomm_check_in->value . '</div>';
                    $htmlContent .= '<div><strong>Duration of stay: </strong>' . $content->step_2->values->accomm_duration->value . '</div>';
                    $htmlContent .= '<div><strong>Check out: </strong>' . $content->step_2->values->accomm_check_out->value . '</div>';
                    $htmlContent .= '<div><strong>Accommodation type: </strong>' . $content->step_2->values->accomm_type->value . '</div>';
                    $htmlContent .= '<div><strong>Room information: </strong>' . $content->step_2->values->accomm_room_info->value . '</div>';
                    $htmlContent .= '<div><strong>Other information Balcony: </strong>' . $content->step_2->values->accomm_other_info->value->balcony . '</div>';
                    $htmlContent .= '<div><strong>Other information Smoking: </strong>' . $content->step_2->values->accomm_other_info->value->smoking . '</div>';
                    $htmlContent .= '<div><strong>Other information Air conditioning: </strong>' . $content->step_2->values->accomm_other_info->value->airconditioning . '</div>';
                    $htmlContent .= '<div><strong>Other information Breakfast: </strong>' . $content->step_2->values->accomm_other_info->value->breakfast . '</div>';
                    $htmlContent .= '<div><strong>Other information Free parking: </strong>' . $content->step_2->values->accomm_other_info->value->free_parking . '</div>';
                    $htmlContent .= '<div><strong>Other information Wifi: </strong>' . $content->step_2->values->accomm_other_info->value->wifi . '</div>';
                    $htmlContent .= '<div><strong>Other information Other: </strong>' . $content->step_2->values->accomm_other_info->value->other . '</div>';
                break;
                case 'cruise':
                    $htmlContent .= '<h2>Cruise</h2>';
                    $htmlContent .= '<div><strong>Number of passengers: </strong>' . $content->step_2->values->cruse_number_of_passengers->value . '</div>';
                    $htmlContent .= '<div><strong>Departure port: </strong>' . $content->step_2->values->cruise_departure_port->value . '</div>';
                    $htmlContent .= '<div><strong>Arrival port: </strong>' . $content->step_2->values->cruise_arrival_port->value . '</div>';
                    $htmlContent .= '<div><strong>Lenght of cruise: </strong>' . $content->step_2->values->cruise_lenght_of_cruise->value . '</div>';
                    $htmlContent .= '<div><strong>Month from: </strong>' . $content->step_2->values->cruise_month_from->value . '</div>';
                    $htmlContent .= '<div><strong>Month to: </strong>' . $content->step_2->values->cruise_month_to->value . '</div>';
                    $htmlContent .= '<div><strong>Other information Interior: </strong>' . $content->step_2->values->cruise_other_information->value->interior . '</div>';
                    $htmlContent .= '<div><strong>Other information Ocean view: </strong>' . $content->step_2->values->cruise_other_information->value->ocean_view . '</div>';
                    $htmlContent .= '<div><strong>Other information Balcony: </strong>' . $content->step_2->values->cruise_other_information->value->balcony . '</div>';
                    $htmlContent .= '<div><strong>Other information Suite: </strong>' . $content->step_2->values->cruise_other_information->value->suite . '</div>';
                    $htmlContent .= '<div><strong>Comments: </strong>' . $content->step_2->values->cruise_comments->value . '</div>';
                break;
                case 'travel_insurance':
                    $htmlContent .= '<h2>Travel Insurance</h2>';
                    $htmlContent .= '<div><strong>Travel insurance: </strong>' . $content->step_2->values->travel_insurance->value . '</div>';
                    $htmlContent .= '<div><strong>Destination: </strong>' . $content->step_2->values->travel_insurance_destination->value . '</div>';
                    $htmlContent .= '<div><strong>Departure date: </strong>' . format_date(strtotime($content->step_2->values->travel_insurance_departure_date->value), 'custom', 'd/m/Y') . '</div>';
                    $htmlContent .= '<div><strong>Return date: </strong>' . $content->step_2->values->travel_insurance_return_date->value . '</div>';
                    $htmlContent .= '<div><strong>Age of traveler: </strong>' . $content->step_2->values->travel_insurance_age_of_traveler->value . '</div>';
                break;
                case 'car_hire':
                    $htmlContent .= '<h2>Car Hire</h2>';
                    $htmlContent .= '<div><strong>Pickup location: </strong>' . $content->step_2->values->car_hire_pickup_location->value . '</div>';
                    $htmlContent .= '<div><strong>Drop off location: </strong>' . $content->step_2->values->car_hire_drop_off_location->value . '</div>';
                    $htmlContent .= '<div><strong>Pickup date: </strong>' . $content->step_2->values->car_hire_pickup_date->value . '</div>';
                    $htmlContent .= '<div><strong>Pickup time: </strong>' . $content->step_2->values->car_hire_pickup_time->value . '</div>';
                    $htmlContent .= '<div><strong>Dropoff date: </strong>' . $content->step_2->values->car_hire_drop_off_date->value . '</div>';
                    $htmlContent .= '<div><strong>Dropoff time: </strong>' . $content->step_2->values->car_hire_drop_off_time->value . '</div>';
                    $htmlContent .= '<div><strong>Number of passangers: </strong>' . $content->step_2->values->car_hire_number_of_passangers->value . '</div>';
                    $htmlContent .= '<div><strong>Type of vehicle: </strong>' . $content->step_2->values->car_hire_type_of_vehicle->value . '</div>';
                    $htmlContent .= '<div><strong>Number of cars: </strong>' . $content->step_2->values->car_hire_number_of_cars->value . '</div>';
                    $htmlContent .= '<div><strong>Other: </strong>' . $content->step_2->values->car_hire_other->value . '</div>';
                break;
                case 'packages':
                    $htmlContent .= '<h2>Packages</h2>';
                    foreach ($content->step_2->values as $index => $package) {
                        $htmlContent .= '<h3>Package ' . ($index+1) . '</h3>';
                        $htmlContent .= '<div><strong>From: </strong>' . $package->packages_from->value . '</div>';

                    }
                break;
            }
            //DELETE-AFTER-TO

            $dompdf = new \Dompdf\Dompdf();
            $options = new \Dompdf\Options();
            $options->setIsRemoteEnabled(true);

            $dompdf->setOptions($options);
            $dompdf->output();

            $theme_body = array(
                '#theme' => 'pdf',
                '#content' => $content
              );

            $htmlContent = \Drupal::service('renderer')->render($theme_body);

            $dompdf->loadHtml($htmlContent);

                // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
            $dompdf->render();

                // Output the generated PDF to Browser
           return $dompdf->stream();

        }

    }

    public function submittedQuestionnaires() {

        $uid = \Drupal::currentUser()->id();
        $query = \Drupal::entityQuery('node');
        $query->condition('type','questionnaire');
        $query->condition('field_travel_agents', [$uid], 'in');
        $nodes = $query->execute();
        $nodes = Node::loadMultiple($nodes);

        $questionnaires = [];
        foreach ($nodes as $questionnaire) {
            $jsonContent = json_decode($questionnaire->get('field_json_data')->value);

            $questionnaires[] = [
                'hash' => $questionnaire->get('field_hash_id')->value,
                'name' => $jsonContent->step_1->full_name->value,
                'trip_name' => $jsonContent->step_1->trip_name->value,
                'date' =>  \Drupal::service('date.formatter')->format($questionnaire->get('created')->value,'custom', 'd.m.Y', drupal_get_user_timezone()),
            ];

        }
        $questionnaires = array_reverse($questionnaires);

            return [
                '#title' => 'Submitted questionnaires',
                '#theme' => 'submitted_questionnaires',
                '#questionnaires' => $questionnaires,
            ];
    }


}
