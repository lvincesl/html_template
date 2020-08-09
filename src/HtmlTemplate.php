<?php

/**
 * © 2017 - 2020
 *
 * Lionel Vinceslas <lionel.vinceslas@gmail.com>
 *
 * This software is a simple template engine to write clear php code
 * without imbricated html.
 *
 * This software is governed by the CeCILL-C license under French law and
 * abiding by the rules of distribution of free software.  You can  use,
 * modify and/ or redistribute the software under the terms of the CeCILL-C
 * license as circulated by CEA, CNRS and INRIA at the following URL
 * "http://www.cecill.info".
 *
 * As a counterpart to the access to the source code and  rights to copy,
 * modify and redistribute granted by the license, users are provided only
 * with a limited warranty  and the software's author,  the holder of the
 * economic rights,  and the successive licensors  have only  limited
 * liability.
 *
 * In this respect, the user's attention is drawn to the risks associated
 * with loading,  using,  modifying and/or developing or reproducing the
 * software by the user in light of its specific status of free software,
 * that may mean  that it is complicated to manipulate,  and  that  also
 * therefore means  that it is reserved for developers  and  experienced
 * professionals having in-depth computer knowledge. Users are therefore
 * encouraged to load and test the software's suitability as regards their
 * requirements in conditions enabling the security of their systems and/or
 * data to be ensured and,  more generally, to use and operate it in the
 * same conditions as regards security.
 *
 * The fact that you are presently reading this means that you have had
 * knowledge of the CeCILL-C license and that you accept its terms.
 */

namespace Lvinceslas\Html;


/**
 * Simple HTML template management class
 *
 * @category Template
 * @package  lvinceslas/html
 * @author   Lionel Vinceslas <lionel.vinceslas@gmail.com>
 * @license  CeCILL-C https://cecill.info/licences/Licence_CeCILL-C_V1-en.txt
 * @link     https://packagist.org/packages/lvinceslas/html
 */
class HtmlTemplate
{
    private $filepath;
    private $html;
    
    /**
     * @param string $filepath the HTML template filepath
     */
    public function __construct(string $filepath)
    {
        if (!is_string($filepath) || !file_exists($filepath)) 
            throw new \InvalidArgumentException('Invalid Html template filepath !');
        if (!is_readable($filepath))
            throw new \RuntimeException('Html template file not readable !');
        $this->filepath = $filepath;
        $this->html = file_get_contents($filepath);
    }

    /**
     * Return the Html template
     * @return string
     */
    public function __toString(): string
    {
        return $this->html;
    }

    /**
     * Get the Html template filepath
     * @return string
     */
    public function getFilepath(): string
    {
        return $this->filepath;
    }

    /**
     * Set the Html template filepath
     * @param string $filepath the HTML template filepath
     * @return bool
     */
    public function setFilepath(string $filepath): bool
    {
        if (!is_string($filepath) || !file_exists($filepath)) 
            throw new \InvalidArgumentException('Invalid Html template filepath !');
        if (!is_readable($filepath))
            throw new \RuntimeException('Html template file not readable !');
        $this->filepath = $filepath;
        $this->html = file_get_contents($filepath);
        return true;
    }

    /**
     * Set the value of the given tag name
     * @param string $name
     * @param string $value
     * @return bool
     */
    public function set(string $name, string $value): bool
    {
        if (!is_string($name)) {
            throw new \TypeError('Invalid name : string expected !');
        } elseif (!is_null($value) && !is_string($value)) {
            throw new \TypeError('Invalid value : string expected !');
        } else {
            $this->html = str_replace("{%".$name."%}", $value, $this->html);
            return true;
        }
    }

    /**
     * Print the Html template
     * @return void
     */
    public function show(): void
    {
        echo $this->html;
    }
}
