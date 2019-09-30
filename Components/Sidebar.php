<?php

/**
 * Sidebar Component Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelAdmin\Components;

use \Gibocode\LaravelElements\Element\Attribute;
use \Gibocode\LaravelAdmin\Component;
use \Gibocode\LaravelAdmin\Components\Sidebar\Item;

class Sidebar extends Component {

    /**
     * @var string NAME
     */
    private const NAME = 'sidebar';

    /**
     * @var string ELEMENT_NAME
     */
    private const ELEMENT_NAME = 'div';

    /**
     * Sidebar Component Class Constructor
     * 
     * @param array $items
     * @param array $components
     * @return void
     */
    public function __construct($items = [], $components = []) {

        $this->setItems($items);
        $this->addAttribute(new Attribute('class', $this->getClass()));

        parent::__construct($this::NAME, $this::ELEMENT_NAME, $components);
    }

    /**
     * Adds a new item to the sidebar
     * @param Item
     * @return Sidebar
     */
    public function addItem(Item $item) {

        $this->addComponent($item);

        return $this;
    }

    /**
     * Overrides an item or adds new item to the sidebar
     * @param Item $item
     * @return Sidebar
     */
    public function setItem(Item $item) {

        foreach ($this->getComponents() as $index => $component) {

            if ($component instanceof Item) {

                if ($component->getId() == $item->getId()) {

                    $this->components[$index] = $item;

                    return $this;
                }
            }
        }

        return $this->addItem($item);
    }

    /**
     * Sets an array sidebar items
     * @param array $items
     * @return Sidebar
     */
    public function setItems($items) {

        $component = (new Component($this::NAME . '-item-list', $this::ELEMENT_NAME, $items))
            ->addAttribute(new Attribute('class', $this->getClass() . '-item-list'));

        $this->addComponent($component);

        return $this;
    }

    /**
     * Gets an item by ID from the sidebar
     * @param string $id
     * @return Item
     */
    public function getItem($id) {

        $item = null;

        foreach ($this->getItems() as $_item) {

            if ($_item->getId() == $id) {

                $item = $_item;
                break;
            }
        }

        return $item;
    }

    /**
     * Gets an array of sidebar items
     * @return array
     */
    public function getItems() {

        $items = [];

        foreach ($this->getComponents() as $component) {

            if ($component instanceof Item) {

                $items[] = $component;
            }
        }

        return $items;
    }

    /**
     * Gets the class of the sidebar
     * @return string
     */
    public function getClass() {

        return 'admin-' . $this::NAME;
    }

    /**
     * Creates a sidebar object
     * @param array $items
     * @param array $components
     * @return Sidebar
     */
    public static function create($items = [], $components = []) {

        return new self($items, $components);
    }
}