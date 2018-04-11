<?php

/* themes/tripogater/partials/questionnaire/step2-flights.html.twig */
class __TwigTemplate_91eaba0c166bc3bcee33b323b69659b7a7b1094c0562f3bdb988c94ce760e911 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array(),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 404
        echo "

  <div ng-show=\"quote == 'flights'\" class=\"step-2_flights\">

    <!-- Nav tabs -->
    <ul class=\"nav nav-tabs\" role=\"tablist\">
      <li class=\"active\">
        <a class=\"nav-link\" data-toggle=\"tab\" href=\"#flights_return\" role=\"tab\">Return</a>
      </li>
      <li>
        <a class=\"nav-link\" data-toggle=\"tab\" href=\"#flights_oneway\" role=\"tab\">One Way</a>
      </li>
      <li>
        <a class=\"nav-link\" data-toggle=\"tab\" href=\"#flights_multicity\" role=\"tab\">Multi-City</a>
      </li>
    </ul>
    <!-- Tab panes -->
    <div class=\"tab-content\">

      <div class=\"tab-pane active\" id=\"flights_return\" role=\"tabpanel\">
        <div class=\"cbc-inliner row\">
          <div class=\"form-group col-md-3\">
            <label for=\"flights-from\" class=\"col-form-label\">From</label>
            <div class=\"flights_icon takeoff\"></div>
            <div>
              <input ng-model=\"step2.flights.flights_from.value\" list=\"airportlistFrom\" ng-change=\"airports(step2.flights.flights_from.value)\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-from\">
              <datalist ng-model=\"selected\" id=\"airportlistFrom\">
                  <option ng-repeat=\"result in airportsResults\" value=\"{{result['title']}}\"></option>
              </datalist>
            </div>
          </div><!--/form-group-->
          <div class=\"form-group col-md-3\">
            <label for=\"flights-to\" class=\"col-form-label\">To</label>
            <div class=\"flights_icon landing\"></div>
            <div>
              <input ng-model=\"step2.flights.flights_to.value\" list=\"airportlistTo\" ng-change=\"airports(step2.flights.flights_to.value)\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-to\">
             <datalist ng-model=\"selected\" id=\"airportlistTo\">
                  <option ng-repeat=\"result in airportsResults\" value=\"{{result['title']}}\"></option>
              </datalist>
            </div>
          </div><!--/form-group-->

          <div class=\"form-group col-md-2\">
            <label for=\"datetimepicker1\" class=\"col-form-label\">Depart</label>
            <div>
              <md-datepicker ng-model=\"step2.flights.flights_depart.value\" md-placeholder=\"Enter date\" md-open-on-focus></md-datepicker>
            </div>
          </div><!--/form-group-->
          <!-- <div class=\"form-group col-md-2\">
            <label for=\"flights-duration\" class=\"col-form-label\">Duration of Trip</label>
            <div>
              <input ng-model=\"step2.flights.flights_duration.value\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-duration\">
            </div>
          </div> -->
          <div class=\"form-group col-md-2\">
            <label for=\"datetimepicker2\" class=\"col-form-label\">Arrival</label>
            <div>
              <md-datepicker ng-model=\"step2.flights.flights_arrival.value\" md-placeholder=\"Enter date\" md-open-on-focus></md-datepicker>
            </div>
          </div><!--/form-group-->
          <div id=\"passenger-field\" class=\"form-group col-md-2\">
            <label for=\"flights-passengers\" class=\"col-form-label\">Passengers</label>
            <div>
              <input ng-model=\"step2.flights.flights_passengers.value\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-passengers\">
            </div>
            <div id=\"passengers-pop\" class=\"custom-modal\">
              <p class=\"pass-label\">Adults</p>
              <div class=\"input-group\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-danger btn-number\" ng-click=\"passengersAction('adult','-')\" data-type=\"minus\" data-field=\"quant[2]\">
                      <span class=\"glyphicon glyphicon-minus\"></span>
                    </button>
                </span>
                <input type=\"text\" name=\"quant[2]\" ng-model=\"step2.flights.flights_passengers_adult.value\" class=\"form-control input-number\" value=\"1\" min=\"1\" max=\"100\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-success btn-number\" ng-click=\"passengersAction('adult','+')\" data-type=\"plus\" data-field=\"quant[2]\">
                        <span class=\"glyphicon glyphicon-plus\"></span>
                    </button>
                </span>
              </div>
              <p class=\"pass-label\">Children</p>
              <div class=\"age-explanation\">
                <p class=\"hidden-explanation\">A child 12 years and over is considered an adult, less than 12  and up to 2 is considered a child , under 2 is an infant.</p>
              </div>
              <div class=\"input-group\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-default btn-number\" ng-click=\"passengersAction('children','-')\" data-type=\"minus\" data-field=\"quant[1]\">
                        <span class=\"glyphicon glyphicon-minus\"></span>
                    </button>
                </span>
                <input type=\"text\" name=\"quant[1]\" ng-model=\"step2.flights.flights_passengers_children.value\" class=\"form-control input-number\" value=\"1\" min=\"1\" max=\"10\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-default btn-number\" ng-click=\"passengersAction('children','+')\" data-type=\"plus\" data-field=\"quant[1]\">
                        <span class=\"glyphicon glyphicon-plus\"></span>
                    </button>
                </span>
              </div>
              <div ng-repeat=\"child in step2.flights.flights_passengers_children.age track by \$index\" class=\"age-of-child\">
                <label for=\"age-of-child\" class=\"col-form-label\">Age of child <span>{{\$index+ 1}}</span></label>
                <select ng-model=\"step2.flights.flights_passengers_children.age[\$index]\">
                  <option value=\"1\">1</option>
                  <option value=\"2\">2</option>
                  <option value=\"3\">3</option>
                  <option value=\"4\">4</option>
                  <option value=\"5\">5</option>
                  <option value=\"6\">6</option>
                  <option value=\"7\">7</option>
                  <option value=\"8\">8</option>
                  <option value=\"9\">9</option>
                  <option value=\"10\">10</option>
                  <option value=\"11\">11</option>
                  <option value=\"12\">12</option>
                  <option value=\"13\">13</option>
                  <option value=\"13\">14</option>
                  <option value=\"13\">15</option>
                </select>
              </div><!--/age-of-child-->
            </div>
          </div><!--/form-group-->

        </div><!--/cbc-inliner-->
      </div><!--/tab-pane-->

      <div class=\"tab-pane\" id=\"flights_oneway\" role=\"tabpanel\">
        <div class=\"cbc-inliner row\">

          <div class=\"form-group col-md-3\">
            <label for=\"flights-from-one-way\" class=\"col-form-label\">From</label>
            <div>
              <input ng-model=\"step2.flights.flights_from_one_way.value\" list=\"airportlistFrom2\" ng-change=\"airports(step2.flights.flights_from_one_way.value)\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-from-one-way\">
              <datalist ng-model=\"selected\" id=\"airportlistFrom2\">
                  <option ng-repeat=\"result in airportsResults\" value=\"{{result['title']}}\"></option>
              </datalist>
            </div>
          </div><!--/form-group-->
          <div class=\"form-group col-md-3\">
            <label for=\"flights-to\" class=\"col-form-label\">To</label>
            <div>
              <input ng-model=\"step2.flights.flights_to_one_way.value\" list=\"airportlistTo2\" ng-change=\"airports(step2.flights.flights_to_one_way.value)\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-to-one-way\">
              <datalist ng-model=\"selected\" id=\"airportlistTo2\">
                  <option ng-repeat=\"result in airportsResults\" value=\"{{result['title']}}\"></option>
              </datalist>
            </div>
          </div><!--/form-group-->
          <div class=\"form-group col-md-3\">
            <label for=\"datetimepicker3\" class=\"col-form-label\">Depart</label>
            <div>
              <md-datepicker ng-model=\"step2.flights.flights_depart.value\" md-placeholder=\"Enter date\" md-open-on-focus></md-datepicker>
            </div>
          </div><!--/form-group-->
          <!-- <div class=\"form-group col-md-2\">
            <label for=\"flights-passengers\" class=\"col-form-label\">Passengers</label>
            <div>
              <input ng-model=\"step2.flights.flights_passengers_one_way.value\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-passengers-one-way\">
            </div>
          </div> -->
          <div id=\"passenger-field1\" class=\"form-group col-md-3\">
            <label for=\"flights-passengers\" class=\"col-form-label\">Passengers</label>
            <div>
              <input ng-model=\"step2.flights.flights_passengers.value\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-passengers-one-way\">
            </div>
            <div id=\"passengers-pop1\" class=\"custom-modal\">
              <p>Adults</p>
              <div class=\"input-group\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-danger btn-number\" ng-click=\"passengersAction('adult','-')\" data-type=\"minus\" data-field=\"quant[2]\">
                      <span class=\"glyphicon glyphicon-minus\"></span>
                    </button>
                </span>
                <input type=\"text\" name=\"quant[2]\" ng-model=\"step2.flights.flights_passengers_adult.value\" class=\"form-control input-number\" value=\"1\" min=\"1\" max=\"100\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-success btn-number\" ng-click=\"passengersAction('adult','+')\" data-type=\"plus\" data-field=\"quant[2]\">
                        <span class=\"glyphicon glyphicon-plus\"></span>
                    </button>
                </span>
              </div>
              <p>Children</p>
              <div class=\"input-group\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-default btn-number\" ng-click=\"passengersAction('children','-')\" data-type=\"minus\" data-field=\"quant[1]\">
                        <span class=\"glyphicon glyphicon-minus\"></span>
                    </button>
                </span>
                <input type=\"text\" name=\"quant[1]\" ng-model=\"step2.flights.flights_passengers_children.value\" class=\"form-control input-number\" value=\"1\" min=\"1\" max=\"10\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-default btn-number\" ng-click=\"passengersAction('children','+')\" data-type=\"plus\" data-field=\"quant[1]\">
                        <span class=\"glyphicon glyphicon-plus\"></span>
                    </button>
                </span>
              </div>
              <div ng-repeat=\"child in step2.flights.flights_passengers_children.age track by \$index\" class=\"age-of-child\">
                <label for=\"age-of-child\" class=\"col-form-label\">Age of child <span>{{\$index+ 1}}</span></label>
                <select ng-model=\"step2.flights.flights_passengers_children.age[\$index]\">
                  <option value=\"1\">1</option>
                  <option value=\"2\">2</option>
                  <option value=\"3\">3</option>
                  <option value=\"4\">4</option>
                  <option value=\"5\">5</option>
                  <option value=\"6\">6</option>
                  <option value=\"7\">7</option>
                  <option value=\"8\">8</option>
                  <option value=\"9\">9</option>
                  <option value=\"10\">10</option>
                  <option value=\"11\">11</option>
                  <option value=\"12\">12</option>
                  <option value=\"13\">13</option>
                  <option value=\"13\">14</option>
                  <option value=\"13\">15</option>
                </select>
              </div><!--/age-of-child-->
            </div>
          </div><!--/form-group-->

        </div><!--/cbc-inliner-->
      </div><!--/tab-pane-->

      <div class=\"tab-pane\" id=\"flights_multicity\" role=\"tabpanel\">

        <div ng-repeat=\"flight in step2.flights.cities.values track by \$index\" class=\"single-flight\">

          <button ng-click=\"deleteCity(\$index)\" class=\"delete-flight\">Delete</button>
          <div class=\"clr\"></div>

          <div class=\"cbc-inliner row\">

            <div class=\"form-group col-md-3\">
              <label for=\"flights-from-one-way\" class=\"col-form-label\">From</label>
              <div>
                <input ng-model=\"flight.cities_values_from.value\" list=\"airportlistToMultiple{{\$index}}\" ng-change=\"airports(flight.cities_values_from.value)\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-from-multi-city\">
                <datalist ng-model=\"selected\" id=\"airportlistToMultiple{{\$index}}\">
                  <option ng-repeat=\"result in airportsResults\" value=\"{{result['title']}}\"></option>
                </datalist>
              </div>
            </div><!--/form-group-->
            <div class=\"form-group col-md-3\">
              <label for=\"flights-to\" class=\"col-form-label\">To</label>
              <div>
                <input ng-model=\"flight.cities_values_to.value\" list=\"airportlistFromMultiple{{\$index}}\" ng-change=\"airports(flight.cities_values_to.value)\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-to-multi-city\">
                <datalist ng-model=\"selected\" id=\"airportlistFromMultiple{{\$index}}\">
                  <option ng-repeat=\"result in airportsResults\" value=\"{{result['title']}}\"></option>
                </datalist>
              </div>
            </div><!--/form-group-->
            <div class=\"form-group col-md-3\">
              <label for=\"datetimepicker4\" class=\"col-form-label\">Depart</label>
              <div>
                <md-datepicker ng-model=\"flight.cities_values_depart.value\" md-placeholder=\"Enter date\" md-open-on-focus></md-datepicker>
              </div>
            </div><!--/form-group-->
            <!-- <div class=\"form-group col-md-3\">
              <label for=\"flights-passengers\" class=\"col-form-label\">Passengers</label>
              <div>
                <input ng-model=\"flight.cities_values_passengers.value\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-passengers-multi-city\">
              </div>
            </div> -->
            <div class=\"form-group col-md-3 passenger-field-multicity\">
              <label for=\"flights-passengers\" class=\"col-form-label\">Passengers</label>
              <div>
                <input ng-click=\"showCabin(flight.cabins, 0)\" ng-model=\"flight.cabins.values[0].passenger_count.value\" class=\"form-control\" type=\"text\" value=\"\" id=\"flights-passengers-multi-city\">

                <div ng-if=\"flight.cabins.values[0].passenger_show\" class=\"custom-modal\">
                  <p class=\"pass-label\">Adults</p>
                  <div class=\"input-group\">
                    <span class=\"input-group-btn\">
                        <button type=\"button\" ng-click=\"passengers_action(flight.cabins.values[0].passenger_adult,'-',[flight.cabins.values[0].passenger_count])\" class=\"btn btn-danger btn-number\" data-type=\"minus\" data-field=\"quant[2]\">
                          <span class=\"glyphicon glyphicon-minus\"></span>
                        </button>
                    </span>
                    <input type=\"text\" name=\"quant[2]\" ng-model=\"flight.cabins.values[0].passenger_adult.value\" class=\"form-control input-number\" value=\"1\" min=\"1\" max=\"100\">
                    <span class=\"input-group-btn\">
                        <button type=\"button\" ng-click=\"passengers_action(flight.cabins.values[0].passenger_adult,'+',[flight.cabins.values[0].passenger_count])\" class=\"btn btn-success btn-number\" data-type=\"plus\" data-field=\"quant[2]\">
                            <span class=\"glyphicon glyphicon-plus\"></span>
                        </button>
                    </span>
                  </div>
                  <p class=\"pass-label\">Children</p>
                  <div class=\"age-explanation\">
                    <p class=\"hidden-explanation\">A child 12 years and over is considered an adult, less than 12  and up to 2 is considered a child , under 2 is an infant.</p>
                  </div>
                  <div class=\"input-group\">
                    <span class=\"input-group-btn\">
                        <button type=\"button\" ng-click=\"passengers_action(flight.cabins.values[0].passenger_children,'-',[flight.cabins.values[0].passenger_count])\" class=\"btn btn-default btn-number\" data-type=\"minus\" data-field=\"quant[1]\">
                            <span class=\"glyphicon glyphicon-minus\"></span>
                        </button>
                    </span>
                    <input type=\"text\" name=\"quant[1]\" ng-model=\"flight.cabins.values[0].passenger_children.value\" class=\"form-control input-number\" value=\"1\" min=\"1\" max=\"10\">
                    <span class=\"input-group-btn\">
                        <button type=\"button\" ng-click=\"passengers_action(flight.cabins.values[0].passenger_children,'+',[flight.cabins.values[0].passenger_count])\" class=\"btn btn-default btn-number\" data-type=\"plus\" data-field=\"quant[1]\">
                            <span class=\"glyphicon glyphicon-plus\"></span>
                        </button>
                    </span>
                  </div>
                  <div ng-repeat=\"child in flight.cabins.values[0].passenger_children.age track by \$index\" class=\"age-of-child\">
                    <label for=\"age-of-child\" class=\"col-form-label\">Age of child <span>{{\$index + 1}}</span></label>
                    <select ng-model=\"flight.cabins.values[0].passenger_children.age[\$index]\">
                      <option value=\"1\">1</option>
                      <option value=\"2\">2</option>
                      <option value=\"3\">3</option>
                      <option value=\"4\">4</option>
                      <option value=\"5\">5</option>
                      <option value=\"6\">6</option>
                      <option value=\"7\">7</option>
                      <option value=\"8\">8</option>
                      <option value=\"9\">9</option>
                      <option value=\"10\">10</option>
                      <option value=\"11\">11</option>
                      <option value=\"12\">12</option>
                      <option value=\"13\">13</option>
                      <option value=\"13\">14</option>
                      <option value=\"13\">15</option>
                    </select>
                  </div><!--/age-of-child-->
                </div>
              </div>
            </div><!--/form-group-->

          </div><!--/cbc-inliner-->

        </div><!--/single-flight-->

        <button ng-click=\"addCity()\" class=\"add-flight\">Add another flight</button>

      </div><!--/tab-pane-->

    </div><!--/tab-content-->

    <div class=\"row\">

      <div class=\"col-md-5\">

        <div class=\"form-group row\">
          <label class=\"col-md-5 col-form-label\" for=\"flex-dates\">Are your dates flexibile?<span>*</span></label>
          <div id=\"flex-dates\" class=\"col-md-7\">
            <label class=\"radio-inline\"><input type=\"radio\" ng-model=\"step2.flights.flights_flex_dates.value\" value=\"yes\" name=\"flex-dates\">Yes</label>
            <label class=\"radio-inline\"><input type=\"radio\" ng-model=\"step2.flights.flights_flex_dates.value\" value=\"no\" name=\"flex-dates\">No</label>
          </div>
        </div><!--/form-group-->

        <div class=\"form-group row\">
          <label for=\"preffered-airline\" class=\"col-md-5 col-form-label\">Preffered Airline</label>
          <div class=\"col-md-7\">
            <input ng-model=\"step2.flights.flights_preffered_airline.value\" class=\"form-control\" type=\"text\" value=\"\" id=\"preffered-airline\">
          </div>
        </div><!--/form-group-->

        <div class=\"form-group row\">
          <label for=\"flights-comments\" class=\"col-md-5 col-form-label\">Comments</label>
          <div class=\"col-md-7\">
            <textarea ng-model=\"step2.flights.flights_comments.value\" class=\"form-control\" id=\"flights-comments\" rows=\"3\"></textarea>
          </div>
        </div><!--/form-group-->

      </div><!--/col-md-5-->

      <div class=\"col-md-5 col-md-offset-2\">

        <div class=\"form-group row\">
          <label class=\"col-md-5 col-form-label\" for=\"flights-cabin-class\">Cabin Class<span>*</span></label>
          <div id=\"flights-cabin-class\" class=\"col-md-7\">
            <div class=\"checkbox\">
              <label><input ng-model=\"step2.flights.flights_cabin_class.value.economy\" type=\"checkbox\" value=\"economy\" name=\"flights-cabin-class\">Economy</label>
            </div>
            <div class=\"checkbox\">
              <label><input ng-model=\"step2.flights.flights_cabin_class.value.premium_economy\" type=\"checkbox\" value=\"premium_economy\" name=\"flights-cabin-class\">Premium Economy</label>
            </div>
            <div class=\"checkbox\">
              <label><input ng-model=\"step2.flights.flights_cabin_class.value.business\" type=\"checkbox\" value=\"business\" name=\"flights-cabin-class\">Business</label>
            </div>
            <div class=\"checkbox\">
              <label><input ng-model=\"step2.flights.flights_cabin_class.value.first_class\" type=\"checkbox\" value=\"first_class\" name=\"flights-cabin-class\">First Class</label>
            </div>
          </div><!--/cabin-class-->
        </div><!--/form-group-->

        <div class=\"form-group row\">
          <label class=\"col-md-5 col-form-label\" for=\"flights_visa\">Do you need visa?<span>*</span> </label>
          <div id=\"flights_visa\" class=\"col-md-7\">
            <label class=\"radio-inline\"><input type=\"radio\" ng-model=\"step2.flights.flights_visa.value\" name=\"visa\" value=\"yes\">Yes</label>
            <label class=\"radio-inline\"><input type=\"radio\" ng-model=\"step2.flights.flights_visa.value\" name=\"visa\" value=\"no\">No</label>
            <label class=\"radio-inline\"><input type=\"radio\" ng-model=\"step2.flights.flights_visa.value\" name=\"visa\" value=\"I am not sure\">I am not sure</label>
          </div><!--/visa-->
        </div><!--/form-group-->

        <div class=\"form-group row\">
          <label class=\"col-md-5 col-form-label\" for=\"flights_insurance\">Add Insurance
            <div class=\"additional-info\">
              <i class=\"fa fa-question\"></i>
              <div class=\"additional-text\">We highly recommend adding insurance to all your trips.</div>
            </div><!--/additional-info-->
          </label>
          <div id=\"flights_insurance\" class=\"col-md-7\">
            <div class=\"checkbox\">
              <label><input ng-model=\"step2.flights.flights_insurance.value.yes\" type=\"checkbox\" value=\"yes\" name=\"flights-insurance\">Yes</label>
            </div>
          </div><!--/flights_insurance-->
        </div><!--/form-group-->

      </div><!--/col-md-5-->

    </div><!--/row-->

  </div><!--/step-1_flights-->

";
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/tripogater/partials/questionnaire/step2-flights.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 404,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/tripogater/partials/questionnaire/step2-flights.html.twig", "/var/www/html/dev/themes/tripogater/partials/questionnaire/step2-flights.html.twig");
    }
}
