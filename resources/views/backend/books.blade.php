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
$childCatagory = DB::select("SELECT  id,child_title  FROM book_child_categories;");
$author = DB::select("SELECT  id,fullname  FROM authors;");
?>
<section class="main">
    <div class="middle-dashboard">

        @if(@$editBooks)
        <div class="topic-heading" style="display: inline-flex;">
            <div class="topic-icons">
                <i class="ri-money-dollar-box-line"></i>
            </div>
            <h1> Edit Books</h1>
        </div>
        <form action="{{ url('/updateBooks', $editBooks->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="table-heading">

                <table>
                    <tr>
                        <th>Title</th>
                        <th> Image</th>
                        <th>Description</th>
                        <th>Published Year</th>


                    </tr>
                    <tr>
                        <td><input type="text" name="book_title" value="{{$editBooks->book_title}}" placeholder="Title"></td>

                        <td>

                            <input type="file" placeholder="Enter CitizenShip Photo" id='citzenImg' name="thumbnail"
                                value="@if (isset($editBooks)) {{ $editBooks->thumbnail }} @endif" accept="image/*">
                            <img src="{{ $editBooks->thumbnail }}" alt="" style="width: 100px; height: 100px;">

                        </td>
                        <td><textarea style="height:150px;width:450px;" type="text" name="description"
                                placeholder="Description">{{$editBooks->description}}</textarea></td>
                        <td><input type="date" name="published_year" value="{{$editBooks->published_year}}"
                                placeholder="Title"></td>
                    </tr>
                    <tr>
                        <th>Catagory</th>
                        <th> Sub Catagory</th>
                        <th>Child Catagory</th>
                        <th>Author</th>

                    </tr>
                    <tr>

                        <td>
                            <select name="book_category">
                                @foreach($catagory as $item)
                                @if(old('book_catagory') == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->title}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <select name="book_sub_category">
                                @foreach($subCatagory as $item)
                                @if(old('book_sub_category') == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->sub_title}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->sub_title}}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                        <td><select name="book_child_catagory">
                                @foreach($childCatagory as $item)
                                @if(old('book_child_catagory') == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->child_title}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->child_title}}</option>
                                @endif
                                @endforeach
                            </select></td>
                        <td>
                            <select name="author_id">
                                @foreach($author as $item)
                                @if(old('author_id') == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->fullname}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->fullname}}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                    <tr>
                        <th>Featured or Not</th>
                        <th>Any Flip Link of Book</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="featured_or_not" value="{{$editBooks->status}}" autocomplete="off"
                                {{ $editBooks->status ? 'checked' : '' }}>
                        </td>

                        <td><textarea style="height:70px;width:300px;" type="text" name="anyflip_books_link"
                                placeholder="Description">{{$editBooks->anyflip_books_link}}</textarea></td>
                    </tr>


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
            <h1> Add Books</h1>
        </div>
        <form action="{{ url('/postBooks') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="table-heading">

                <table>
                    <tr>
                        <th>Title</th>
                        <th> Image</th>
                        <th>Description</th>
                        <th>Published Year</th>


                    </tr>
                    <tr>
                        <td><input type="text" name="book_title" placeholder="Title"></td>
                        <td><input type="file" name="thumbnail" placeholder="Image"></td>
                        <td><textarea style="height:100px;width:450px;" type="text" name="description"
                                placeholder="Description"></textarea></td>
                        <td><input type="date" name="published_year" placeholder="Title"></td>

                    </tr>
                    <tr>
                        <th>Catagory</th>
                        <th> Sub Catagory</th>
                        <th>Child Catagory</th>
                        <th>Author</th>

                    </tr>
                    <tr>
                        <td><select name="book_catagory">
                                <option> Select the catagory</option>
                                @foreach($catagory as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select></td>
                        <td><select name="book_sub_catagory">
                                <option> Select the sub catagory</option>
                                @foreach($subCatagory as $item)
                                <option value="{{$item->id}}">{{$item->sub_title}}</option>
                                @endforeach
                            </select></td>
                        <td><select name="book_child_catagory">
                                <option> Select the child catagory</option>
                                @foreach($childCatagory as $item)
                                <option value="{{$item->id}}">{{$item->child_title}}</option>
                                @endforeach
                            </select></td>
                        <td><select name="author_id">
                                <option> Select the author</option>
                                @foreach($author as $item)
                                <option value="{{$item->id}}">{{$item->fullname}}</option>
                                @endforeach
                            </select></td>

                    </tr>
                    <tr>
                        <th>Featured or Not</th>
                        <th>Any Flip Link of Book</th>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="featured_or_not" value="1" autocomplete="off"></td>
                        <td><textarea style="height:70px;width:300px;" type="text" name="anyflip_books_link"
                                placeholder="Any Flip Link of the Book"></textarea></td>
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
                    <th>Thumbnail</th>
                    <th>Book Catagory</th>
                    <th>Book Sub Catagory</th>
                    <th>Book Child Catagory</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>Published Year</th>
                    <th>Action</th>

                </tr>
                @foreach($books as $item)
                <tr>
                    <td>{{$item->book_title}}</td>
                    <td>
                        <div class="recepit-img">
                            <a target="_blank" href="{{$item->thumbnail}}"> <img src="{{$item->thumbnail}}" alt=""></a>
                        </div>
                    </td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->sub_title}}</td>
                    <td>{{$item->child_title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->fullname}}</td>
                    <td>{{$item->published_year}}</td>
                    <td>
                        <a href="{{url('editBooks/'.$item->id)}}">
                            <button class="edit-button">Edit <i class="ri-pencil-line"></i></button>
                        </a>
                        <button class="del-button" onclick="confirmDelete('{{ url('/deleteBooks/'.$item->id) }}')">
                            Del <i class="ri-chat-delete-line"></i>
                        </button>
                    </td>
                </tr>
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