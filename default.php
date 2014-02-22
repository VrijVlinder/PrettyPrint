<?php if (!defined('APPLICATION')) die();

// Define the plugin:

$PluginInfo['PrettyPrint'] = array
(   
    'Name' => 'PrettyPrint',
    'Description' => 'Adds google-code-prettify (http://code.google.com/p/google-code-prettify/) to code entered into the editor using the tag pre class="prettyprint linenums" to wrap the code.You can change the css style sheet to edit the looks of the formating.',
    'Version' => '1.2',
    'Author' => 'VrijVlinder',
    'AuthorEmail' => 'contact@rvrijvlinder.com',
    'AuthorUrl' => 'http://vrijvlinder.com'
);

class PrettyPrint extends Gdn_Plugin
{
    var $inline = '<script type="text/javascript">$(function(){prettyPrint();});</script><style type="text/css">div.Message code {background-color:#ddd !important}</style>';

    public function Base_Render_Before($Sender)

    {
        $Sender->AddCssFile($this->GetResource('prettify/prettify.css', FALSE, FALSE));
        $Sender->AddJsFile($this->GetResource('prettify/prettify.js', FALSE, FALSE));
        $Sender->AddJsFile($this->GetResource('prettify/ppjqs.js', FALSE, FALSE));

        $Sender->Head->AddString($this->inline);
    }

    public function Setup() {}
}