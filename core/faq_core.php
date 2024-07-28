<?php

class FAQ {
    private $question;
    private $answer;
    private $id;

    public function __construct($id, $question, $answer) {
        $this->id = $id;
        $this->question = $question;
        $this->answer = $answer;
    }

    public function getId() {
        return $this->id;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function getAnswer() {
        return $this->answer;
    }
}


class FAQFactory {
    public static function createFAQsFromIni($filePath) {
        $faqs = [];
        $faqsData = parse_ini_file($filePath, true); // true for associative arrays
        foreach ($faqsData as $key => $data) {
            $id = $key;
            $question = $data['question'];
            $answer = $data['answer'];
            $faqs[] = new FAQ($id, $question, $answer);
        }
        return $faqs;
    }
}