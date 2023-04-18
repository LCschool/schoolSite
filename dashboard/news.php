<?php

class news {
    public $image;
    public $headline;
    public $author;
    public $text;

    public function __construct($author, $image, $text, $headline){
        $this->text = $text;
        $this->image = $image;
        $this->headline = $headline;
        $this->author = $author;
    }
    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }


}
    class articleSet{
        public $articles;
        public $current;
        public $length;
        public $header;
        public function __construct(){
            $data = file_get_contents("./news.byt",FILE_USE_INCLUDE_PATH);
            $this->articles = unserialize($data);
            $this->length = count( $this->articles);
            $this->current=0;
        }
        public function next(): int
        {
                $this->current++;
            return $this->current;
        }
        function getCurrentImage(): string
        {
            return($this->articles[$this->current]->image);
        }
        function getCurrentAuthor(){
            return($this->articles[$this->current]->author);
        }
        function getCurrentHeader(){
            return($this->articles[$this->current]->headline);
        }
        function getCurrentText(){
            return($this->articles[$this->current]->text);
        }
    }


?>
