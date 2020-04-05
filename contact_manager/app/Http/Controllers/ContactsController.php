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

    private $upload_dir = 'public/uploads';


    public function __construct()
    {
        $this->middleware('auth');

        $this->upload_dir = base_path() . '/' . $this->upload_dir;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $contacts = Contact::where(function ($query) use ($request) {
            if ($group_id = ($request->get('group_id'))) {
                $query->where('group_id', $group_id);
            }

            if (($term = $request->get('term'))) {
                $keywords = '%' . $term . '%';

                $query->orWhere('name', 'LIKE', $keywords);
                $query->orWhere('company', 'LIKE', $keywords);
                $query->orWhere('email', 'LIKE', $keywords);
            }
        })
            ->orderBy('updated_at', 'desc')
            ->paginate($this->limit);

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

        $data = $this->getRequest($request);

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

        $contact = Contact::find($id);

        $oldPhoto = $contact->photo;

        $data = $this->getRequest($request);

        $contact->update($data);

        if ($oldPhoto !== $contact->photo) {
            $this->removePhoto($oldPhoto);
        }

        return redirect('contacts')->with('message', 'Contact Updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete();
        $this->removePhoto($contact->photo);

        return redirect('contacts')->with('message', 'Contact Deleted!');
    }


    private function getRequest(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = $photo->getClientOriginalName();
            $destination = $this->upload_dir;
            $photo->move($destination, $fileName);

            $data['photo'] = $fileName;
        }

        return $data;
    }


    private function removePhoto($photo)
    {
        if (!empty($photo)) {
            $file_path = $this->upload_dir . '/' . $photo;

            if (file_exists($file_path))
                 unlink($file_path);
        }
    }


    public function autocomplete(Request $request)
    {
        if ($request->ajax()) {
            return Contact::select(['id', 'name as value'])->where(function ($query) use ($request) {
                if ($group_id = ($request->get('group_id'))) {
                    $query->where('group_id', $group_id);
                }

                if (($term = $request->get('term'))) {
                    $keywords = '%' . $term . '%';

                    $query->orWhere('name', 'LIKE', $keywords);
                    $query->orWhere('company', 'LIKE', $keywords);
                    $query->orWhere('email', 'LIKE', $keywords);
                }
            })
                ->orderBy('name', 'asc')
                ->take(5)
                ->get();
        }
    }

}
