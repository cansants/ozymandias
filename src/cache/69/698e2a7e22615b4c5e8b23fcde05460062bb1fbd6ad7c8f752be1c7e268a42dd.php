<?php

/* index.html.twig */
class __TwigTemplate_80dc377fd8bff244c466360817552716515658718350818c0af7eeff12dbc268 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "index.html.twig", 1);
        $this->blocks = array(
            'body_container_main_content' => array($this, 'block_body_container_main_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
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
        return "index.html.twig";
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
        return new Twig_Source("", "index.html.twig", "/home/pi/traspas/Slim/src/templates/index.html.twig");
    }
}
