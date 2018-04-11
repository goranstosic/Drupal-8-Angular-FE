<?php

/* themes/tripogater/partials/footer.html.twig */
class __TwigTemplate_fdccd4292b7457f6938bf9f0329e53bd6d02faadace9423212b8a71fd039b779 extends Twig_Template
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

        // line 1
        echo "<footer>
  <div class=\"decorater\"></div>
  <div class=\"upper-footer\">
    <div class=\"col-lg-8 col-md-12 footer-nav\">
      ";
        // line 5
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["page"] ?? null), "footer_navigation", array()), "html", null, true));
        echo "
      <div class=\"clear\"></div>
    </div>
    <div class=\"col-lg-4 col-md-12 footer-social\">
      <p>Follow us</p>
      <nav>
        <ul>
          <li><a target=\"_blank\" href=\"https://www.facebook.com/Travel-Quoter-1496597937097911/\" class=\"fa fa-facebook\"></a></li>
          <li><a target=\"_blank\" href=\"https://twitter.com/\" class=\"fa fa-twitter\"></a></li>
          <li><a target=\"_blank\" href=\"https://www.instagram.com/travelquoter/\" class=\"fa fa-instagram\"></a></li>
          <li><a target=\"_blank\" href=\"https://www.linkedin.com/in/travel-quoter-1988b2149/\" class=\"fa fa-linkedin\"></a></li>
        </ul>
      </nav>
    </div>
    <div class=\"clr\"></div>
  </div><!--/upper-footer-->
  <div class=\"bottom-footer\">
    <div class=\"col-md-12\">
      <span><a href=\"/terms-and-conditions-privacy\">Terms &amp; Conditions and Privacy Statement</a></span>
      <span>Copyright 2017</span>
      <span>Development by <a target=\"_blank\" href=\"http://www.circlebc.com.au/\">CircleBC</a></span>
    </div><!--/cbc-wrap-->
  </div><!--/bottom-footer-->
</footer>
";
    }

    public function getTemplateName()
    {
        return "themes/tripogater/partials/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 5,  43 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/tripogater/partials/footer.html.twig", "/var/www/html/dev/themes/tripogater/partials/footer.html.twig");
    }
}
