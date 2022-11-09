<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="card border-primary p-3 mt-3">
                <h3>Kategori Güncelleme</h3>
                <hr>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </div>
                @endif --}}
                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" name="title" value="{{ old('title', $category->title) }}" id="title" class="form-control"
                                placeholder="Başlık Giriniz">
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
                            <img src='/images/{{ $category->image->url }}' />
                        </div>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                    type="checkbox" id="status_{{ $category->id }}" {{ $category->type == 1 ? 'checked' : '' }}
                                    onchange="document.getElementById('statu_{{ $category->id }}').submit();">
                                <label class="form-check-label" for="status_{{ $category->id }}">
                                    {{ $category->type == 1 ? 'Aktif' : 'Pasif' }}
                                </label>
                                <form id="statu_{{ $category->id }}" method="POST"
                                    action="{{ route('category.update', $category->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="text" name="type" value="{{ $category->type == 1 ? 0 : 1 }}" class="d-none">
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
</x-app-layout>
