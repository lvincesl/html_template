<?php


namespace lvincesl\html;

/**
 * Classe de gestion simple de Templates HTML
 *
 * @category Template
 * @package  Lvincesl
 * @author   Lionel Vinceslas <lionel.vinceslas@lapsote.net>
 * @license  CECILL http://www.cecill.info/licences/Licence_CeCILL-C_V1-fr.txt
 * @link     lionel-vinceslas.eurower.net
 *
 * @date 02/09/2007
 * @return string
 */
class Html_Template
{
    var $templatePath;
    var $templateContent;
    
    public function __construct($path)
    {
        $this->templatePath = $path;
        $this->templateContent = file_get_contents($path);
    }

    public function toString()
    {
        return $this->templateContent;
    }

    public function set($name, $value)
    {
        $this->templateContent = ereg_replace("{%".$name."%}", $value, $this->templateContent);
    }

    public function show()
    {
        echo $this->templateContent;
    }
}

?>
