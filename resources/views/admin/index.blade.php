@extends('layouts.master')

@push('css')
@endpush

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ horizontal-layout ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Horizontal layout</h5>
                </div>
                <div class="card-body">
                    <p>In Horizontal Layout V2 - Navigation bar is set in a Horizontal way with fixed width container. It also showing/hidden while scrolling up/down.</p>
                    <div class="alert alert-info mb-0" role="alert">
                        <p class="mb-0">It is best suited for those applications where you required your navigation is set to be a Horizontal way with fixed width container.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ horizontal-layout ] end -->
    </div>
    <!-- [ Main Content ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Inline Text Elements</h5>
                </div>
                <div class="card-body">
                    <p class="lead m-t-0">Your title goes here</p>
                    You can use the mark tag to
                    <mark>highlight</mark> text.
                    <br>
                    <del>This line of text is meant to be treated as deleted text.</del>
                    <br>
                    <ins>This line of text is meant to be treated as an addition to the document.</ins>
                    <br>
                    <strong>rendered as bold text</strong>
                    <br>
                    <em>rendered as italicized text</em>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Contextual Text Colors</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-1">
                        Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.
                    </p>
                    <p class="text-primary mb-1">
                        Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                    <p class="text-success mb-1">
                        Duis mollis, est non commodo luctus, nisi erat porttitor ligula.
                    </p>
                    <p class="text-info mb-1">
                        Maecenas sed diam eget risus varius blandit sit amet non magna.
                    </p>
                    <p class="text-warning mb-1">
                        Etiam porta sem malesuada magna mollis euismod.
                    </p>
                    <p class="text-danger mb-1">
                        Donec ullamcorper nulla non metus auctor fringilla.
                    </p>
                    <p class="text-dark mb-1">
                        Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
@endsection

@push('js')
@endpush
