<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use GuzzleHttp;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use \App\Contact;
use Illuminate\Support\Facades\Redirect;
use Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return json_encode($contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->input(), 
            [
                'name' => 'required|max:50',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required|max:1000'            
            ],[
                'name' => 'Name is required and must not exceed 50 characters',
                'email' => 'Email is required and must be valid',
                'subject' => 'Subject is required',
                'message' => 'Message is required and must not exceed 1000 characters'
            ]);

        if ($validation->fails()) {
            return response($validation->errors(), 422);
        }

        $contact = new Contact([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message')           
        ]);
        $contact->save();

        return new JsonResponse('Successfully stored message', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = DB::table('contacts')->where('id', '=', $id)->get();
        return (Response($contact));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
