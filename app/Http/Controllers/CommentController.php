<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function main()
    {
        return view('welcome');
    }

    public function index()
    {
        $data = Comment::all();
        return response()->json($data, 200);
    }
    public function store(Request $request)
    {
        Comment::updateOrCreate(
        [
            'comment' => $request->comment, 
            'name' => $request->name,

        ]
);
        return response()
            ->json(['success' => 'Комментарий сохранен']);
    }
}
