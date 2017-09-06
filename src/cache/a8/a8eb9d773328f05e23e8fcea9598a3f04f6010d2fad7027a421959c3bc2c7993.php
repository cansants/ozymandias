<?php

/* home.phtml */
class __TwigTemplate_ede4a3a11ccc015c5fd3cc71304237f84cbc1a801ee85207ed0d29c5ff729d49 extends Twig_Template
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
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\"/>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\"/>
    <title>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "</title>
  </head>
  <body>
    <h1>";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "</h1>
    <h3>Quedan ";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["contador"]) ? $context["contador"] : null), "html", null, true);
        echo "</h3>
</html>
";
    }

    public function getTemplateName()
    {
        return "home.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 11,  33 => 10,  27 => 7,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home.phtml", "/home/pi/traspas/Slim/src/templates/home.phtml");
    }
}
