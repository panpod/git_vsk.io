<?php
class ConfigLoader {
    private $config;

    public function __construct($filename) {
        $this->config = $this->parseIniFile($filename);
    }

    private function parseIniFile($filename) {
        // Load and parse the .ini file
        return parse_ini_file($filename, true);
    }

    public function getConfig() {
        return $this->config;
    }
}


interface ServiceItem {
    public function getHtml();
}

class ServiceItemConcrete implements ServiceItem {
    private $title;
    private $image;
    private $description;
    private $delay;

    public function __construct($title, $image, $description, $delay) {
        $this->title = $title;
        $this->image = $image;
        $this->description = $description;
        $this->delay = $delay;
    }

    public function getHtml() {
        return "
        <div class=\"col-lg-4 col-md-6 wow fadeInUp\" data-wow-delay=\"{$this->delay}s\">
            <div class=\"service-item\">
                <div class=\"service-img\">
                    <img src=\"{$this->image}\" alt=\"{$this->title}\" />
                    <div class=\"service-overlay\">
                        <p>{$this->description}</p>
                    </div>
                </div>
                <div class=\"service-text\">
                    <h3>{$this->title}</h3>
                    <a class=\"btn\" href=\"{$this->image}\" data-lightbox=\"service\" aria-label=\"View {$this->title} service details\">+</a>
                </div>
            </div>
        </div>";
    }
}


class ServiceFactory {
    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function createService($serviceKey, $delay) {
        if (isset($this->config[$serviceKey])) {
            $serviceConfig = $this->config[$serviceKey];
            return new ServiceItemConcrete(
                $serviceConfig['title'],
                $serviceConfig['image'],
                $serviceConfig['description'],
                $delay
            );
        } else {
            throw new Exception("Service type not recognized.");
        }
    }
}

?>
