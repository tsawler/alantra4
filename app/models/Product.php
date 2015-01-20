<?php

class Product extends Eloquent {

    public static $rules = array();

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    public function category()
    {
        return $this->hasOne('ProductCategory', 'id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

}
