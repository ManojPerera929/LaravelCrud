<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <title>Document</title>
</head>
<body>
<h1 style="text-align: center;">Seller page</h1>
<div class="container">
    <button style="margin-bottom: 2%;" id="createNewseller" class="btn btn-lg btn-bloc btn-primary">Add New Seller</button>
    </br>
    <div class="modal fade" id="sellerModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="bookForm" action="{{ route('sellers.store') }}" name="bookForm" class="form-horizontal">
                       @csrf
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" maxlength="50" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <label class="radio-inline">
                                <input type="radio" id="status" name="status" value="Active" required>Active</label>

                            <label class="radio-inline">
                                <input type="radio" id="status" name="status" value="Inactive">Inactive</label>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="sellerUpdateModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Edit form</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="UpdateForm"  name="UpdateForm" class="form-horizontal">
                        @csrf

                        <input type="hidden" name="sellerid" id="sellerid" />
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="updatename" name="name" placeholder="Enter Name" value="" maxlength="50" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="updateemail" name="email" placeholder="Enter Email" value="" maxlength="50" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <label class="radio-inline">
                                <input type="radio" id="status" name="updatestatus" value="Active" required>Active</label>

                            <label class="radio-inline">
                                <input type="radio" id="status" name="updatestatus" value="Inactive">Inactive</label>
                        </div>



                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="updateBtn" value="create">Update changes
                            </button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Details</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($sellers as $seller)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $seller->name }}</td>

                <td>{{ $seller->email }}</td>

                <td>





                        <a class="btn btn-info"  href="{{ route('sellers.show',$seller->id) }}">Products</a>



                        <a href="javascript:void(0)" class="btn btn-primary editSeller" data-id="{{ $seller->id }}">Edit</a>





                    </form>

                </td>

            </tr>

        @endforeach

    </table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
    $(function () {
        $('#createNewseller').click(function () {


             $('#sellerModel').modal('show');
        });

        $('body').on('click', '.editSeller', function () {

            var sellerid = $(this).data('id');

            $.get("{{ route('sellers.index') }}" +'/' + sellerid +'/edit', function (data) {


                 $('#sellerid').val(data.id);
                 $('#updatename').val(data.name);
                 $('#updateemail').val(data.email);
                $('input:radio[name=updatestatus]').val([data.status]);
                $('#sellerUpdateModel').modal('show');
            })
        });

        $('#updateBtn').click(function (e) {
            e.preventDefault();

            $.ajax({
                data: $('#UpdateForm').serialize(),
                url: "{{ route('sellers.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#UpdateForm').trigger("reset");
                    $('#sellerUpdateModel').modal('hide');
                    window.location.reload();


                },
                error: function (data) {
                    console.log('Error:', data);

                }
            });
        });


    });

</script>

</body>
</html>
