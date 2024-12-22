<?php
namespace App\View\Components;

use Illuminate\View\Component;

class BookCard extends Component
{
    public $title;
    public $author;
    public $status;

    public function __construct($title, $author, $status)
    {
        $this->title = $title;
        $this->author = $author;
        $this->status = $status;
    }

    public function render()
    {
        return view('components.book-card');
    }
}
