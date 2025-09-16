<?php

class TriangleGenerator {
    private $height;
    private $patternType;

    // Setter for height and pattern type
    public function setHeight($height) {
        $this->height = $height;
    }
    
    public function setPatternType($type) {
        $this->patternType = $type;
    }

    // Getter to get the generated pattern string
    public function getPattern() {
        if ($this->patternType === 'pyramid') {
            return $this->generatePyramid();
        } elseif ($this->patternType === 'left') {
            return $this->generateLeftAligned();
        } elseif ($this->patternType === 'right') {
            return $this->generateRightAligned();
        } else {
            return "Invalid pattern type.";
        }
    }

    // Method to generate the full pyramid pattern
    private function generatePyramid() {
        $output = '';
        for ($i = 1; $i <= $this->height; $i++) {
            // Add spaces for alignment
            for ($j = 1; $j <= $this->height - $i; $j++) {
                $output .= ' ';
            }
            // Add stars
            for ($k = 1; $k <= (2 * $i - 1); $k++) {
                $output .= '*';
            }
            $output .= "<br>";
        }
        return $output;
    }

    // Method to generate the left-aligned triangle pattern
    private function generateLeftAligned() {
        $output = '';
        for ($i = 1; $i <= $this->height; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                $output .= '*';
            }
            $output .= "<br>";
        }
        return $output;
    }

    // Method to generate the right-aligned triangle pattern
    private function generateRightAligned() {
        $output = '';
        for ($i = 1; $i <= $this->height; $i++) {
            // Add spaces for alignment
            for ($j = 1; $j <= $this->height - $i; $j++) {
                $output .= '&nbsp;&nbsp;'; // Using &nbsp; for consistent spacing
            }
            // Add stars
            for ($k = 1; $k <= $i; $k++) {
                $output .= '*&nbsp;&nbsp;'; // Adding &nbsp; for consistent star spacing
            }
            $output .= "<br>";
        }
        return $output;
    }
}

// ===================================
// Main script to generate and display the patterns
// ===================================

$triangles = [
    ['type' => 'pyramid', 'height' => 5],
    ['type' => 'left', 'height' => 5],
    ['type' => 'right', 'height' => 5]
];

echo "<pre>"; // Use <pre> tag to preserve whitespace for cleaner output

// Loop through the array of triangle configurations
foreach ($triangles as $triangleData) {
    // Create a new instance of the class
    $generator = new TriangleGenerator();

    // Use setter methods to configure the triangle
    $generator->setHeight($triangleData['height']);
    $generator->setPatternType($triangleData['type']);

    // Use the getter method to retrieve and print the pattern
    echo "Pattern: " . ucfirst($triangleData['type']) . "<br>";
    echo $generator->getPattern();
    echo "<br>------------------------<br>";
}

echo "</pre>";

?>