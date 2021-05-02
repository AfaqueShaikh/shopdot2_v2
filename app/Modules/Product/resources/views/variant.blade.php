<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Variant</th>
            <th>Image</th>
            <th>Sale Price</th>
            <th>qty</th>
            <th style="text-align: left;">SKU</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>
        @foreach($first['value'] as $f)
            @foreach($second['value'] as $s)
            @foreach($third['value'] as $t)
                <?php
                    $newsku = $sku.'-';
                    $newsku = $f ? $newsku.''.$f[0] : $newsku;
                    $newsku = $s ? $newsku.''.$s[0] : $newsku;
                    $newsku = $t ? $newsku.''.$t[0] : $newsku;
                ?>
        <tr id="{{$newsku}}">
            <td>{{$f}} / {{$s}} / {{$t}}</td>
            <td><input style="width: auto;" class="form-control" type="file" name="variant_images[]"></td>
            <td><input class="form-control" type="number" required name="variant_prices[]" value="{{$price}}"></td>
            <td><input class="form-control" type="number" required name="variant_qtys[]" value="{{$qty}}"></td>
            <td><input class="form-control" type="text" required name="variant_skus[]" value="{{$newsku}}"></td>
            <input class="form-control" type="hidden" name="variant_{{$first['type'][0]}}[]" value="{{$f}}">
            <input class="form-control" type="hidden" name="variant_{{$second['type'][0]}}[]" value="{{$s}}">
            <input class="form-control" type="hidden" name="variant_{{$third['type'][0]}}[]" value="{{$t}}">
            <td><button type="button" class="btn btn-danger btn-xs" onclick="removeVariant('{{$newsku}}')"><i class="fa fa-trash"></i></button></td>
        </tr>
        @endforeach
        @endforeach
        @endforeach
        </tbody>
    </table>
</div>