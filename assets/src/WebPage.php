<?php declare(strict_types=1);

/**
 * Classe WebPage permettant de ne plus écrire l'enrobage HTML lors de la création d'une page Web.
 *
 * @startuml
 *
 *  skinparam defaultFontSize 16
 *  skinparam BackgroundColor transparent
 *
 *  class WebPage {
 *      - $head = ""
 *      - $title = null
 *      - $body = ""
 *      + __construct(string $title=null)
 *      + body() : string
 *      + head() : string
 *      + setTitle(string $title) : void
 *      + appendToHead(string $content) : void
 *      + appendCss(string $css) : void
 *      + appendCssUrl(string $url) : void
 *      + appendJs(string $js) : void
 *      + appendJsUrl(string $url) : void
 *      + appendContent(string $content) : void
 *      + toHTML() : string
 *      + {static} getLastModification() : string
 *      + {static} escapeString(string $string) : string
 *  }
 *
 * @enduml
 */
class WebPage
{
    /**
     * Texte compris entre \<head\> et \</head\>.
     *
     * @var string $head
     */
    private $head = '';

    /**
     * Texte compris entre \<title\> et \</title\>.
     *
     * @var string $title
     */
    private $title = null;

    /**
     * Texte compris entre \<body\> et \</body\>.
     *
     * @var string $body
     */
    private $body = '';

    /**
     * Constructeur.
     *
     * @param string $title Titre de la page
     */
    public function __construct(string $title = null)
    {
        if (!is_null($title)) {
            $this->setTitle($title);
        }
    }

    /**
     * Retourner le contenu de $this->body.
     *
     * @return string
     */
    public function body(): string
    {
        return $this->body;
    }

    /**
     * Retourner le contenu de $this->head.
     *
     * @return string
     */
    public function head(): string
    {
        return $this->head;
    }

    /**
     * Affecter le titre de la page.
     *
     * @param string $title Le titre
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Ajouter un contenu dans $this->head.
     *
     * @param string $content Le contenu à ajouter
     */
    public function appendToHead(string $content): void
    {
        $this->head .= $content;
    }

    /**
     * Ajouter un contenu CSS dans head.
     *
     * @param string $css Le contenu CSS à ajouter
     * @see WebPage::appendToHead(string $content) : void
     *
     */
    public function appendCss(string $css): void
    {
        $this->appendToHead(<<<HTML
    <style type='text/css'>
    {$css}
    </style>
HTML
        );
    }

    /**
     * Ajouter l'URL d'un script CSS dans head.
     *
     * @param string $url L'URL du script CSS
     * @see WebPage::appendToHead(string $content) : void
     *
     */
    public function appendCssUrl(string $url): void
    {
        $this->appendToHead(<<<HTML
    <link rel="stylesheet" type="text/css" href="{$url}" media="screen">
HTML
        );
        $this->appendToHead('<link rel="icon" type="image/png" href="Image/avicon.png">');
    }

    /**
     * Ajouter un contenu JavaScript dans head.
     *
     * @param string $js Le contenu JavaScript à ajouter
     * @see WebPage::appendToHead(string $content) : void
     *
     */
    public function appendJs(string $js): void
    {
        $this->appendToHead(<<<HTML
    <script type='text/javascript'>
    {$js}
    </script>
HTML
        );
    }

    /**
     * Ajouter l'URL d'un script JavaScript dans head.
     *
     * @param string $url L'URL du script JavaScript
     * @see WebPage::appendToHead(string $content) : void
     *
     */
    public function appendJsUrl(string $url): void
    {
        $this->appendToHead(<<<HTML
    <script type='text/javascript' src='{$url}'></script>
HTML
        );
    }

    /**
     * Ajouter un contenu dans body.
     *
     * @param string $content Le contenu à ajouter
     */
    public function appendContent(string $content): void
    {
        $this->body .= $content;
    }

    /**
     * Produire la page Web complète.
     *
     * @return string
     *
     * @throws Exception si title n'est pas défini
     */
    public function toHTML(): string
    {
        if (is_null($this->title)) {
            throw new Exception(__CLASS__ . ': title not set');
        }

        $lastModification = self::getLastModification();

        return <<<HTML
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        -->
        <title>{$this->title}</title>
{$this->head()}
    </head>
    <body>
     
{$this->body()}
        <!--<div id='lastmodified'>{$lastModification}</div>-->
        <!--
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        -->
    </body>
</html>
HTML;
    }

    /**
     * Donner la date et l'heure de la dernière modification du script principal.
     *
     * @return string
     *
     * @see http://php.net/manual/en/function.getlastmod.php
     * @see http://php.net/manual/en/function.strftime.php
     */
    public static function getLastModification(): string
    {
        return strftime('Dernière modification de cette page le %d/%m/%Y à %Hh%M', getlastmod());
    }

    /**
     * Protéger les caractères spéciaux pouvant dégrader la page Web.
     *
     * @param string $string La chaîne à protéger
     *
     * @return string La chaîne protégée
     *
     * @see https://www.php.net/manual/en/function.htmlspecialchars.php
     */
    public static function escapeString(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'utf-8');
    }

    public static function getNavBar(): string
    {
        return <<<HTML
<ul class='ulnavbar' >
  <li class='linavbar'><a  class='active' href="accueil.php">Accueil</a></li>
  <li class='linavbar'><a class='anavbar' href="social.php">Social</a></li>
  <li class='linavbar'><a class='anavbar' href="profil.php">Mon profil</a></li>
  <li class='linavbar'><a class='anavbar' href="pageCalendrier.php?addOrSubWeek=0">Calendrier</a></li>
  <li class='linavbar'><a class='anavbar' href='pageMarketPlace.php'>Marketplace</a></li>
  <li class='linavbar'><a class='anavbar' href="pageCalendrier.php?addOrSubWeek=0">Mes Annonces</a></li>
  <li class='linavbar'><a class='anavbar' href='ajouterAnnonce.php'>Ajouter Annonces</a></li>
  <li class='linavbar'><a class='anavbar' href='searchAnnonce.php'>Rechercher Annonce</a></li>
</ul>
HTML;
    }
}
