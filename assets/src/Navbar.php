<?php

class Navbar
{
    private $navbar="";
    private $buttons="";
    public function __construct()
    {
        $this->navbar = <<<HTML
<div class="navbar"><img id="logo" src="assets/img/1200px-LOGO_UIMM_QUADRI.svg.png">
<div class="loop-wrapper" style="width:99% ;height:35%;margin-top:2px">
  <div class="mountain"></div>
  <div class="hill"></div>
  <div class="tree"></div>
  <div class="tree"></div>
  <div class="tree"></div>
  <div class="rock"></div>
  <div class="truck"></div>
  <div class="wheels"></div>
</div>


HTML;

    }
    public function __toString()
    {
        return $this->navbar.$this->buttons."</div>";
    }
    public function addButton(string $name,string $url)
    {
        $lien =<<<HTML
<a id="bouton_nav" href="{$url}">{$name}</a>I
HTML;
        $this->buttons = $this->buttons.$lien;


    }
}