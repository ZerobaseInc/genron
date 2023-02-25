<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* core/themes/olivero/templates/navigation/pager.html.twig */
class __TwigTemplate_ac5b8aea4dd18da0cae732316b6a7518 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        if (($context["items"] ?? null)) {
            // line 34
            echo "  <nav class=\"pager\" role=\"navigation\" aria-label=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pagination"));
            echo "\">
    <ul class=\"pager__items js-pager__items\">
      ";
            // line 37
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 37)) {
                // line 38
                echo "        ";
                ob_start(function () { return ''; });
                // line 39
                echo "          <li class=\"pager__item pager__item--control pager__item--first\">
            <a href=\"";
                // line 40
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 40), "href", [], "any", false, false, true, 40), 40, $this->source), "html", null, true);
                echo "\" class=\"pager__link\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to first page"));
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 40), "attributes", [], "any", false, false, true, 40), 40, $this->source), "href", "title", "class"), "html", null, true);
                echo ">
              <span class=\"visually-hidden\">";
                // line 41
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("First page"));
                echo "</span>
              ";
                // line 42
                $this->loadTemplate("@olivero/../images/pager-first.svg", "core/themes/olivero/templates/navigation/pager.html.twig", 42)->display($context);
                // line 43
                echo "            </a>
          </li>
        ";
                $___internal_parse_0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 38
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_spaceless($___internal_parse_0_));
                // line 46
                echo "      ";
            }
            // line 47
            echo "
      ";
            // line 49
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 49)) {
                // line 50
                echo "        ";
                ob_start(function () { return ''; });
                // line 51
                echo "          <li class=\"pager__item pager__item--control pager__item--previous\">
            <a href=\"";
                // line 52
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 52), "href", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
                echo "\" class=\"pager__link\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to previous page"));
                echo "\" rel=\"prev\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 52), "attributes", [], "any", false, false, true, 52), 52, $this->source), "href", "title", "rel", "class"), "html", null, true);
                echo ">
              <span class=\"visually-hidden\">";
                // line 53
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous page"));
                echo "</span>
              ";
                // line 54
                $this->loadTemplate("@olivero/../images/pager-previous.svg", "core/themes/olivero/templates/navigation/pager.html.twig", 54)->display($context);
                // line 55
                echo "            </a>
          </li>
        ";
                $___internal_parse_1_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 50
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_spaceless($___internal_parse_1_));
                // line 58
                echo "      ";
            }
            // line 59
            echo "
      ";
            // line 61
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["ellipses"] ?? null), "previous", [], "any", false, false, true, 61)) {
                // line 62
                echo "        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 64
            echo "
      ";
            // line 66
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "pages", [], "any", false, false, true, 66));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 67
                echo "        ";
                ob_start(function () { return ''; });
                // line 68
                echo "          <li class=\"pager__item";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["current"] ?? null) == $context["key"])) ? (" pager__item--active") : ("")));
                echo " pager__item--number\">
            ";
                // line 69
                if ((($context["current"] ?? null) == $context["key"])) {
                    // line 70
                    echo "              ";
                    $context["title"] = t("Current page");
                    // line 71
                    echo "            ";
                } else {
                    // line 72
                    echo "              ";
                    $context["title"] = t("Go to page @key", ["@key" => $context["key"]]);
                    // line 73
                    echo "            ";
                }
                // line 74
                echo "            ";
                if ((($context["current"] ?? null) != $context["key"])) {
                    // line 75
                    echo "              <a href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
                    echo "\" class=\"pager__link";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["current"] ?? null) == $context["key"])) ? (" is-active") : ("")));
                    echo "\" title=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 75, $this->source), "html", null, true);
                    echo "\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 75), 75, $this->source), "href", "title", "class"), "html", null, true);
                    echo ">
            ";
                }
                // line 77
                echo "            <span class=\"visually-hidden\">
              ";
                // line 78
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["current"] ?? null) == $context["key"])) ? (t("Current page")) : (t("Page"))));
                echo "
            </span>
            ";
                // line 80
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 80, $this->source), "html", null, true);
                echo "
            ";
                // line 81
                if ((($context["current"] ?? null) != $context["key"])) {
                    // line 82
                    echo "              </a>
            ";
                }
                // line 84
                echo "          </li>
        ";
                $___internal_parse_2_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 67
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_spaceless($___internal_parse_2_));
                // line 86
                echo "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "
      ";
            // line 89
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["ellipses"] ?? null), "next", [], "any", false, false, true, 89)) {
                // line 90
                echo "        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 92
            echo "
      ";
            // line 94
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 94)) {
                // line 95
                echo "        ";
                ob_start(function () { return ''; });
                // line 96
                echo "          <li class=\"pager__item pager__item--control pager__item--next\">
            <a href=\"";
                // line 97
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 97), "href", [], "any", false, false, true, 97), 97, $this->source), "html", null, true);
                echo "\" class=\"pager__link\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to next page"));
                echo "\" rel=\"next\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 97), "attributes", [], "any", false, false, true, 97), 97, $this->source), "href", "title", "rel", "class"), "html", null, true);
                echo ">
              <span class=\"visually-hidden\">";
                // line 98
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next page"));
                echo "</span>
              ";
                // line 99
                $this->loadTemplate("@olivero/../images/pager-previous.svg", "core/themes/olivero/templates/navigation/pager.html.twig", 99)->display($context);
                // line 100
                echo "            </a>
          </li>
        ";
                $___internal_parse_3_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 95
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_spaceless($___internal_parse_3_));
                // line 103
                echo "      ";
            }
            // line 104
            echo "
      ";
            // line 106
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 106)) {
                // line 107
                echo "        ";
                ob_start(function () { return ''; });
                // line 108
                echo "          <li class=\"pager__item pager__item--control pager__item--last\">
            <a href=\"";
                // line 109
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 109), "href", [], "any", false, false, true, 109), 109, $this->source), "html", null, true);
                echo "\" class=\"pager__link\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to last page"));
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 109), "attributes", [], "any", false, false, true, 109), 109, $this->source), "href", "title", "class"), "html", null, true);
                echo ">
              <span class=\"visually-hidden\">";
                // line 110
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last page"));
                echo "</span>
              ";
                // line 111
                $this->loadTemplate("@olivero/../images/pager-first.svg", "core/themes/olivero/templates/navigation/pager.html.twig", 111)->display($context);
                // line 112
                echo "            </a>
          </li>
        ";
                $___internal_parse_4_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 107
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_spaceless($___internal_parse_4_));
                // line 115
                echo "      ";
            }
            // line 116
            echo "    </ul>
  </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/olivero/templates/navigation/pager.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  283 => 116,  280 => 115,  278 => 107,  273 => 112,  271 => 111,  267 => 110,  259 => 109,  256 => 108,  253 => 107,  250 => 106,  247 => 104,  244 => 103,  242 => 95,  237 => 100,  235 => 99,  231 => 98,  223 => 97,  220 => 96,  217 => 95,  214 => 94,  211 => 92,  207 => 90,  204 => 89,  201 => 87,  195 => 86,  193 => 67,  189 => 84,  185 => 82,  183 => 81,  179 => 80,  174 => 78,  171 => 77,  159 => 75,  156 => 74,  153 => 73,  150 => 72,  147 => 71,  144 => 70,  142 => 69,  137 => 68,  134 => 67,  129 => 66,  126 => 64,  122 => 62,  119 => 61,  116 => 59,  113 => 58,  111 => 50,  106 => 55,  104 => 54,  100 => 53,  92 => 52,  89 => 51,  86 => 50,  83 => 49,  80 => 47,  77 => 46,  75 => 38,  70 => 43,  68 => 42,  64 => 41,  56 => 40,  53 => 39,  50 => 38,  47 => 37,  41 => 34,  39 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/olivero/templates/navigation/pager.html.twig", "/app/web/core/themes/olivero/templates/navigation/pager.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 33, "apply" => 38, "include" => 42, "for" => 66, "set" => 70);
        static $filters = array("t" => 34, "escape" => 40, "without" => 40, "spaceless" => 38);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'apply', 'include', 'for', 'set'],
                ['t', 'escape', 'without', 'spaceless'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
