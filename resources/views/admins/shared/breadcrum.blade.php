<ol class="breadcrumb">
	<li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
	@if (count($breadcrums) == 0)
		<li class="active">Dashboard</li>
	@else
		<?php $routeName = ''; ?>
		@foreach($breadcrums as $breadcrum)
			<?php  $routeName .= $breadcrum ?>
			@if ($loop->iteration != $loop->count)
				@if($loop->iteration != 1)
					@continue
				@endif
				<li><a href="{{ route("{$routeName}.index") }}">{{ ucfirst($breadcrum) }}</a></li>
			@else
				<li class="active">{{ ucfirst($breadcrum) }}</li>
			@endif
		@endforeach
	@endif

</ol>