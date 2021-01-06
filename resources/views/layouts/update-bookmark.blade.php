<div class="update-bookmark-container animated fadeInUp">
    <div class="update-bookmark-subcontainer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form class="bookmark-form update" action="{{ route('update') }}" method="POST" role="form" autocomplete="nope">
                        {!! csrf_field() !!}
                        <legend>Update Bookmark</legend>
                        <input class="form-control hidden" type="text" id="id" name="id" placeholder="id" required="true">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input class="form-control" type="text" id="title" name="title" placeholder="Title" required="true">
                            </div>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input class="form-control" type="text" id="url" name="url" placeholder="URL" required="true">
                            </div>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input class="form-control" type="text" id="note" name="note" placeholder="Note">
                            </div>
                        </div>
                
                        <div class="col-md-10 col-md-offset-1">
                            
                            <button type="submit" class="btn btn-primary">Update Bookmark</button><button class="btn btn-danger cancel">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>