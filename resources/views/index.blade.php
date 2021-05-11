@extends('layouts.body')

@section('custom-css')
    <style>
        div.columns {
        margin-top: 50px;
        }

        h1 {
        margin-bottom: 20px;

        }


        .table-wrapper .table {
        margin-bottom: 0;
        }

        .table-wrapper:not(:last-child) {
        margin-bottom: 1.5rem;
        }

        @media screen and (max-width: 1023px) {
        .table-wrapper {
            overflow-x: auto;
        }
        }

        .b-table {
        transition: opacity 86ms ease-out;
        /*.level:not(.top) {
            padding-bottom: $size-base * 1.5;
        }*/
        }

        @media screen and (min-width: 769px), print {
        .b-table .table-mobile-sort {
            display: none;
        }
        }

        .b-table .icon {
        transition: transform 150ms ease-out, opacity 86ms ease-out;
        }

        .b-table .icon.is-desc {
        transform: rotate(180deg);
        }

        .b-table .icon.is-expanded {
        transform: rotate(90deg);
        }

        .b-table .table {
        width: 100%;
        border: 1px solid transparent;
        border-radius: 4px;
        border-collapse: separate;
        }

        .b-table .table th {
        font-weight: 600;
        }

        .b-table .table th .th-wrap {
        display: flex;
        align-items: center;
        }

        .b-table .table th .th-wrap .icon {
        margin-left: 0.5rem;
        margin-right: 0;
        font-size: 1rem;
        }

        .b-table .table th .th-wrap.is-numeric {
        flex-direction: row-reverse;
        text-align: right;
        }

        .b-table .table th .th-wrap.is-numeric .icon {
        margin-left: 0;
        margin-right: 0.5rem;
        }

        .b-table .table th .th-wrap.is-centered {
        justify-content: center;
        text-align: center;
        }

        .b-table .table th.is-current-sort {
        border-color: #7a7a7a;
        font-weight: 700;
        }

        .b-table .table th.is-sortable:hover {
        border-color: #7a7a7a;
        }

        .b-table .table th.is-sortable,
        .b-table .table th.is-sortable .th-wrap {
        cursor: pointer;
        }

        .b-table .table th .multi-sort-cancel-icon {
        margin-left: 10px;
        }

        .b-table .table th.is-sticky {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 3 !important;
        background: white;
        }

        .b-table .table tr.is-selected .checkbox input:checked + .check {
        background: findColorInvert(#00d1b2) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3Cpath style='fill:%2300d1b2' d='M 0.04038059,0.6267767 0.14644661,0.52071068 0.42928932,0.80355339 0.3232233,0.90961941 z M 0.21715729,0.80355339 0.85355339,0.16715729 0.95961941,0.2732233 0.3232233,0.90961941 z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center;
        }

        .b-table .table tr.is-selected .checkbox input + .check {
        border-color: findColorInvert(#00d1b2);
        }

        .b-table .table tr.is-empty:hover {
        background-color: transparent;
        }

        .b-table .table .is-chevron-cell, .b-table .table .is-checkbox-cell {
        width: 40px;
        }

        .b-table .table .is-chevron-cell {
        vertical-align: middle;
        }

        .b-table .table .is-checkbox-cell .checkbox {
        vertical-align: middle;
        }

        .b-table .table .is-checkbox-cell .checkbox.b-checkbox {
        margin-right: 0;
        }

        .b-table .table .is-checkbox-cell .checkbox .check {
        transition: none;
        }

        .b-table .table tr.detail {
        box-shadow: inset 0 1px 3px #dbdbdb;
        background: #fafafa;
        }

        .b-table .table tr.detail .detail-container {
        padding: 1rem;
        }

        .b-table .table:focus {
        border-color: #3273dc;
        box-shadow: 0 0 0 0.125em rgba(50, 115, 220, 0.25);
        }

        .b-table .table.is-bordered th.is-current-sort,
        .b-table .table.is-bordered th.is-sortable:hover {
        border-color: #dbdbdb;
        background: whitesmoke;
        }

        .b-table .table td.is-sticky {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 1;
        background: white;
        }

        .b-table .table td.is-image-cell .image {
        margin: 0 auto;
        width: 1.5rem;
        height: 1.5rem;
        }

        .b-table .table td.is-progress-cell {
        min-width: 5rem;
        vertical-align: middle;
        }

        .b-table .table-wrapper.has-sticky-header {
        height: 300px;
        overflow-y: auto;
        }

        @media screen and (max-width: 768px) {
        .b-table .table-wrapper.has-sticky-header.has-mobile-cards {
            height: initial !important;
            overflow-y: initial !important;
        }
        }

        .b-table .table-wrapper.has-sticky-header tr:first-child th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
        background: white;
        }

        @media screen and (max-width: 768px) {
        .b-table .table-wrapper.has-mobile-cards thead {
            display: none;
        }
        .b-table .table-wrapper.has-mobile-cards tfoot th {
            border: 0;
            display: inherit;
        }
        .b-table .table-wrapper.has-mobile-cards tr {
            box-shadow: 0 2px 3px rgba(10, 10, 10, 0.1), 0 0 0 1px rgba(10, 10, 10, 0.1);
            max-width: 100%;
            position: relative;
            display: block;
        }
        .b-table .table-wrapper.has-mobile-cards tr td {
            border: 0;
            display: inherit;
        }
        .b-table .table-wrapper.has-mobile-cards tr td:last-child {
            border-bottom: 0;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not(:last-child) {
            margin-bottom: 1rem;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not([class*="is-"]) {
            background: inherit;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not([class*="is-"]):hover {
            background-color: inherit;
        }
        .b-table .table-wrapper.has-mobile-cards tr.detail {
            margin-top: -1rem;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td {
            display: flex;
            width: auto;
            justify-content: space-between;
            text-align: right;
            border-bottom: 1px solid whitesmoke;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td:before {
            content: attr(data-label);
            font-weight: 600;
            padding-right: 0.5rem;
            text-align: left;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-image-cell .image {
            width: 6rem;
            height: 6rem;
            margin: 0 auto 0.5rem;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-progress-cell span, .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-progress-cell progress {
            display: flex;
            width: 45%;
            align-items: center;
            align-self: center;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-checkbox-cell, .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-image-cell {
            border-bottom: 0 !important;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-checkbox-cell:before, .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-actions-cell:before {
            display: none;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-label-hidden:before, .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-image-cell:before {
            display: none;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-label-hidden span {
            display: block;
            width: 100%;
        }
        .b-table .table-wrapper.has-mobile-cards tr:not(.detail):not(.is-empty):not(.table-footer) td.is-label-hidden.is-progress-col progress {
            width: 100%;
        }
        }

        .b-table .table-wrapper.is-card-list thead {
        display: none;
        }

        .b-table .table-wrapper.is-card-list tfoot th {
        border: 0;
        display: inherit;
        }

        .b-table .table-wrapper.is-card-list tr {
        box-shadow: 0 2px 3px rgba(10, 10, 10, 0.1), 0 0 0 1px rgba(10, 10, 10, 0.1);
        max-width: 100%;
        position: relative;
        display: block;
        }

        .b-table .table-wrapper.is-card-list tr td {
        border: 0;
        display: inherit;
        }

        .b-table .table-wrapper.is-card-list tr td:last-child {
        border-bottom: 0;
        }

        .b-table .table-wrapper.is-card-list tr:not(:last-child) {
        margin-bottom: 1rem;
        }

        .b-table .table-wrapper.is-card-list tr:not([class*="is-"]) {
        background: inherit;
        }

        .b-table .table-wrapper.is-card-list tr:not([class*="is-"]):hover {
        background-color: inherit;
        }

        .b-table .table-wrapper.is-card-list tr.detail {
        margin-top: -1rem;
        }

        .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td {
        display: flex;
        width: auto;
        justify-content: space-between;
        text-align: right;
        border-bottom: 1px solid whitesmoke;
        }

        .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td:before {
        content: attr(data-label);
        font-weight: 600;
        padding-right: 0.5rem;
        text-align: left;
        }

        .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-image-cell .image {
        width: 6rem;
        height: 6rem;
        margin: 0 auto 0.5rem;
        }

        .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-progress-cell span, .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-progress-cell progress {
        display: flex;
        width: 45%;
        align-items: center;
        align-self: center;
        }

        .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-checkbox-cell, .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-image-cell {
        border-bottom: 0 !important;
        }

        .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-checkbox-cell:before, .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-actions-cell:before {
        display: none;
        }

        .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-label-hidden:before, .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-image-cell:before {
        display: none;
        }

        .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-label-hidden span {
        display: block;
        width: 100%;
        }

        .b-table .table-wrapper.is-card-list tr:not(.detail):not(.is-empty):not(.table-footer) td.is-label-hidden.is-progress-col progress {
        width: 100%;
        }

        .b-table.is-loading {
        position: relative;
        pointer-events: none;
        opacity: 0.5;
        }

        .b-table.is-loading:after {
        animation: spinAround 500ms infinite linear;
        border: 2px solid #dbdbdb;
        border-radius: 290486px;
        border-right-color: transparent;
        border-top-color: transparent;
        content: "";
        display: block;
        height: 1em;
        position: relative;
        width: 1em;
        position: absolute;
        top: 4em;
        left: calc(50% - 2.5em);
        width: 5em;
        height: 5em;
        border-width: 0.25em;
        }

        .b-table.has-pagination .table-wrapper {
        margin-bottom: 0;
        }

        .b-table.has-pagination .table-wrapper + .notification {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-content">
                <div class="content">
                    <div class="b-table">
                        <div class="table-wrapper has-mobile-cards">
                            <div>
                                <h1 class='title has-text-primary has-text-centered'>Data Pendaftar</h1>
                                <hr>
                            </div>
                            <div class="buttons is-centered">
                                <a href="{{route('export')}}" class="button is-link">
                                    <span class="icon-text">
                                        <span class="icon">
                                          <i class="fas fa-table"></i>
                                        </span>
                                        <span>Cetak Excel</span>
                                    </span>
                                </a>
                                <a href="{{route('create')}}" class="button is-success">
                                    <span class="icon-text">
                                        <span class="icon">
                                          <i class="fas fa-plus-circle"></i>
                                        </span>
                                        <span>Tambah</span>
                                    </span>
                                </a>
                            </div>
                            <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Kelompok</th>
                                        <th>Bilangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_catatan as $no => $catatan)
                                        <tr>
                                            <td>{{$no+1}}</td>
                                            <td>{{$catatan["created_at"]}}</td>
                                            <td>{{$catatan["catatan"][0]}}</td>
                                            <td>{{$catatan["catatan"][1]}}</td>
                                            <td>{{$catatan["catatan"][2]}}</td>
                                            <td>
                                                <div class="buttons">
                                                    <button
                                                    class="button is-info"
                                                    data-target="ubah"
                                                    data-id = "{{$catatan["id"]}}"
                                                    data-catatan = "{{$catatan["original_catatan"]}}"
                                                    onclick="showDetails(this)"
                                                    >
                                                        <span class="icon-text">
                                                            <span class="icon">
                                                              <i class="fas fa-pen"></i>
                                                            </span>
                                                            <span>Ubah</span>
                                                        </span>
                                                    </button>
                                                    <form method="POST" action=" {{ route( 'destroy',['catatan' => $catatan["id"]] ) }}" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="button is-danger">
                                                            <span class="icon-text">
                                                                <span class="icon">
                                                                  <i class="fas fa-trash"></i>
                                                                </span>
                                                                <span>Hapus</span>
                                                            </span>
                                                        </button>
                                                      </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal" id="ubah" tabindex="-1" role="dialog" aria-labelledby="modal-instagram-title" aria-hidden="true">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Ubah Data</p>
                <button class="delete" data-dismiss="modal" aria-label="close"></button>
            </header>
            <form action="" method="post" id="form-modal">
                @csrf
                @method('PUT')
                <section class="modal-card-body">
                    <!-- Content ... -->
                    <input class="input is-primary" type="text" placeholder="Ubah data" name="catatan" id="catatan-modal">
                </section>
                <footer class="modal-card-foot">
                    <button type="submit" class="button is-success">Simpan Perubahan</button>
                    <button type="button" data-dismiss="modal" class="button">Cancel</button>
                </footer>
            </form>
        </div>
    </div>
@endsection

@section('custom-js')
<script>
    let dismiss = document.querySelectorAll("[data-dismiss='modal']")

    function hilangkan() {
        let el = document.getElementById("ubah")
        el.classList.remove("is-active");
    }

    for (let index = 0; index < dismiss.length; index++) {
        dismiss[index].onclick = function() {
            hilangkan()
        };
    }

    function showDetails(data) {
      let target = data.getAttribute("data-target");
      let id = data.getAttribute("data-id");
      let catatan = data.getAttribute("data-catatan");

      target = document.getElementById(target)
      target.classList.add("is-active");

      let catatan_modal = document.getElementById("catatan-modal")
      let form_modal = document.getElementById("form-modal")

      catatan_modal.value = catatan
      form_modal.action = "/"+id
    }

    function showDetailInstagram(data) {
      let gambar = data.getAttribute("data-gambar-instagram");
      let gambar_modal = document.getElementById("gambar-modal-instagram")
      gambar_modal.src = gambar
    }
    </script>
@endsection
