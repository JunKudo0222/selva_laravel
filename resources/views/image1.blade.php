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
<img class="thumbnail" src="{{ url('storage/image1.jpeg') }}" id="image1">
<br>
<input type="text" class="form-control hidden" value="storage/image1.jpeg" name="image1" type="hidden">
<br>