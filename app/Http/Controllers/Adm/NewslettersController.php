<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewslettersRequest;
use App\newsletter;

class NewslettersController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::orderBy('email', 'ASC')->get();
        return view('adm.newsletters.index', compact('newsletters'));
    }

    public function create()
    {
        return view('adm.newsletters.create');
    }

    public function store(NewslettersRequest $request)
    {
        dd("si");
        $newsletter        = new Newsletter();
        $newsletter->email = $request->email;

        $newsletter->save();
        return view('pages.home');
    }

    public function edit($id)
    {
        $newsletter = Newsletter::find($id);
        return view('adm.newsletters.edit', compact('newsletter'));
    }

    public function update(NewslettersRequest $request, $id)
    {
        $newsletter =
        Newsletter::find($id);
        $newsletter->email = $request->email;

        $newsletter->save();
        return redirect()->route('newsletters.index');
    }

    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        return redirect()->route('newsletters.index');
    }
}
