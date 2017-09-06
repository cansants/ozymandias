<?php

/* base.twig */
class __TwigTemplate_7834228b8b6202e5334403d9c75e8bd4101248372c849f95957c134259b0e7d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 8
        echo "    </head>
    <body>
        <div id=\"content\">";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
        <div id=\"footer\">
            ";
        // line 12
        $this->displayBlock('footer', $context, $blocks);
        // line 15
        echo "        </div>
    </body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "            <link rel=\"stylesheet\" href=\"style.css\" />
            <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " - My Webpage</title>
        ";
    }

    public function block_title($context, array $blocks = array())
    {
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
    }

    // line 12
    public function block_footer($context, array $blocks = array())
    {
        // line 13
        echo "                &copy; Copyright 2011 by <a href=\"http://domain.invalid/\">you</a>.
            ";
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function getDebugInfo()
    {
        return array (  72 => 13,  69 => 12,  64 => 10,  54 => 6,  51 => 5,  48 => 4,  41 => 15,  39 => 12,  34 => 10,  30 => 8,  28 => 4,  23 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base.twig", "/home/pi/traspas/Slim/src/templates/base.twig");
    }
}
