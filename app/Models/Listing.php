<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        //Ha vannak tagek, ha nem hamis menjen tovabb
        if($filters["tag"] ?? false){
        //$filers=laravel vagy backedn vayg vue, az lesz ott amelyikre rányomtunk
        //$query->sql query in databse
        //request("tag")->url /?tag=$filters
            $query->where("tags","like","%".request("tag")."%");
        }

        if($filters["search"] ?? false){
                $query->where("title","like","%".request("search")."%")
                ->orWhere("description","like","%".request("search")."%")
                ->orWhere("tags","like","%".request("search")."%");
            }
    }
}
