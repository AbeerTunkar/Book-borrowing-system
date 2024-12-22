<div class="d-flex justify-content-around align-items-center">
    <a href="{{route('books.edit', $book->id)}}" class="btn btn-link-secondary  mx-3" title="تعديل">
        <i class="ti ti-edit f-20 fs-2"></i>
    </a>
    <form action="{{route('books.destroy', $book->id)}}" method="POST">
        <button type="submit" class="btn btn-link-secondary  mx-3" title="حذف">
            <i class="fas fa-trash-alt text-danger fs-2"></i>
        </button>
        @csrf
        @method('DELETE')
    </form>
</div>