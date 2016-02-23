<?php


/**
 * @Entity
 * @Table(name="IFRAMIFY_IFRAMES")
 */
class IframifyIframes
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer", name="id")
     */
    private $id;

    /**
     * @Column(type="string")
     * @var string
     */
    private $title;

    /**
     * @Column(type="string")
     * @var string
     */
    private $url;

    /**
     * @Column(type="string", name="root_menu")
     * @var string
     */
    private $rootMenu;

    /**
     * @Column(type="string", name="menu_entry")
     * @var string
     */
    private $menuEntry;
    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of Title
     *
     * @param string title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of Url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of Url
     *
     * @param string url
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of Root Menu
     *
     * @return string
     */
    public function getRootMenu()
    {
        return $this->rootMenu;
    }

    /**
     * Set the value of Root Menu
     *
     * @param string rootMenu
     *
     * @return self
     */
    public function setRootMenu($rootMenu)
    {
        $this->rootMenu = $rootMenu;

        return $this;
    }

    /**
     * Get the value of Menu Entry
     *
     * @return string
     */
    public function getMenuEntry()
    {
        return $this->menuEntry;
    }

    /**
     * Set the value of Menu Entry
     *
     * @param string menuEntry
     *
     * @return self
     */
    public function setMenuEntry($menuEntry)
    {
        $this->menuEntry = $menuEntry;

        return $this;
    }

}
