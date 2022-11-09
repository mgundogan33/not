<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="container">
        <div class="row">

            <div class="card border-primary mt-2">

                <div class="table-responsive">
                    <a href="{{ route('category.create') }}" class="btn btn-primary float-right mt-3 mb-3">Kategori
                        Ekle</a>
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kategori Adı</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Resim</th>
                                <th scope="col">Durum</th>
                                <th scope="col">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($data as $item)
                                <tr class="">
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->slug }}</td>

                                    <td><img src="images/{{ $item->image->url }}" width="55px" /></td>

                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" 
                                                type="checkbox" id="status_{{ $item->id }}" {{ $item->type == 1 ? 'checked' : '' }}
                                                onchange="document.getElementById('statu_{{ $item->id }}').submit();">
                                            <label class="form-check-label" for="status_{{ $item->id }}">
                                                {{ $item->type == 1 ? 'Aktif' : 'Pasif' }}
                                            </label>
                                            <form id="statu_{{ $item->id }}" method="POST"
                                                action="{{ route('category.update', $item->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="text" name="type" value="{{ $item->type == 1 ? 0 : 1 }}" class="d-none">
                                            </form>
                                        </div>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('category.edit', $item->id) }}"
                                            class="btn btn-success">Güncelle</a>
                                        <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger ml-2">Sil</button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="alert alert-warning text-center" role="alert">
                                        <strong>Kayıt Yok</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
