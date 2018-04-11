<?php

/* themes/tripogater/page--node--15756.html.twig */
class __TwigTemplate_4db3777b9b9eeb4ba1851f1a77cfe7cf8f6114502657652b5c7a8a89d830c62d extends Twig_Template
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
        $tags = array("include" => 1);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('include'),
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

        // line 1
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/header.html.twig"), "themes/tripogater/page--node--15756.html.twig", 1)->display($context);
        // line 2
        echo "<base href=\"/\" />
<div class=\"main-content questionnaire\">

  <div class=\"q-background\">
    <div class=\"cbc-wrap\">
      <div class=\"questionnaire-wrap\">
        ";
        // line 21
        echo "

          <main ng-app=\"Questionnaire\" ng-controller=\"formCtrl\" ng-cloak>
            <form id=\"questionnaire-form\">
              <div class=\"tracker\">
                <ul>
                  <li ng-class=\"{'active' : step == 1}\">Contact Information</li>
                  <li ng-class=\"{'active' : step == 2}\">Travel Selection</li>
                  <li ng-class=\"{'active' : step == 3}\">Submit</li>
                </ul>
                <div class=\"clr\"></div>
              </div>

        ";
        echo "

              ";
        // line 23
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/questionnaire/step1.html.twig"), "themes/tripogater/page--node--15756.html.twig", 23)->display($context);
        // line 24
        echo "
        ";
        // line 45
        echo "
              <div class=\"step-2\" ng-show=\"step == 2\">
                  <div class=\"child-tracker\">
                      <ul>
                          <li ng-class=\"{'active' : quote == 'flights'}\">Flights</li>
                          <li ng-class=\"{'active' : quote == 'accommodation'}\">Accommodation</li>
                          <li ng-class=\"{'active' : quote == 'cruise'}\">Cruise</li>
                          <li ng-class=\"{'active' : quote == 'travel_insurance'}\">Travel insurance</li>
                          <li ng-class=\"{'active' : quote == 'car_hire'}\">Car hire</li>
                          <li ng-class=\"{'active' : quote == 'packages'}\">Packages</li>
                      </ul>
                      <div class=\"clr\"></div>
                  </div>

                  <div class=\"pagination\">
                      <button ng-click=\"changeStep(1)\" class=\"previous\">Previous</button>
                      <button ng-click=\"changeStep(3)\" class=\"submit\">Step 3</button>
                      <div class=\"clr\"></div>
                  </div>

        ";
        echo "

                  ";
        // line 47
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/questionnaire/step2-flights.html.twig"), "themes/tripogater/page--node--15756.html.twig", 47)->display($context);
        // line 48
        echo "
                  ";
        // line 49
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/questionnaire/step2-accommodation.html.twig"), "themes/tripogater/page--node--15756.html.twig", 49)->display($context);
        // line 50
        echo "
                  ";
        // line 51
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/questionnaire/step2-cruise.html.twig"), "themes/tripogater/page--node--15756.html.twig", 51)->display($context);
        // line 52
        echo "
                  ";
        // line 53
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/questionnaire/step2-travelinsurance.html.twig"), "themes/tripogater/page--node--15756.html.twig", 53)->display($context);
        // line 54
        echo "
                  ";
        // line 55
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/questionnaire/step2-carhire.html.twig"), "themes/tripogater/page--node--15756.html.twig", 55)->display($context);
        // line 56
        echo "
                  ";
        // line 57
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/questionnaire/step2-packages.html.twig"), "themes/tripogater/page--node--15756.html.twig", 57)->display($context);
        // line 58
        echo "
        ";
        // line 94
        echo "

                  <div class=\"pagination\">
                      <button ng-click=\"changeStep(1)\" class=\"previous\">Previous</button>
                      <button ng-click=\"changeStep(3)\" class=\"submit\">Step 3</button>
                      <div class=\"clr\"></div>
                  </div>
              </div><!--/step-2-->

              <div class=\"step-3\" ng-show=\"step == 3\">
                <div class=\"thank-you-msg\" ng-show=\"!resent\">
                  Thank you for filling out questionnaire! <br>

                  <div class=\"search-link\">
                    <button ng-click=\"searchRedirect()\">Search</button>
                  </div>
                  <div ng-show=\"resend\" class=\"resend-link\">
                    <button ng-click=\"resendQuestionnaire()\">Resend</button>
                  </div>

                </div>
                <div class=\"thank-you-msg-resent\" ng-show=\"resent\">
                    Resent successful message! <br>
                </div>
              </div>

              <div class=\"step-4\" ng-show=\"step == 4\">
                <div class=\"thank-you-msg\">
                  Thanks for choosing Travel Quoter, we will contact you as to your request.
                </div>
              </div>

            </form>
          </main>

        ";
        echo "
      </div>
    </div><!--/cbc-wrap-->
  </div><!--/q-background-->

</div><!--/main-content-->



";
        // line 103
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/footer.html.twig"), "themes/tripogater/page--node--15756.html.twig", 103)->display($context);
    }

    public function getTemplateName()
    {
        return "themes/tripogater/page--node--15756.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 103,  131 => 94,  128 => 58,  126 => 57,  123 => 56,  121 => 55,  118 => 54,  116 => 53,  113 => 52,  111 => 51,  108 => 50,  106 => 49,  103 => 48,  101 => 47,  76 => 45,  73 => 24,  71 => 23,  53 => 21,  45 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/tripogater/page--node--15756.html.twig", "/var/www/html/dev/themes/tripogater/page--node--15756.html.twig");
    }
}
