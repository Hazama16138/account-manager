<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
                'name' => config('consts.category.CATEGORY_NAME'),
                'href' => config('consts.category.CATEGORY_PATH')
            ],
        ];
        $items = DB::select('SELECT * FROM category');

        foreach ($items as $item) {
            var_dump($item);
        }

        return view('category.index', [
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
                'name' => config('consts.category.CATEGORY_NAME'),
                'href' => config('consts.category.CATEGORY_PATH')
            ],
            [
                'name' => '新規登録',
                'href' => '/category/create'
            ],
        ];
        return view('category.create', [
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
            // 'category_id' => '',
        ];
        $this->validate($request, $validate_rule);
        $param = [
            'name' => $request->name,
            'category_id' => $request->category_id
        ];
        DB::table('category')->insert($param);
        return redirect('/category');
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
