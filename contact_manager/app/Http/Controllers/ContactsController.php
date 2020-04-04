<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsController extends Controller
{
    private $limit = 5;

    private $rules = [
        'name' => 'required|min:5',
        'company' => 'required',
        'email' => 'required|email',
        'photo' => 'mimes:jpg,jpeg,png,gif,bmp'
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($group_id = $request->get('group_id')) {
            $contacts = Contact::where('group_id', $group_id)->orderBy('updated_at', 'desc')->paginate($this->limit);

        } else {
            $contacts = Contact::orderBy('updated_at', 'desc')->paginate($this->limit);
        }

        return view('contacts.index', compact('contacts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('contacts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $data = $this->getReqest($request);

        Contact::create($data);

        return redirect('contacts')->with('message', 'Contact Saved!');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('contacts.edit', compact('contact'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);

        $data = $this->getRequest($request);

        $contact = Contact::find($id);
        $contact->update($data);

        return redirect('contacts')->with('message', 'Contact Updated!');
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


    private function getRequest(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = $photo->getClientOriginalName();
            $destination = base_path() . '/public/uploads';
            $photo->move($destination, $fileName);

            $data['photo'] = $fileName;
        }

        return $data;
    }

}
