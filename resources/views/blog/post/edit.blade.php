<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="card border-primary p-3 mt-3">
                <h3>Yazıyı Güncelleme</h3>
                <hr>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </div>
                @endif --}}
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}"
                                id="title" class="form-control" placeholder="Başlık Giriniz">
                            <div class="p-2">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="resim" class="form-label">Resim</label>
                            <input type="file" name="resim" id="resim" class="form-control">
                            <div class="p-2">
                                @error('resim')
                                    <small class="text-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <img src='/images/{{ $post->image->url }}' />
                        </div>

                        <div class="col-md-12">

                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select form-select-md" name="category_id" id="category_id">
                                <option value="">Kategori Seçiniz</option>
                                @forelse ($category as $item)
                                <option value="{{ $item->id }}"   @selected(old('category_id', $post->category_id) == $item->id) >{{ $item->title }}</option>

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
                            <textarea type="text" name="content" id="content" class="form-control" style="max-height: 500px" placeholder="içerik Giriniz">
                                {{ old('content', $post->content) }}
                            </textarea>
                            <div class="p-2">
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                    type="checkbox" id="status_{{ $item->id }}" {{ $item->type == 1 ? 'checked' : '' }}
                                    onchange="document.getElementById('statu_{{ $item->id }}').submit();">
                                <label class="form-check-label" for="status_{{ $item->id }}">
                                    {{ $item->type == 1 ? 'Aktif' : 'Pasif' }}
                                </label>
                                <form id="statu_{{ $item->id }}" method="POST"
                                    action="{{ route('post.update', $item->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="type" value="{{ $item->type == 1 ? 0 : 1 }}" class="d-none">
                                </form>
                            </div>
                        </td>
                        <div class="col-md-12 mt-3 text-right">
                            <button type="submit" class="btn btn-success">Güncelle</button>
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
