<?php

class Root extends Controller{

	private $stories = [];
	private $selectedStory;
	private $path;

	public function __construct(){
		$this->path = "static/stories";
        $this->stories = scandir($this->path);
        $sorted_stories = [];

    	foreach ($this->stories as $story) {
        	if (strpos($story, "json") !== false) {
    			$sorted_stories[$story] = filemtime($this->path.DIRECTORY_SEPARATOR.$story);
    		}
    	}
    	arsort($sorted_stories);
    	$this->stories = array_keys($sorted_stories);
    	$this->selectedStory = file_get_contents($this->path.DIRECTORY_SEPARATOR.$this->stories[0]);
	}

	public function getFirstStory(){
        $return = "";
        $content = json_decode($this->selectedStory);
        $return .= "<h2>$content->title</h2><div class='mffooter'>$content->mffooter</div><div class='storybody'>";
        $paragraphs = explode("\n",$content->body);
        foreach ($paragraphs as $paragraph) {
            $return .= "<p>".$paragraph."</p>";
        }
        return $return."</div>";
	}

	public function otherStories(){
        $return = "";
		for($i=1; $i < 4; $i++){
            if (isset($this->stories[$i])) {
                $content = file_get_contents($this->path.DIRECTORY_SEPARATOR.$this->stories[$i]);
                $content = json_decode($content);
                $return .= "<div class='rand'>
                                <h3>$content->title</h3>
                                <div class='caption'>
                                $content->mffooter
                                </div>
                                <div class='summary'>
                                </div>
                            </div>";
            }
        }
        return $return;
	}
}
