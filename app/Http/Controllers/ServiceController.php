<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Foundation\Console\ServeCommand;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();


        //menampilkan halaman utama dari halaman banner
        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengembalikan ke halaman banner create
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required', 'description' => 'required', 'image' => 'required|image',
            ]
        );
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $imageName = date('Ymd') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
        }


        Service::create($input);
        return redirect('/service')->with('message', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {

        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate(
            [
                'title' => 'required', 'description' => 'required', 'image' => 'image',
            ]
        );
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $imageName = date('Ymd') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
        } else {
            unset($input['image']);
        }


        $service->update($input);
        return redirect('/service')->with('message', 'Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect('/service')->with('message', 'Data berhasil dihapus');
    }
}
