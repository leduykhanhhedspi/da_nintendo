@extends ('admin.master')
@section ('content')
<section id="main-content">
            <section class="wrapper">
               <!--overview start-->
               <div class="row">
                  <div class="col-lg-12">
                     <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                     <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="fa fa-laptop"></i>Create System</li>
                     </ol>
                  </div>
                  <div class="col-lg-12">
                    <div class="col-lg-7" style="padding-bottom:120px">
                     @include ('admin.layouts.error')
                        <form action="{!! route('admin.system.store') !!}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                               <label>Name (en)</label>
                               <input class="form-control" name="name" placeholder="Please Enter System Name" />
                            </div>
                            <div class="form-group">
                               <label>Name (ja)</label>
                               <input class="form-control" name="japanese_name" placeholder="Please Enter System Name" />
                            </div>
                            <div class="form-group">
                               <label>Full Name</label>
                               <input class="form-control" name="fullname" placeholder="Please Enter System Full Name" />
                            </div>
                            <div class="form-group">
                               <label>System Description</label>
                               <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                            <div class="form-group">
                               <label>Images</label>
                               <input type="file" name="fImages">
                            </div>
                            <button type="submit" class="btn btn-default">System Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                     </div>
                  </div>
               </div>
               
            </section>
         </section>
@endsection

