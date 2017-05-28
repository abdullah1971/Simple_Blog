
{{-- <form action="search/post" method="post">

	{{ csrf_field() }}

	<div id="custom-search-input">
	    <div class="input-group col-md-12">
	        <input type="text" class="form-control input-lg" placeholder="Search" name="search" />
	        <span class="input-group-btn">
	            <button class="btn btn-info btn-lg" type="submit">
	                <i class="glyphicon glyphicon-search"></i>
	            </button>
	        </span>
	    </div>
	</div>

</form> --}}


<div class="catagory">
	
	<h3>&nbsp;Catagory</h3>
	<ul class="list-group">

		@foreach ($catagory as $element)
			
			@if (Route::currentRouteName() == 'home')

				<a href="catagory/{{ $element->catagory }}" >

			@else

				 <a href="../catagory/{{ $element->catagory }}" > 

			@endif
			
				<li class="list-group-item">
				    <span class="badge">{{ $catagoryCount["$element->catagory"] }}</span>
				    {{ $element->catagory }}
				</li>
			</a>
			
		@endforeach

		
	  
	</ul>

</div>


<div class="archive">
	
	<h3>&nbsp;Archive</h3>
	<ul class="list-group">

		@foreach ($yearCount as $key => $element)
			
			@if (Route::currentRouteName() == 'home')

				<a href="archive/{{ $key }}" >

			@else

				 <a href="../archive/{{ $key }}" > 

			@endif

				<li class="list-group-item">
				    <span class="badge">{{ $element }}</span>
				    {{ $key }}
				</li>
			</a>
			
		@endforeach

		
		

	</ul>

</div>


