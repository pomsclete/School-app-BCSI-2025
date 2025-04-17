@extends('layouts.base')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Liste des professeurs</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Professeur</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <a href="{{ route('professeur.create') }}" class="btn btn-primary">Ajouter un professeur</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @session('success')
                                <div class="alert alert-success text-center">
                                    {{ session('success') }}
                                </div>
                            @endsession
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Prénom & Nom</th>
                                        <th>Téléphone</th>
                                        <th>Matière</th>
                                        <th style="width: 175px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($professeurs as $professeur)
                                        <tr class="align-middle">
                                            <td>{{ $professeur->id }}.</td>
                                            <td>{{ $professeur->nomComplet }}</td>
                                            <td>{{ $professeur->telephone }}</td>
                                            <td>
                                                <span class="badge text-bg-danger">
                                                    {{ $professeur->matiere }}
                                                </span>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning btn-sm">Modifier</button>

                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $professeur->id }}">
                                                    Supprimer
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $professeur->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation
                                                            suppression</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez-vous vraiment supprimer le professeur
                                                        <b>{{ $professeur->nomComplet }}</b> ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annuler</button>
                                                        <form action="{{ route('professeur.delete', $professeur->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Confirmer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="5">Aucun professeur trouvé.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $professeurs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>
            <!--end::Row-->
        </div>
    </div>
    <!--end::App Content-->
@endsection
