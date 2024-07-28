<?php

class ProjectData {
    private static ?ProjectData $instance = null;
    private array $projects = [];

    // Private constructor to prevent direct instantiation
    private function __construct() {
        $this->loadProjects();
    }

    // Prevent clone
    private function __clone() {}

    // Prevent unserialize
    public function __wakeup() {}

    // Get the single instance of the class
    public static function getInstance(): ProjectData {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Method to load projects from the .ini file
    private function loadProjects(): void {
        $iniFile = 'ini/project.ini';
        if (!file_exists($iniFile)) {
            throw new \RuntimeException("Configuration file not found: $iniFile");
        }

        $iniArray = parse_ini_file($iniFile, true);
        if ($iniArray === false) {
            throw new \RuntimeException("Failed to parse INI file: $iniFile");
        }

        foreach ($iniArray as $key => $project) {
            if (strpos($key, 'project_') === 0) {
                $this->projects[] = $project;
            }
        }
    }

    // Method to get all projects
    public function getProjects(): array {
        return $this->projects;
    }

    // Method to get a project by title
    public function getProjectByTitle(string $title): ?array {
        foreach ($this->projects as $project) {
            if ($project['title'] === $title) {
                return $project;
            }
        }
        return null;
    }

    // Method to search projects by keyword
    public function searchProjects(string $keyword): array {
        $results = [];
        foreach ($this->projects as $project) {
            if (stripos($project['title'], $keyword) !== false || stripos($project['summary'], $keyword) !== false) {
                $results[] = $project;
            }
        }
        return $results;
    }

    // Method to get a random selection of projects
    public function getRandomProjects(int $count = 5): array {
        $total = count($this->projects);
        if ($total <= $count) {
            return $this->projects; // Return all if there are fewer or equal to the count
        }
        
        $keys = array_rand($this->projects, $count);
        $randomProjects = [];

        // Handle single key scenario
        if ($count === 1) {
            $randomProjects[] = $this->projects[$keys];
        } else {
            foreach ($keys as $key) {
                $randomProjects[] = $this->projects[$key];
            }
        }

        return $randomProjects;
    }
}



// Get the singleton instance
// $projectData = ProjectData::getInstance();


