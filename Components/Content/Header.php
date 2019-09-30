<?php

/**
 * Content Header Component Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelAdmin\Components\Content;

use \Gibocode\LaravelElements\Element;
use \Gibocode\LaravelElements\Element\Attribute;
use \Gibocode\LaravelAdmin\Component;
use \Gibocode\LaravelAdmin\Components\Content\Header\Title;

class Header extends Component {

    /**
     * @var string NAME
     */
    private const NAME = 'content-header';

    /**
     * @var string ELEMENT_NAME
     */
    private const ELEMENT_NAME = 'div';

    /**
     * Content Header Component Class Constructor
     * 
     * @param Title $title
     * @param string $content
     * @param array $components
     * @return void
     */
    public function __construct($title = null, $content = '', $components = []) {

        $this->setTitle($title);
        $this->addAttribute(new Attribute('class', $this->getClass()));

        if (!empty($content)) {

            $components = array_merge([new Element('span', $content)], $components);
        }

        if (!empty($component)) {

            $component = (new Component($this::NAME . '-panel', $this::ELEMENT_NAME, $components))
                ->addAttribute(new Attribute('class', $this->getClass() . '-panel'));

            $this->addComponent($component);
        }

        parent::__construct($this::NAME, $this::ELEMENT_NAME);
    }

    /**
     * Sets the title of the content header
     * @param Title $title
     * @return Header
     */
    public function setTitle($title) {

        if (!is_null($title)) {

            $this->addComponent($title);
        }

        return $this;
    }

    /**
     * Gets the title of the content header
     * @return Title
     */
    public function getTitle() {

        $title = null;

        foreach ($this->getComponents() as $component) {

            if ($component instanceof Title) {

                $title = $component;
                break;
            }
        }

        return $title;
    }

    /**
     * Gets the class of the content header
     * @return string
     */
    public function getClass() {

        return 'admin-' . $this::NAME;
    }

    /**
     * Creates a content header object
     * @param Title $title
     * @param string $content
     * @param array $components
     * @return Header
     */
    public static function create($title = null, $content = '', $components = []) {

        return new self($title, $content, $components);
    }
}