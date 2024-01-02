<?php
 
namespace Modules\Api\Resources;
 
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
 
class BlogsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'categories_id' => $this->categories_id,
            'categories_name' => $this->categories->name,
            'title' => $this->title,
            'slug' => $this->slug,
            'author' => $this->author,
            'source' => $this->source,
            'date_create' => $this->date_create,
            'images' => $this->images,
            'images_note' => $this->images_note,
            'content' => $this->content,
            'blog_type' => $this->blog_type,
            'current_status' => $this->current_status,
            'related_keywords' => $this->related_keywords,
            'is_comment' => $this->is_comment,
            'is_hide_relate_blog' => $this->is_hide_relate_blog,
            'view' => $this->view,
            'like' => $this->like,
            'rating' => $this->rating,
            'order' => $this->order,
            'status' => $this->status,
        ];
    }
}