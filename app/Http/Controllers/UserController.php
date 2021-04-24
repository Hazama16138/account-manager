<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    private $current_id;

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
                'name' => config('consts.user.KIND_NAME'),
                'href' => config('consts.user.KIND_PATH')
            ],
        ];
        $items = User::getUsersEx()->paginate(3);

        return view('user.index', [
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
                'name' => config('consts.user.KIND_NAME'),
                'href' => config('consts.user.KIND_PATH')
            ],
            [
                'name' => '新規',
                'href' => '/kind/create'
            ],
        ];
        $this->current_id = $_GET['id'];
        $data = DB::table('users')
            ->leftjoin('users_ex', 'users.id', '=', 'users_ex.user_id')
            ->where('users.id', $this->current_id)
            ->first();

        return view('user.create', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
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
            'user_id' => 'required',
            'auth' => 'required | max:1 | max:99',
        ];
        $this->validate($request, $validate_rule);

        // プロフィール画像の有無で処理を分岐する
        if ($request->image) {
            $path = $request->file('image')->store('public/users');
            $image_path = basename($path);
        } else {
            $image_path = "";
        }

        // 追加する値をまとめる
        $param = [
            'user_id' => $request->user_id,
            'image'   => $image_path,
            'auth'    => $request->auth,
        ];

        // 登録処理を実行する
        DB::table('users_ex')->insert($param);

        return redirect('/user');
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
                'name' => config('consts.user.KIND_NAME'),
                'href' => config('consts.user.KIND_PATH')
            ],
            [
                'name' => '削除',
                'href' => '/user/show/' . $id
            ],
        ];

        $data = DB::table('users')
            ->leftjoin('users_ex', 'users.id', '=', 'users_ex.user_id')
            ->where('users.id', $id)
            ->first();

        return view('user.delete', [
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
                'name' => config('consts.user.KIND_NAME'),
                'href' => config('consts.user.KIND_PATH')
            ],
            [
                'name' => '編集',
                'href' => '/kind/edit'
            ],
        ];
        $this->current_id = $id;

        $data = DB::table('users')
            ->leftjoin('users_ex', 'users.id', '=', 'users_ex.user_id')
            ->where('users.id', $id)
            ->first();

        return view('user.edit', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
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
            'auth' => 'required | max:1 | max:99',
        ];
        $this->validate($request, $validate_rule);

        // プロフィール画像の有無で処理を分岐する
        if (!empty($request->image)) {
            $path = $request->file('image')->store('public/users');
            $image_path = basename($path);
        } else {
            $image_path = "";
        }

        // 追加する値をまとめる
        $param = [
            'image'   => $image_path,
            'auth'    => $request->auth,
        ];

        // 更新処理を実行する
        DB::table('users_ex')
            ->where('user_id', $id)
            ->update($param);

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            // ユーザーを削除
            DB::table('users')
                ->where('id', $id)
                ->delete();

            // ユーザー情報を削除
            DB::table('users_ex')
                ->where('user_id', $id)
                ->delete();
        }, 3);

        return redirect('/user');
    }
}
