@extends('main-app')

@section('title', 'SPEAQUS')

@section('content')
  <br/><br/><br/><br/>
  <div class="container">
    <a href="{{ url('dashboard') }}" class="btn">
      <i class="fa fa-angle-left"></i>
      Go back
    </a>
    <div class="row box-profile">
      <div class="col-md-12 box-section profile-section datatable-section" data-section="trainings">
        <div class="row text-center">
          <!--<h3><span class="lnr lnr-plus-circle bigger-1-5 blue-border circle text-blue" style="padding:15px;"></span></h3>
          <br/>-->
          <h3 class="roboto-light text-blue">
            @if(isset($training_experience))
              EDIT TRAINING EXPERIENCE
            @else
              ADD TRAINING EXPERIENCE
            @endif
          </h3>
        </div>
        <br/>
      </div>
      <div class="col-lg-offset-3 col-lg-6 col-md-12">

        @if(isset($training_experience))
          <form action="{{url('dashboard/training-experience/'.$training_experience->training_experience_id.'/edit')}}" method="POST" id="fg-form-1" class="fg-form box-grid padding-20">
          <input type="hidden" name="_method" value="PUT" enctype="multipart/form-data"/>
        @else
          <form action="{{url('dashboard/training-experience/add')}}" method="POST" id="fg-form-1" class="fg-form box-grid padding-20" enctype="multipart/form-data">
        @endif
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

          <div class="col-xs-12 fg-input"
            data-type="text"
            data-label="Training title"
            data-name="training_experience"
            data-validation="required"
            data-placeholder="insert training title"
            data-current="<?php if(isset($training_experience)): echo $training_experience->training_experience; else: echo Input::old('training_experience'); endif; ?>"
            data-classes="form-control">
          </div>

          <div class="col-xs-12 fg-input"
            data-type="text-autocomplete"
            data-label="Corporate"
            data-name="company"
            data-validation="required"
            data-placeholder="insert training provider name"
            data-items="Dunamis,Super Coach,Binus Creates,Binus Center"
            data-current=""
            data-get-ajax="{{ url('getautocompletedata/corporates/corporate_name') }}/"
            data-get-ajax-column="corporate_name"
            data-classes="form-control">
          </div>

          <div class="col-xs-12 fg-input"
            data-type="text-autocomplete"
            data-label="Training Program"
            data-name="training_program"
            data-validation="required"
            data-placeholder="insert training provider name"
            data-items="Dunamis,Super Coach,Binus Creates,Binus Center"
            data-current=""
            data-get-ajax="{{ url('getautocompletedata/training_program/training_program_name_en') }}/"
            data-get-ajax-column="training_program_name_en"
            data-classes="form-control">
          </div>

          <div class="col-xs-12 fg-input"
            data-type="date"
            data-label="Training Start Date"
            data-name="start_date"
            data-validation=""
            data-placeholder="insert training date"
            data-current=""
            data-classes="form-control">
          </div>

          <div class="col-xs-12 fg-input"
            data-type="date"
            data-label="Training End Date"
            data-name="end_date"
            data-validation=""
            data-placeholder="insert training date"
            data-current=""
            data-classes="form-control">
          </div>

          <!--
          <div class="col-xs-12 fg-input"
            data-type="text-autocomplete"
            data-label="Learning Outcome"
            data-name="learning_outcome"
            data-validation=""
            data-placeholder="insert training provider name"
            data-items="Dunamis,Super Coach,Binus Creates,Binus Center"
            data-current=""
            data-get-ajax="{{ url('getautocompletedata/learning_outcomes/learning_outcome_name') }}/"
            data-get-ajax-column="learning_outcome_name"
            data-classes="form-control"
            data-multiple-chip="add more learning outcome">
          </div>
          -->

          <div class="col-xs-12 fg-input"
            data-type="text-autocomplete"
            data-label="Skills"
            data-name="skill"
            data-validation=""
            data-placeholder="insert training provider name"
            data-items="Dunamis,Super Coach,Binus Creates,Binus Center"
            data-current=""
            data-get-ajax="{{ url('getautocompletedata/skills/skill_name') }}/"
            data-get-ajax-column="skill_name"
            data-classes="form-control"
            data-multiple-chip="add more skill">
          </div>

          <div class="col-xs-12 fg-input"
            data-type="textarea"
            data-label="Training Description"
            data-name="description"
            data-validation=""
            data-placeholder="insert training description"
            data-current=""
            data-classes="form-control">
          </div>

          <div class="col-xs-12 fg-input"
            data-type="image"
            data-label="Training Experience Photos"
            data-name="training_photos[]"
            data-validation="required"
            data-placeholder="insert training photos"
            data-current=""
            data-classes="form-control"
            data-multiple="multiple"
            >
          </div>

          <div class="col-xs-12 fg-submit" data-value="Insert"></div>

        </form>
      </div>
    </div>
  </div>

@stop
