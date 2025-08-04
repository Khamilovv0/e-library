<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Edition;
use App\Models\Language;
use App\Models\Literature;
use App\Models\Place;
use App\Models\Publishing;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function author()
    {
        $lists = Author::get();  // Получаем всех авторов
        return view('backend.references.author', compact('lists'));  // Передаем переменную 'authors'
    }

    public function add(Request $request)
    {
        $firstname = $request->input('firstname'); // Имя
        $lastname = $request->input('lastname');   // Фамилия
        $patronymic = $request->input('patronymic');

        $author = new Author();
        $author->firstname = $firstname;
        $author->lastname = $lastname;
        $author->patronymic = $patronymic;

        $short = $lastname;
        if (!empty($firstname)) {
            $short .= ' ' . mb_substr($firstname, 0, 1, 'UTF-8') . '.';
        }

        if (!empty($patronymic)) {
            $short .= mb_substr($patronymic, 0, 1, 'UTF-8') . '.';
        }

        $author->short_name = $short;

        $author->save();

        // Возвращаем данные нового автора в формате JSON
        return redirect()->back()->with('success', 'Автор успешно добавлен');
    }


    public function delete($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->back()->with('info', 'Автор успешно удален');
    }
    public function place()
    {
        $lists = Place::get();  // Получаем всех авторов
        return view('backend.references.place', compact('lists'));  // Передаем переменную 'authors'
    }

    public function add_place(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = new Place();
        $author->name = $request->input('name');
        $author->save();

        // Возвращаем данные нового автора в формате JSON
        return redirect()->back()->with('success', 'Место издания успешно добавлено');
    }


    public function delete_place($id)
    {
        $author = Place::findOrFail($id);
        $author->delete();

        return redirect()->back()->with('info', 'Место издания успешно удален');
    }
    public function publishing()
    {
        $lists = Publishing::get();  // Получаем всех авторов
        return view('backend.references.publishing', compact('lists'));  // Передаем переменную 'authors'
    }

    public function add_publishing(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = new Publishing();
        $author->name = $request->input('name');
        $author->save();

        // Возвращаем данные нового автора в формате JSON
        return redirect()->back()->with('success', 'Издательство успешно добавлено');
    }


    public function delete_publishing($id)
    {
        $author = Publishing::findOrFail($id);
        $author->delete();

        return redirect()->back()->with('info', 'Издательство успешно удалено');
    }

    public function literature()
    {
        $lists = Literature::get();  // Получаем всех авторов
        return view('backend.references.literature', compact('lists'));  // Передаем переменную 'authors'
    }

    public function add_literature(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = new Literature();
        $author->name = $request->input('name');
        $author->save();

        // Возвращаем данные нового автора в формате JSON
        return redirect()->back()->with('success', 'Литература успешно добавлена');
    }


    public function delete_literature($id)
    {
        $author = Literature::findOrFail($id);
        $author->delete();

        return redirect()->back()->with('info', 'Литература успешно удалена');
    }

    public function edition()
    {
        $lists = Edition::get();  // Получаем всех авторов
        return view('backend.references.edition', compact('lists'));  // Передаем переменную 'authors'
    }

    public function add_edition(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = new Edition();
        $author->name = $request->input('name');
        $author->save();

        // Возвращаем данные нового автора в формате JSON
        return redirect()->back()->with('success', 'Литература успешно добавлена');
    }


    public function delete_edition($id)
    {
        $author = Edition::findOrFail($id);
        $author->delete();

        return redirect()->back()->with('info', 'Литература успешно удалена');
    }

    public function language()
    {
        $lists = Language::get();  // Получаем всех авторов
        return view('backend.references.language', compact('lists'));  // Передаем переменную 'authors'
    }

    public function add_language(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = new Language();
        $author->name = $request->input('name');
        $author->save();

        // Возвращаем данные нового автора в формате JSON
        return redirect()->back()->with('success', 'Литература успешно добавлена');
    }


    public function delete_language($id)
    {
        $author = Language::findOrFail($id);
        $author->delete();

        return redirect()->back()->with('info', 'Литература успешно удалена');
    }

}
