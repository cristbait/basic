<?php namespace blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public function Post()
    {
        $this->enabled=1;
        $this->slug='';

    }
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('blog\User');
    }

}
