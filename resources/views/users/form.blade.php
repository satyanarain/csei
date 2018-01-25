<div class="row">
    <div class="input-field col s12">
        <label for="name">Name*</label>
        <input id="name" name="name" type="text" value="{{isset($user->name)?$user->name:''}}" data-error=".errorTxt1">
        <div class="errorTxt1"></div>
    </div>
    <div class="input-field col s12">
        <label for="email">Email*</label>
        <input id="email" name="email" type="email" value="{{isset($user->email)?$user->email:''}}" data-error=".errorTxt2">
        <div class="errorTxt2"></div>
    </div>
    <div class="input-field col s12">
        <label for="contact">Contact*</label>
        <input id="contact" name="contact" type="text" value="{{isset($user->contact)?$user->contact:''}}" data-error=".errorTxt3">
        <div class="errorTxt3"></div>
    </div>
    <div class="col s12">
        {!!Form::label('roles', 'Role*')!!}
        {!!Form::select('roles', $roles, null, ["class"=>"error browser-default", 'placeholder'=>'Choose role', "data-error"=>".errorTxt4"])!!}
        <div class="input-field">
            <div class="errorTxt4"></div>
        </div>
    </div>
    <div class="col s12" id="states_box" style="display: none;">
        {!!Form::label('state', 'State*')!!}
        {!!Form::select('state', $states, null, ["class"=>"error browser-default", 'placeholder'=>'Choose state', "data-error"=>".errorTxt5"])!!}
        <div class="input-field">
            <div class="errorTxt5"></div>
        </div>
    </div>
    <div class="input-field col s12">
        <textarea id="description" name="description" class="materialize-textarea validate" data-error=".errorTxt6">{{isset($user->description)?$user->description:''}}</textarea>
        <label for="description">Description*</label>
        <div class="errorTxt6"></div>
    </div>
    <div class="col s12">
        <div class="row">
          <div class="col s12 m4 l3">
           <p>Profile Picture</p>
       </div>
       <div class="col s12 m8 l9">
       @if(isset($user->profile_picture))
       <input type="file" name="profile_picture" id="input-file-now" class="dropify" data-default-file="{{URL::to('images/userProfiles/'.$user->profile_picture)}}" />
       @else 
       <input type="file" name="profile_picture" id="input-file-now" class="dropify" data-default-file="" />
       @endif
      </div>
  </div>
</div>
<div class="input-field col s12">
    <button class="btn waves-effect waves-light cyan darken-2 right submit" type="submit" name="action">Submit
      <i class="mdi-content-send right"></i>
  </button>
</div>
</div>
