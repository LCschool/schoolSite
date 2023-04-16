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

?>
