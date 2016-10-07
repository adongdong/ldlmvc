<?php

/* add.html */
class __TwigTemplate_1c87418f17d4ed528b3d16bfb19e3fd2257322638a53f7170044abf9b11d17e5 extends Twig_Template
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
<html>
<head lang=\"en\">
    <meta charset=\"UTF-8\">
    <title></title>
</head>
<body>
<form action=\"addzhi\" method=\"post\">
<input type=\"text\" name=\"name\"/>

<input type=\"submit\" value=\"提交\"/>
</form>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "add.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSource()
    {
        return "<!DOCTYPE html>
<html>
<head lang=\"en\">
    <meta charset=\"UTF-8\">
    <title></title>
</head>
<body>
<form action=\"addzhi\" method=\"post\">
<input type=\"text\" name=\"name\"/>

<input type=\"submit\" value=\"提交\"/>
</form>
</body>
</html>";
    }
}
