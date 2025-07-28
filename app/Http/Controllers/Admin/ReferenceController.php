<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function author()
    {
        $lists = Author::get();  // Получаем всех авторов
        return view('backend.references.add_and_list', compact('lists'));  // Передаем переменную 'authors'
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = new Author();
        $author->name = $request->input('name');
        $author->save();

        // Возвращаем данные нового автора в формате JSON
        return redirect()->back()->with('success', 'Автор успешно создан');
    }


    public function delete($id)
    {
        $author = Author::findOrFail($id); // Получаем одного автора по ID
        $author->delete(); // Удаляем автора

        return redirect()->back()->with('info', 'Автор успешно удален');
    }

}
