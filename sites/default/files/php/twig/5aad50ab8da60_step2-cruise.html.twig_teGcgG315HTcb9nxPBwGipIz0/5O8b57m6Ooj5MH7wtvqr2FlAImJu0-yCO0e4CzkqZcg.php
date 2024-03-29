<?php

/* themes/tripogater/partials/questionnaire/step2-cruise.html.twig */
class __TwigTemplate_294921dcbd2963065715bfbeabfbdfd1c4798c366e567f31c09c81922f0a9dcd extends Twig_Template
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

        // line 221
        echo "

  <div ng-show=\"quote == 'cruise'\" class=\"step-2_cruise\">

    <div class=\"row\">
      <div class=\"col-md-5\">

        <div class=\"form-group row\">

          <div ng-repeat=\"cabin in step2.cruise.cabins.values track by \$index\" class=\"single-cabin\">

            <button ng-click=\"deleteCabin(step2.cruise.cabins, \$index)\" class=\"delete-cabin\">Delete</button>

            <label for=\"cruise-number-of-passengers\" class=\"col-md-5 col-form-label\">Number Of Passengers Per Cabin</label>
            <div class=\"col-md-7 passenger\">
              <input class=\"form-control\" ng-click=\"showCabin(step2.cruise.cabins, \$index)\" ng-model=\"cabin.passenger_count.value\" type=\"text\" value=\"\" id=\"cruise-number-of-passengers\">

              <div ng-if=\"cabin.passenger_show\" class=\"custom-modal\">
                <p class=\"pass-label\">Adults</p>
                <div class=\"input-group\">
                  <span class=\"input-group-btn\">
                      <button type=\"button\" ng-click=\"passengers_action(cabin.passenger_adult,'-',[cabin.passenger_count])\" class=\"btn btn-danger btn-number\" data-type=\"minus\" data-field=\"quant[2]\">
                        <span class=\"glyphicon glyphicon-minus\"></span>
                      </button>
                  </span>
                  <input type=\"text\" name=\"quant[2]\" ng-model=\"cabin.passenger_adult.value\" class=\"form-control input-number\" value=\"1\" min=\"1\" max=\"100\">
                  <span class=\"input-group-btn\">
                      <button type=\"button\" ng-click=\"passengers_action(cabin.passenger_adult,'+',[cabin.passenger_count])\" class=\"btn btn-success btn-number\" data-type=\"plus\" data-field=\"quant[2]\">
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
                      <button type=\"button\" ng-click=\"passengers_action(cabin.passenger_children,'-',[cabin.passenger_count])\" class=\"btn btn-default btn-number\" data-type=\"minus\" data-field=\"quant[1]\">
                          <span class=\"glyphicon glyphicon-minus\"></span>
                      </button>
                  </span>
                  <input type=\"text\" name=\"quant[1]\" ng-model=\"cabin.passenger_children.value\" class=\"form-control input-number\" value=\"1\" min=\"1\" max=\"10\">
                  <span class=\"input-group-btn\">
                      <button type=\"button\" ng-click=\"passengers_action(cabin.passenger_children,'+',[cabin.passenger_count])\" class=\"btn btn-default btn-number\" data-type=\"plus\" data-field=\"quant[1]\">
                          <span class=\"glyphicon glyphicon-plus\"></span>
                      </button>
                  </span>
                </div>
                <div ng-repeat=\"child in cabin.passenger_children.age track by \$index\" class=\"age-of-child\">
                  <label for=\"age-of-child\" class=\"col-form-label\">Age of child <span>{{\$index + 1}}</span></label>
                  <select ng-model=\"cabin.passenger_children.age[\$index]\">
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

          </div><!--/repeater-->

          <button ng-click=\"addCabin(step2.cruise.cabins)\" class=\"add-cabin\">Add another cabin</button>

        </div><!--/form-group-->
        <div class=\"form-group row\">
          <label for=\"cruise-departure-port\" class=\"col-md-5 col-form-label\">Any Departure Port <span>*</span></label>
          <div class=\"col-md-7\">
            <input class=\"form-control\" ng-model=\"step2.cruise.cruise_departure_port.value\" type=\"text\" value=\"\" id=\"cruise-departure-port\">
          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"cruise-arrival-port\" class=\"col-md-5 col-form-label\">Any Arrival Port</label>
          <div class=\"col-md-7\">
            <input class=\"form-control\" ng-model=\"step2.cruise.cruise_arrival_port.value\" type=\"text\" value=\"\" id=\"cruise-arrival-port\">
          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"cruise-lenght-of-cruise\" class=\"col-md-5 col-form-label\">Length of Cruise</label>
          <div class=\"col-md-7\">
            <select ng-model=\"step2.cruise.cruise_lenght_of_cruise.value\" class=\"custom-selectpicker\"  value=\"\" title=\"\">
              <option>1-3 days</option>
              <option>1-6 days</option>
              <option>7-9 days</option>
              <option>9+ days</option>
            </select>
          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"cruise-month-from\" class=\"col-md-5 col-form-label\">Any Month From</label>
          <div class=\"col-md-7\">
            <select ng-model=\"step2.cruise.cruise_month_from.value\" class=\"custom-selectpicker\"  value=\"\" title=\"\">
              <option>February 2018</option>
              <option>March 2018</option>
              <option>April 2018</option>
              <option>May 2018</option>
              <option>June 2018</option>
              <option>July 2018</option>
              <option>August 2018</option>
              <option>September 2018</option>
              <option>October 2018</option>
              <option>November 2018</option>
              <option>December 2018</option>
              <option>January 2019</option>
              <option>February 2019</option>
              <option>March 2019</option>
              <option>April 2019</option>
              <option>May 2019</option>
              <option>June 2019</option>
              <option>July 2019</option>
              <option>August 2019</option>
              <option>September 2019</option>
              <option>October 2019</option>
              <option>November 2019</option>
              <option>December 2019</option>
              <option>January 2020</option>
              <option>February 2020</option>
              <option>March 2020</option>
              <option>April 2020</option>
              <option>May 2020</option>
              <option>June 2020</option>
              <option>July 2020</option>
              <option>August 2020</option>
              <option>September 2020</option>
              <option>October 2020</option>
              <option>November 2020</option>
              <option>December 2020</option>
            </select>
          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"cruise-month-to\" class=\"col-md-5 col-form-label\">Any Month To</label>
          <div class=\"col-md-7\">
            <select ng-model=\"step2.cruise.cruise_month_to.value\" class=\"custom-selectpicker\"  value=\"\" title=\"\">
              <option>February 2018</option>
              <option>March 2018</option>
              <option>April 2018</option>
              <option>May 2018</option>
              <option>June 2018</option>
              <option>July 2018</option>
              <option>August 2018</option>
              <option>September 2018</option>
              <option>October 2018</option>
              <option>November 2018</option>
              <option>December 2018</option>
              <option>January 2019</option>
              <option>February 2019</option>
              <option>March 2019</option>
              <option>April 2019</option>
              <option>May 2019</option>
              <option>June 2019</option>
              <option>July 2019</option>
              <option>August 2019</option>
              <option>September 2019</option>
              <option>October 2019</option>
              <option>November 2019</option>
              <option>December 2019</option>
              <option>January 2020</option>
              <option>February 2020</option>
              <option>March 2020</option>
              <option>April 2020</option>
              <option>May 2020</option>
              <option>June 2020</option>
              <option>July 2020</option>
              <option>August 2020</option>
              <option>September 2020</option>
              <option>October 2020</option>
              <option>November 2020</option>
              <option>December 2020</option>
            </select>
          </div>
        </div>

      </div><!--/col-md-5-->

      <div class=\"col-md-5 col-md-offset-2\">

        <div class=\"form-group row\">
          <label class=\"col-md-5 col-form-label\" for=\"cruise-cabin-selection\">Other Information</label>
          <div id=\"cruise-cabin-selection\" class=\"col-md-7\">
            <div class=\"checkbox\">
              <label><input value=\"interior\" ng-model=\"step2.cruise.cruise_other_information.value.interior\" type=\"checkbox\">Interior</label>
            </div>
            <div class=\"checkbox\">
              <label><input value=\"ocean view\" ng-model=\"step2.cruise.cruise_other_information.value.ocean_view\" type=\"checkbox\">Ocean View</label>
            </div>
            <div class=\"checkbox\">
              <label><input value=\"balcony\" ng-model=\"step2.cruise.cruise_other_information.value.balcony\" type=\"checkbox\">Balcony</label>
            </div>
            <div class=\"checkbox\">
              <label><input value=\"suite\" ng-model=\"step2.cruise.cruise_other_information.value.suite\" type=\"checkbox\">Suite</label>
            </div>
          </div><!--/cruise-cabin-selection-->
        </div><!--/form-group-->

        <div class=\"form-group row\">
          <label for=\"cruise-comments\" class=\"col-md-5 col-form-label\">Comments</label>
          <div class=\"col-md-7\">
            <textarea class=\"form-control\" ng-model=\"step2.cruise.cruise_comments.value\" id=\"cruise-comments\" rows=\"3\" value=\"\"></textarea>
          </div>
        </div><!--/form-group-->

      </div><!--/col-md-5-->

    </div><!--/row-->

  </div><!--step-3-cruise-->

";
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/tripogater/partials/questionnaire/step2-cruise.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 221,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/tripogater/partials/questionnaire/step2-cruise.html.twig", "/var/www/html/dev/themes/tripogater/partials/questionnaire/step2-cruise.html.twig");
    }
}
