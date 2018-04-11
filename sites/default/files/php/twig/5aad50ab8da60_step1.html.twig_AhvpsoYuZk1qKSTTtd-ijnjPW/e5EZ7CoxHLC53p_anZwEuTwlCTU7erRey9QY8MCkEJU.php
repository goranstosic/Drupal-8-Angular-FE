<?php

/* themes/tripogater/partials/questionnaire/step1.html.twig */
class __TwigTemplate_d8dfa04d485c61c2af91f33b263635b85173ba7c1ff4d7897ce117491a549534 extends Twig_Template
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

        // line 146
        echo "

  <div class=\"step-1\" ng-show=\"step == 1\">
    <p>Please fill out all mandatory fields<span class=\"red\">*</span> to move to next step.</p>
      <div class=\"basic-info\">
        <div class=\"row\">
          <div class=\"col-md-5\">
            <div class=\"form-group row\">
              <label for=\"name\" class=\"col-md-5 col-form-label\">Name<span>*</span></label>
              <div class=\"col-md-7\">
                <input class=\"form-control\" type=\"text\" ng-model=\"step1.full_name.value\" value=\"\" id=\"name\" required oninvalid=\"this.setCustomValidity('Please enter name here.')\"
    oninput=\"setCustomValidity('')\">
              </div>
            </div>
            <div class=\"form-group row\">
              <label for=\"contact_number\" class=\"col-md-5 col-form-label\">Contact number </label>
              <div class=\"col-md-7\">
                <input class=\"form-control\" type=\"text\" ng-model=\"step1.contact_number.value\" value=\"\" id=\"contact_number\">
              </div>
            </div>
            <div class=\"form-group row\">
              <label for=\"email\" class=\"col-md-5 col-form-label\">Email address<span>*</span></label>
              <div class=\"col-md-7\">
                <input class=\"form-control\" type=\"email\" ng-model=\"step1.email.value\" value=\"\" id=\"email\" required oninvalid=\"this.setCustomValidity('Please enter valid email address here.')\"
    oninput=\"setCustomValidity('')\">
              </div>
            </div>
            <div class=\"form-group row\">
              <label for=\"suburb\" class=\"col-md-5 col-form-label\">Suburb / postcode<span>*</span></label>
              <div class=\"col-md-7\">
                <input class=\"form-control\" list=\"dataList\" type=\"text\" ng-model=\"step1.suburb.value\" ng-change=\"autocomplete()\" value=\"\" id=\"search-location\" required oninvalid=\"this.setCustomValidity('Please enter or select suburb / postcode here.')\"
    oninput=\"setCustomValidity('')\">
                  <datalist ng-model=\"selected\" id=\"dataList\">
                    <option ng-repeat=\"result in searchSuburbResults\" value=\"{{result['title']}}\"></option>
                  </datalist>
              </div>
            </div>
            <div class=\"form-group row\">
              <label class=\"col-md-5 col-form-label\" for=\"what_times\">What times would you like to be contacted?<span>*</span> </label>
              <div id=\"what_times\" class=\"col-md-7\">
                <div class=\"checkbox\">
                  <label><input id=\"what_times_cb1\" class=\"myCB1\" type=\"checkbox\" value=\"business_hours\" ng-model=\"step1.what_times.value.business_hours\" name=\"what_times\" required>Business hours (9-5 PM)</label>
                </div>
                <div class=\"checkbox\">
                  <label><input id=\"what_times_cb2\" class=\"myCB1\" type=\"checkbox\" value=\"after_hours\" ng-model=\"step1.what_times.value.after_hours\" name=\"what_times\" required>After hours</label>
                </div>
                <div class=\"checkbox\">
                  <label><input id=\"what_times_cb3\" class=\"myCB1\" type=\"checkbox\" value=\"weekends\" ng-model=\"step1.what_times.value.weekends\" name=\"what_times\" required>Weekends</label>
                </div>
                <div class=\"checkbox\">
                  <label><input id=\"what_times_cb4\" class=\"myCB1\" type=\"checkbox\" value=\"anytime\" ng-model=\"step1.what_times.value.anytime\" name=\"what_times\" required>Anytime</label>
                </div>
              </div><!--/what_times-->
            </div><!--/form-group-->

          </div><!--/col-md-5-->

          <div class=\"col-md-5 col-md-offset-2\">

            <div class=\"form-group row\">
              <label class=\"col-md-5 col-form-label\" for=\"receieve_quote\">How would you like to receive your quote?<span>*</span></label>
              <div id=\"receieve_quote\" class=\"col-md-7\">
                <div class=\"checkbox\">
                  <label><input id=\"receive_quote_cb1\" class=\"myCB2\" type=\"checkbox\" name=\"receive_quote\" ng-model=\"step1.receive_quote.value.phone\" value=\"phone\" required>Phone</label>
                </div>
                <div class=\"checkbox\">
                  <label><input id=\"receive_quote_cb2\" class=\"myCB2\" type=\"checkbox\" name=\"receive_quote\" ng-model=\"step1.receive_quote.value.sms\" value=\"sms\" required>SMS</label>
                </div>
                <div class=\"checkbox\">
                  <label><input id=\"receive_quote_cb3\" class=\"myCB2\" type=\"checkbox\" name=\"receive_quote\" ng-model=\"step1.receive_quote.value.email\" value=\"email\" required>Email</label>
                </div>
              </div><!--/receive_quote-->
            </div><!--/form-group-->
            <div class=\"form-group row\">
              <label for=\"trip\" class=\"col-md-5 col-form-label\">Name your trip<span>*</span></label>
              <div class=\"col-md-7\">
                <input class=\"form-control\" ng-model=\"step1.trip_name.value\" type=\"text\" value=\"trip\" id=\"trip\" required oninvalid=\"this.setCustomValidity('Please enter trip name here.')\"
    oninput=\"setCustomValidity('')\">
              </div>
            </div>

          </div><!--/col-md-5-->

        </div><!--/row-->
      </div><!--basic-info-->

      <div class=\"travel-quote\">
          <ul>
              <li ng-class=\"{'active' : quote == 'flights'}\">
                <label>
                  <input type=\"radio\" name=\"quote\" ng-model=\"quote\" value=\"flights\">
                  <div class=\"radio-icon\"></div>
                  <span>Flights</span>
                </label>
              </li>
              <li ng-class=\"{'active' : quote == 'accommodation'}\">
                <label>
                  <input type=\"radio\" name=\"quote\" ng-model=\"quote\" value=\"accommodation\">
                  <div class=\"radio-icon\"></div>
                  <span>Accommodation</span>
                </label>
              </li>
              <li ng-class=\"{'active' : quote == 'cruise'}\">
                <label>
                  <input type=\"radio\" name=\"quote\" ng-model=\"quote\" value=\"cruise\">
                  <div class=\"radio-icon\"></div>
                  <span>Cruise</span>
                </label>
              </li>
              <li ng-class=\"{'active' : quote == 'travel_insurance'}\">
                <label>
                  <input type=\"radio\" name=\"quote\" ng-model=\"quote\" value=\"travel_insurance\">
                  <div class=\"radio-icon\"></div>
                  <span>Travel Insurance</span>
                </label>
              </li>
              <li ng-class=\"{'active' : quote == 'car_hire'}\">
                <label>
                  <input type=\"radio\" name=\"quote\" ng-model=\"quote\" value=\"car_hire\">
                  <div class=\"radio-icon\"></div>
                  <span>Car Hire</span>
                </label>
              </li>
              <li ng-class=\"{'active' : quote == 'packages'}\">
                <label>
                  <input type=\"radio\" name=\"quote\" ng-model=\"quote\" value=\"packages\">
                  <div class=\"radio-icon\"></div>
                  <span>Packages</span>
                </label>
              </li>
          </ul>
          <div class=\"clr\"></div>
      </div>
      <div class=\"step-selector\">
        <p>Please select from one of the two options below:</p>
        <div class=\"col-md-6\">
          <button ng-click=\"changeStep(4)\">I am in a rush, <span>please call me regarding my Travel Quote.</span></button>
        </div>
        <div class=\"col-md-6\">
          <button ng-click=\"changeStep(2)\">Step 2 out 3 - Continue to Questionnaire</span></button>
        </div>
        <div class=\"clr\"></div>
      </div><!--/step-selector-->
  </div><!--/step-1-->

";
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/tripogater/partials/questionnaire/step1.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 146,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/tripogater/partials/questionnaire/step1.html.twig", "/var/www/html/dev/themes/tripogater/partials/questionnaire/step1.html.twig");
    }
}
