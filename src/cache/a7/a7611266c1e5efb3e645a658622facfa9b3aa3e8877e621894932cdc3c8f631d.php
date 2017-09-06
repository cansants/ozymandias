<?php

/* index.twig */
class __TwigTemplate_8dda233e2e79387a10a8dc4e0e5bf55e61461ffdb4331e4fcefccb71e7a1056f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "index.twig", 1);
        $this->blocks = array(
            'body_container_main_content' => array($this, 'block_body_container_main_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body_container_main_content($context, array $blocks = array())
    {
        // line 4
        echo "
<h1>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "</h1>
<h3>Quedan ";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["contador"]) ? $context["contador"] : null), "html", null, true);
        echo "</h3>

";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.twig", "/home/pi/traspas/Slim/src/templates/index.twig");
    }
}
