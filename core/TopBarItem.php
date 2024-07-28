<?php
// TopBarItemInterface.php
interface TopBarItemInterface {
    public function getTitle();
    public function getContent();
    public function getIcon();
}

class TopBarItem implements TopBarItemInterface {
    private $title;
    private $content;
    private $icon;

    public function __construct($title, $content, $icon) {
        $this->title = $title;
        $this->content = $content;
        $this->icon = $icon;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getIcon() {
        return $this->icon;
    }
}


class TopBarItemFactory {
    private $config;

    public function __construct($configFile) {
        $this->config = parse_ini_file($configFile, true);
    }

    public function create($itemKey) {
        if (!isset($this->config['top_bar_items'][$itemKey . '_title'])) {
            throw new Exception("Item key $itemKey not defined in configuration");
        }

        $title = $this->config['top_bar_items'][$itemKey . '_title'];
        $content = $this->config['top_bar_items'][$itemKey . '_content'];
        $icon = $this->config['top_bar_items'][$itemKey . '_icon'];

        return new TopBarItem($title, $content, $icon);
    }
}
