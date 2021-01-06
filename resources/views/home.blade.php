@extends('layouts.app')

@section('content')
<div class="container" style="margin-bottom:50px;">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('My Bookmarks') }}</div>

        <div class="card-body">

          @if(!empty($message))
          <div class="row">
            <div class="col-md-12">
              <div class="{{ $message['status'] == 'OK' ? 'alert alert-success' : 'alert alert-danger' }} ">
                {{ $message['message'] }}
              </div>
            </div>
          </div>
          @endif

          @if(!count($bookmarks))
          <div class="alert alert-danger" role="alert">
            No Bookmarks!
          </div>
          @endif


          @foreach ( $bookmarks as $bookmark )
          <div class="well span6">
            <div class="media">
              <div class="row-fluid">

                <div class="span2" style="padding-top:15px">
                  <img src="{{ asset('images/bookmark-icon.png') }}" width="50px" height="50px" class="media-object">
                </div>
                <div class="media-body">
                  <div class="span9">
                    <h3>{{ $bookmark->title }}</h3>
                    <span class="icon-globe"></span> <a class="" target="_blank"
                      href="{{ $bookmark->url }}">{{ $bookmark->url }}</a> <br />
                    <span class="icon-book"></span> Note: {{ $bookmark->note }} <br />
                    <span class="icon-time"></span> {{ date('d/m/Y \a\t h:m:s', strtotime($bookmark->created_at)) }}

                  </div>

                  <div class="span1" style="padding-top:15px">
                    <div class="btn-group">
                      <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                        Action
                        <span class="icon-cog icon-white"></span>
                      </a>
                      <ul class="dropdown-menu">


                        <!-- Trigger the modal with a button -->
                        <li data-toggle="modal" data-target="#myModal{{ $bookmark->id }}"><a href="#"><span
                              class="icon-wrench"></span> Modify</a></li>

                        <!-- Trigger the modal1 with a button -->
                        <li data-toggle="modal" data-target="#myModal1{{ $bookmark->id }}"><a href="#"><span
                              class="icon-trash"></span> Delete</a></li>



                      </ul>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>



          <!-- Modal -->
          <div class="modal fade" id="myModal{{ $bookmark->id }}" role="dialog" style="background: none">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Bookmark</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">



                  <form class="form-group" action="{{ route('update') }}" method="POST" role="form" autocomplete="off">
                    {!! csrf_field() !!}
                    <input class="hidden" type="hidden" id="bm_id" name="bm_id" value="{{ $bookmark->id }}">
                    <input style="width: 100%;padding: 20px;margin: 8px 0;box-sizing: border-box" class="form-control"
                      type="text" id="bm_name" name="bm_name" value="{{ $bookmark->title }}">
                    <input style="width: 100%;padding: 20px;margin: 8px 0;box-sizing: border-box" class="form-control"
                      type="text" id="bm_url" name="bm_url" value="{{ $bookmark->url }}">
                    <input style="width: 100%;padding: 20px;margin: 8px 0;box-sizing: border-box" class="form-control"
                      type="text" id="bm_note" name="bm_note" value="{{ $bookmark->note }}">
                    <button class="btn btn-primary" type="submit">Update</button>
                  </form>



                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>



          <!-- Modal -->
          <div style="background: none" class="modal fade" id="myModal1{{ $bookmark->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">

                  <h4 class="modal-title" id="myModalLabel">Delete Bookmark</h4>
                </div>

                <div class="modal-body">
                  Are you sure you want to delete this bookmark <b>
                    <font color="green">{{ $bookmark->title }}</font>
                  </b>?
                  <form class="" action="{{ route('delete') }}" method="POST" role="form" autocomplete="off">
                    {!! csrf_field() !!}
                    <input class="hidden" type="hidden" id="bm_id" name="bm_id" value="{{ $bookmark->id }}">

                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-danger" value="Delete" />
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          @endforeach
          {{ $bookmarks ->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.new-bookmark')
{{-- @include('layouts.update-bookmark') --}}
@endsection