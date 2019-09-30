<?php

/**
 * Content Component Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelAdmin\Components;

use \Gibocode\LaravelElements\Element\Attribute;
use \Gibocode\LaravelAdmin\Component;
use \Gibocode\LaravelAdmin\Components\Content\Body;
use Exception;

class Content extends Component {

    /**
     * @var string NAME
     */
    private const NAME = 'content';

    /**
     * @var string ELEMENT_NAME
     */
    private const ELEMENT_NAME = 'div';

    /**
     * Content Component Class Constructor
     * 
     * @param Body $body
     * @param Header $header
     * @param Footer $footer
     * @param array $components
     * @return void
     */
    public function __construct($body, $header = null, $footer = null, $components = []) {

        $this->setHeader($header);
        $this->setBody($body);
        $this->setFooter($footer);
        $this->addAttribute(new Attribute('class', $this->getClass()));

        parent::__construct($this::NAME, $this::ELEMENT_NAME, $components);
    }

    /**
     * Sets the header of the content
     * @param Header $header
     * @return Content
     */
    public function setHeader($header) {

        if (!is_null($header)) {

            $this->addComponent($header);
        }

        return $this;
    }

    /**
     * Sets the body of the content
     * @param Body $body
     * @return Content
     */
    public function setBody(Body $body) {

        $this->addComponent($body);

        return $this;
    }

    /**
     * Sets the footer of the content
     * @param Footer $header
     * @return Content
     */
    public function setFooter($footer) {

        if (!is_null($footer)) {

            $this->addComponent($footer);
        }

        return $this;
    }

    /**
     * Gets the header of the content
     * @return Header
     */
    public function getHeader() {

        $header = null;

        foreach ($this->getComponents() as $component) {

            if ($component instanceof Header) {

                $header = $component;
                break;
            }
        }

        return $header;
    }

    /**
     * Gets the body of the content
     * @return Body
     */
    public function getBody() {

        $body = null;

        foreach ($this->getComponents() as $component) {

            if ($component instanceof Body) {

                $body = $component;
                break;
            }
        }

        return $body;
    }

    /**
     * Gets the footer of the content
     * @return Footer
     */
    public function getFooter() {

        $footer = null;

        foreach ($this->getComponents() as $component) {

            if ($component instanceof Footer) {

                $footer = $component;
                break;
            }
        }

        return $footer;
    }

    /**
     * Gets the class of the content
     * @return string
     */
    public function getClass() {

        return 'admin-' . $this::NAME;
    }

    /**
     * Creates a content object
     * @param Body $body
     * @param Header $header
     * @param Footer $footer
     * @param array $components
     * @return Content
     */
    public static function create($body, $header = null, $footer = null, $components = []) {

        return new self($body, $header, $footer, $components);
    }
}