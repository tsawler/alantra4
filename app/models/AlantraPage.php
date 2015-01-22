<?php

class AlantraPage extends \verilion\vcms\Page {

    public function images()
    {
        return $this->hasMany('PageImage', 'page_id', 'id');
    }

}
