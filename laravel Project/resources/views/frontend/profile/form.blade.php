
 {{ method_field('PATCH') }}
 {{ csrf_field() }}  
<div  class="form-group" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row" >
            <div class="col-md-3">
                <label>First Name</label>
                
            </div>
            <div class="col-md-5 col-md-offset-2">
                    <input class="form-control" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$" placeholder="Enter The First Name"  name="firstname" type="text" id="firstname" value="{{ $users->first_name }}"   >
                   
            </div>
        </div>
      

        <div class="row" style="margin-top:20px;">
                <div class="col-md-3">
                    <label>Last Name</label>
                    
                </div>
                <div class="col-md-5 col-md-offset-2">
                        <input class="form-control" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$" placeholder="Enter The Last Name"  name="lastname" type="text" id="lastname" value="{{ $users->last_name }}"   >
                       
                </div>
            </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-3">
                    <label>Email Id</label>

            </div>
            <div class="col-md-5 col-md-offset-2">
                    <input class="form-control" placeholder="Enter The Email Id" name="email" data-parsley-trigger="keyup" data-parsley-type="email" type="text" id="email"  value="{{ $users->email }}" >

            </div>
        </div>
   

</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
