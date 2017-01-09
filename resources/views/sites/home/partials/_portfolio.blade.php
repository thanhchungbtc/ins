<!-- section begin -->
<section id="section-portfolio" class="no-top no-bottom" aria-label="section-portfolio">
    <div class="container">

        <div class="spacer-single"></div>

        <!-- portfolio filter begin -->
        @include('sites.shared._categories')
        <!-- portfolio filter close -->

    </div>

    <div id="gallery" class="gallery full-gallery de-gallery pf_full_width wow fadeInUp" data-wow-delay=".2s">
    @foreach($projects as $p)
        <!-- gallery item -->
            <div class="item {{ $p->category_id }}">
                <div class="picframe">
                    <a class="simple-ajax-popup-align-top" href="/projects/{{ $p->id }}">
                         <span class="overlay">
                         <span class="pf_text">
                         <span class="project-name">{{ $p->name }}</span>
                         </span>
                         </span>
                    </a>
                    <img src="{{ $p->photos->first()->thumbnailPath }}" alt=""/>
                </div>
            </div>
            <!-- close gallery item -->
        @endforeach
    </div>

    <div id="loader-area">
        <div class="project-load"></div>
    </div>
</section>
<!-- section close -->

<!-- section begin -->
<section id="view-all-projects" class="call-to-action bg-color text-center" data-speed="5"
         data-type="background" aria-label="view-all-projects">
    <a href="projects.html" class="btn btn-line-black btn-big">Xem tất cả</a>
</section>