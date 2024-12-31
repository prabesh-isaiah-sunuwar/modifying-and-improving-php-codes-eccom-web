<?php
//Use of loadtemplate for the layout.html.php
function loadTemplate($filekoNameho, $templatekoVariables)
{ //Use of loadtemplate for the layout.html.php
        extract($templatekoVariables);
        ob_start();
        require $filekoNameho;
        $contentsofthepage = ob_get_clean();
        return $contentsofthepage;
} //Use of loadtemplate for the layout.html.php
