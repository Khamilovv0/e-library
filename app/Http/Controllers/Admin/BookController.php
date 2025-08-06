<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Edition;
use App\Models\Language;
use App\Models\Literature;
use App\Models\Place;
use App\Models\Publishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function book_add(){
        $city = Place::get();
        $publishing = Publishing::get();
        $edit = Edition::get();
        $lang = Language::get();
        $literature = Literature::get();
        $author = Author::get();

        return view('backend.books.book_add',compact('city','edit','lang','literature','author', 'publishing'));
    }

    public function book_store(Request $request){
        $add = new Book();

        $add->name_book = $request->input('name_book');
        $add->annotation_book = $request->input('annotation_book');
        $add->place_publication = $request->input('place_publication');
        $add->publishing_year = $request->input('publishing_year');
        $add->pages_number = $request->input('pages_number');
        $add->language = $request->input('language');
        $add->isbn = $request->input('isbn');
        $add->udc_index = $request->input('udc_index');
        $add->bbk_index = $request->input('bbk_index');
        $add->type_literature = $request->input('type_literature');
        $add->col_copy = $request->input('col_copy');
        $add->authors_sign = $request->input('authors_sign');
        $add->printed = $request->input('printed');
        $add->electronic = $request->input('electronic');
        $add->inv_number = $request->input('inv_number');
        $add->price = $request->input('price');
        $add->status = $request->input('status');
        $add->access = $request->input('access');
        $add->uploaded_user = $request->input('uploaded_user');
        $add->edited = $request->input('edited');
        $add->file_path = $request->input('file_path');

        $add->save();

        return redirect()->back()->with('success', 'Книга успешно добавлена');
    }

    public function book_list(){

        $list = DB::table('el_lists_book')
            ->leftJoin('languages', 'el_lists_book.language', '=', 'languages.id')
            ->leftJoin('literatures', 'el_lists_book.type_literature', '=', 'literatures.id')
            ->leftJoin('authors as a', 'el_lists_book.id_book', '=', 'a.id_book')
            ->select(
                'el_lists_book.id_book',
                'el_lists_book.name_book',
                'el_lists_book.annotation_book',
                'el_lists_book.place_publication',
                'el_lists_book.publishing_house',
                'el_lists_book.publishing_year',
                'el_lists_book.pages_number',
                'el_lists_book.isbn',
                'el_lists_book.udc_index',
                'el_lists_book.bbk_index',
                'el_lists_book.col_copy',
                'el_lists_book.printed',
                'el_lists_book.electronic',
                'el_lists_book.file_path',
                'el_lists_book.uploaded_user',
                'languages.name as language_name',
                'literatures.name as literature_name',
                DB::raw("GROUP_CONCAT(
            CONCAT(
                a.author_lname, ' ',
                SUBSTRING(a.author_fname, 1, 1), '.',
                IF(a.author_mname != '', CONCAT(SUBSTRING(a.author_mname, 1, 1), '.'), '')
            )
            ORDER BY a.author_lname ASC
            SEPARATOR ',<br>'
        ) as authors_initials")
            )
            ->where('el_lists_book.status', 3)
            ->groupBy(
                'el_lists_book.id_book',
                'el_lists_book.name_book',
                'el_lists_book.annotation_book',
                'el_lists_book.place_publication',
                'el_lists_book.publishing_house',
                'el_lists_book.publishing_year',
                'el_lists_book.pages_number',
                'el_lists_book.isbn',
                'el_lists_book.udc_index',
                'el_lists_book.bbk_index',
                'el_lists_book.col_copy',
                'el_lists_book.printed',
                'el_lists_book.electronic',
                'el_lists_book.file_path',
                'el_lists_book.uploaded_user',
                'languages.name',
                'literatures.name'
            )
            ->get();

        return view('backend.books.book_list', compact('list'));
    }


}
