<?php

namespace App\Http\Controllers;

use App\Models\PhoneBook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    public function index(){

        $contacts = PhoneBook::all();
        return view('Phonebook',compact('contacts'));
    }

    public function create(){

        $this->validate(request(),[
           'name' => 'required',
            'email'=> 'required|unique:phone_books,email',
            'contact' => 'required|min:6',
            'cont_image'=>'required|image|max:6000',
        ]);

        $imgExt = \request()->file('cont_image')->extension();
        $imgName = "photo".uniqid()."_".time().'.'.$imgExt;
        \request()->file('cont_image')->move('images',$imgName);

        PhoneBook::create ([
            'Name' => \request('name'),
            'Email' => \request('email'),
            'Number' => \request('contact'),
            'Image' => $imgName,
        ]);

        return redirect()->back()->with('success','contact added');


    }

    public function showEdit($id){
        $contact = PhoneBook::find($id) ;
        return view('Edit', compact('contact'));
    }

    public function edit($id){
        $this->validate(request(),[
            'name' => 'required|min:6',
            'email'=> 'required|email',
            'contact' => 'required|min:6',
        ]);
        $contact = PhoneBook::find($id) ;
        $contact->update([
            'Name' => \request('name'),
            'Email' => \request('email'),
            'Number' => \request('contact'),
        ]);
        return redirect(route('contactList'));
    }
    public function delete($id){
        PhoneBook::findorFail($id)->delete();
        return redirect(route('contactList'));
    }
}
