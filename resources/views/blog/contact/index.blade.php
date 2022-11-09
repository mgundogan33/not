<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="card border-primary mt-2">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Ad</th>
                                <th scope="col">Soyad</th>
                                <th scope="col">Ülke</th>
                                <th scope="col">Yaş</th>
                                <th scope="col">İçerik</th>
                                <th scope="col">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="">
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->country }}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>{{ $item->desc }}</td>

                                    <td class="d-flex">
                                        <form action="{{ route('contact.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger ml-2">Sil</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
