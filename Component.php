<?php

/**
 * Component Class
 * @author Gilbor Camporazo Jr.
 * An extends class of UI Components Component
 */

namespace Gibocode\LaravelAdmin;

use \Gibocode\LaravelUiComponents\Component as UiComponent;
use \Gibocode\LaravelAdmin\Loader\StyleLoader;

class Component extends UiComponent {

    /**
     * Component Class Constructor
     * 
     * @param string $name
     * @param string $elementName
     * @param array $components
     * @return void
     */
    public function __construct($name, $elementName, $components = []) {

        parent::__construct($name, $elementName, $components, new StyleLoader);
    }
}