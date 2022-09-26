<?php
namespace App\Models;

 class Listing{
    public static function all(){
        return [
            [
                "id"=>1,
                "title"=>"ONE",
                "discription"=>"this is that"
            ],
            [
                "id"=>2,
                "title"=>"TWO",
                "discription"=>"this is that"
            ],
            [
                "id"=>3,
                "title"=>"THREE",
                "discription"=>"this is that"
            ]
            ];
    }

    public static function find($id){
        $listings = self::all();

        foreach($listings as $listing){
           if( $listing["id"]== $id) {
                return $listing;
            }
        }
    }
 }