<?php

/**
 * Content Body Component Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelAdmin\Components\Content;

use \Gibocode\LaravelElements\Element;
use \Gibocode\LaravelElements\Element\Attribute;
use \Gibocode\LaravelAdmin\Component;

class Body extends Component {

    /**
     * @var string NAME
     */
    private const NAME = 'content-body';

    /**
     * @var string ELEMENT_NAME
     */
    private const ELEMENT_NAME = 'div';

    /**
     * Content Body Component Class Constructor
     * 
     * @param string $content
     * @param array $components
     * @return void
     */
    public function __construct($content = '', $components = []) {

        $this->addAttribute(new Attribute('class', $this->getClass()));

        if (!empty($content)) {

            $components = array_merge([new Element('span', $content)], $components);
        }

        parent::__construct($this::NAME, $this::ELEMENT_NAME, $components);
    }

    /**
     * Gets the class of the content body
     * @return string
     */
    public function getClass() {

        return 'admin-' . $this::NAME;
    }

    /**
     * Creates a content body object
     * @param string $content
     * @param array $components
     * @return Body
     */
    public static function create($content = '', $components = []) {

        return new self($content, $components);
    }
}