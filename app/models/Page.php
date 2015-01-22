<?php

class Page extends \verilion\vcms\Page {

    public function images()
    {
        return $this->hasMany('Page', 'page_id', 'id');
    }

}
