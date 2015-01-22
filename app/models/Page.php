<?php

class Page extends \verilion\vcms\Page {

    public function images()
    {
        return $this->hasMany('PageImage', 'id', 'page_id');
    }

}
