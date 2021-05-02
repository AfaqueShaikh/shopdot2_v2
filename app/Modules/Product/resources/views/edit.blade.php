@extends('layouts.brand')
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Add Product</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Product Name</label>
                                            <input type="text" value="{{old('name') ? old('name') : $product->name}}" class="form-control" name="name">
                                            @error('name')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Category</label>
                                            <select class="form-control" name="category">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option @if($product->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Product Description</label>
                                            <textarea name="description" class="form-control">{{old('description') ? old('description') : $product->description}}</textarea>
                                            @error('description')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Weight</label>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="text" value="{{old('weight') ? old('weight') : $product->weight}}" class="form-control" name="weight">
                                                    @error('weight')
                                                    <label class="text text-danger">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="weight_unit" class="form-control">
                                                        <option @if($product->weight_unit == "lb") selected @endif value="lb">lb</option>
                                                        <option @if($product->weight_unit == "oz") selected @endif value="oz">oz</option>
                                                        <option @if($product->weight_unit == "kg") selected @endif value="kg">kg</option>
                                                        <option @if($product->weight_unit == "g") selected @endif value="g">g</option>
                                                    </select>
                                                    @error('weight_unit')
                                                    <label class="text text-danger">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">SKU</label>
                                            <input type="text" value="{{old('sku') ? old('sku') : $product->sku}}" class="form-control" name="sku">
                                            @error('sku')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Price</label>
                                            <input type="number" id="price" step="0.01" value="{{old('price') ? old('price') : $product->price}}" class="form-control" name="price">
                                            @error('price')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Sale Price</label>
                                            <input type="number" step="0.01" value="{{old('sell_price') ? old('sell_price') : $product->sale_price}}" class="form-control" name="sell_price">
                                            @error('sell_price')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Quantity</label>
                                            <input type="number" value="{{old('qty') ? old('qty') : $product->qty}}" class="form-control" name="qty">
                                            @error('qty')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Featured Image</label>
                                            <input type="file" class="form-control" name="featured_image">
                                            @error('featured_image')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Detail Images</label>
                                            <input type="file" name="detailed_images[]" class="form-control" multiple>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group has-danger">
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <div class="form-check">
                                                    <input id="radio1" name="status" value="1" type="radio" @if($product->status == '1') checked @endif class="">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Active</span>
                                                    <input id="radio2" name="status" value="0" @if($product->status == '0')) checked @endif type="radio" class="">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Inactive</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-title m-t-15">Detail Images</h3>
                                <hr>
                                <div class="row p-t-20">
                                @forelse($product->detailImages as $detailImage)
                                    <div class="col-md-2" id="{{$detailImage->id}}">
                                        <div class="form-group">
                                            <img width="50px" src="{{url('/')}}/storage/app/public/{{Auth::user()->id}}/detail-image/{{$detailImage->name}}">
                                            <button type="button" onclick="removeDetailImage({{$detailImage->id}})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                @empty

                                @endforelse
                                </div>
                                <h3 class="card-title m-t-15">Offer</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group has-danger">
                                            <div class="form-group">
                                                <label class="control-label">Offer Available?</label>
                                                <div class="form-check">
                                                    <input id="offer_yes" name="offer" @if(old('offer') || $product->offer_available == '1') checked @endif onclick="offerAvailable()" value="1" type="radio" class="">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Yes</span>
                                                    <input id="offer_no" name="offer" @if(old('offer') || $product->offer_available == '0') checked @endif onclick="offerAvailable()" value="0" type="radio" class="">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">No</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="offer_price">
                                        <div class="form-group">
                                            <label class="control-label">Offer Price</label>
                                            <input type="number" step="0.01" value="{{old('offer_price') ? old('offer_price') : $product->offer_price}}" name="offer_price" class="form-control" placeholder="">
                                            @error('offer_price')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="start_date">
                                        <div class="form-group">
                                            <label class="control-label">Offer Start Date</label>
                                            <input type="text" value="{{old('start_date') ? old('start_date') : $product->offer_startdate}}" id="from" name="start_date" class="form-control" placeholder="">
                                            @error('start_date')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="end_date">
                                        <div class="form-group">
                                            <label class="control-label">Offer End Date</label>
                                            <input type="text" value="{{old('end_date') ? old('end_date') : $product->offer_enddate}}" id="to" name="end_date" class="form-control" placeholder="">
                                            @error('end_date')
                                            <label class="text text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <h3 class="card-title m-t-15">Variants</h3>
                                <hr>
                                <div class="row p-t-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Color</label>
                                            <input type="text" value="{{old('color')}}" name="color" class="form-control" placeholder="Separate options with a comma">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Size</label>
                                            <input type="text" value="{{old('size')}}" name="size" class="form-control" placeholder="Separate options with a comma">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Material</label>
                                            <input type="text" value="{{old('material')}}" name="material" class="form-control" placeholder="Separate options with a comma">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br>
                                            <button type="button" class="btn btn-success" onclick="addVariant()">Add Variants</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="variant">

                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <button type="button" class="btn btn-inverse">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            datePick();
            offerAvailable();
        });
        function offerAvailable() {
            if($('#offer_yes').prop('checked')){
                $('#offer_price').show();
                $('#start_date').show();
                $('#end_date').show();
            } else if($('#offer_no').prop('checked')) {
                $('#offer_price').hide();
                $('#start_date').hide();
                $('#end_date').hide();
            } else {
                $('#offer_no').prop('checked', true);
                offerAvailable();
            }

        }
        function addVariant() {
            var color = $('[name="color"]').val();
            var size = $('[name="size"]').val();
            var material = $('[name="material"]').val();
            var price = $('[name="sell_price"]').val();
            var qty = $('[name="qty"]').val();
            var sku = $('[name="sku"]').val();
            var msg = '';
            var error_flag = 0;
            if(price == ''){
                msg += 'Sell price, '
                error_flag = 1;
            }
            if(qty == ''){
                msg += 'Quantity, '
                error_flag = 1;
            }
            if(sku == ''){
                msg += 'Sku '
                error_flag = 1;
            }
            if(error_flag){
                alert(msg+'Should not be empty.');
                return;
            }
            $('#variant').html('<h3 style="text-align: center; color: #1da1f2">Please wait adding variants</h3>');
            if(color != '' || size != '' || material != ''){
                $.ajax({
                    url:"{{url('/brand/product/add-variant')}}",
                    data:{
                        color: color,
                        size: size,
                        material: material,
                        price: price,
                        qty: qty,
                        sku: sku
                    },
                    success: function (result) {
                        $('#variant').html(result);
                    }
                });
            } else {
                alert('Please add at least one variant');
            }
        }
        function removeVariant(id) {
            if(confirm('Do you really want remove this variant')){
                $('#'+id).remove();
            }
        }
        function removeDetailImage(id){
            if(confirm('Do you really want remove this image')){
                $.ajax({
                    url:"{{url('/brand/product/remove-detail-image')}}",
                    data:{
                        id: id,
                    },
                    success: function (result) {
                        if(result['status'] == 'success'){
                            $('#'+id).remove();
                        } else {
                            alert('something went wrong');
                        }
                    }
                });
            }
        }
        function datePick() {
            var dateFormat = "mm/dd/yy",
                from = $( "#from" )
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 1
                    })
                    .on( "change", function() {
                        to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                to = $( "#to" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                    .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
                    });

            function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }

                return date;
            }
        }
    </script>
@endsection