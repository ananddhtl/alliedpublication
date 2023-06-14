@include('backend.include.header')
@include('backend.include.sidebar')

@if(session('message'))
<div class="sweetmessage">

    <p>{{ session('message') }}</p>
</div>
@endif

<section class="main">
    <div class="middle-dashboard">

        @if(@$editAuthor)
        <div class="topic-heading" style="display: inline-flex;">
            <div class="topic-icons">
                <i class="ri-money-dollar-box-line"></i>
            </div>
            <h1> Edit Author</h1>
        </div>
        <form action="{{ url('/updateAuthor', $editAuthor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="table-heading">

                <table>
                    <tr>
                        <th>Fill Name</th>
                        <th>Profile Picture</th>
                        <th>Description</th>

                    </tr>
                    <tr>
                        <td><input type="text" name="fullname" value="{{$editAuthor->fullname}}"
                                placeholder="Enter Title"></td>
                        <td><input type="file" placeholder="Enter CitizenShip Photo" id='profile_picture' name="profile_picture"
                            value="@if (isset($editAuthor)) {{ $editAuthor->profile_picture }} @endif" accept="image/*">
                        <img src="{{ $editAuthor->profile_picture }}" alt="" style="width: 100px; height: 100px;"></td>
                        <td><textarea style="height:150px;width:450px;" type="text" name="description"
                                placeholder="Description">{{$editAuthor->description}}</textarea></td>
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
            <h1> Add Author</h1>
        </div>
        <form action="{{ url('/postAuthor') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="table-heading">

                <table>
                    <tr>
                        <th>Fill Name</th>
                        <th>Profile Picture</th>
                        <th>Description</th>

                    </tr>
                    <tr>
                        <td><input type="text" name="fullname" placeholder="Enter Title"></td>
                        <td><input type="file" name="profile_picture" placeholder=""></td>
                        <td><textarea style="height:150px;width:450px;" type="text" name="description"
                                placeholder="Description"></textarea></td>


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
                    <th>Profile Picture</th>
                    <th>Description</th>
                    <th>Action</th>

                </tr>
                @foreach($author as $item)
                <tr>
                    <td>{{$item->fullname}}</td>
                    <td>
                        <div class="recepit-img">
                            <a target="_blank" href="{{$item->profile_picture}}"> <img src="{{$item->profile_picture}}"
                                    alt=""></a>
                        </div>
                    </td>
                    <td>{{$item->description}}</td>
                    <td><a href="{{url('editAuthor/'.$item->id)}}"><button class="edit-button">Edit <i
                                    class="ri-pencil-line"></i> </button></a>
                        </button><button class="del-button"
                            onclick="confirmDelete('{{ url('/deleteAuthor/'.$item->id) }}')">Del <i
                                class="ri-chat-delete-line"></i> </button></td>

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