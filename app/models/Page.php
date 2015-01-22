<?php

class Page extends \verilion\vcms\Page {

    public function images()
    {
        return $this->hasMany('PageImage', 'page_id', 'id');
    }

}
