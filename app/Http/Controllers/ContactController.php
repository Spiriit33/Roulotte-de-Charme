<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Contact;
use App\ContactMessage;
use App\ContactStatut;
use App\Http\Requests\RequestAnswerContact;
use App\Http\Requests\RequestContact;
use App\Mail\AnswerMail;
use App\Notifications\NotificationContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index () {
        $configuration=Configuration::find(1);
        return view('contact',compact('configuration'));
    }
    public function store (RequestContact $request) {
        $data=$request->validated();
        $name=$data['nom'];
        $email=$data['email'];
        $objet=$data['objet'];

        $contact=new Contact();
        $contact->name=$name;
        $contact->email=$email;
        $contact->objet=$objet;
        $contact->save();

        $message=new ContactMessage();
        $message->contact_id=$contact->id;
        $message->user_id=null;
        $message->message=$data['message'];
        $message->save();

        $status=new ContactStatut();
        $status->contact_id=$contact->id;
        $status->status=1;

        $status->save();

       $config=Configuration::find(1);
       $config->notify(new NotificationContact($contact));
        return redirect()->back()->with('success','Votre message a bien été envoyé!');

    }
    public function manage () {
        $contacts=Contact::OrderBy('created_at','DESC')->with('status')->paginate(10);
        $configuration=Configuration::find(1);
            return view('admin.contact.index',compact('contacts','configuration'));
    }
    public function show ($id) {
        $contacts=DB::table('contacts')
            ->join('contact_messages','contact_messages.contact_id','=','contacts.id')
            ->leftJoin('users','users.id','=','contact_messages.user_id')
            ->select('objet','name','email','contact_messages.created_at','contact_messages.message','contacts.id','username')
            ->get();
        $configuration=Configuration::find(1);
        return view('admin.contact.show',compact('contacts','configuration'));
    }
    public function update ($id,RequestAnswerContact $request) {
        $data=$request->validated();

        $message=new ContactMessage();
        $user_id=Auth::id()!=NULL ? Auth::id() : null;
        $message->user_id=$user_id;
        $message->contact_id=$id;
        $message->message=$data['message'];
        $message->save();

        $status=ContactStatut::find($id);
        $status->update(['status'=>2]);

        $contact=Contact::find($id);
        Mail::to($contact->email,new AnswerMail($contact,$data['message']));
        return redirect()->back()->with('success','Mail envoyé avec succés!');


    }
    public function delete ($id) {
        Contact::find($id)->delete();
        return redirect()->back()->with('success','Supprimé avec succées!');
    }
}
