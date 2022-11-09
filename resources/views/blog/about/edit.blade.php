<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="card border-primary p-3 mt-3">
                <h3>Hakkımda Güncelleme</h3>
                <hr>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </div>
                @endif --}}
                <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" name="title" value="{{ old('title', $about->title) }}"
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
                            <img src='/images/{{ $about->image->url }}' />
                        </div>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                    type="checkbox" id="status_{{ $about->id }}" {{ $about->type == 1 ? 'checked' : '' }}
                                    onchange="document.getElementById('statu_{{ $about->id }}').submit();">
                                <label class="form-check-label" for="status_{{ $about->id }}">
                                    {{ $about->type == 1 ? 'Aktif' : 'Pasif' }}
                                </label>
                                <form id="statu_{{ $about->id }}" method="POST"
                                    action="{{ route('about.update', $about->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="type" value="{{ $about->type == 1 ? 0 : 1 }}" class="d-none">
                                </form>
                            </div>
                        </td>
                      
                        <div class="col-md-12">
                            <label for="desc" class="form-label">Açıklama</label>
                            <textarea type="text" name="desc" id="desc" class="form-control" style="max-height: 500px" placeholder="içerik Giriniz">
                                {!! old('desc', $about->desc) !!}
                            </textarea>
                            <div class="p-2">
                                @error('desc')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
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
                .create(document.querySelector('#desc'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
</x-app-layout>
