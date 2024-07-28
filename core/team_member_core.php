<?php

interface TeamMemberInterface {
    public function getName(): string;
    public function getTitle(): string;
    public function getImageUrl(): string;
    public function getSocialLinks(): array;
}

// Set value and impliment method 
class TeamMember implements TeamMemberInterface {
    private $name;
    private $title;
    private $imageUrl;
    private $socialLinks;

    public function __construct($name, $title, $imageUrl, $socialLinks) {
        $this->name = $name;
        $this->title = $title;
        $this->imageUrl = $imageUrl;
        $this->socialLinks = $socialLinks;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getImageUrl(): string {
        return $this->imageUrl;
    }

    public function getSocialLinks(): array {
        return $this->socialLinks;
    }
}

// output as team interface
class TeamMemberFactory {
    public static function createTeamMember($name, $title, $imageUrl, $socialLinks): TeamMemberInterface {
        return new TeamMember($name, $title, $imageUrl, $socialLinks);
    }
}