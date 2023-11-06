            @extends('layouts.app')

            @section('title', 'Service Details')

            @section('content')
            <section class="content">
              <div class="search-resultPage">
                <div class="container">
                  @if(Session::has('booking_flash_success'))
                  <div class="alert alert-success alert-dismissible fade in"  id="myAlert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{!! session('booking_flash_success') !!} !</strong>
                  </div>
                  @endif
                   @if(Session::has('booking_flash_danger'))
                  <div class="alert alert-danger alert-dismissible fade in"  id="myAlert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{!! session('booking_flash_danger') !!} !</strong>
                  </div>
                  @endif

                  @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible" id="myAlert">
                    <a href="" class="close">&times;</a>
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>
                        <strong>Oh sanp!</strong> {{ $error }}
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  @endif

                  <div class="row">
                   <div class="col-lg-9 col-sm-9 col-md-9">
                     <div class="hotel-info tab-content">
                       <h2> {{ $service->title }} </h2>
                       <div class="inner-info">
                        <h4>{{$service->sub_title}}</h4>

                        <div class="address">
                          <div class="map-view">
                            <img src="../images/services-post/{{$service->image}}" alt="">

                          </div>
                          <div class="address-view">
                            <h3>Address :</h3>
                            <div class="address-slide full">
                              <div class="icon icon-location-2"></div>
                              <label>{{$service->location}}</label>
                            </div>
                            <h3>Organization info :</h3>
                            <div class="address-slide">
                              <label> <b>Organization Name:</b></label>
                              <div class="icon icon-info"></div>
                              <label>{{ App\Models\ServiceProviders::where(['id'=>$service->posted_by_id])->pluck('name')[0]}}</label>
                            </div>
                            <div class="address-slide">
                               <label> <b> ServiceProvider-Mail: </b> </label>
                              <div class="icon icon-message"></div>
                              <div>{{ App\Models\ServiceProviders::where(['id'=>$service->posted_by_id])->pluck('email')[0] }}</div>
                            </div>

                            <div class="address-slide">
                              <label> <b> Post-Created: </b> </label>
                              <div class="icon icon-heart"style="color:green"></div>
                            <label class="date"></label>
                            <div class="date">{{date('d', strtotime($service->created_at))}}-{{date('F-y', strtotime($service->created_at))}}</div>
                            </div>

                            <div class="address-slide">
                              <div class="icon icon-location-2"></div>
                              <label><b>Providing-Service area:</b></label>
                              <label>{{ $service->service_area}}</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="amenities-list tab-content">
                     <h2 style="margin-left: -20px;">Details </h2>
                     <div class="amenities-view">
                       {!! $service->description !!}
                     </div>
                   </div>
                 </div>
                 <div class="col-log-3 col-sm-3 col-md-3">
                   <div class="booking-formMain">
                    <div class="book-title">Enter Booking Details </div>
                    <div class="book-form">
                      <div class="row">

                    <form action="{{ url('/Service-Booking') }}" method="post">
                        {{csrf_field()}}
                        <div class="col-sm-12">
                         <div class="input-box has-error">
                          <input type="hidden" name="servicePost_id" value="{{ $service->id }}">
                          <input type="text" name="name" placeholder="Name" required="Fill up this field" value="">
                          <div class="help-block"> Mobile and Date cannot be blank.</div>
                        </div>
                      </div>

                      <div class="col-sm-12">
                       <div class="input-box">
                        <input type="text" name="email" placeholder="Email"
                       @if (Auth::check())
                        {
                          value="{{ Auth::user()->email }}"
                        }
                       @endif>
                       </div>
                     </div>

                     <div class="col-sm-12">
                       <div class="input-box">
                         <input type="text" name="phone" placeholder="Mobile" required="Fill up this field" maxlength="11">
                       </div>
                     </div>

                     <div class="col-sm-12">
                       <div class="input-box">
                         <input type="text" name="address" placeholder="Address">
                       </div>
                     </div>

                     <div class="col-sm-12 col-lg-6">
                       <div class="input-box">
                         <input type="date" name="date" placeholder="Date">
                       </div>
                     </div>
                     <div class="col-sm-12 col-lg-6">
                       <div class="input-box">
                         <input type="text" name="time" placeholder="Time">
                       </div>
                     </div>

                     <div class="col-sm-12">
                       <div class="input-box">
                         <input type="text" name="No_of_service" placeholder="Number of services needed">
                       </div>
                     </div>
                     <div class="col-sm-12">
                       <div class="input-box">
                        <textarea style="width: 100%" name="note" placeholder="Special Instruction"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-12">
                     <div class="submit-box">
                       <input type="submit" value="Book Now" class="btn">
                     </div>
                   </div>
                 </form>
               </div>
             </div>
           </div>
         </div>
       </div>
</div>
</div>
</section>
@endsection
