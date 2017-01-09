
<div class="container project-view">

    <div class="row">
        <div class="col-md-8 project-images">
            @foreach($project->photos as $photo)
            <img src="{{ $photo->path }}" alt="" class="img-responsive" />
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="project-info">
                <h2>Project</h2>

                <div class="details">
                    <div class="info-text">
                        <span class="title">Tên dự án</span>
                        <span class="val">{{ $project->name }}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Ngày hoàn thiện</span>
                        <span class="val">{{ $project->complete }}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Chi phí</span>
                        <span class="val">$ {{ number_format($project->price) }}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Khách hàng</span>
                        <span class="val">{{ $project->investor }}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Loại dự án</span>
                        <span class="val">{{ $project->category->name }}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
