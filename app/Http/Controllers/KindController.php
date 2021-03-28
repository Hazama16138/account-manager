<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KindController extends Controller
{
    public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }

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
        $items = DB::table('kind')->paginate(5);
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
        // バリデーション
        $validate_rule = [
            'name' => 'required | max:20',
            'kana' => 'required | max:50',
        ];
        $this->validate($request, $validate_rule);
        $param = [
            'name' => $request->name,
            'kana' => $request->kana
        ];
        DB::table('kind')->insert($param);
        return redirect('/kind');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breadcrumb = [
            [
                'name' => config('consts.kind.KIND_NAME'),
                'href' => config('consts.kind.KIND_PATH')
            ],
            [
                'name' => '削除',
                'href' => '/kind/show/' . $id
            ],
        ];

        $data = DB::table('kind')
            ->where('kind_id', $id)
            ->first();

        return view('kind.delete', [
            'breadcrumb' => $breadcrumb,
            'data'       => $data,
        ]);
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
        return view('kind.edit', [
            'breadcrumb' => $breadcrumb,
            'data'       => $data,
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
        // バリデーション
        $validate_rule = [
            'name' => 'required | max:20',
            'kana' => 'required | max:50',
        ];
        $this->validate($request, $validate_rule);

        $param = [
            'name'        => $request->name,
            'kana'        => $request->kana,
            'update_date' => date('Y-m-d H:i:s'),
        ];
        DB::table('kind')
            ->where('kind_id', $id)
            ->update($param);

        return redirect('/kind');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kind')
            ->where('kind_id', $id)
            ->delete();

        return redirect('/kind');
    }
}
