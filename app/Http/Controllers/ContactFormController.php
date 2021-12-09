<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//保存する為にモデルを呼び出す
use App\Models\ContactForm;

use Illuminate\Support\Facades\DB;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Eloquent
        //$contacts = ContactForm::all();

        //クエリビルダ
        $contacts = DB::table("contact_forms")
        ->select("id", "your_name")
        ->get();

        //dd($contacts);

        //変数をビューに持っていく
        return view('contact.index', compact("contacts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contact.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new ContactForm;

        $contact->your_name = $request->input("your_name");
        $contact->title = $request->input("title");
        $contact->email = $request->input("email");
        $contact->url = $request->input("url");
        $contact->gender = $request->input("gender");
        $contact->age = $request->input("age");
        $contact->contact = $request->input("contact");

        $contact->save();

        return redirect("contact/index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
