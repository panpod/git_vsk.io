<?php
class CarouselItem
{
    private $imageSrc;
    private $captionText;
    private $headlineText;
    private $buttonUrl;

    public function __construct($imageSrc, $captionText, $headlineText, $buttonUrl)
    {
        $this->imageSrc = $imageSrc;
        $this->captionText = $captionText;
        $this->headlineText = $headlineText;
        $this->buttonUrl = $buttonUrl;
    }

    public function render($isActive = false)
    {
        return sprintf(
            '<div class="carousel-item%s">
                <img src="%s" alt="Carousel Image">
                <div class="carousel-caption">
                    <p class="animated fadeInRight">%s</p>
                    <h1 class="animated fadeInLeft">%s</h1>
                    <a class="btn animated fadeInUp" href="%s">Get A Quote</a>
                </div>
            </div>',
            $isActive ? ' active' : '',
            htmlspecialchars($this->imageSrc),
            htmlspecialchars($this->captionText),
            htmlspecialchars($this->headlineText),
            htmlspecialchars($this->buttonUrl)
        );
    }
}


class CarouselFactory
{
    private $items = [];
    private $activeIndex = 0;

    public function addItem($imageSrc, $captionText, $headlineText, $buttonUrl)
    {
        $this->items[] = new CarouselItem($imageSrc, $captionText, $headlineText, $buttonUrl);
    }

    public function loadFromIniFile($iniFilePath)
    {
        // Parse the INI file
        $data = parse_ini_file($iniFilePath, true);
        
        if ($data === false) {
            throw new Exception("Failed to parse INI file: $iniFilePath");
        }
        
        foreach ($data as $section => $values) {
            // Ensure required fields are present
            if (isset($values['imageSrc'], $values['captionText'], $values['headlineText'], $values['buttonUrl'])) {
                $this->addItem(
                    $values['imageSrc'],
                    $values['captionText'],
                    $values['headlineText'],
                    $values['buttonUrl']
                );
            }
        }
    }

    public function render()
    {
        $html = '<ol class="carousel-indicators">';
        foreach ($this->items as $index => $item) {
            $html .= sprintf(
                '<li data-target="#carousel" data-slide-to="%d"%s></li>',
                $index,
                $index === $this->activeIndex ? ' class="active"' : ''
            );
        }
        $html .= '</ol>';

        $html .= '<div class="carousel-inner">';
        foreach ($this->items as $index => $item) {
            $html .= $item->render($index === $this->activeIndex);
        }
        $html .= '</div>';

        $html .= '<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                 </a>';
        $html .= '<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                 </a>';

        return $html;
    }
}
?>
