@include('backend.include.header')
@include('backend.include.sidebar')

@if(session('message'))
<div class="sweetmessage">

    <p>{{ session('message') }}</p>
</div>
@endif
<?php
$catagory = DB::select("SELECT  id,title  FROM book_categories;");
$subCatagory = DB::select("SELECT  id,sub_title  FROM book_sub_categories;");

?>
<section class="main">
    <div class="middle-dashboard">

        @if(@$editbookSubCategory)
        <div class="topic-heading" style="display: inline-flex;">
            <div class="topic-icons">
                <i class="ri-money-dollar-box-line"></i>
            </div>
            <h1> Edit Book Sub Catagory</h1>
        </div>
        <form action="{{ url('/updateSubCategory', $editbookSubCategory->id) }}" method="POST">
            @csrf
            <div class="table-heading">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Display Order</th>
                        <th>Category</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="sub_title" value="{{ $editbookSubCategory->sub_title }}"
                                placeholder="Title"></td>
                        <td><input type="text" name="display_order" value="{{ $editbookSubCategory->display_order }}"
                                placeholder="Display Order"></td>
                        <td>
                            <select name="cat_id">
                                @foreach($catagory as $item)
                                @if(old('cat_id') == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->title}}</option>
                                @endif
                                @endforeach
                                @foreach($catagory as $item)
                                @if(old('cat_id') != $item->id)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
                <div class="viewmore">
                    <input type="submit" value="Update">
                </div>
            </div>
        </form>

        @else
        <div class="topic-heading" style="display: inline-flex;">
            <div class="topic-icons">
                <i class="ri-money-dollar-box-line"></i>
            </div>
            <h1> Add Book Child Catagory</h1>
        </div>
        <form action="{{ url('/postchildCatagory') }}" method="POST">
            @csrf
            <div class="table-heading">

                <table>
                    <tr>
                        <th>Title</th>
                        <th>Catagory</th>
                        <th>Sub Catagory</th>
                        <th> Display Order(Optional)</th>

                    </tr>
                    <tr>
                        <td><input type="text" name="child_title" placeholder="Enter Title"></td>
                        <td><select name="book_cat_id">
                                <option> Select the catagory</option>
                                @foreach($catagory as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select></td>
                        <td><select name="book_sub_cat_id">
                                <option> Select the sub catagory</option>
                                @foreach($subCatagory as $item)
                                <option value="{{$item->id}}">{{$item->sub_title}}</option>
                                @endforeach
                            </select></td>
                        <td><input type="number" name="display_order" placeholder="Enter Display Order"></td>

                    </tr>
                </table>
                <div class="viewmore">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>
        @endif

    </div>
    <div class="table-heading">
        <div class="search-form">
            <form method="GET">


                <input type="text" name="item_name" placeholder="Search service name" required>
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="whole-table-slide" style="width: 100%; overflow-x: auto;">
            <table class="responsive-slider" style="width:1200px">

                <tr>
                    <th>Title</th>
                    <th>Catagory Name</th>
                    <th>Sub Catagory Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($groupedBookChildCategory as $id => $items)
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->child_title }}</td>
                    <td>{{ $item->category_title }}</td>
                    <td>{{ $item->sub_title }}</td>
                    <td>{{ $item->display_order }}</td>
                    <td>
                        <a href=""><button class="edit-button">Edit <i class="ri-pencil-line"></i></button></a>
                        <button class="del-button"
                            onclick="confirmDelete('{{ url('/deletechildCatagory/'.$item->id) }}')">Del <i
                                class="ri-chat-delete-line"></i></button>
                    </td>
                </tr>
                @endforeach
                @endforeach

            </table>
        </div>
        <div class="viewmore">
            <input type="submit" value="View More">
        </div>
    </div>

</section>

<script type="text/javascript">
$('.sub-btn').click(function() {
    $(this).next('.sub-menu').slideToggle();
    $(this).find('.dropdown').toggleClass('rotate');
});


$('.menu-btn').click(function() {
    $('.side-bar').addClass('active');
    $('.menu-btn').css("visibility", "hidden");

});

$('.close-btn').click(function() {
    $('.side-bar').removeClass('active');
    $('.menu-btn').css("visibility", "visible");
});

function confirmDelete(url) {
    if (confirm("Are you sure you want to delete this item?")) {
        window.location.href = url;
    }
}
</script>

</body>

</html>