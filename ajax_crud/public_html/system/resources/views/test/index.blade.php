@extends('layouts.app')
@section('title','Home')
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection
@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
       Add New
    </button>

    <!-- Modal -->
    <div class="modal fade " id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="TestEdit" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-dismissable fade in animated bounceInLeft">
                                <button class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                                @foreach($errors->all() as $er)
                                    <i class="fa fa-warning"></i><span>{{$er}}</span><br/>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <input type="hidden" name="id" id="hid">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">Description</label>
                            <textarea class="textarea form-control editor"  name="description" id="editor1"></textarea>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                            <img src="" id="showImg" style="width:80px;"/>
                            <input type="hidden" name="oldImg" id="oldImg">
                        </div>
                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}" id="show">
                            <label for="status">Status</label>
                            <input type="radio" name="status" value="1">Show
                            <input type="radio" name="status" value="0">Hide
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="TestInsert" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-dismissable fade in animated bounceInLeft">
                                <button class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                                    @foreach($errors->all() as $er)
                                    <i class="fa fa-warning"></i><span>{{$er}}</span><br/>
                                    @endforeach
                            </div>
                        @endif
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <input type="hidden" name="id" id="hid">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">Description</label>
                            <textarea class="textarea form-control editor"  name="description" id="editor1"></textarea>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}" id="show">
                            <label for="status">Status</label>
                            <input type="radio" name="status" value="1">Show
                            <input type="radio" name="status" value="0">Hide
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="1%"></th>
                                <th>Title</th>
                                <th>Descriptions</th>
                                <th>media</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="1%"></th>
                                    <th>Title</th>
                                    <th>Descriptions</th>
                                    <th>media</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>

@endsection
@section('script')
    <!-- DataTables -->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
//        $(document).ready(function () {

                //check if there is error in modal box or not
        @if(count($errors)>0)
           $('#myModal').modal('show');
        @endif

        //Invoking Datatables Plugin
        var table = $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
         });

        //Ajax Loading In Datatables
        ajaxLoad();

        // Integrating WYSIHTML Plugin in textarea
        $(".textarea").wysihtml5();

        //Ajax Inserting of Data 
        $('#TestInsert').submit(function(e){
            e.preventDefault();
            var formData = new  FormData($(this)[0]);
            $.ajax
            ({
                url: "{{route('test.add')}}",
                type: "POST",
                data: formData,
                success: function (response) {
                    if (response['message'] == 'Success') {
                        $('#myModal').modal('hide');
                        $('#TestInsert').trigger('reset');
                        table.clear();
                        ajaxLoad();
                    }
                    if (response['message'] == 'Error') {
                        var insertForm = $("#TestInsert");
                        var errors = response['data'];
                        for (var key in errors) {

                            var formInput = insertForm.find('[name="' + key + '"]');
                            formInput.parent().addClass('has-error');
                            formInput.popover({
                                placement: "top",
                                content: errors[key],
                                template: '<div class="popover animated fadeIn popover-danger" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>',
                                trigger: 'manual'
                            }).on('keypress', function () {
                                $(this).parent().removeClass('has-error');
                                $(this).popover('destroy');
                            }).popover('show');
                        }
                    }
                },
                contentType: false,
                processData: false
            });

            });



        //Dynamically Loading/Reading Contents from database
        function ajaxLoad(){
            $.get("{{route('tests.all')}}", function(response){
                var res = $.parseJSON(response['data']);
                for(var r =0; r<res.length; r++ )
                {
                    var id = res[r]['id'];
                    var img = res[r]['image'];
                    var butn = "<a onclick='ajaxDelete("+id+")' ><i class='fa fa-trash fa-2x'></i></a> <a onclick='ajaxShowUpdate("+id+")' ><i class='fa fa-edit fa-2x'></i></a>";
                    var result = [

                        res[r]['id'],
                        res[r]['title'],
                        res[r]['description'],
                        "<img src='admin/thumbnails/"+img+"' style='width:100px;' />",
                        res[r]['status'],
                        butn


                   ];
                   table.row.add(result).draw();
                }
            });
        }
        //dynamically delete

        function ajaxDelete(id){
            var pop = confirm("are you really want to delete");
            if(pop == true){
                $.post('{{route('test.delete')}}',{
                    "id":id,
                    _token: "{{csrf_token()}}"
                }, function(data){
                    table.clear().draw();
                    ajaxLoad();

                });
            }

        }

        function ajaxShowUpdate(id){
            $.ajax({
                url:"{{route('test.update')}}",
                type:"POST",
                data:{
                    "id":id,
                    _token:"{{csrf_token()}}"
                },
                success:function(response){
                 var res = $.parseJSON(response['data']);
                 var dir = "{{asset('admin/images')}}";
                 $('#title').val(res['title']);
                 $('iframe').contents().find('.wysihtml5-editor').html(res['description']);
                 $('#showImg').attr('src', dir+'/'+res['image']);
                 $('#oldImg').val(res['image']);
                 $('#hid').val(res['id']);
                 $('#show').val(res['status']);
                 $('#editModal').modal('show');
                }
            });
        }
        {{--$('#TestEdit').submit(function(e) {--}}
            {{--e.preventDefault();--}}
            {{--$.ajax({--}}
                {{--url: "{{route('test.saveUpdate')}}",--}}
                {{--type: "POST",--}}
                {{--data:{--}}
                    {{--_token:"{{csrf_token()}}",--}}
                    {{--"id":$('#hid').val(),--}}
                    {{--"title":$('#title').val(),--}}
                    {{--"description":$('.editor').val(),--}}
                    {{--"image":$('#image').val(),--}}
                    {{--"status":$('#show').val()--}}
                {{--},--}}
                {{--success:function(response) {--}}
                    {{--$('#editModal').modal('hide');--}}
                    {{--$('#TestEdit').trigger('reset');--}}
                    {{--table.clear().draw();--}}
                    {{--ajaxLoad();--}}

                {{--}--}}
            {{--});--}}

        {{--});--}}
$('#TestEdit').submit(function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: "{{route('test.saveUpdate')}}",
        type: "POST",
        data: formData,
        success: function(response){
            table.clear();
            ajaxLoad();
        },
        contentType: false,
        processData: false
    });
            $('#editModal').modal('hide');
});


//        });
    </script>

@endsection