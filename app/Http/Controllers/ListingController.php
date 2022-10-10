<?php

namespace App\Http\Controllers;

use auth;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    //Get and show all listings
    //if there is a tag or search filter it
    //use paginate to list parameter-numbered lists
    public function index(){
        return view('listings.index',[
            "listings" =>Listing::latest()->filter(request(["tag","search"]))->paginate(6)
        ]);
    }   

    //Show single listing
    public function show(Listing $listing){
        return view("listings.show",[
            "listing" => $listing
        ]);
    }

    //Show Create Form
    public function create(){
        return view("listings.create");
    }

    //Store Listing Data
    public function store(Request $request){
        $formFields = $request->validate([
            "title"=>"required",
            "company"=>["required", Rule::unique("listings",
            "company")],
            "location"=>"required",
            "website"=>"required",
            "email"=>["required","email"],
            "tags"=>"required",
            "description"=>"required"
        ]);
        // there was an image uploaded
        if($request->hasFile("file")){
        //we want to add to the formfields, set the path and uploadign at the same time,
        //i want to have logos named folder in the nameapp storage public
        $formFields["logo"] = $request->file("file")->store("logos","public");
    }
        //adds id to user_id field
        $formFields["user_id"]=auth()->id();

        Listing::create($formFields);



        //Flash message
        return redirect("/")->with("message","Listing created succesfully!");
    }

    //Show edit form
    //call modal
    public function edit(Listing $listing){
        return view("listings.edit",["listing" =>$listing]);
    }

    //Update Listing Data
    public function update(Request $request, Listing $listing){
        $formFields = $request->validate([
            "title"=>"required",
            "company"=>["required"], 
            "location"=>"required",
            "website"=>"required",
            "email"=>["required","email"],
            "tags"=>"required",
            "description"=>"required"
        ]);
       
        if($request->hasFile("file")){
        $formFields["logo"] = $request->file("file")->store("logos","public");
        }
        $listing->update($formFields);
        //Flash message
        return back()->with("message","Listing updated succesfully!");
    }

    //Delete Listing
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect("/")->with("message","Lisintg deleted succesfully");
    }

    //Manage Listings
    public function manage(){
        return view("listings.manage",['listings'=>auth()->user()->listings()->get()]);
    }
}
