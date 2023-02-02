<?php

class Footer
{
    private $footer = "";
    public function __construct()
    {
        $this->footer =<<<HTML
<div class="footer">
    <p>
        UIMM Pôle Formation - Champagne Ardennes
    </p>
</div>
HTML;

    }
    public function __toString()
    {
        return $this->footer;
    }
}