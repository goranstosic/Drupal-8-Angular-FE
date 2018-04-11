<?php

/* themes/tripogater/partials/questionnaire/step2-travelinsurance.html.twig */
class __TwigTemplate_44c775b08db05a09f95ef4d5ec9fbbc127ed2f56d3cf909d8938595308f5b8eb extends Twig_Template
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

        // line 179
        echo "

  <div ng-show=\"quote == 'travel_insurance'\" class=\"step-2_travel_insurance\">

    <div class=\"row\">
      <div class=\"col-md-12\">

        <div class=\"form-group row ti\">
          <label for=\"ti-destination\" class=\"col-md-2 col-form-label\">Destination</label>
          <div class=\"col-md-8\">
            <!-- <select ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\"> -->
            <div id=\"ti-destination\" class=\"col-md-12\">
              <div class=\"other radio\">
                <p>Which countries are you spending the majority of your time in?</p>
               <label for=\"ti-destination\" class=\"col-form-label\">Country</label>
               <input ng-model=\"step2.travel_insurance.travel_insurance_destination.value\" ng-change=\"cities(step2.travel_insurance.travel_insurance_destination.value)\" list=\"citieslistFrom\" class=\"form-control\" type=\"text\" value=\"\" id=\"ti-destination-other\">
               <datalist ng-model=\"selected\" id=\"citieslistFrom\">
                 <option ng-repeat=\"result in citiesResults\" value=\"{{result['title']}}\"></option>
               </datalist>
              </div><!--other-->
              <div id=\"country-list\" class=\"custom-modal\">
                <p>Type country or select from the list below</p>
                <hr>
                <div class=\"row\">
                  <div class=\"col-md-3\">
                    <h4>Americas</h4>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"United States\" name=\"accomm-type-packages\">United States</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Canada\" name=\"accomm-type-packages\">Canada</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Argentina\" name=\"accomm-type-packages\">Argentina</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Mexico\" name=\"accomm-type\">Mexico</label>
                    </div>
                  </div>
                  <div class=\"col-md-3\">
                    <h4>Europe</h4>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"United Kingdom\" name=\"accomm-type-packages\">United Kingdom</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Germany\" name=\"accomm-type-packages\">Germany</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"France\" name=\"accomm-type-packages\">France</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Netherlands\" name=\"accomm-type\">Netherlands</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Italy\" name=\"accomm-type\">Italy</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Ireland\" name=\"accomm-type\">Ireland</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Belgium\" name=\"accomm-type\">Belgium</label>
                    </div>
                  </div>
                  <div class=\"col-md-3\">
                    <h4>Asia</h4>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"China\" name=\"accomm-type-packages\">China</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Japan\" name=\"accomm-type-packages\">Japan</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Nepal\" name=\"accomm-type-packages\">Nepal</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Thailand\" name=\"accomm-type\">Thailand</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Malaysia\" name=\"accomm-type\">Malaysia</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Singapore\" name=\"accomm-type\">Singapore</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Bali\" name=\"accomm-type\">Bali</label>
                    </div>
                  </div>
                  <div class=\"col-md-3\">
                    <h4>Pacific</h4>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Australia\" name=\"accomm-type-packages\">Australia</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Cook Islands\" name=\"accomm-type-packages\">Cook Islands</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"New Zealand\" name=\"accomm-type-packages\">New Zealand</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Fiji\" name=\"accomm-type\">Fiji</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Samoa\" name=\"accomm-type\">Samoa</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Tonga\" name=\"accomm-type\">Tonga</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Vanuatu\" name=\"accomm-type\">Vanuatu</label>
                    </div>
                  </div>
                  <div class=\"col-md-3\">
                    <h4>Africa</h4>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"South Africa\" name=\"accomm-type-packages\">South Africa</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Egypt\" name=\"accomm-type-packages\">Egypt</label>
                    </div>
                    <div class=\"radio\">
                      <label><input type=\"radio\" ng-model=\"tmp_travel_insurance_destination\" ng-change=\"step2.travel_insurance.travel_insurance_destination.value = tmp_travel_insurance_destination\" value=\"Tunisia\" name=\"accomm-type-packages\">Tunisia</label>
                    </div>
                  </div>
                </div><!--/row-->
              </div><!--/country-list-->
            </div><!--/travel_insurance_destination-->
          </div>
        </div><!--/form-group-->

        <div class=\"form-group row\">
          <label for=\"ti-departure-date\" class=\"col-md-2 col-form-label\">Departure Date</label>
          <div class=\"col-md-7\">
            <md-datepicker ng-model=\"step2.travel_insurance.travel_insurance_departure_date.value\" md-placeholder=\"Enter date\" md-open-on-focus></md-datepicker>
          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"ti-return-date\" class=\"col-md-2 col-form-label\">Return Date</label>
          <div class=\"col-md-7\">
            <md-datepicker ng-model=\"step2.travel_insurance.travel_insurance_return_date.value\" md-placeholder=\"Enter date\" md-open-on-focus></md-datepicker>
          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"ti-age-of-traveler\" class=\"col-md-2 col-form-label\">Number and Age of Travelers</label>
          <div class=\"col-md-7\">
            <input class=\"form-control\" ng-click=\"showCabin(step2.travel_insurance.cabins, 0)\" ng-model=\"step2.travel_insurance.cabins.values[0].passenger_count.value\" type=\"text\" value=\"\" id=\"ti-age-of-traveler\">

            <div ng-if=\"step2.travel_insurance.cabins.values[0].passenger_show\" class=\"custom-modal\">
              <div class=\"age-explanation\">
                <p class=\"hidden-explanation\">Please enter age of traveler.</p>
              </div>
              <div class=\"input-group\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" ng-click=\"passengers_action(step2.travel_insurance.cabins.values[0].passenger_age,'-',[step2.travel_insurance.cabins.values[0].passenger_count])\" class=\"btn btn-default btn-number\" data-type=\"minus\" data-field=\"quant[1]\">
                        <span class=\"glyphicon glyphicon-minus\"></span>
                    </button>
                </span>
                <input type=\"text\" name=\"quant[1]\" ng-model=\"step2.travel_insurance.cabins.values[0].passenger_age.value\" class=\"form-control input-number\" value=\"1\" min=\"1\" max=\"10\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" ng-click=\"passengers_action(step2.travel_insurance.cabins.values[0].passenger_age,'+',[step2.travel_insurance.cabins.values[0].passenger_count])\" class=\"btn btn-default btn-number\" data-type=\"plus\" data-field=\"quant[1]\">
                        <span class=\"glyphicon glyphicon-plus\"></span>
                    </button>
                </span>
              </div>
              <div ng-repeat=\"child in step2.travel_insurance.cabins.values[0].passenger_age.age track by \$index\" class=\"age-of-child\">
                <label for=\"age-of-child\" class=\"col-form-label\">Age of Traveler <span>{{\$index + 1}}</span></label>
                <input ng-model=\"step2.travel_insurance.cabins.values[0].passenger_age.age[\$index].value\" class=\"form-control\" type=\"text\" value=\"\">
              </div><!--/age-of-child-->
            </div><!--/custom-modal-->

          </div><!--/col-md-7-->
        </div><!--/form-group-->

      </div><!--/col-md-12-->

    </div><!--/row-->

  </div><!--/step-4-travel-insurance-->

";
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/tripogater/partials/questionnaire/step2-travelinsurance.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 179,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/tripogater/partials/questionnaire/step2-travelinsurance.html.twig", "/var/www/html/dev/themes/tripogater/partials/questionnaire/step2-travelinsurance.html.twig");
    }
}
