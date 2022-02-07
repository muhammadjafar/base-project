<?php

namespace App\Http\Controllers\Backoffice\Example;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\Example\StoreExampleRequest;
use App\Http\Requests\Backoffice\Example\UpdateExampleRequest;
use App\Mail\CreatedExample;
use App\Models\Example\Example;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $example = Example::all();
            return DataTables::of($example)
                ->make(true);
        }
        $data = array(
            'title' => 'Basic Crud Example'
        );
        return view('backoffice.example.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Tambah Data'
        );
        return view('backoffice.example.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExampleRequest $request)
    {
        try {
            DB::transaction(function() use($request){
                $example = new Example();
                $example->fill($request->all());
                $example->image = $request->hasFile('image') ? $request->image->store('image', 'public') : null;
                $example->save();

                Mail::to(auth()->user('web'))->send(new CreatedExample($example));
            });
            return redirect()->route('example.index');
        } catch (Exception $e) {
            report($e);
            return redirect()->back()->withErrors(['error' => 'Terjadi Error'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Example $example)
    {
        $data = array(
            'title'     => 'Lihat Data',
            'example'   => $example
        );
        return view('backoffice.example.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Example $example)
    {
        $data = array(
            'title'     => 'Edit Data',
            'example'   => $example
        );
        return view('backoffice.example.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExampleRequest $request, Example $example)
    {
        try {
            DB::transaction(function() use($request, $example){
    
                $example->fill($request->except('image', 'oldImage'));
                if($request->hasFile('image')) {
                    Storage::disk('public')->delete($request->oldImage);
                    $image = $request->image->store('image', 'public');
                }else{
                    $image = $request->oldImage;
                } 
                $example->image = $image;
                $example->save();
            });
            return redirect()->route('example.index');
        } catch (Exception $e) {
            report($e);
            return redirect()->back()->withErrors(['error' => 'Terjadi Error'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Example $example)
    {
        $example->delete();
        return redirect()->route('example.index');
    }
}
