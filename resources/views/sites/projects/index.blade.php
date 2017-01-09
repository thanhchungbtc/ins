
@extends('sites.layout')

@section('content')
    @include('sites.shared._pageSubtitle', ['pageTitle' => 'Dự án'])
    <section class="bg-fixed wpb_row vc_row-fluid main-content">
        <div class="container">

            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper ">

                            @include('sites.shared._categories')

                            <div id="gallery" class="row grid_gallery gallery de-gallery wow fadeInUp animated"
                                 data-wow-delay="0s">
                            @foreach($projects as $p)
                                <!-- gallery item -->
                                    <div class="col-md-3 item {{ $p->category_id }} ">
                                        <div class="picframe">
                                            <a class="simple-ajax-popup-align-top" href="/projects/{{ $p->id }}">
                                                <span class="overlay">

                                                    <span class="pf_text">
                                                        <span class="project-name">{{ $p->name }}</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <img src="{{ $p->photos->first()->thumbnailPath }}" alt=""
                                            >
                                        </div>
                                    </div>

                            @endforeach
                            <!-- close gallery item -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop