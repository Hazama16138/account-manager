<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = [
            [
                'name' => config('consts.kind.KIND_NAME'),
                'href' => config('consts.kind.KIND_PATH')
            ],
        ];
        $items = DB::select('SELECT * FROM kind');
        return view('kind.index', [
            'breadcrumb' => $breadcrumb,
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = [
            [
                'name' => config('consts.kind.KIND_NAME'),
                'href' => config('consts.kind.KIND_PATH')
            ],
            [
                'name' => '新規登録',
                'href' => '/kind/create'
            ],
        ];
        return view('kind.create', [
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = [
            'name' => $request->name,
            'kana' => $request->kana
        ];
        DB::table('kind')->insert($param);
        return redirect('/kind/create');
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
        $breadcrumb = [
            [
                'name' => config('consts.kind.KIND_NAME'),
                'href' => config('consts.kind.KIND_PATH')
            ],
            [
                'name' => '編集',
                'href' => '/kind/edit'
            ],
        ];
        $data = DB::table('kind')->where('kind_id', $id)->first();
        foreach ($data as $key => $value) {
            $items[$key] = $value;
        }
        return view('kind.edit', [
            'breadcrumb' => $breadcrumb,
            'item'         => $items,
        ]);
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
