<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\perfectName;
use Illuminate\Http\Request;

class perfectNamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $perfectnames = perfectName::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $perfectnames = perfectName::latest()->paginate($perPage);
        }

        return view('perfect-names.index', compact('perfectnames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('perfect-names.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        perfectName::create($requestData);

        return redirect('perfect-names')->with('flash_message', 'perfectName added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $perfectname = perfectName::findOrFail($id);

        return view('perfect-names.show', compact('perfectname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $perfectname = perfectName::findOrFail($id);

        return view('perfect-names.edit', compact('perfectname'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $perfectname = perfectName::findOrFail($id);
        $perfectname->update($requestData);

        return redirect('perfect-names')->with('flash_message', 'perfectName updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        perfectName::destroy($id);

        return redirect('perfect-names')->with('flash_message', 'perfectName deleted!');
    }
}
