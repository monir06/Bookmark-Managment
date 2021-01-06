<div class="container" style="margin-bottom:50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Bookmark') }}</div>

                <div class="card-body">

                    <form class="bookmark-form new" action="{{ route('add') }}" method="POST" role="form"
                        autocomplete="nope">
                        {!! csrf_field() !!}
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input style="width: 100%;padding: 20px;margin: 8px 0;box-sizing: border-box"
                                    class="form-control" type="text" id="title" name="title" placeholder="Title"
                                    required="true">
                            </div>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input style="width: 100%;padding: 20px;margin: 8px 0;box-sizing: border-box"
                                    class="form-control" type="text" id="url" name="url" placeholder="URL"
                                    required="true">
                            </div>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input style="width: 100%;padding: 20px;margin: 8px 0;box-sizing: border-box"
                                    class="form-control" type="text" id="note" name="note" placeholder="Note">
                            </div>
                        </div>

                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" class="btn btn-primary">Add Bookmark</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




    </div>
</div>