<?php

namespace App\Models;

use App\Http\Controllers\Admint\Category\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;

    protected $guarded = [] ;

   public function parent(){
       return $this->belongsTo(Category::class , 'parent_id')->withDefault(['name' => '-']);
   }

}
