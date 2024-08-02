@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>WHy choose us section</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Edit Section</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.why-choose-us.update', $whyChooseUs->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Icon</label>
                        <button data-icon="{{ $whyChooseUs->icon }}" role="iconpicker" class="btn btn-primary"
                            name="icon">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <textarea id="" class="form-control" name="title">{{ $whyChooseUs->title }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Short description</label>
                        <input type="text" class="form-control" name="short_description"
                            value="{{ $whyChooseUs->short_description }}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="" class="form-control">
                            <option @selected($whyChooseUs->status === 1) value="1">Yes</option>
                            <option @selected($whyChooseUs->status === 0) value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
