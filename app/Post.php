<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'tbl_posts';
    protected $hidden = array('created_by', 'created_at', 'updated_by', 'updated_at');
    protected $fillable = array (
        'township_id',
    	'title',
    	'content'
    );

    public function attachments()
    {
    	return $this->hasMany(Attachment::class, 'posts_id', 'id');
    }

	public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($post) {
            foreach($post->attachments()->get() as $attachment)
            {
                $filename = public_path().'/uploads'.$attachment->path;
                if (file_exists($filename))
                    unlink($filename);
            }
            $post->attachments()->delete();
        });
    }
}
