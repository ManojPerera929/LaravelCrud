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
<h1 style="text-align: center;">Products Page</h1>
<div class="container">

    <a style="margin-bottom: 2%;" class="btn btn-lg btn-bloc btn-primary" href="{{ route('sellers.index') }}">Back</a>

    <div class="modal fade" id="ProductModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Product Detals</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal">
                        <label>
                            Name:
                            <input style="border: none;" type="text" id="name" Value="" />
                        </label>
                        <label>
                            Price:
                            <input style="border: none;" type="text" id="price" Value="" />
                        </label>
                        <label>
                            Avaliable Items:
                            <input style="border: none;" type="text" id="qty" Value="" />
                        </label>
                        <label>
                            Description:
                            <input style="border: none;" type="text" id="des" Value="" />
                        </label>

                    </form>

                </div>

            </div>
        </div>
    </div>

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Qty</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($products as $product)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $product->name }}</td>

                <td>{{ $product->qty }}</td>

                <td>





                        <a  href="javascript:void(0)" class="btn btn-info productinfo" data-id="{{ $product->id }}"  >Details</a>











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

        $('body').on('click', '.productinfo', function () {

            var pid = $(this).data('id');

            $.get("{{ route('products.index') }}" +'/' + pid, function (data) {


                 $('#qty').val(data.qty);
                 $('#name').val(data.name);
                 $('#price').val(data.price);
                 $('#des').val(data.description);
                 $('#ProductModel').modal('show');
            })
        });




    });

</script>

</body>
</html>
