<?php

class AlantraPage extends \verilion\vcms\Page {

    /**
     * @return mixed
     */
    public function images()
    {
        return $this->hasMany('PageImage', 'page_id', 'id');
    }

}
