<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use  Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    //show all listing
    public function index() {
              return view('listings.index', [
            'listings' => Listing::latest()->filter
            (request(['tag', 'search']))->paginate(4)
          ]);
    }

    //show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
     ]);
    }

    //show create form
    public function create(){
      return view('listings.create');
    }

    //store listing Data
    public function store(Request $request) {
    $formsFields = $request->validate([
        'title' => 'required',
        'company' => ['required', Rule::unique('listings',
        'company')],
        'location' => 'required', 
        'website' => 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description' => 'required'
     ]);
         
         if($request->hasFile('logo')){
          $formsFields['logo'] = $request->file('logo')->store('logos', 'public');
         }

$formsFields['user_id'] = auth()->id();


       Listing::create($formsFields);

       return redirect('/')->with('message', 'Job created
        successfully!');
        }
          
        //show edit form
        public function edit(Listing $listing) {
         return view('listings.edit', ['listing' => $listing]);
     }

       //update listing Data
    public function update(Request $request, Listing $listing) {

      //make sure logged in user is owner
      if($listing->user_id != auth()->id()) {
        abort(404, 'Unauthorized Action');
      }

      $formsFields = $request->validate([
          'title' => 'required',
          'company' => ['required'],
          'location' => 'required', 
          'website' => 'required',
          'email' => ['required', 'email'],
          'tags' => 'required',
          'description' => 'required'
       ]);  
           
           if($request->hasFile('logo')){
            $formsFields['logo'] = $request->file('logo')->store('logos', 'public');
           }
   
  
  
         $listing->update($formsFields);
  
         return back()->with('message', 'Job updated
          successfully!');
          }

          //Delete listing
           public function destroy(Listing $listing) {

            //make sure logged in user is owner
      if($listing->user_id != auth()->id()) {
        abort(404, 'Unauthorized Action');
      }
            $listing->delete();
            return redirect('/')->with('message', 'Job deleted succefully');
        }

        // //manage function
        // public function manage() {
        //   return view('listings.manage', ['listings' => Listing::auth()->user()->listing()->get()]);
        // }
            
    }
 