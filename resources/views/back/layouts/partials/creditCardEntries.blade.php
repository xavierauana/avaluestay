<input type="text" class="form-control" name="cardNo" value="" placeholder="Credit Card Number">
<input type="text" class="form-control" name="securityCode" value="" placeholder="Security Code">
<input type="text" class="form-control" name="cardHolder" value="" placeholder="Name printed on the card">
<select class="form-control" name="epMonth" id="">
    <option value="01" selected>01</option>
    <option value="02">02</option>
    <option value="03">03</option>
    <option value="04">04</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07">07</option>
    <option value="08">08</option>
    <option value="09">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
</select>
<select class="form-control" name="epYear" id="">
    @for($i = 2015; $i <=2025; $i++)
        <option value="{{$i}}" @if($i==2015) selected @endif>{{$i}}</option>
    @endfor
</select>