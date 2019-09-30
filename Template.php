<?php

/**
 * Admin Template Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelAdmin;

use \Gibocode\LaravelElements\Element\Attribute;
use \Gibocode\LaravelAdmin\Component;
use \Gibocode\LaravelAdmin\Components\Content;
use \Gibocode\LaravelAdmin\Components\Sidebar;

class Template extends Component {

    /**
     * @var string NAME
     */
    private const NAME = 'template';

    /**
     * @var string ELEMENT_NAME
     */
    private const ELEMENT_NAME = 'div';

    /**
     * Admin Template Class Constructor
     * 
     * @param Content $templateContent
     * @param Sidebar $sidebar
     * @param array $components
     * @return void
     */
    public function __construct($templateContent = null, $sidebar = null, $components = []) {

        $this->setSidebar($sidebar);
        $this->setTemplateContent($templateContent);
        $this->addAttribute(new Attribute('class', $this->getClass()));

        parent::__construct($this::NAME, $this::ELEMENT_NAME, $components);
    }

    /**
     * Sets sidebar component to the template
     * @param Sidebar $sidebar
     * @return Template
     */
    public function setSidebar($sidebar) {

        if (!is_null($sidebar)) {

            $this->addComponent($sidebar);
        }

        return $this;
    }

    /**
     * Sets content component to the template
     * @param Content $templateContent
     * @return Template
     */
    public function setTemplateContent($templateContent) {

        if (!is_null($templateContent)) {

            $this->addComponent($templateContent);
        }

        return $this;
    }

    /**
     * Gets sidebar component from the template
     * @return Sidebar
     */
    public function getSidebar() {

        $sidebar = null;

        foreach ($this->getComponents() as $component) {

            if ($component instanceof Sidebar) {

                $sidebar = $components;
                break;
            }
        }

        return $sidebar;
    }

    /**
     * Gets content component from the template
     * @return Content
     */
    public function getTemplateContent() {

        $content = null;

        foreach ($this->getComponents() as $component) {

            if ($component instanceof Content) {

                $content = $components;
                break;
            }
        }

        return $content;
    }

    /**
     * Gets the class of the template
     * @return string
     */
    public function getClass() {

        return 'admin-' . $this::NAME;
    }

    /**
     * Creates a template object
     * @param Content $templateContent
     * @param Sidebar $sidebar
     * @param array $component
     * @return Template
     */
    public static function create($templateContent = null, $sidebar = null, $components = []) {

        return new self($templateContent, $sidebar, $components);
    }
}