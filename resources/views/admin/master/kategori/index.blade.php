@extends('layouts.main')
@section('title_page')
    Kategori
@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default" id="formKategori">
                    <div class="panel-heading">Input Kategori </div>
                    <div class="panel-body">
                        <div class="alert alert-danger" v-if="statusError">
                            <ul>
                                <li v-for="pesan in pesanError">@{{ pesan[0] }}</li>
                            </ul>
                        </div>
                        <form @submit.prevent="simpanData">
                            <input type="hidden"  name="id" id="idKategori">
                            <div class="form-group">
                                <input
                                        type="text"
                                        name="nama"
                                        v-model="nama"
                                        class="form-control"
                                        placeholder="Masukan Nama Kategori" />
                            </div>
                            <div class="form-group">
                                <textarea
                                        name="deskripsi"
                                        id="deskripsi"
                                        v-model="deskripsi"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Masukan Deskripsi Tentang Kategori"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8" id="dataKategori">
                <div class="panel panel-default">
                    <div class="panel-heading">Data Kategori</div>
                    <div class="panel-body">
                        <table id="tabel_kategori" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <td>Nama</td>
                                <td>Deskripsi</td>
                                <td>Opsi</td>
                            </tr>
                            </thead>
                            <tbody class="isi_tabel_kategori">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vee-validate@2.0.3/dist/vee-validate.js"></script>
    <script src="{{url('/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            // buildData;
        } );
        
        var selected = [];
        var buildData = $('#tabel_kategori').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "/admin/master/kategori/get_data_tabel",
                    "type": "POST"
                },
                "rowCallback": function( row, data ) {
                    if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
                        $(row).addClass('selected');
                    }
                },
                "columns": [
                    { "data": "nama" },
                    { "data": "deskripsi" },
                    { "data": function(data){
                        var data = data;
                        return '<center><a class="btn btn-danger btn-xs"  onClick="hapusDataKategori('+data.id+')" title="Hapus Data"><i class="fa fa-trash"></i></a></center>';
                    } },
                ]
            } );
            const hapusDataKategori = function (data) {            
                if(confirm('Apakah Anda Yakin akan menghapus data?')){
                    axios.post("/admin/master/kategori/hapus", {id_kategori: data})
                        .then((response)=>{
                            if(response.data.status == "sukses"){
                                buildData.ajax.reload();
                                console.log('Berhasil Menghapus Data Kategori');
                            }
                        });
                }
            }
        const urlSimpan = "{{url('/admin/master/kategori/simpan')}}";

        
        var formKategori = new Vue({
            el:"#formKategori",
            data: {
                idKategori: null,
                nama: '',
                deskripsi: '',
                statusError: false,
                pesanError: []
            },
            methods:{
                simpanData: function(){
                    // this.$validator.validateAll();

                    // if (!this.errors.any()) {
                    //     console.log('Tidak Ada Validasi');
                    // }

                    let self = this;
                    axios.post(urlSimpan, {id:this.idKategori, nama: this.nama, deskripsi:this.deskripsi})
                        .then(function(response){

                            var res = response.data;

                            if(res.status === 'error'){
                                self.statusError = true;
                                self.pesanError = res.data;
                            }

                            if(res.status == 'sukses'){
                                self.clearForm();

                                buildData.ajax.reload();

                            }

                        })
                        .catch(function(err){
                            console.log(err.data);
                        });
                },
                clearForm: function(){
                    this.nama = '';
                    this.deskripsi = '';
                    this.idKategori = null;
                },
            }
        });

    </script>
@endsection

@section('style')
    <link href="{{url('/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection