<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="container">
        <div class="row">
            <div class="card border-primary p-3 mt-3">
                <h3>Yazı Ekleme</h3>
                <hr>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </div>
                @endif --}}
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Başlık Giriniz">
                            <div class="p-2">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="resim" class="form-label">Resim</label>
                            <input type="file" name="resim" id="resim" class="form-control">
                            <div class="p-2">
                                @error('resim')
                                    <small class="text-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">

                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select form-select-md" name="category_id" id="category_id">
                                <option selected>Kategori Seçiniz</option>
                                @forelse ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>

                                @empty
                                @endforelse
                            </select>
                            <div class="p-2">
                                @error('category_id')
                                    <small class="text-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-12">
                            <label for="content" class="form-label">İçerik</label>
                            <textarea type="text" name="content" id="content" class="form-control" style="max-height: 500px" placeholder="içerik Giriniz"></textarea>
                            <div class="p-2">
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 text-right">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form>
    @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#content'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
</x-app-layout>
