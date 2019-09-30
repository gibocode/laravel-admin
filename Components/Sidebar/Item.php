<?php

/**
 * Sidebar Item Component
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelAdmin\Components\Sidebar;

use \Gibocode\LaravelElements\Element;
use \Gibocode\LaravelElements\Element\Attribute;
use \Gibocode\LaravelElements\Elements\Icon;
use \Gibocode\LaravelAdmin\Component;

class Item extends Component {

    /**
     * @var string NAME
     */
    private const NAME = 'sidebar-item';

    /**
     * @var string ELEMEN_TNAME
     */
    private const ELEMENT_NAME = 'button';

    /**
     * @var string $title
     */
    protected $title = '';

    /**
     * @var Icon $icon
     */
    protected $icon;

    /**
     * @var bool $isActive
     */
    protected $isActive = false;

    /**
     * Sidebar Component Class Constructor
     * 
     * @param array $items
     * @param array $components
     * @return void
     */
    public function __construct($title, $icon = null, $isActive = false, $components = []) {

        $this->setTitle($title);
        $this->isActive($isActive);

        $this->setAttributes([
            new Attribute('class', $this->getClass()),
            new Attribute('id', $this->getClass() . '-' . $this->getId()),
            new Attribute('data-content-type', $this->getId()),
            new Attribute('data-content-title', $this->getTitle())
        ]);

        $this->setIcon($icon);
        $this->addComponent(new Element('span', $this->getTitle()));

        parent::__construct($this::NAME, $this::ELEMENT_NAME, $components);
    }

    /**
     * Sets the title of the sidebar item
     * @param string $title
     * @return Item
     */
    public function setTitle($title) {

        if (empty($title)) throw new Exception('Sidebar item [title] must not be empty.');

        $this->title = $title;

        return $this;
    }

    /**
     * Sets the icon of the sidebar item
     * @param Icon $icon
     * @return Item
     */
    public function setIcon($icon) {

        $this->icon = $icon;

        if (!is_null($icon)) {

            $this->addAttribute(new Attribute('data-content-icon', $icon->getClass()));
            $this->addComponent($icon);
        }

        return $this;
    }

    /**
     * Gets the title of the sidebar item
     * @return string
     */
    public function getTitle() {

        return $this->title;
    }

    /**
     * Gets the icon of the sidebar item
     * @return Icon
     */
    public function getIcon() {

        return $this->icon;
    }

    /**
     * Sets or gets the sidebar item component if active or not
     * @param null|bool $isActive
     * @return bool|Item
     */
    public function isActive($isActive = null) {

        if (is_null($isActive)) return $this->isActive;

        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Gets the class of the sidebar item
     * @return string
     */
    public function getClass() {

        $class = 'admin-' . $this::NAME;

        if ($this->isActive()) {

            $class .= ' active';
        }

        return $class;
    }

    /**
     * Gets the ID of the sidebar item
     * @return string
     */
    public function getId() {

        return strtolower(str_replace(' ', '-', trim($this->getTitle())));
    }

    /**
     * Creates a sidebar item object
     * @param string $title
     * @param Icon $icon
     * @param bool $isActive
     * @param array $components
     * @return Item
     */
    public static function create($title, $icon = null, $isActive = false, $components = []) {

        return new self($title, $icon, $isActive, $components);
    }
}