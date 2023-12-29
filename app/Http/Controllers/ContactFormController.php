<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Auth;


class ContactFormController extends Controller
{
    public function ContactFormShow()
    {
        if(Auth::user()->role == "admin" ){
            $contactForms = ContactForm::where('status', 1)->get();
            return view("ContactForm" , ["contactForms" =>  $contactForms]);
        }

        return view("ContactForm");
    }

    public function ContactFormCreate(Request $request){
        $request->validate([
            'title' => 'required',
            'question' => 'required',
        ]);

        $currentUser = Auth::user();

        $contactForm = new ContactForm();

        $contactForm->name = $currentUser->name;
        $contactForm->email = $currentUser->email;
        $contactForm->Titel = $request->title;
        $contactForm->message = $request->question;
        $contactForm->status = 1;

        $contactForm->save();

        return redirect()->route('ContactForm')->with('success', 'Beer has been added!');

    }


    public function ContactFormDelete($id){
        $contactForm = ContactForm::find($id);

        $contactForm->status = 2;
        $contactForm->save();

        return redirect()->route('ContactForm')->with('success', 'Question is succesfuly deleted.');
    }
}
