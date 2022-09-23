@extends('admin.layouts.app')
@section('meta_title', 'Send your query')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                @if(session('success'))
                <div class="card-header bg-success">
                   {{session('success')}}
                </div>
                @elseif(session('error'))
                <div class="card-header bg-danger">
                   {{session('error')}}
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('vendor.queries.storequery') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @error('description')
                                    <label class="messages text-danger">{{ $errors->first('description') }}</label>
                                @else
                                    <label>Description</label>
                                @enderror
                                <textarea id="description"
                                class="form-control" rows="3" name="description"
                                    placeholder="Enter Description ...">{{ old('description') }}</textarea>
                            </div>
                             
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Send Query</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

@endsection
@section('script')
<script>
    $(function () {
    // Summernote
    $('#description').summernote({
         height: 300,
  focus: true
    }
        );
    })
</script>
@endsection
