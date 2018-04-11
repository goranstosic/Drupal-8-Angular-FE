<?php

/* themes/tripogater/page--front.html.twig */
class __TwigTemplate_1baee0d54df15b7ce2f1023473341a9c0e516c3e42beeb9241e3cdbc48413991 extends Twig_Template
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
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/header.html.twig"), "themes/tripogater/page--front.html.twig", 1)->display($context);
        // line 2
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/sidebar.html.twig"), "themes/tripogater/page--front.html.twig", 2)->display($context);
        // line 3
        echo "
<!-- Carousel
================================================== -->

<div class=\"banner\">
  <div class=\"banner-overlay\"></div>
  <img src=\"";
        // line 9
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/slides/slider-10.jpg\">
  <div class=\"container\">
    <div class=\"carousel-caption\">
      <h1 class=\"wow fadeInLeftBig\" data-wow-duration=\"2s\">Travel Quoter will be the best way, <br /> to book your next holiday!</h1>
      <p class=\"wow fadeInRightBig\" data-wow-duration=\"2s\">We save you time and money guaranteed!</p>
      <div class=\"col-md-6\">
        <div class=\"banner-square call-now wow fadeInLeft\" data-wow-duration=\"2s\">
          <div class=\"banner-square-overlay\">
            <h3>Call Now</h3>
            <p>For Travel Quote</p>
            <a href=\"#\" data-toggle=\"modal\" data-target=\"#phoneModal\" class=\"desktop-call\"><span class=\"fa fa-phone\"></span>Call</a>
            <a href=\"tel:0287290889\" class=\"mobile-call\"><span class=\"fa fa-phone\"></span>Call</a>
          </div>
        </div>
      </div>
      <div class=\"col-md-6\">
        <div class=\"banner-square fill-inquiry wow fadeInRight\" data-wow-duration=\"2s\">
          <div class=\"banner-square-overlay\">
            <h3>Fill Your Inquiry</h3>
            <p>and receive Travel Agent quotes within 24 hours</p>
            <div>
              <form action=\"/questionnaire\" method=\"GET\" id=\"fillForm\">
                <input class=\"form-control\" type=\"text\" ng-model=\"step1.full_name.value\" value=\"\" id=\"name\" name=\"name\" placeholder=\"Enter your trip name\">
                <a href=\"javascript: document.getElementById('fillForm').submit();\"><span class=\"fa fa-long-arrow-right\"></span>Start</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!--/banner-->


<div class=\"main-content\">

  <div class=\"cbc-wrap\">
    <h3 class=\"cta\">Easy as 1,2,3</h3>
    <div class=\"row travel-steps\">
      <div class=\"col-md-4 icons-steps wow fadeIn\" data-wow-duration=\"2s\">
        <img src=\"";
        // line 49
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/first-step.png\">
        <h3>Fill your details</h3>
      </div>
      <div class=\"col-md-4 icons-steps wow fadeIn\" data-wow-duration=\"2s\">
        <img src=\"";
        // line 53
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/second-step.png\">
        <h3>Fill your Travel needs</h3>
      </div>
      <div class=\"col-md-4 icons-steps wow fadeIn\" data-wow-duration=\"2s\">
        <img src=\"";
        // line 57
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/third-step.png\">
        <h3>Send your enquiry to Travel Agents</h3>
      </div>
    </div>
  </div><!--/cbc-wrap-->

  <div class=\"map white\">
    <div class=\"cbc-wrap\">
      <h3 class=\"cta\">We Have Picked Some Of The Hottest Places For You To Discover</h3>
      <div class=\"mapcontainer_equi\">
        <div class=\"plotLegend\">
            <span>Alternative content for the legend</span>
        </div>
        <div class=\"map inner-map\">
            <span>Alternative content for the map</span>
        </div>
      </div>
    </div>
  </div>

  <div class=\"cbc-wrap\">
    <h3 class=\"cta\">More Places To Think About</h3>
    <div class=\"row\">
      <div class=\"col-md-4 city_th wow fadeInLeftBig\" data-wow-duration=\"1s\">
        <a href=\"/cities/tokyo\">
          <img src=\"";
        // line 82
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/city_thumbs/tokyo-thumb-7.png\">
          <h4>Tokyo</h4>
        </a>
      </div>
      <div class=\"col-md-4 city_th wow fadeInDown\" data-wow-duration=\"1s\">
        <a href=\"/cities/paris\">
          <img src=\"";
        // line 88
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/city_thumbs/paris-thumb-2.png\">
          <h4>Paris</h4>
        </a>
      </div>
      <div class=\"col-md-4 city_th wow fadeInRightBig\" data-wow-duration=\"1s\">
        <a href=\"/cities/hong-kong\">
          <img src=\"";
        // line 94
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/city_thumbs/hongkong-thumb-8.png\">
          <h4>Hong Kong</h4>
        </a>
      </div>
      <div class=\"col-md-4 city_th wow fadeInLeft\" data-wow-duration=\"1s\">
        <a href=\"/cities/moscow\">
          <img src=\"";
        // line 100
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/city_thumbs/moscow-thumb-4.png\">
          <h4>Moscow</h4>
        </a>
      </div>
      <div class=\"col-md-4 city_th wow fadeInUp\" data-wow-duration=\"1s\">
        <a href=\"/cities/berlin\">
          <img src=\"";
        // line 106
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/city_thumbs/berlin-thumb-9.png\">
          <h4>Berlin</h4>
        </a>
      </div>
      <div class=\"col-md-4 city_th wow fadeInRight\" data-wow-duration=\"1s\">
        <a href=\"/cities/belgrade\">
          <img src=\"";
        // line 112
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["directory"] ?? null), "html", null, true));
        echo "/images/city_thumbs/belgrade-thumb-6.png\">
          <h4>Belgrade</h4>
        </a>
      </div>
    </div>
  </div>

</div><!--/main-content-->

<div class=\"modal fade\" id=\"phoneModal\" role=\"dialog\">
  <div class=\"modal-dialog\">
    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\">You can reach us using the phone number below:</h4>
      </div>
      <div class=\"modal-body\">
        <p>02 8729 0889</p>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
</div><!--/modal-->

";
        // line 139
        $this->loadTemplate((($context["directory"] ?? null) . "/partials/footer.html.twig"), "themes/tripogater/page--front.html.twig", 139)->display($context);
    }

    public function getTemplateName()
    {
        return "themes/tripogater/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 139,  185 => 112,  176 => 106,  167 => 100,  158 => 94,  149 => 88,  140 => 82,  112 => 57,  105 => 53,  98 => 49,  55 => 9,  47 => 3,  45 => 2,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/tripogater/page--front.html.twig", "/var/www/html/dev/themes/tripogater/page--front.html.twig");
    }
}
