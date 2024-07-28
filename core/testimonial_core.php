<?php

class Testimonial {
    private $name;
    private $profession;
    private $feedback;
    private $image;

    public function __construct($name, $profession, $feedback, $image) {
        $this->name = $name;
        $this->profession = $profession;
        $this->feedback = $feedback;
        $this->image = $image;
    }

    public function getName() {
        return $this->name;
    }

    public function getProfession() {
        return $this->profession;
    }

    public function getFeedback() {
        return $this->feedback;
    }

    public function getImage() {
        return $this->image;
    }
}


class TestimonialFactory {
    public static function createTestimonialFromIni($iniFile) {
        $testimonials = [];
        $data = parse_ini_file($iniFile, true); // Read the .ini file

        foreach ($data as $key => $value) {
            $testimonials[] = new Testimonial(
                $value['name'],
                $value['profession'],
                $value['feedback'],
                $value['image']
            );
        }

        return $testimonials;
    }
}


