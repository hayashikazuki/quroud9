<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* display/results/table_navigation_button.twig */
class __TwigTemplate_16cb78e6ca98af05ce4dadfbb35674e6ff895ce9513939133b007d46ee186941 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<td>
    <form action=\"sql.php\" method=\"post\"";
        // line 2
        echo (isset($context["onsubmit"]) ? $context["onsubmit"] : null);
        echo ">
        ";
        // line 3
        echo PhpMyAdmin\Url::getHiddenInputs((isset($context["db"]) ? $context["db"] : null), (isset($context["table"]) ? $context["table"] : null));
        echo "
        <input type=\"hidden\" name=\"sql_query\" value=\"";
        // line 4
        echo (isset($context["sql_query"]) ? $context["sql_query"] : null);
        echo "\" />
        <input type=\"hidden\" name=\"pos\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["pos"]) ? $context["pos"] : null), "html", null, true);
        echo "\" />
        <input type=\"hidden\" name=\"is_browse_distinct\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["is_browse_distinct"]) ? $context["is_browse_distinct"] : null), "html", null, true);
        echo "\" />
        <input type=\"hidden\" name=\"goto\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["goto"]) ? $context["goto"] : null), "html", null, true);
        echo "\" />
        ";
        // line 8
        echo (isset($context["input_for_real_end"]) ? $context["input_for_real_end"] : null);
        echo "
        <input type=\"submit\" name=\"navig\" class=\"ajax\" value=\"";
        // line 9
        echo (isset($context["caption_output"]) ? $context["caption_output"] : null);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "\"";
        // line 10
        echo (isset($context["onclick"]) ? $context["onclick"] : null);
        echo " />
    </form>
</td>
";
    }

    public function getTemplateName()
    {
        return "display/results/table_navigation_button.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 10,  61 => 9,  57 => 8,  53 => 7,  49 => 6,  45 => 5,  41 => 4,  37 => 3,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "display/results/table_navigation_button.twig", "/home/ec2-user/environment/shopping_hp/phpMyAdmin/templates/display/results/table_navigation_button.twig");
    }
}