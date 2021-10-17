<style>
    .thumbnail{
        width:100px;
        height:100px;
    }
    .hidden{
        display:none;
    }
</style>
写真1
<br>
<img class="thumbnail" src="{{ url('storage/image1.jpeg') }}">
<br>
写真2
<br>
<img class="thumbnail" src="{{ url('storage/image2.jpeg') }}">
<br>
写真3
<br>
<img class="thumbnail" src="{{ url('storage/image3.jpeg') }}">
<br>
写真4
<br>
<img class="thumbnail" src="{{ url('storage/image4.jpeg') }}">
<input type="text" class="form-control hidden" value="storage/image1.jpeg" name="image1" type="hidden">
<input type="text" class="form-control hidden" value="storage/image2.jpeg" name="image2" type="hidden">
<input type="text" class="form-control hidden" value="storage/image3.jpeg" name="image3" type="hidden">
<input type="text" class="form-control hidden" value="storage/image4.jpeg" name="image4" type="hidden">
<br>