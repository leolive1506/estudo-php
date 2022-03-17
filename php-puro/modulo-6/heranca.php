<?php 
class Post {
    private int $id;
    private int $likes = 0;

    public function getId() {
        return $this->id;
    }

    protected function setId($id) {
        $this->id = $id;
    }

    public function getLikes() {
        return $this->likes;
    }

    public function setLikes($num) {
        $this->likes = $num;
    }
}

class Foto extends Post {
    private $url;
    public function __construct($id) {
        // metodo que tem no post
        $this->setId($id);
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        return $this->url;
    }
}

$foto = new Foto(20);
$foto->setLikes(12);
echo "Foto: #{$foto->getId()} - {$foto->getLikes()} likes";