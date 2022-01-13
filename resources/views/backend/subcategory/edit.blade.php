<x-backend>

	@php 
		$id=$subcategory->id;
		$id=$subcategory->category_id;
		$name=$subcategory->name;
		// $category_id=$subcategory->categoryid;
	@endphp
	<main class="app-content">
		<div class="app-title">
			<div>
				<h1> <i class="icofont-list"></i> Subcategory Edit Form </h1>
			</div>
			<ul class="app-breadcrumb breadcrumb side">
				<a href="{{route('backside.subcategory.index')}}" class="btn btn-outline-primary">
					<i class="icofont-double-left icofont-1x"></i>
				</a>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<div class="tile-body">
						<form action="{{route('backside.subcategory.update',$id)}}" method="POST">

							<!-- token number => user cannot CRUD (cross site request forgery)-->
							@csrf
							@method('PUT')
							

							<div class="form-group row">
								<label for="name_id" class="col-sm-2 col-form-label"> Name </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name_id" name="name" value="{{$name}}">

									<div class="text-danger form-control-feedback">
										{{$errors->first('name')}}
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label for="photo_id" class="col-sm-2 col-form-label"> Category </label>
								<div class="col-sm-10">
									<select class="form-control" name="categoryid">
                                        <option>Choose Category</option> 
                                        @foreach($categories as $category)
                                        @php 
                                        	$cid=$category->id;
                                        	$cname=$category->name;
                                        @endphp
                                        <option value="{{$cid}}" @if($id==$cid) selected="selected" @endif>
                                            {{$cname}}
                                        </option>
                                        @endforeach
                                                      
                                    </select>
	                                
	                                <div class="text-danger form-control-feedback">
										{{$errors->first('category_id')}}
									</div>
	                              
        						</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-primary">
										<i class="icofont-save"></i>
										Save
									</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
</x-backend>