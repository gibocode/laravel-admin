<?php

/**
 * Content Header Title Component Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelAdmin\Components\Content\Header;

use \Gibocode\LaravelElements\Element;
use \Gibocode\LaravelElements\Element\Attribute;
use \Gibocode\LaravelElements\Elements\Icon;
use \Gibocode\LaravelAdmin\Component;
use Exception;

class Title extends Component {

    /**
     * @var string NAME
     */
    private const NAME = 'content-header-title';

    /**
     * @var string ELEMENT_NAME
     */
    private const ELEMENT_NAME = 'div';

    /**
     * @var string $text
     */
    protected $text = '';

    /**
     * Content Header Title Component Class Constructor
     * 
     * @param string $text
     * @param Icon $icon
     * @param array $components
     * @return void
     */
    public function __construct($text, $icon = null, $components = []) {

        $this->setText($text);
        $this->setIcon($icon);
        $this->addAttribute(new Attribute('class', $this->getClass()));

        $this->addComponent(new Element('span', $this->getText()));

        parent::__construct($this::NAME, $this::ELEMENT_NAME, $components);
    }

    /**
     * Sets the text of the content header title
     * @param string $text
     * @return Title
     */
    public function setText($text) {

        if (empty($text)) throw new Exception('Content header title [text] must not be empty.');

        $this->text = $text;

        return $this;
    }

    /**
     * Sets the icon on the content header title
     * @param Icon $icon
     * @return Title
     */
    public function setIcon($icon) {

        if (!is_null($icon)) {

            $this->addComponent($icon);
        }

        return $this;
    }

    /**
     * Gets the text of the content header title
     * @return string
     */
    public function getText() {

        return $this->text;
    }

    /**
     * Gets the icon on the content header title
     * @return Icon
     */
    public function getIcon() {

        $icon = null;

        foreach ($this->getComponents() as $component) {

            if ($components instanceof Icon) {

                $icon = $component;
                break;
            }
        }

        return $icon;
    }

    /**
     * Gets the class of the content header title
     * @return string
     */
    public function getClass() {

        return 'admin-' . $this::NAME;
    }

    /**
     * Creates a content header title object
     * @param string $text
     * @param Icon $icon
     * @param array $components
     * @return Title
     */
    public static function create($text, $icon = null, $components = []) {

        return new self($text, $icon, $components);
    }
}