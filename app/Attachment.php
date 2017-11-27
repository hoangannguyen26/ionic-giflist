<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'tbl_attachments';
    protected $hidden = array('created_by', 'created_at', 'updated_by', 'updated_at', 'posts_id');

    protected $fillable = array (
    	'type',
    	'path'
    );
    public function post()
    {
    	return $this->belongsTo(Post::class, 'post_id', 'id');
    }

	public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
