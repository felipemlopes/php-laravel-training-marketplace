<div class="col-xs-12">

</div>

<div class="col-lg-3 col-md-4 col-sm-4 col-xs-5">
  <div class="profile-picture">
    @if($grids->profile_picture == 'default.png')
      <img src="{{ url('images/users/thumb/'.$grids->profile_picture) }}" width="100%">
    @else
      <img src="{{ url('images/users/thumb/'.$grids->profile_picture) }}" width="100%">
    @endif

    <?php $user_id = (isset(Auth::user()->id))?Auth::user()->id:''; ?>
    @if($grids->user_id != $user_id)
    @if(Auth::check())

    @include('general.contact-btn')

      <a class="btn full-width trigger-popup ajax-count-feature"
        data-feature-name="send_message"
        data-trigger-popup="coming-soon">Send Message</a>

      <a class="btn full-width view_phone ajax-count-feature"
        data-feature-name="contact_number"> View Contact Number</a><br/>
    @else
      <a class="btn full-width trigger-popup trigger-sign-in" data-owner="{{ $grids->user_id }}" data-owner-role="2">Add to Contact</a>
      <a class="btn full-width trigger-popup trigger-sign-in"
        data-feature-name="contact_number"> View Contact Number</a><br/>
    @endif

    <!--
    <a class="btn full-width trigger-popup" data-trigger-popup="send-message">Send Message</a>
    -->

    <div class="invisible_phone" style="display:none; padding:10px 0;" >
      <i class="fa fa-whatsapp text-green"></i> {{ $grids->phone_number }} <br/>
      <i class="fa fa-envelope-o text-green"></i> {{ $grids->email }} <br/>
      <i class="fa fa-building text-green"></i> work area: {{ $grids->service_area }} <br/>
      <!--
      <i class="fa fa-whatsapp text-green"></i> +6281231234 <br/>
      <i class="fa fa-envelope-o text-green"></i> ysubianto@gmail.com <br/>
      <i class="fa fa-whatsapp text-green"></i> office: +6281231234 <br/>
      <i class="fa fa-building text-green"></i> work address: Jalan Satu No. dua <br/>
      -->
    </div>
    @else
      <a href="{{ url('dashboard/basic-profile') }}" class="btn full-width">Edit Basic Profile</a>

      @if( ($provider > 0) && ($is_admin == 1) )
        <a href="{{ url('dashboard/group/8') }}" class="btn full-width">Manage Training Provider</a>
      @endif
    @endif
    <!--
      <a class="btn full-width">Edit Provider Profile</a>
      <a href="{{ url('dashboard/') }}" class="btn full-width">Manage My Profile</a>
    -->
  </div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 user-list-info" style="padding-right:30px;">
  <div class="row">
    <a class="user-name">
      @if($grids->name !== ' ')
        {{ $grids->name }}
      @else
        {{ $grids->email }}
      @endif
    </a>

    <!--<a class="user-name">Mulyono Sephiaques</a>-->

    <i class="fa fa-check-circle text-green bigger-1-5 pointer" title="verified user"></i>
    <br/>
        <span class="user-score bigger-1-5"  title="Overall Evaluation Score: 9.5">{{$grids->score}}</span>
    <!--<span class="user-score bigger-1-5">9.0</span>-->
    <a href="" class="trigger-popup ajax-count-feature"
      title="5 people evaluated this freelance trainer"
      data-feature-name="evaluation" data-trigger-popup="coming-soon">
      (5 evaluation(s))
    </a>
  </div>
  <div class="row">


    @if( ($grids->current_company != "") || ($grids->job_title != "") )
      <i class="fa fa-briefcase"  aria-hidden="true"></i>
    @endif

    @if($grids->job_title)
     {{ $grids->job_title }}
    @endif

    @if( ($grids->current_company != "") && ($grids->job_title != "") )
      at
    @endif

    @if($grids->current_company)
     {{ $grids->current_company }}
    @endif

    <br/>
    @if($grids->area)
      <i class="fa fa-map-marker"></i>
      {{ $grids->area }}
    @endif

    <!--Jakarta, Indonesia-->
    @if($grids->languages)
      <i class="fa fa-comment"></i>
      @foreach($grids->languages as $language)
        {{ $language->language_name }}
      @endforeach
    @endif
    <!--Indonesian, English-->
  </div>
  <div class="row text-grey">
    {{$grids->summary}}
    <!--
    <p>Entrepreneur, Business Lecturer at Smartlearn University, Vice Rector of Employability
      and Entrepreneurship Center, Business Speaker</p>-->
  </div>
  <div class="row">
    <!--
    <span class="invisible_phone" style="display:none;">
      <i class="fa fa-whatsapp text-green"></i> +6281231234 <br/>
      <i class="fa fa-envelope-o text-green"></i> ysubianto@gmail.com
    </span>
  -->
    @if(Auth::guest())
      <!--
      <a class="trigger-popup trigger-sign-in"> View Contact Number</a><br/>
    -->
    @else
    <!--
      <a class="view_phone"> View Contact Number</a><br/>-->
    @endif

    <br/>
    <b>{{ trans('content.pr_expertises') }}</b><br/>

    @if(count($grids->expertises) == 0)
    You currently have no Skills added.
    <a href="{{ url('dashboard/skill/add') }}">Add expertise</a>
    @endif
    @foreach($grids->expertises as $expertise)
      <a class="skill-tag trigger-popup tag" title="{{$expertise->total_endorse}} persons endorsed this skill">
        <span class="bold">{{$expertise->total_endorse}}</span>
        {{$expertise->expertise_name}}
      </a>
    @endforeach
  </div>
</div>
