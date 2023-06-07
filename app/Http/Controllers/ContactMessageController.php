<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Http\Requests\StoreContactMessageRequest;
use App\Http\Requests\UpdateContactMessageRequest;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact.contact');
    }

    public function feedbackIndex()
    {
        $contactMessages = ContactMessage::all();
        return view('contact.feedback', ["contacts" => $contactMessages]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactMessageRequest $request)
    {
        ContactMessage::create($request->all());

        return redirect()->route('home')->banner('Bedankt voor uw bericht, zo nodig, nemen wij zo snel mogelijk contact met u op.');        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contactMessages = ContactMessage::find($id);
        return view('contact.show', ["contact" => $contactMessages]);
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactMessageRequest $request, ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        //
    }
}
